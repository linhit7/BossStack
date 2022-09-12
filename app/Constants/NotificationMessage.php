<?php

namespace App\Constants;

class NotificationMessage
{
    const CREATE_SUCCESS = ['success' => 'Thêm dữ liệu thành công'];
    const CREATE_ERROR = ['message' => 'Thêm dữ liệu thất bại'];

    const UPDATE_SUCCESS = ['success' => 'Cập nhật dữ liệu thành công'];
    const UPDATE_ERROR = ['message' => 'Cập nhật dữ liệu thất bại'];

    const DELETE_SUCCESS = ['success' => 'Xóa dữ liệu thành công'];
    const DELETE_ERROR = ['message' => 'Xóa dữ liệu thất bại'];

    const IMPORT_SUCCESS = ['message' => 'Import thành công'];
    const IMPORT_ERROR = ['message' => 'Import thất bại'];

    const APPROVE_SUCCESS = ['success' => 'Duyệt thành công'];
    const APPROVE_ERROR = ['message' => 'Duyệt thất bại'];

    const ACCEPT_SUCCESS = ['success' => 'Nhận Task thành công'];
    const ACCEPT_ERROR = ['message' => 'Báo cáo thất bại'];

    const REPORT_SUCCESS = ['success' => 'Báo cáo thành công'];
    const REPORT_ERROR = ['message' => 'Báo cáo thất bại'];

    const SEND_SUCCESS = ['success' => 'Gửi thành công'];
}