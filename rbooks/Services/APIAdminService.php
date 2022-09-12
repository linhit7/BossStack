<?php

namespace RBooks\Services;

use Illuminate\Support\Facades\Mail;
use \Auth;
use \DB;
use RBooks\Models\APIAdmin;
use RBooks\Repositories\APIAdminRepository;
use RBooks\Repositories\ApplicationRolesRepository;
use RBooks\Repositories\ApplicationModulesRepository;
use RBooks\Repositories\ApplicationFunctionGroupsRepository;
use RBooks\Repositories\FunctionAssignmentRepository;
use RBooks\Repositories\ApplicationResourcesRepository;
use RBooks\Repositories\SecurityResourcesRepository;
use RBooks\Repositories\CheckEmployeeRepository;
use RBooks\Models\CheckEmployee;
use RBooks\Repositories\EmployeeRepository;
use RBooks\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\EmployeePermissionday;
use RBooks\Repositories\EmplperdayRepository;

class APIAdminService extends BaseService
{
    public function __construct()
    {
        $this->repository = app(APIAdminRepository::class);
    }

    /**
     * authorizeRoles
     * Lay danh sach cac menu chuc nang cua role duoc phep truy cap
     * 
     * @author  linh
     * @param   string $role
     * @return  string
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function authorizeRoles($flag)
    {
        return ($flag == 1 ? $flag: redirect()->route('apiadmin-access'));
    }

    /**
     * authorizeRolePage
     * Lay danh sach cac menu chuc nang cua role duoc phep truy cap
     * 
     * @author  linh
     * @param   string $role
     * @return  string
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function authorizeRolePage($flag)
    {
        return ($flag == 1 ? $flag: redirect()->route('apiadmin-accesspage'));
    }
    
    /**
     * hasAnyRole
     * Kiem tra quyen role duoc phep truy cap page 
     * 
     * @author  linh
     * @param   string $role
     * @return  array
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function hasAnyRole($role, $resource, $permission)
    {

//        Cach su dung  
//        if (app(APIAdminService::class)->hasAnyRole($request->user()->role, 'dashboard', 'cview') == 0){
//            return app(APIAdminService::class)->authorizeRoles(0); //chuyen den trang thong bao loi truy cap
//        }   

        $flag = 0;
        //kiem tra role co quyen truy cap resource nay khong
        if ($role != "" and $resource != ""){
            $condition = array(['rolecode', '=', $role], ['filename', '=', $resource], [$permission, '=', 1]);
            $checkrole = app(SecurityResourcesRepository::class)->findWhere($condition);
            if ($checkrole->count() > 0) {
                $flag = 1;                
            }
        }

        return $flag;
    }

    /**
     * hasUserAccess
     * Kiem tra user duoc phep truy cap page 
     * 
     * @author  linh
     * @param   string $role
     * @return  string
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function hasUserAccess($role, $resource, $permission, $user)
    {

//       Vd: goi kiem tra nhom role duoc phep truy cap page hay khong  
//       if (app(APIAdminService::class)->hasUserAccess($request->user()->role, 'dashboard', 'cuserview', $request->user()->id) == 0){
//           return app(APIAdminService::class)->authorizeRoles(0); //chuyen den trang thong bao loi truy cap
//       } 

        $flag = 0;
        //kiem tra role co quyen truy cap resource nay khong hoac user co quyen view khong
        if ($role != "" and $resource != ""){
            $condition = array(['rolecode', '=', $role], ['filename', '=', $resource]);
            $checkrole = app(SecurityResourcesRepository::class)->findWhere($condition);
            if ($checkrole->count() > 0) {
                $cuserview = $checkrole->first()->cuserview;
                $user_array = explode(",", $cuserview);
                if (in_array($user, $user_array)){
                    $flag = 1;                
                }                                                 
            }
        }

        return $flag;
    }

    /**
     * hasUserAccessPage
     * Kiem tra user duoc phep truy cap page 
     * 
     * @author  linh
     * @param   string $role
     * @return  string
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function hasUserAccessPage($role, $resource, $service_product_id)
    {

//       Vd: goi kiem tra nhom role duoc phep truy cap page hay khong  
//       if (app(APIAdminService::class)->hasUserAccessPage($request->user()->role, 'dashboard', 1) == 0){
//           return app(APIAdminService::class)->authorizeRoles(0); //chuyen den trang thong bao loi truy cap
//       } 

        $productaccesspages = config('rbooks.PRODUCTACCESSPAGES');
        $flag = 0;
        //kiem tra role co quyen truy cap resource nay khong voi user khach hang
        if ($role == "KH" and $resource != "" and $service_product_id != ""){
            $pages = $productaccesspages[$service_product_id];

            if (in_array($resource, $pages)){
                $flag = 1;                
            }                                                 
        }

        return $flag;
    }
    
    /**
     * getLeftMenu
     * Lay danh sach cac menu chuc nang cua role duoc phep truy cap
     * 
     * @author  linh
     * @param   string $role
     * @return  string
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function getLeftMenu($role)
    {
        $applicationmodules_array = array();
        //lay cac module ma role duoc phep truy cap
        $applicationroles = app(ApplicationRolesRepository::class)->findByField('code', $role);
        if ($applicationroles != null AND $applicationroles->count() != 0){
            $modulesallowed = $applicationroles->first()->modulesallowed;
            $modulesallowed_array = explode(",", $modulesallowed);

            foreach($modulesallowed_array as $key=>$value){
                $search = array('id'=>$value, 'hidden'=>0);
                $applicationmodules = app(ApplicationModulesRepository::class)->findWhere($search, ['id','code','applicationmodulename','displayorder','sys','hidden','image']);
                foreach($applicationmodules as $item){
                    $applicationmodules_id = $item->id;
                    $applicationmodules_name = $item->applicationmodulename;
                    $applicationmodules_image = $item->image;                
                    $applicationmodules_displayorder = $item->displayorder;                

                    $applicationfunctiongroups_array = array();
                    $applicationfunctiongroups = app(ApplicationFunctionGroupsRepository::class)->findByField('applicationmoduleid', $applicationmodules_id);
                    foreach($applicationfunctiongroups as $item){
                        $applicationfunctiongroups_id = $item->id;
                        $applicationfunctiongroups_name = $item->name;
                        $applicationfunctiongroups_image = $item->image;                
                        $applicationfunctiongroups_displayorder = $item->displayorder;              
                        $applicationfunctiongroups_filename = ($item->applicationresources()->first() == null ? "" : $item->applicationresources()->first()->filename);                

                        $functionassignment_array = array(); 
                        $functionassignments = app(FunctionAssignmentRepository::class)->findByField('applicationfunctiongroupid', $applicationfunctiongroups_id);
                        foreach($functionassignments as $item){
                            $applicationresource_id = $item->applicationresourceid;
                            $applicationresource_name = $item->applicationresources()->first()->name;
                            $applicationresource_image = $item->applicationresources()->first()->image;
                            $applicationresource_filename = $item->applicationresources()->first()->filename;

                            $dataArrayItemFunctionAssignment = [
                                'id' => $applicationresource_id,
                                'name' => $applicationresource_name,
                                'image' => $applicationresource_image,
                                'filename' => $applicationresource_filename
                            ];

                            //cac applicationresource cua functiongroup => muc page                        
                            $functionassignment_array[] = $dataArrayItemFunctionAssignment;
                        }
                        
                        $dataArrayItemApplicationFunctionGroups = [
                            'id' => $applicationfunctiongroups_id,
                            'name' => $applicationfunctiongroups_name,
                            'image' => $applicationfunctiongroups_image,
                            'displayorder' => $applicationfunctiongroups_displayorder,
                            'filename' => $applicationfunctiongroups_filename,
                            'functionassignment' => $functionassignment_array
                        ];

                        //cac functiongroup cua module => muc nhom menu                       
                        $applicationfunctiongroups_array[] = $dataArrayItemApplicationFunctionGroups;

                        $displayorderF = array();
                        foreach ($applicationfunctiongroups_array as $key => $row) {
                            $displayorderF[$key]  = $row['displayorder'];
                        }
                        array_multisort($displayorderF, SORT_ASC, $applicationfunctiongroups_array);

                    }                    
                    
                    $dataArrayItemApplicationModules = [
                        'id' => $applicationmodules_id,
                        'name' => $applicationmodules_name,
                        'image' => $applicationmodules_image,
                        'displayorder' => $applicationmodules_displayorder,
                        'applicationfunctiongroups' => $applicationfunctiongroups_array
                    ];
                    
                    //cac module thuoc ve role => muc module                    
                    $applicationmodules_array[] = $dataArrayItemApplicationModules; 
                }
            }

        } 

        $displayorder = array();
        foreach ($applicationmodules_array as $key => $row) {
            $displayorder[$key]  = $row['displayorder'];
        }
        array_multisort($displayorder, SORT_ASC, $applicationmodules_array);

        return $applicationmodules_array;
    }
    
    /**
     * setLeftMenu
     * Lay danh sach cac menu chuc nang cua role duoc phep truy cap
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function setLeftMenu()
    {
        $leftmenu = array();
        if (Auth()->user() != null){
            $leftmenu = $this->getLeftMenu(Auth()->user()->role);
        }
        return $leftmenu;
    }
}
