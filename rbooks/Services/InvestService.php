<?php

namespace RBooks\Services;

use RBooks\Repositories\InvestRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Invest;

class InvestService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(InvestRepository::class);
    }

    public function create($request)
    {
        $defaultUserImage = config('app.newsimage');
        $imageName = "";
        $image = $request->file('fImages');
        if($image == null) {
            $imageN = "";
            $imageName = "";
        } else {
            $imageN = $image->getClientOriginalName();
            $imageName = $defaultUserImage.$imageN;
            $image->move(public_path($defaultUserImage), $imageName);
        }

        $newsdate = ($request->newsdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->newsdate)));
        $newstype = quote_smart($request->newstype);
        $newstitle = quote_smart($request->newstitle);

        $shortcontent = quote_smart($request->shortcontent);
        $content = quote_smart($request->content);

        $maxValue = app(Invest::class)::max('newsorder');
        $maxValue = intval($maxValue) + 1;
        $newsorder = quote_smart($maxValue);
        $author = quote_smart($request->author);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'newsdate' => $newsdate,
            'newstype' => $newstype,
            'newstitle' => $newstitle,
            'newsimage' => $imageName,
            'shortcontent' => $shortcontent,
            'content' => $content,
            'newsorder' => $newsorder,
            'author' => $author,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->create($data);
    }

    public function update($request, $id)
    {
        $defaultUserImage = config('app.newsimage');
        $imageName = "";
        $image = $request->file('fImages');
        if($image == null) {
            $imageN = $request->newsimage;
            $imageName = $imageN;
        } else {
            $imageN = $image->getClientOriginalName();
            $imageName = $defaultUserImage.$imageN;
            $image->move(public_path($defaultUserImage), $imageName);
        }

        $newsdate = ($request->newsdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->newsdate)));
        $newstype = quote_smart($request->newstype);
        $newstitle = quote_smart($request->newstitle);

        $shortcontent = quote_smart($request->shortcontent);
        $content = quote_smart($request->content);
        $newsorder = quote_smart($request->newsorder);
        $author = quote_smart($request->author);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'newsdate' => $newsdate,
            'newstype' => $newstype,
            'newstitle' => $newstitle,
            'newsimage' => $imageName,
            'shortcontent' => $shortcontent,
            'content' => $content,
            'newsorder' => $newsorder,
            'author' => $author,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

    public function getListNews($searchField, $searchValue)
    {
        $listData = app(Invest::class)
                            ->where('newstype', 'like', "%$searchField%")
                            ->where('shortcontent', 'LIKE', "%$searchValue%")
                            ->where('deleted_at', '=', null)
                            ->orderBy('created_at', 'desc');
                                        
        return $listData;    
    }            

}
