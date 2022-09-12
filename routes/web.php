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

Route::get('about-us', 'HomeController@aboutUs')->name('about-us');

Route::get('advisory', 'HomeController@advisory')->name('advisory');

Route::get('TheDefinitionOfInvesting', 'HomeController@TheDefinitionOfInvesting')->name('TheDefinitionOfInvesting');

Route::get('WhyYouShouldInvest', 'HomeController@WhyYouShouldInvest')->name('WhyYouShouldInvest');

Route::get('EffectiveBudgeting', 'HomeController@EffectiveBudgeting')->name('EffectiveBudgeting');

Route::get('FinancialPlanning', 'HomeController@FinancialPlanning')->name('FinancialPlanning');

Route::get('SavingMethod', 'HomeController@SavingMethod')->name('SavingMethod');

Route::get('HowToGrowYourCashFlow', 'HomeController@HowToGrowYourCashFlow')->name('HowToGrowYourCashFlow');

Route::get('recruitment', 'HomeController@recruitment')->name('recruitment');
Route::get('recruitment-details', 'HomeController@recruitmentDetail')->name('recruitment-details');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('invest', 'HomeController@invest')->name('invest');
Route::get('personalcash', 'HomeController@personalCash')->name('personalcash');
Route::get('predictindex', 'HomeController@predictIndex')->name('predictindex');
Route::get('saving', 'HomeController@saving')->name('saving');
Route::get('intro-products', 'HomeController@introProduct')->name('introproducts');

// footer
Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacy-policy');
Route::get('terms-of-service', 'HomeController@termsOfService')->name('terms-of-service');
Route::get('payment-method', 'HomeController@paymentMethod')->name('payment-method');
Route::get('information', 'HomeController@information')->name('information');
// endfooter


// course
Route::get('bossstack-startup', 'HomeController@startup')->name('bossstack-startup');
Route::get('bossstack-smes', 'HomeController@smes')->name('bossstack-smes');
Route::get('bossstack-bigcorp', 'HomeController@bigCorp')->name('bossstack-bigcorp');
Route::get('cash-flow-handling', 'HomeController@cashFlowHandling')->name('cash-flow-handling');
Route::get('money-begets-money', 'HomeController@moneyBegetsMoney')->name('money-begets-money');
Route::get('multi-cash-growth', 'HomeController@multiCashGrowth')->name('multi-cash-growth');
Route::post('/store', 'HomeController@store')->name('coaching-store');
// endcourse

Route::group(['middleware' => ['auth','web','checkauth']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/customer', 'DashboardController@customer')->name('dashboard-customer');
    Route::get('/manage', 'DashboardController@manage')->name('dashboard-manage');
});
    
// Hỗ trợ tư vấn KH
Route::group(['namespace' => 'ProductManage'], function () {
    Route::group(['prefix' => 'advisorys'], function () {
        Route::post('/advisory-submit/{type}', 'AdvisoryController@submitformAdvisory')->name('advisorys-submit'); // form KH submit
    });

    //Đăng ký thông tin khách hàng
    Route::any('/registerCustomer', 'CustomerController@registerCustomer')->name('customers-register');
    Route::post('/addCustomer', 'CustomerController@addCustomer')->name('customers-addCustomer');
    Route::get('/editCustomer', 'CustomerController@editCustomer')->name('customers-editCustomer');
    Route::any('/updateCustomer/{id}', 'CustomerController@updateCustomer')->name('customers-updateCustomer');

    Route::post('/processPaymentMomo', 'CustomerController@processPaymentMomo')->name('customers-processPaymentMomo');
    Route::get('/resultPaymentMomo', 'CustomerController@resultPaymentMomo')->name('customers-resultPaymentMomo');
    Route::get('/ipnPaymentMomo', 'CustomerController@ipnPaymentMomo')->name('customers-ipnPaymentMomo');

    Route::get('/forgotPassword', 'CustomerController@forgotPassword')->name('customers-forgotPassword');
    Route::post('/mailForgotPassword', 'CustomerController@mailForgotPassword')->name('customers-mailForgotPassword');

    Route::get('/activeCoupon/{id}/{key}', 'CustomerController@activeCoupon')->name('customers-activeCoupon');
});

