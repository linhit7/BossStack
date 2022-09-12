<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <table cellpadding=0 cellspacing=14 style="width:100%;font-family:Arial;font-size:13px;">
        <tr>
            <td width='50%'>
            Kính gửi: Quý khách (Dear Mr./Ms.) <b>{{$usercustomer->fullname}}</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>Hợp đồng dịch vụ Giao dịch trực tuyến của BossStack cho tài khoản của Quý khách đã được ghi nhận.</td>
        </tr>
        <tr>
            <td colspan='2'>(Your BossStack Coaching account has been created).</td>
        </tr>
        <tr>
            <td colspan='2'>
            - Mã hợp đồng (Contract ID): <b>{{$contract->contractno}}</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            - Gói dịch vụ đăng ký (Product): <b>{{$contract->service_product_name}}</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            - Giá (Price): <b>{{ formatNumber($contract->service_product_price, 1, 0, 0)}} đồng/tháng</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            - Thời hạn (Duration): <b>{{ formatNumber($contract->term, 1, 0, 0)}} tháng</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            - Giảm giá (Discount): <b>{{ formatNumber($contract->discount, 1, 0, 0)}} %</b>
            </td>
        </tr>

        <tr>
            <td colspan='2'>
            - Số tiền thanh toán (Amount): <b>{{ formatNumber($contract->amount, 1, 0, 0)}} đồng</b>
            </td>
        </tr>

        <tr>
            <td colspan='2'>
            <b>Quý khách chuyển tiền vào tài khoản ngân hàng của BossStack Coaching để sử dụng dịch vụ. 
            </b>  
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <b>- Số tài khoản: 0071001101277</b>  
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <b>- Chủ tài khoản: CÔNG TY TNHH Lam Minh Anh</b>  
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <b>- Ngân hàng: Ngân hàng TMCP Ngoại Thương Việt Nam (Vietcombank) - CN TP.HCM</b>  
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            Quý khách lưu ý ghi rõ thông tin dịch vụ như Tên dịch vụ / Mã hợp đồng trong nội dung chuyển tiền:
            <b>
            <br><u>Ví dụ:</u></b> "Đăng ký dịch vụ Gói xxx / Thanh toán hợp đồng HDxxx"
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            Quý khách có thể truy cập vào hệ thống giao dịch trực tuyến BossStack và tham khảo hướng dẫn sử dụng theo đường dẫn dưới đây: 
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            (You can access BossStack Coaching and consult the manual by clicking on the link below)
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <font color='#0000FF'><b>Truy cập giao dịch trực tuyến BossStack tại địa chỉ:</b></font> bossstack.vn
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            Mọi yêu cầu cần giải đáp, Xin Quý khách vui lòng liên hệ với <b> Phòng chăm sóc khách hàng Công ty</b>. 
            </td>
        </tr>
        <tr>
            <td colspan='2'> 
            (Please contact <b>Customer Department</b>).
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <b>Thông tin liên hệ (Contact Center):</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            Điện thoại: <b>0918 90 55 00</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <b>Website: bossstack.vn Email: info@bossstack.vn</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
             Trân trọng /Best regards;
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            Phòng chăm sóc khách hàng/Customer Department
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <b>BossStack</b>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            *******************************************************************
            </td>
        </tr>
    </table>

</body>
</html>
