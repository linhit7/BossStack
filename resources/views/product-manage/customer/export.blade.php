<h1>DANH SÁCH KHÁCH HÀNG</h1>
<br>
<table>
	<tbody>
		<tr>
			<th>STT</th>
			<th>Tên Khách hàng</th>
			<th>Ngày sinh</th>
			<th>Email</th>
            <th>Số điện thoại</th>
			<th>Địa chỉ</th>
            <th>Ngày đăng ký</th>
            <th>Gói dịch vụ</th>
            <th>Tình trạng</th>
		</tr>
        @php
            $i = 1;
        @endphp                        
		@foreach($customers as $customer)
		<tr>
			<td>{{ $i++ }}</td>
			<td>{{ $customer['fullname'] }}</td>
			<td>{{ $customer['birthday'] == null ? "" : ConvertSQLDate($customer['birthday']) }}</td>
			<td>{{ $customer['email'] }}</td>
            <td>{{ $customer['phone'] }}</td>
			<td>{{ $customer['address'] }}</td>
            <td>{{ $customer['created_at'] == null ? "" : ConvertSQLDate($customer['created_at'], 1) }}</td>
            <td>{{ $customer['product'] }}</td>
            <td>{{ $customer['product_status'] }}</td>
		</tr>
		@endforeach
	</tbody>
</table>