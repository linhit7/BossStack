@extends('home.layout')

@section('content')
<div class="" id="forgotPassword">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div><span class="h3">Xác thực email</span></div>
            </div>

            @if(isset($process) and $process == "0")
            <div class="modal-body">
                @if (session('status'))
                <div class="alert alert-success">
                    Vui lòng đăng nhập tài khoản mail để xác thực!
                </div>
                @endif
                <form action="{{ route('customers-mailForgotPassword') }}" method="post" class="form-horizontal p-3" role="form">
                    {{ csrf_field() }}
                    <div class="" style="margin-top: -10px; margin-bottom: 5px">
                        Vui lòng nhập địa chỉ email bạn đã đăng ký trên hệ thống:
                        @if(isset($infor))
                        <br><font color='#ff0000'>{{ $infor }}</font>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email }}" required>
                    </div>
                    <div class="float-right">
                        <input type="submit" class="btn btn-danger btn-modal" value="Tiếp tục" />
                    </div>
                </form>
            </div>
            @elseif($process == "1")
            <div class="modal-body">
                 <br>
                <div class="alert alert-success" style="margin-top: -10px; margin-bottom: 5px">
                    @if(isset($infor))
                    <br><font size='2'>{{ $infor }}</font><br><br>
                    @endif
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
