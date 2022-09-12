<?php

namespace RBooks\Services;

use RBooks\Repositories\UserCustomerRepository;
use \Auth;
use RBooks\Repositories\CustomerRepository;
use RBooks\Models\Customer;
use RBooks\Models\UserCustomer;
use Illuminate\Support\Facades\Mail;
use Crypt;
use \DB;
use RBooks\Services\UserCustomerService;
use RBooks\Services\CustomerService;

class UserCustomerService extends BaseService
{
    public function __construct()
    {
        $this->repository = app(UserCustomerRepository::class);
    }

    /**
     * create
     * Tao tai khoan dang nhap trang quan tri user khach hang 
     * 
     * @author  linh
     * @return  datatype
     * @access  public
     * @date    Mar 22, 2021 5:13:27 PM
     */ 
    public function create($request)
    {

        DB::beginTransaction();
        try {

            $customer = $request->customer_id;
            $customer_id = "";
            if ($request->customer_id != ""){
                $dateArray = explode('-', $customer);
                $customer_id = $dateArray[0];
            }
    
            $blocked = $request->blocked;
            $begin_at = ($request->begin_at==""?"":quote_smart(FormatDateForSQL($request->begin_at)));
            $finish_at = ($request->finish_at==""?"":quote_smart(FormatDateForSQL($request->finish_at)));
    
            $approved_product = $request->approved_product;
            $begin_at_product = ($request->begin_at_product==""?"":quote_smart(FormatDateForSQL($request->begin_at_product)));
            $finish_at_product = ($request->finish_at_product==""?"":quote_smart(FormatDateForSQL($request->finish_at_product)));
    
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'customer_id' => $customer_id,
                'service_product_id' => $request->service_product_id,
                'updated_user_id' => Auth::user()->id,
                'blocked' => $blocked,
                'begin_at' => $begin_at,
                'finish_at' => $finish_at,
                'approved_product' => $approved_product,
                'begin_at_product' => $begin_at_product,
                'finish_at_product' => $finish_at_product,
            ];
    
            $user = $this->repository->create($data);
    
            if ($request->customer_id != ""){
                $user_id = quote_smart($user->id);
                $updated_user_id = quote_smart(Auth()->user()->id);
        
                $data = [
                    'user_id' => $user_id,
                    'updated_user_id' => $updated_user_id,
                ];
                app(CustomerRepository::class)->update($data, $customer_id);        	
            }
    
            $typereport = $request->typereport;
            if ($typereport == 'mail'){
                $userpassword = $request->password;
                $this->sendMailNewAccount($user, $userpassword);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $user;
    }

    public function sendMailNewAccount($usercustomer, $userpassword)
    {
        $ret = 0;
        try {
            Mail::send('mail.newAccount', ['usercustomer' => $usercustomer, 'userpassword' => $userpassword], function ($message) use ($usercustomer, $userpassword) {
                $message->from('info@fiinves.vn', 'FIINVES Ecommerce');
                $message->to($usercustomer->email)->subject('Email thong bao tai khoan da duoc kich hoat - Active account notification');
            });
            $ret = 1;
        } catch (Exception $e) {
            $ret = 0;
        }

        return $ret;
    }

    public function sendMailNewAccountAdmin($usercustomer, $userpassword)
    {
        $sendmailfrom = config('app.sendmailfrom');
        $sendmailcc = config('app.sendmailcc');
        $sendmailcc_1 = config('app.sendmailcc_1');
        
        $ret = 0;
        try {
            Mail::send('mail.newAccountAdmin', ['usercustomer' => $usercustomer, 'userpassword' => $userpassword], function ($message) use ($usercustomer, $userpassword, $sendmailfrom, $sendmailcc) {
                $message->from($sendmailfrom, 'FIINVES Ecommerce');
                $message->to($sendmailcc)->subject('Email thong bao tai khoan da duoc kich hoat - Active account notification');
            });

            if ($sendmailcc_1 != ""){
                Mail::send('mail.newAccountAdmin', ['usercustomer' => $usercustomer, 'userpassword' => $userpassword], function ($message) use ($usercustomer, $userpassword, $sendmailfrom, $sendmailcc_1) {
                    $message->from($sendmailfrom, 'FIINVES Ecommerce');
                    $message->to($sendmailcc_1)->subject('Email thong bao tai khoan da duoc kich hoat - Active account notification');
                });
            }

            $ret = 1;
        } catch (Exception $e) {
            $ret = 0;
        }

        return $ret;
    }

    public function sendInforBankAccount($usercustomer, $contract)
    {

        Mail::send('mail.inforBankAccount', ['usercustomer' => $usercustomer, 'contract' => $contract], function ($message) use ($usercustomer, $contract) {
            $message->from('info@fiinves.vn', 'FIINVES Ecommerce');
            $message->to($usercustomer->email)->subject('Email thong bao thanh toan dich vu - Email payment notification');
        });

        $ret = 1;
        if (Mail::failures()) {
            $ret = 0;
        }
        
        return $ret;
    }

    public function update($request, $id)
    {
        $customer = $request->customer_id;
        $blocked = $request->blocked;
        $begin_at = ($request->begin_at==""?"":quote_smart(FormatDateForSQL($request->begin_at)));
        $finish_at = ($request->finish_at==""?"":quote_smart(FormatDateForSQL($request->finish_at)));

        $approved_product = $request->approved_product;
        $begin_at_product = ($request->begin_at_product==""?"":quote_smart(FormatDateForSQL($request->begin_at_product)));
        $finish_at_product = ($request->finish_at_product==""?"":quote_smart(FormatDateForSQL($request->finish_at_product)));

        $customer_id = "";
        if ($request->customer_id != ""){
            $dateArray = explode('-', $customer);
            $customer_id = $dateArray[0];
        }
        
        $password = $request->password;
        if ($password != ""){
        	$password = bcrypt($password);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
                'customer_id' => $request->customer_id,
                'service_product_id' => $request->service_product_id,
                'updated_user_id' => Auth::user()->id,
                'blocked' => $blocked,
                'begin_at' => $begin_at,
                'finish_at' => $finish_at,
                'approved_product' => $approved_product,
                'begin_at_product' => $begin_at_product,
                'finish_at_product' => $finish_at_product,
            ];
        }else{
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'customer_id' => $request->customer_id,
                'service_product_id' => $request->service_product_id,
                'updated_user_id' => Auth::user()->id,
                'blocked' => $blocked,
                'begin_at' => $begin_at,
                'finish_at' => $finish_at,
                'approved_product' => $approved_product,
                'begin_at_product' => $begin_at_product,
                'finish_at_product' => $finish_at_product,
            ];
        }
        $user = $this->repository->update($data, $id);

