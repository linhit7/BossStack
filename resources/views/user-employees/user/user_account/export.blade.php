<h1>DANH SÁCH TÀI KHOẢN QUẢN TRỊ HỆ THỐNG</h1>
<br>
<table>
	<tbody>
		<tr>
			<th>STT</th>
			<th>Tên Khách hàng</th>
			<th>Email</th>
            <th>Quyền truy cập</th>
			<th>Trạng thái tài khoản</th>
            <th>Ngày đăng ký</th>
		</tr>
        @php
            $i = 1;
        @endphp                        
		@foreach($customers as $customer)
		<tr>
			<td>{{ $i++ }}</td>
			<td>{{ $customer['name'] }}</td>
			<td>{{ $customer['email'] }}</td>
            <td>{{ $customer['role'] }}</td>
			<td>{{ $customer['blocked'] }}</td>
            <td>{{ $customer['created_at'] == null ? "" : ConvertSQLDate($customer['created_at'], 1) }}</td>
		</tr>
		@endforeach
	</tbody>
</table>