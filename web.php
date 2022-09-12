<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    
Route::group(['namespace' => 'CompanyManage'], function () {

    //Người dùng
    Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
        Route::get('/', 'UserController@index')->name('users-index');
        Route::get('/add', 'UserController@add')->name('users-add');
        Route::post('/store', 'UserController@store')->name('users-store');
        Route::get('/edit/{id}', 'UserController@edit')->name('users-edit');
        Route::put('/update/{id}', 'UserController@update')->name('users-update');
        Route::delete('/delete/{id}', 'UserController@delete')->name('users-delete');
        Route::get('/export', 'UserController@export')->name('users-export');

        Route::get('user-detail/{parameter}', 'UserController@detail')->name('users-detail');
    });

    //Quản trị user khách hàng
    Route::group(['prefix' => 'usercustomers', 'middleware' => ['auth']], function () {
        Route::get('/', 'UserCustomerController@index')->name('usercustomers-index');
        Route::get('/add', 'UserCustomerController@add')->name('usercustomers-add');
        Route::post('/store', 'UserCustomerController@store')->name('usercustomers-store');
        Route::get('/edit/{id}', 'UserCustomerController@edit')->name('usercustomers-edit');
        Route::put('/update/{id}', 'UserCustomerController@update')->name('usercustomers-update');
        Route::delete('/delete/{id}', 'UserCustomerController@delete')->name('usercustomers-delete');
        Route::get('/export', 'UserCustomerController@export')->name('usercustomers-export');

        Route::get('user-detail/{parameter}', 'UserCustomerController@detail')->name('usercustomers-detail');
    });
        
    Route::group(['prefix' => 'applicationresources', 'middleware' => ['auth']], function() {
        Route::get('/', 'ApplicationResourcesController@index')->name('applicationresources-index');
        Route::get('/add', 'ApplicationResourcesController@add')->name('applicationresources-add');
        Route::post('/store', 'ApplicationResourcesController@store')->name('applicationresources-store');
        Route::get('/edit/{id}', 'ApplicationResourcesController@edit')->name('applicationresources-edit');
        Route::post('/update/{id}', 'ApplicationResourcesController@update')->name('applicationresources-update');
        Route::delete('/delete/{id}', 'ApplicationResourcesController@delete')->name('applicationresources-delete');
    });

    Route::group(['prefix' => 'applicationmodules'], function() {
        Route::get('/', 'ApplicationModulesController@index')->name('applicationmodules-index');
        Route::get('/add', 'ApplicationModulesController@add')->name('applicationmodules-add');
        Route::post('/store', 'ApplicationModulesController@store')->name('applicationmodules-store');
        Route::get('/edit/{id}', 'ApplicationModulesController@edit')->name('applicationmodules-edit');
        Route::post('/update/{id}', 'ApplicationModulesController@update')->name('applicationmodules-update');
        Route::delete('/delete/{id}', 'ApplicationModulesController@delete')->name('applicationmodules-delete');
    });

    Route::group(['prefix' => 'applicationroles'], function() {
        Route::get('/', 'ApplicationRolesController@index')->name('applicationroles-index');
        Route::get('/add', 'ApplicationRolesController@add')->name('applicationroles-add');
        Route::post('/store', 'ApplicationRolesController@store')->name('applicationroles-store');
        Route::get('/edit/{id}', 'ApplicationRolesController@edit')->name('applicationroles-edit');
        Route::post('/update/{id}', 'ApplicationRolesController@update')->name('applicationroles-update');
        Route::delete('/delete/{id}', 'ApplicationRolesController@delete')->name('applicationroles-delete');
    });

    Route::group(['prefix' => 'applicationfunctiongroups'], function() {
        Route::get('/{applicationmoduleid}', 'ApplicationFunctionGroupsController@index')->name('applicationfunctiongroups-index');
        Route::get('/add-applicationfunctiongroups/{applicationmoduleid}', 'ApplicationFunctionGroupsController@addApplicationFunctionGroups')->name('applicationfunctiongroups-add');
        Route::post('/store', 'ApplicationFunctionGroupsController@store')->name('applicationfunctiongroups-store');
        Route::get('/edit-applicationfunctiongroups/{applicationmoduleid}/{id}', 'ApplicationFunctionGroupsController@editApplicationFunctionGroups')->name('applicationfunctiongroups-edit');
        Route::post('/update/{id}', 'ApplicationFunctionGroupsController@update')->name('applicationfunctiongroups-update');
        Route::delete('/delete-applicationfunctiongroups/{applicationmoduleid}/{id}', 'ApplicationFunctionGroupsController@deleteApplicationFunctionGroups')->name('applicationfunctiongroups-delete');
    });

    Route::group(['prefix' => 'functionassignment'], function() {
        Route::get('/{applicationmoduleid}/{applicationfunctiongroupid}', 'FunctionAssignmentController@index')->name('functionassignment-index');
        Route::get('/add-functionassignment/{applicationmoduleid}/{applicationfunctiongroupid}', 'FunctionAssignmentController@addFunctionAssignment')->name('functionassignment-add');
        Route::post('/store', 'FunctionAssignmentController@store')->name('functionassignment-store');
        Route::get('/edit-functionassignment/{applicationmoduleid}/{applicationfunctiongroupid}/{id}', 'FunctionAssignmentController@editFunctionAssignment')->name('functionassignment-edit');
        Route::post('/update/{id}', 'FunctionAssignmentController@update')->name('functionassignment-update');
        Route::delete('/delete-functionassignment/{applicationmoduleid}/{applicationfunctiongroupid}/{id}', 'FunctionAssignmentController@deleteFunctionAssignment')->name('functionassignment-delete');
    });

    Route::group(['prefix' => 'securityresources'], function() {
        Route::get('/{applicationresourceid}', 'SecurityResourcesController@index')->name('securityresources-index');
        Route::get('/add-securityresources/{applicationresourceid}', 'SecurityResourcesController@addSecurityResources')->name('securityresources-add');
        Route::post('/store', 'SecurityResourcesController@store')->name('securityresources-store');
        Route::get('/edit-securityresources/{applicationresourceid}/{id}', 'SecurityResourcesController@editSecurityResources')->name('securityresources-edit');
        Route::post('/update/{id}', 'SecurityResourcesController@update')->name('securityresources-update');
        Route::delete('/delete-securityresources/{applicationresourceid}/{id}', 'SecurityResourcesController@deleteSecurityResources')->name('securityresources-delete');
    });

});