//API admin
Route::group(['namespace' => 'CompanyManage', 'prefix' => 'apiadmin'], function() {
    Route::get('/access', 'APIAdminController@access')->name('apiadmin-access');
    Route::get('/accessPage', 'APIAdminController@accessPage')->name('apiadmin-accesspage');
    Route::get('/getCaptcha', 'APIAdminController@getCaptcha')->name('apiadmin-getCaptcha');
});

Route::group(['namespace' => 'CompanyManage', 'middleware' => ['auth','web', 'checkauth']], function () {

    //Người dùng
    Route::group(['prefix' => 'users'], function () {
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
    Route::group(['prefix' => 'usercustomers'], function () {
        Route::get('/', 'UserCustomerController@index')->name('usercustomers-index');
        Route::get('/add', 'UserCustomerController@add')->name('usercustomers-add');
        Route::post('/store', 'UserCustomerController@store')->name('usercustomers-store');
        Route::get('/edit/{id}', 'UserCustomerController@edit')->name('usercustomers-edit');
        Route::put('/update/{id}', 'UserCustomerController@update')->name('usercustomers-update');
        Route::delete('/delete/{id}', 'UserCustomerController@delete')->name('usercustomers-delete');
        Route::get('/export', 'UserCustomerController@export')->name('usercustomers-export');

        Route::get('user-detail/{parameter}', 'UserCustomerController@detail')->name('usercustomers-detail');
    });

    Route::group(['prefix' => 'applicationresources'], function() {
        Route::get('/', 'ApplicationResourcesController@index')->name('applicationresources-index');
        Route::get('/add', 'ApplicationResourcesController@add')->name('applicationresources-add');
        Route::post('/store', 'ApplicationResourcesController@store')->name('applicationresources-store');
        Route::get('/edit/{id}', 'ApplicationResourcesController@edit')->name('applicationresources-edit');
        Route::post('/update/{id}', 'ApplicationResourcesController@update')->name('applicationresources-update');
        Route::delete('/delete/{id}', 'ApplicationResourcesController@delete')->name('applicationresources-delete');
        Route::post('/getApplicationResources', 'ApplicationResourcesController@getApplicationResources')->name('applicationresources-getApplicationResources');
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
        Route::get('/setResource/{rolecode}', 'ApplicationRolesController@setResource')->name('applicationroles-setResource');
        Route::post('/updateResource', 'ApplicationRolesController@updateResource')->name('applicationroles-updateResource');
        Route::get('/setMenu/{rolecode}', 'ApplicationRolesController@setMenu')->name('applicationroles-setMenu');
        Route::post('/updateMenu', 'ApplicationRolesController@updateMenu')->name('applicationroles-updateMenu');
        Route::post('/getApplicationRoles', 'ApplicationRolesController@getApplicationRoles')->name('applicationroles-getApplicationRoles');
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
Route::group(['namespace' => 'ProductManage', 'middleware' => ['auth','web','checkauth']], function() {

    // Khách hàng
    Route::group(['prefix' => 'customers'], function (){
        Route::get('/', 'CustomerController@index')->name('customers-index');
        Route::get('/add', 'CustomerController@add')->name('customers-add');
        Route::post('/store', 'CustomerController@store')->name('customers-store');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('customers-edit');
        Route::put('/update/{id}', 'CustomerController@update')->name('customers-update');
        Route::delete('/delete/{id}', 'CustomerController@delete')->name('customers-delete');
        Route::any('/export', 'CustomerController@export')->name('customers-export');

//        Route::get('/registerCustomer/{service_product_id}', 'CustomerController@registerCustomer')->name('customers-register');
//        Route::post('/addCustomer', 'CustomerController@addCustomer')->name('customers-addCustomer');
//        Route::get('/editCustomer', 'CustomerController@editCustomer')->name('customers-editCustomer');
//        Route::put('/updateCustomer/{id}', 'CustomerController@updateCustomer')->name('customers-updateCustomer');

        Route::get('/profileCustomer', 'CustomerController@profileCustomer')->name('customers-profileCustomer');
        Route::get('/editSecurityCustomer', 'CustomerController@editSecurityCustomer')->name('customers-editSecurityCustomer');
        Route::get('/historyCustomer', 'CustomerController@historyCustomer')->name('customers-historyCustomer');
        Route::post('/updateSecurityCustomer', 'CustomerController@updateSecurityCustomer')->name('customers-updateSecurityCustomer');

//        Route::post('/processPaymentMomo', 'CustomerController@processPaymentMomo')->name('customers-processPaymentMomo');
//        Route::get('/resultPaymentMomo', 'CustomerController@resultPaymentMomo')->name('customers-resultPaymentMomo');
//        Route::get('/ipnPaymentMomo', 'CustomerController@ipnPaymentMomo')->name('customers-ipnPaymentMomo');
//
//        Route::get('/forgotPassword', 'CustomerController@forgotPassword')->name('customers-forgotPassword');
//        Route::post('/mailForgotPassword', 'CustomerController@mailForgotPassword')->name('customers-mailForgotPassword');

        Route::get('/addFamilyRelationship', 'CustomerController@addFamilyRelationship')->name('customers-addFamilyRelationship');
        Route::post('/storeFamilyRelationship', 'CustomerController@storeFamilyRelationship')->name('customers-storeFamilyRelationship');
        Route::delete('/deleteFamilyRelationship/{id}', 'CustomerController@deleteFamilyRelationship')->name('customers-deleteFamilyRelationship');
        Route::get('/editFamilyRelationship/{id}', 'CustomerController@editFamilyRelationship')->name('customers-editFamilyRelationship');
        Route::put('/updateFamilyRelationship/{id}', 'CustomerController@updateFamilyRelationship')->name('customers-updateFamilyRelationship');
    });

    // Hỗ trợ tư vấn KH
    Route::group(['prefix' => 'advisorys'], function () {
        Route::get('/formAdvisory', 'AdvisoryController@formAdvisory')->name('form-advisory'); // form KH
        //Route::post('/submitform', 'AdvisoryController@submitformAdvisory')->name('advisorys-submit'); // form KH submit

        Route::get('/', 'AdvisoryController@index')->name('advisorys-index');

        Route::get('form-answer', 'AdvisoryController@formAnswer')->name('form-answer');
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
        Route::get('/editContract/{id}', 'ContractController@editContract')->name('contracts-editContract');
        Route::put('/updateContract/{id}', 'ContractController@updateContract')->name('contracts-updateContract');
        Route::delete('/deleteContract/{id}', 'ContractController@deleteContract')->name('contracts-deleteContract');

        Route::get('/listContractQueue', 'ContractController@listContractQueue')->name('contracts-listContractQueue');
        Route::get('/listContractRunning', 'ContractController@listContractRunning')->name('contracts-listContractRunning');
        Route::get('/listContractExpried', 'ContractController@listContractExpried')->name('contracts-listContractExpried');

        Route::get('/addContract', 'ContractController@addContract')->name('contracts-addContract');
        Route::post('/addProduct', 'ContractController@addProduct')->name('contracts-addProduct');
        Route::post('/storeProduct', 'ContractController@storeProduct')->name('contracts-storeProduct');
        Route::post('/processPaymentMomo', 'ContractController@processPaymentMomo')->name('contracts-processPaymentMomo');
        Route::get('/resultPaymentMomo', 'ContractController@resultPaymentMomo')->name('contracts-resultPaymentMomo');
        Route::get('/ipnPaymentMomo', 'ContractController@ipnPaymentMomo')->name('contracts-ipnPaymentMomo');

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
        Route::get('/process', 'CashController@process')->name('cash-process');
        Route::post('/processPlan', 'CashController@processPlan')->name('cash-processPlan');

    });

    // Tài khoản cá nhân
    Route::group(['prefix' => 'cashaccounts'], function (){
        Route::get('/', 'CashAccountController@index')->name('cashaccounts-index');
        Route::get('/add', 'CashAccountController@add')->name('cashaccounts-add');
        Route::post('/store', 'CashAccountController@store')->name('cashaccounts-store');
        Route::get('/edit/{id}', 'CashAccountController@edit')->name('cashaccounts-edit');
        Route::put('/update/{id}', 'CashAccountController@update')->name('cashaccounts-update');
        Route::delete('/delete/{id}', 'CashAccountController@delete')->name('cashaccounts-delete');
        Route::get('/viewAccount/{id}', 'CashAccountController@viewAccount')->name('cashaccounts-viewAccount');
        Route::post('/detailAccount', 'CashAccountController@detailAccount')->name('cashaccounts-detailAccount');
    });

    // Chuyển tiền
    Route::group(['prefix' => 'cashtranfers'], function (){
        Route::get('/', 'CashTranferController@index')->name('cashtranfers-index');
        Route::get('/add', 'CashTranferController@add')->name('cashtranfers-add');
        Route::any('/process', 'CashTranferController@process')->name('cashtranfers-process');
        Route::post('/store', 'CashTranferController@store')->name('cashtranfers-store');
        Route::get('/edit/{id}', 'CashTranferController@edit')->name('cashtranfers-edit');
        Route::put('/update/{id}', 'CashTranferController@update')->name('cashtranfers-update');
        Route::delete('/delete/{id}', 'CashTranferController@delete')->name('cashtranfers-delete');
    });

    // Thu nhap, chi phi, cac khoan no khach hang
    Route::group(['prefix' => 'cashincomes'], function (){
        Route::get('/', 'CashIncomeController@index')->name('cashincomes-index');
        Route::any('/process/{incomestatustype}', 'CashIncomeController@process')->name('cashincomes-process');
        Route::get('/add', 'CashIncomeController@add')->name('cashincomes-add');
        Route::post('/store', 'CashIncomeController@store')->name('cashincomes-store');
        Route::any('/edit/{id}', 'CashIncomeController@edit')->name('cashincomes-edit');
        Route::put('/update/{id}', 'CashIncomeController@update')->name('cashincomes-update');
        Route::delete('/delete/{id}', 'CashIncomeController@delete')->name('cashincomes-delete');
        Route::any('/list', 'CashIncomeController@list')->name('cashincomes-list');
    });

    // Ke hoach tai chinh tuong lai
    Route::group(['prefix' => 'cashplans'], function (){
        Route::get('/', 'CashPlanController@index')->name('cashplans-index');
        Route::get('/add', 'CashPlanController@add')->name('cashplans-add');
        Route::post('/store', 'CashPlanController@store')->name('cashplans-store');
        Route::get('/edit/{id}', 'CashPlanController@edit')->name('cashplans-edit');
        Route::put('/update/{id}', 'CashPlanController@update')->name('cashplans-update');
        Route::delete('/delete/{id}', 'CashPlanController@delete')->name('cashplans-delete');

        Route::post('/process', 'CashPlanController@process')->name('cashplans-process');
        Route::get('/analysis/{id}', 'CashPlanController@analysis')->name('cashplans-analysis');

        //Phan hien thi cac ke hoach tai chinh phan quan tri
        Route::get('/manage', 'CashPlanController@manage')->name('cashplans-manage');
        Route::get('/editManage/{id}', 'CashPlanController@editManage')->name('cashplans-editManage');
        Route::put('/updateManage/{id}', 'CashPlanController@updateManage')->name('cashplans-updateManage');
        Route::delete('/deleteManage/{id}', 'CashPlanController@deleteManage')->name('cashplans-deleteManage');
        Route::get('/analysisManage/{id}', 'CashPlanController@analysisManage')->name('cashplans-analysisManage');
    });

    // Tinh so tien nghi huu
    Route::group(['prefix' => 'retireplans'], function (){
        Route::get('/', 'RetirePlanController@index')->name('retireplans-index');
        Route::post('/process', 'RetirePlanController@process')->name('retireplans-process');
    });


    // Quan ly tai san no, co
    Route::group(['prefix' => 'cashassets'], function (){
        Route::get('/', 'CashAssetController@index')->name('cashassets-index');
        Route::any('/process/{assetstatustype}', 'CashAssetController@process')->name('cashassets-process');
        Route::get('/add', 'CashAssetController@add')->name('cashassets-add');
        Route::post('/store', 'CashAssetController@store')->name('cashassets-store');
        Route::any('/edit/{id}', 'CashAssetController@edit')->name('cashassets-edit');
        Route::put('/update/{id}', 'CashAssetController@update')->name('cashassets-update');
        Route::delete('/delete/{id}', 'CashAssetController@delete')->name('cashassets-delete');
        Route::get('/list/{month}/{year}', 'CashAssetController@list')->name('cashassets-list');
        Route::any('/modify', 'CashAssetController@modify')->name('cashassets-modify');
    });
    
    // Tiết kiệm
    Route::group(['prefix' => 'savings'], function (){
        Route::get('/', 'SavingController@index')->name('saving-index');
        Route::get('/manage', 'SavingController@manage')->name('saving-manage');
    });

    // Đầu tư
    Route::group(['prefix' => 'invests'], function (){
        Route::get('/', 'InvestController@index')->name('invests-index');
        Route::get('/manage', 'InvestController@manage')->name('invests-manage');
        Route::get('/add', 'InvestController@add')->name('invests-add');
        Route::post('/store', 'InvestController@store')->name('invests-store');
        Route::get('/edit/{id}', 'InvestController@edit')->name('invests-edit');
        Route::put('/update/{id}', 'InvestController@update')->name('invests-update');
        Route::delete('/delete/{id}', 'InvestController@delete')->name('invests-delete');
        Route::get('/detail/{id}', 'InvestController@detail')->name('invests-detail');
    });

    // Quản lý giao dịch
    Route::group(['prefix' => 'managetransactions'], function (){
        Route::get('/', 'ManageTransactionController@index')->name('managetransactions-index');
        Route::get('/detailTransaction', 'ManageTransactionController@detailTransaction')->name('managetransactions-detailTransaction');
        Route::get('/listTransaction', 'ManageTransactionController@listTransaction')->name('managetransactions-listTransaction');                
        Route::get('/viewTransaction', 'ManageTransactionController@viewTransaction')->name('managetransactions-viewTransaction');
        Route::get('/listTemplate', 'ManageTransactionController@listTemplate')->name('managetransactions-listTemplate');                
        Route::get('/detailTemplate', 'ManageTransactionController@detailTemplate')->name('managetransactions-detailTemplate');

    });
    
    // Coaching 
    Route::group(['prefix' => 'reports'], function (){
        Route::get('/', 'ReportController@index')->name('report-index');
        Route::get('/manage', 'ReportController@manage')->name('report-manage');
        Route::post('/process', 'ReportController@process')->name('report-process');
        Route::post('/store', 'ReportController@store')->name('report-store');
        Route::get('/edit/{id}', 'ReportController@edit')->name('report-edit');
        Route::put('/update/{id}', 'ReportController@update')->name('report-update');
        Route::delete('/delete/{id}', 'ReportController@delete')->name('report-delete');
        
    });

    // Coupon
    Route::group(['prefix' => 'coupons'], function (){
        Route::get('/', 'CouponController@index')->name('coupons-index');
        Route::get('/add', 'CouponController@add')->name('coupons-add');
        Route::post('/store', 'CouponController@store')->name('coupons-store');
        Route::get('/edit/{id}', 'CouponController@edit')->name('coupons-edit');
        Route::put('/update/{id}', 'CouponController@update')->name('coupons-update');
        Route::delete('/delete/{id}', 'CouponController@delete')->name('coupons-delete');
        Route::get('/mail/{id}', 'CouponController@mail')->name('coupons-mail');
        Route::put('/sendMail/{id}', 'CouponController@sendMail')->name('coupons-sendMail');
    });

});

// Quản lý tài chính
Route::group(['namespace' => 'FinancialManage', 'middleware' => ['auth','web','checkauth']], function() {

    // Doanh thu
    Route::group(['prefix' => 'revenues'], function (){
        Route::get('/', 'RevenueController@index')->name('revenues-index');
        Route::get('/add', 'RevenueController@add')->name('revenues-add');
        Route::post('/store', 'RevenueController@store')->name('revenues-store');
        Route::get('/edit/{id}', 'RevenueController@edit')->name('revenues-edit');
        Route::put('/update/{id}', 'RevenueController@update')->name('revenues-update');
        Route::delete('/delete/{id}', 'RevenueController@delete')->name('revenues-delete');
        Route::get('/export/{id}', 'RevenueController@export')->name('revenues-export');

        Route::get('/revenues-net', 'RevenueController@net')->name('revenues-net');
        Route::get('/receivables-debt', 'RevenueController@receivable')->name('receivables-debt');
    });

    // Chi phí tổng
    Route::group(['prefix' => 'costs'], function (){
        Route::get('/', 'CostController@index')->name('costs-index');
        Route::get('/add', 'CostController@add')->name('costs-add');
        Route::post('/store', 'CostController@store')->name('costs-store');
        Route::get('/edit/{id}', 'CostController@edit')->name('costs-edit');
        Route::put('/update/{id}', 'CostController@update')->name('costs-update');
        Route::delete('/delete/{id}', 'CostController@delete')->name('costs-delete');
        Route::get('/export/{id}', 'CostController@export')->name('costs-export');
    });

    // Chi phí thực tế
    Route::group(['prefix' => 'costsreal'], function (){
        Route::get('/', 'CostRealController@index')->name('costsreal-index');
        Route::get('/add', 'CostRealController@add')->name('costsreal-add');
        Route::post('/store', 'CostRealController@store')->name('costsreal-store');
        Route::get('/edit/{id}', 'CostRealController@edit')->name('costsreal-edit');
        Route::put('/update/{id}', 'CostRealController@update')->name('costsreal-update');
        Route::delete('/delete/{id}', 'CostRealController@delete')->name('costsreal-delete');
        Route::get('/export/{id}', 'CostRealController@export')->name('costsreal-export');
    });

    // Công nợ phải trả
    Route::group(['prefix' => 'paydebt'], function (){
        Route::get('/', 'PayDebtController@index')->name('paydebt-index');
        Route::get('/add', 'PayDebtController@add')->name('paydebt-add');
        Route::post('/store', 'PayDebtController@store')->name('paydebt-store');
        Route::get('/edit/{id}', 'PayDebtController@edit')->name('paydebt-edit');
        Route::put('/update/{id}', 'PayDebtController@update')->name('paydebt-update');
        Route::delete('/delete/{id}', 'PayDebtController@delete')->name('paydebt-delete');
        Route::get('/export/{id}', 'PayDebtController@export')->name('paydebt-export');
    });

    // Lợi nhuận
    Route::group(['prefix' => 'profits'], function (){
        Route::get('/', 'ProfitController@index')->name('profits-index');
        Route::get('/add', 'ProfitController@add')->name('profits-add');
        Route::post('/store', 'ProfitController@store')->name('profits-store');
        Route::get('/edit/{id}', 'ProfitController@edit')->name('profits-edit');
        Route::put('/update/{id}', 'ProfitController@update')->name('profits-update');
        Route::delete('/delete/{id}', 'ProfitController@delete')->name('profits-delete');
        Route::get('/export/{id}', 'ProfitController@export')->name('profits-export');
    });

});

// Quản lý hệ thống vận hành
Route::group(['namespace' => 'OperationManage', 'middleware' => ['auth','web','checkauth']], function() {

    // Tuyển dụng Manage
    Route::group(['prefix' => 'careers', 'middleware' => ['auth']], function() {
        Route::get('/', 'CareerController@index')->name('careers');
        Route::get('/add', 'CareerController@add')->name('careers-add');
        Route::get('/edit/{id}', 'CareerController@edit')->name('careers-edit');
        Route::get('/candidate-list', 'CareerController@candidateList')->name('candidate-list');
    });
});