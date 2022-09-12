<?php

return [
    'repositories' => [
        \RBooks\Repositories\AuthorRepository::class,
        \RBooks\Repositories\CategoryRepository::class,
        \RBooks\Repositories\ImageRepository::class,
        \RBooks\Repositories\ProductRepository::class,
        \RBooks\Repositories\SupplierRepository::class,
        \RBooks\Repositories\CustomerRepository::class,
        \RBooks\Repositories\UserRepository::class,
        \RBooks\Repositories\WarehouseRepository::class,
        \RBooks\Repositories\AttributeRepository::class,
        \RBooks\Repositories\CustomerGroupRepository::class,
    ],

    'services' => [
        \RBooks\Services\AuthorService::class,
        \RBooks\Services\CategoryService::class,
        \RBooks\Services\ImageService::class,
        \RBooks\Services\ProductService::class,
        \RBooks\Services\SupplierService::class,
        \RBooks\Services\CustomerService::class,
        \RBooks\Services\UserService::class,
        \RBooks\Services\WarehouseService::class,
        \RBooks\Services\AttributeService::class,
        \RBooks\Services\CustomerGroupService::class,
    ],

    'FUNDTYPE' => ['0'=>_('Mục tiêu tài chính'), 
            '1'=>_('Dòng tiền thu chi'),
            '2'=>_('Đầu tư'),
          ], 
          
    'GENDERTYPE' => ['0'=>_('Nam'), 
            '1'=>_('Nữ'),
          ],   

    'CUSTOMERTYPE' => ['0'=>_('Tổ chức'), 
            '1'=>_('Cá nhân'),
            '2'=>_('Học sinh/sinh viên'),
            '9'=>_('Khác'),
          ], 

    'CURRENCYTYPE' => ['VND'=>_('VND'), 
            'USD'=>_('USD'),
          ],   

    'FINISHTYPE' => ['0'=>_('CÒN HẠN'), 
            '1'=>_('HẾT HẠN'),
          ],   

    'TERMTYPE' => ['Y'=>_('Năm'), 
            'P'=>_('Quý'),
            'M'=>_('Tháng')
          ],           

    'CONTRACTSTATUSTYPE' => ['1'=>_('Mới mở'), 
            '2'=>_('Hoạt động'),
            '3'=>_('Tất toán'),
          ],           

    'APPROVESTATUSTYPE' => ['P'=>_('Đang chờ duyệt'), 
            'A'=>_('Đã duyệt'),            
            'R'=>_('Không duyệt'),
          ], 

    'ACCOUNTSTATUSTYPE' => [ 
            '0'=>_('Hoạt động'),
            '1'=>_('Tất toán'),
          ], 

    'INCOMESTATUSTYPES' => [ 
            '0'=>_('Thu nhập'),
            '1'=>_('Chi phí'),
            '2'=>_('Chuyển tiền'),
          ], 

    'UNITTYPES' => [ 
            '1000000'=>_('triệu'),
            '1000000000'=>_('tỷ'),
          ],

    'PERIODTYPES' => [ 
            'd'=>_('Ngày'),
            'm'=>_('Tháng'),
            'y'=>_('Năm'),
          ],            

    'PLANTYPES' => [ 
            '0'=>_('Mục tiêu nghỉ hưu'),  
            '1'=>_('Mục tiêu nghỉ hưu vợ/chồng'),  
            '2'=>_('Mục tiêu mua nhà'),  
            '3'=>_('Mục tiêu mua xe'),  
            '4'=>_('Mục tiêu kết hôn'),  
            '5'=>_('Mục tiêu ông bà'),  
            '6'=>_('Mục tiêu cha mẹ'),  
            '7'=>_('Mục tiêu con cái'),  
            '8'=>_('Mục tiêu kinh doanh'),  
            '9'=>_('Mục tiêu đầu tư'),  
            '10'=>_('Mục tiêu bảo hiểm'),  
            '11'=>_('Mục tiêu quỹ dự phòng'),  
            '12'=>_('Mục tiêu quỹ hưu trí'),  
            '13'=>_('Mục tiêu quỹ đầu tư'),  
            '14'=>_('Mục tiêu tiết kiệm'),  
            '15'=>_('Mục tiêu phí sinh hoạt gia đình'),  
            '16'=>_('Mục tiêu giải trí'),  
            '17'=>_('Mục tiêu bản thân'),  
            '18'=>_('Mục tiêu giáo dục'),  
            '19'=>_('Mục tiêu sự nghiệp'),  
            '20'=>_('Mục tiêu sức khỏe'),  
            '21'=>_('Mục tiêu quỹ tiền tặng con'),  
            '22'=>_('Mục tiêu quỹ từ thiện'),  
            '23'=>_('Mục tiêu du lịch'),  
            '24'=>_('Mục tiêu khác'), 
          ], 

    'OPERATIONLOG' => [ 
            '0'=>_('Đăng nhập'),
            '1'=>_('Đăng xuất'),
            '2'=>_('Thêm mới'),
            '3'=>_('Cập nhật'),
            '4'=>_('Xóa'),
          ], 

    'ERRORLOG' => [ 
            '1'=>_('Mật khẩu cũ nhập vào không khớp với mật khẩu đã lưu.'),
            '2'=>_('Mật khẩu mới không đủ chiều dài tối thiểu.'),
            '3'=>_('Mật khẩu mới và mật khẩu xác nhận không giống nhau.'),
            '4'=>_('Tài khoản quý khách đã hết hạn sử dụng. Vui lòng liên hệ bộ phận chăm sóc khách hàng để được hỗ trợ.'),
            '5'=>_('Tài khoản quý khách đã bị khóa. Vui lòng liên hệ bộ phận chăm sóc khách hàng để được hỗ trợ.'),
            '6'=>_('Mã kiểm tra không chính xác. Quý khách vui lòng kiểm tra lại.'),            
          ],

    'PAYMENTTYPE' => [ 
            '0'=>_('Chưa thanh toán'),
            '1'=>_('Đã thanh toán'),
          ], 
                    
    'PAYMENTMOTHOD' => [ 
            '0'=>_('Trực tiếp tại văn phòng'),
            '1'=>_('Chuyển khoản ngân hàng'),
            '2'=>_('Thanh toán qua MOMO'),
          ],

    'ACCOUNTTYPE' => ['0'=>_('Mở'), 
            '1'=>_('Khóa'),
          ],

    'ACCOUNTPRODUCTSTATUS' => [ 
            '0'=>_('Chưa hoạt động'),
            '1'=>_('Đang hiệu lực'),
            '2'=>_('Hết hạn'),
          ],

    'ASSETSTATUSTYPES' => [ 
            '3'=>_('Tài sản nợ'),
            '4'=>_('Tài sản có'),
          ],
                      
    'RELATIONSHIPTYPE' => [
            '0'=>_('Cha'), 
            '1'=>_('Mẹ'),
            '2'=>_('Chồng'),
            '3'=>_('Vợ'),
            '4'=>_('Con'),
            '5'=>_('Anh'),
            '6'=>_('Chị'),
            '7'=>_('Em'),
            '8'=>_('Ông'),
            '9'=>_('Bà'),
            '10'=>_('Cô'),
            '11'=>_('Dì'),
            '12'=>_('Chú'),
            '13'=>_('Bác'),
            '14'=>_('Cậu'),
            '15'=>_('Mợ'),
            '16'=>_('Khác'),
          ],

    'NEWSTYPE' => [ 
            '0'=>_('Nhận định chứng khoán'),
            '1'=>_('Kiến thức tài chính đầu tư'),
            '2'=>_('Sự kiện'),
          ],

    'COUPONTYPE' => [ 
            '0'=>_('Phổ thông'),
            '1'=>_('Đặc biệt'),
          ],

    'COUPONSTATUS' => [ 
            '0'=>_('Chưa hoạt động'),
            '1'=>_('Đang hiệu lực'),
            '2'=>_('Hết hạn'),
          ],

    'PRODUCTTYPES' => [ 
            '0' => ['month' => '1', 'discount' => '0'],
            '1' => ['month' => '3', 'discount' => '20'],
            '2' => ['month' => '6', 'discount' => '30'],
            '3' => ['month' => '12', 'discount' => '50'],
          ],

    'PRODUCTACCESSPAGES' => [ 
            '1' => ['retireplans-index', 'cash-index', 'cashplans-index', 'cash-process', 'cashassets-index'],//Goi ca nhan
            '2' => ['retireplans-index', 'cash-index', 'cashplans-index', 'cash-process', 'cashassets-index'],//Goi doanh nghiep
            '3' => ['retireplans-index', 'cash-index', 'cashplans-index', 'invests-index', 'managetransactions-index', 'cash-process', 'cashassets-index'],//Goi vip
            '4' => ['retireplans-index', 'cash-index', 'cashassets-index'],//Goi mien phi
          ],

    'COURSETYPE' => [ 
            '1'=>_('Start-Up'),
            '2'=>_('SMEs'),
            '3'=>_('Big Corporations/Holdings'),
            '4'=>_('Xử Lý Dòng Tiền'),
            '5'=>_('Tiền Đẻ Ra Tiền'),
            '6'=>_('Tăng Trưởng Đa Dòng Tiền'),
          ],
];
