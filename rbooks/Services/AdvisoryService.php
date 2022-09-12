<?php

namespace RBooks\Services;

use RBooks\Repositories\AdvisoryRepository;
use RBooks\Repositories\AdvisoryAnswerRepository;
use Illuminate\Support\Facades\Mail;
use \Auth;
use RBooks\Models\Advisory;

class AdvisoryService extends BaseService
{
    public function __construct()
    {
        $this->repository = app(AdvisoryRepository::class);
    }

    /**
     * Lay tong so yeu cau
     *
     * @author  Cong
     * @param   string $somecontent
     * @access  public
     * @date    Apr 7, 2020 10:00:00 AM
     */
    public function getListAdvisory()
    {
        $total = 0;

        $advisorys = app(Advisory::class)->get();

        if ($advisorys->count() > 0) {
            $total = $advisorys->count();
        }

        return $total;
    }

    // Tổng số đã,chưa xử lý
    public function getListStatusAdvisory($status)
    {
        $total = 0;

        $advisorys = app(Advisory::class)->where('status', $status);

        if ($advisorys->count() > 0) {
            $total = $advisorys->count();
        }

        return $total;
    }

    // KH gửi y/c
    public function submitformAdvisory($request, $type)
    {
        if(Auth::check()) {
            $created_user_id = Auth::user()->id;
            $updated_user_id = Auth::user()->id;
        } else {
            $created_user_id = NULL;
            $updated_user_id = NULL;
        }

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'titleadvisory' => $request->titleadvisory,
            'contentadvisory' => $request->contentadvisory,
            'type' => $type,
            'status' => 0,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id
        ];
        return $this->repository->create($data);
    }

    // Admin tra loi y/c
    public function advisoryAnswers($request, $id)
    {
        $advisory = $this->repository->find($id);
        $status = [
            'status' => 1,
        ];
        $this->repository->update($status, $advisory->id);

        $data = [
            'advisory_id' => $advisory->id,
            'answer_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'created_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id
        ];
        $advisoryAnswer = app(AdvisoryAnswerRepository::class)->create($data);

        Mail::send('product-manage.advisory.sendmail', ['advisory' => $advisory, 'advisoryAnswer' => $advisoryAnswer], function ($message) use ($advisory, $advisoryAnswer) {
            $message->from('rbookscorp@gmail.com', 'LAMs FUNDS');

            $message->to($advisory->email)->subject('Hỗ trợ tư vấn khách hàng')->cc('it4@lamians.com')->bcc(['it3@lamians.com', 'it5@lamians.com']);
        });
    }

    public function getSortPage($advisory = 'desc', $limit = null, $columns = ['*'])
    {
        $repository = $this->getRepository();
        return $repository->orderBy('id', $advisory)->paginate($limit, $columns);
    }
}