        if ($request->customer_id != ""){
            $user_id = quote_smart($user->id);
            $updated_user_id = quote_smart(Auth()->user()->id);
    
            $data = [
                'user_id' => $user_id,
                'updated_user_id' => $updated_user_id,
            ];
            app(CustomerRepository::class)->update($data, $customer_id);            
        }

        $typereport = $request->typereport;
        if ($typereport == 'mail'){
            $userpassword = $request->password;
            $this->sendMailChangePassword($user, $userpassword);        	
        }
        
        return $user;
    }

    public function sendMailChangePassword($usercustomer, $userpassword)
    {

        Mail::send('mail.changePassword', ['usercustomer' => $usercustomer, 'userpassword' => $userpassword], function ($message) use ($usercustomer, $userpassword) {
            $message->from('infor@dongtiencanhan.com', 'BSP Ecommerce');
            $message->to($usercustomer->email)->subject('BSP: Thu thong bao cap mat khau thanh cong - Change Password sucessfully');
        });

        $ret = 1;
        if (Mail::failures()) {
            $ret = 0;
        }

        return $ret;

    }
    
    public function updateChangePass($request, $id)
    {
        $password = $request->password;

        $data = [
            'password' => $password,
        ];

        $user = $this->repository->update($data, $id);
        return $user;
    }

    public function getSortPage($field = 'id', $user = 'asc', $limit = null, $columns = ['*'])
    {
        $repository = $this->getRepository();
        return $repository->orderBy($field, $user)->paginate($limit, $columns);
    }
    
    public function getListUser($department)
    {
        $condition = array(['role', 'LIKE', "$department"], ['role', '!=', "HT"]);
        $listUser = app(UserCustomerRepository::class)->findWhere($condition);

        return $listUser;    
    }
    
    public function updateDataUser($dataArray, $id)
    {
        $user = $this->repository->update($dataArray, $id);
        return $user;
    }

    public function createDataUser($dataArray)
    {

        $customer_id = $dataArray['customer_id'];
        $userpassword = $dataArray['password'];
        $dataArray['password'] = bcrypt($userpassword);

        $user = $this->repository->create($dataArray);

        if ($customer_id != ""){
            $user_id = quote_smart($user->id);
            $updated_user_id = quote_smart(Auth()->user()->id);
    
            $data = [
                'user_id' => $user_id,
                'updated_user_id' => $updated_user_id,
            ];
            app(CustomerRepository::class)->update($data, $customer_id);            
        }

        $this->sendMailNewAccount($user, $userpassword);

        return $user;
    }

    public function resetPasswordUserCustomer($dataArray, $user_id)
    {
        $userpassword = $dataArray['password'];
        $dataArray['password'] = bcrypt($userpassword);
        $user = $this->updateDataUser($dataArray, $user_id);

        $this->sendMailResetPassword($user, $userpassword);

        $ret = 1;
        if (Mail::failures()) {
            $ret = 0;
        }

        return $ret;

    }

    public function sendMailResetPassword($usercustomer, $userpassword)
    {

        Mail::send('mail.resetPassword', ['usercustomer' => $usercustomer, 'userpassword' => $userpassword], function ($message) use ($usercustomer, $userpassword) {
            $message->from('infor@dongtiencanhan.com', 'BSP Ecommerce');
            $message->to($usercustomer->email)->subject('BSP: Thu thong bao khoi phuc mat khau thanh cong - Reset Password sucessfully');
        });

        $ret = 1;
        if (Mail::failures()) {
            $ret = 0;
        }

        return $ret;

    }                     

    /**
     * getListUserBySearch
     * Lay danh sach user
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListUserBySearch($searchField, $searchValue)
    {
        $searchField = ($searchField == "" ? 'name' : $searchField);
        $listData = app(UserCustomer::class)->where($searchField, 'like', "%$searchValue%")->orderBy('created_at', 'DESC');

        return $listData;    
    }  
    
    /**
     * getUserByEmail
     * Lay danh sach user
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getUserByEmail($searchEmail)
    {
        $listData = app(UserCustomer::class)->where('email', '=', "$searchEmail")->first();
        
        return $listData;    
    }
    
    public function delete($id)
    {
        DB::beginTransaction();
        $model = app(UserCustomerService::class)->find($id);
        $customer_id = $model->customer_id;
        $email = $model->email;
        
        try {
            \DB::table('customers')
                ->where('id', '=', $customer_id)
                ->delete();

            \DB::table('users')
                ->where('id', '=', $id)
                ->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return true;
    }           
}