// Quản lý sản phẩm
Route::group(['namespace' => 'ProductManage'], function() {

    // Khách hàng
    Route::group(['prefix' => 'customers'], function (){
        Route::get('/', 'CustomerController@index')->name('customers-index');
        Route::get('/add', 'CustomerController@add')->name('customers-add');
        Route::post('/store', 'CustomerController@store')->name('customers-store');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('customers-edit');
        Route::put('/update/{id}', 'CustomerController@update')->name('customers-update');
        Route::delete('/delete/{id}', 'CustomerController@delete')->name('customers-delete');
        Route::get('/export', 'CustomerController@export')->name('customers-export');

        Route::get('/registerCustomer', 'CustomerController@registerCustomer')->name('customers-register');
        Route::post('/addCustomer', 'CustomerController@addCustomer')->name('customers-addCustomer');
        Route::get('/editCustomer', 'CustomerController@editCustomer')->name('customers-editCustomer');
        Route::put('/updateCustomer/{id}', 'CustomerController@updateCustomer')->name('customers-updateCustomer');

    });

    // Dịch vụ tư vấn
    Route::group(['prefix' => 'advisorys', 'middleware' => ['auth']], function () {
        Route::get('/', 'AdvisoryController@index')->name('advisorys-index');
        Route::post('/advisory-answers/{id}', 'AdvisoryController@advisoryAnswers')->name('advisory-answers');    
    });

    // Hợp đồng
    Route::group(['prefix' => 'contracts'], function (){
        Route::get('/', 'ContractController@index')->name('contracts-index');
        Route::get('/add', 'ContractController@add')->name('contracts-add');
        Route::post('/store', 'ContractController@store')->name('contracts-store');
        Route::get('/edit/{id}', 'ContractController@edit')->name('contracts-edit');
        Route::put('/update/{id}', 'ContractController@update')->name('contracts-update');
        Route::delete('/delete/{id}', 'ContractController@delete')->name('contracts-delete');

        Route::get('/listContract', 'ContractController@listContract')->name('contracts-listContract');
        Route::get('/detailContract/{id}', 'ContractController@detailContract')->name('contracts-detailContract');

    });
    
    // Thống kê
    Route::group(['prefix' => 'statistics'], function (){
        Route::get('/statistic-customer', 'StatisticController@customer')->name('statistic-customer');
        Route::get('/statistic-product', 'StatisticController@product')->name('statistic-product');
    });    

    // Quản lý dòng tiền cá nhân
    Route::group(['prefix' => 'cashs'], function (){
        Route::get('/', 'CashController@index')->name('cash-index');
        Route::get('/manage', 'CashController@manage')->name('cash-manage');
    });    

    // Tài khoản cá nhân
    Route::group(['prefix' => 'cashaccounts'], function (){
        Route::get('/', 'CashAccountController@index')->name('cashaccounts-index');
        Route::get('/add', 'CashAccountController@add')->name('cashaccounts-add');
        Route::post('/store', 'CashAccountController@store')->name('cashaccounts-store');
        Route::get('/edit/{id}', 'CashAccountController@edit')->name('cashaccounts-edit');
        Route::put('/update/{id}', 'CashAccountController@update')->name('cashaccounts-update');
        Route::delete('/delete/{id}', 'CashAccountController@delete')->name('cashaccounts-delete');
    });

    // Thu nhap, chi phi, cac khoan no khach hang
    Route::group(['prefix' => 'cashincomes'], function (){
        Route::get('/', 'CashIncomeController@index')->name('cashincomes-index');
        Route::get('/process/{incomestatustype}', 'CashIncomeController@process')->name('cashincomes-process');
        Route::get('/add', 'CashIncomeController@add')->name('cashincomes-add');
        Route::post('/store', 'CashIncomeController@store')->name('cashincomes-store');
        Route::get('/edit/{id}', 'CashIncomeController@edit')->name('cashincomes-edit');
        Route::put('/update/{id}', 'CashIncomeController@update')->name('cashincomes-update');
        Route::delete('/delete/{id}', 'CashIncomeController@delete')->name('cashincomes-delete');
    });    

    // Ke hoach tai chinh tuong lai
    Route::group(['prefix' => 'cashplans'], function (){
        Route::get('/', 'CashPlanController@index')->name('cashplans-index');
        Route::get('/add', 'CashPlanController@add')->name('cashplans-add');
        Route::post('/store', 'CashPlanController@store')->name('cashplans-store');
        Route::get('/edit/{id}', 'CashPlanController@edit')->name('cashplans-edit');
        Route::put('/update/{id}', 'CashPlanController@update')->name('cashplans-update');
        Route::delete('/delete/{id}', 'CashPlanController@delete')->name('cashplans-delete');
    });  

    // Tiết kiệm
    Route::group(['prefix' => 'savings'], function (){
        Route::get('/', 'SavingController@index')->name('saving-index');
        Route::get('/manage', 'SavingController@manage')->name('saving-manage');
    });    

    // Đầu tư
    Route::group(['prefix' => 'invests'], function (){
        Route::get('/', 'InvestController@index')->name('invest-index');
        Route::get('/manage', 'InvestController@manage')->name('invest-manage');
    });    
});

// Quản lý tài chính
Route::group(['namespace' => 'FinancialManage'], function() {

    // Doanh thu
    Route::group(['prefix' => 'revenues'], function (){
        Route::get('/', 'RevenueController@index')->name('revenues-index');
        Route::get('/add', 'RevenueController@add')->name('revenues-add');
        Route::post('/store', 'RevenueController@store')->name('revenues-store');
        Route::get('/edit/{id}', 'RevenueController@edit')->name('revenues-edit');
        Route::put('/update/{id}', 'RevenueController@update')->name('revenues-update');
        Route::delete('/delete/{id}', 'RevenueController@delete')->name('revenues-delete');
        Route::get('/export/{id}', 'RevenueController@export')->name('revenues-export');
    });
   
});

