@extends('layouts.appUser')

@section('content')
<div class="bg py-5">
    <div class="container">
        @if(session(  'cv'))
            <div class="card border border-dark rounded">
                <div class="card-body m-3">
                    <form class="row g-4">
                        <h1 class="text-center mb-5">HỒ SƠ CÁ NHÂN</h1>
                        <div class="row d-flex mx-3">
                            <div class="col-12 col-md-2 mb-2 mx-5">
                                <img src="{{ asset('storage/' . $cv->avatarcv) }}" height="10%" width="80%" alt="ava-profile" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="text-black mw-100 fs-1">{{ session('name') }}</p>
                            </div>
                            <div class="col-12 col-md-2 my-2 mx-5">
                                <div class="p-3 py-3 bg-primary text-light">
                                    <p>Họ và tên</p>
                                    <p>Năm sinh</p>
                                    <p>Giới tính</p>
                                    <p>Số CCCD</p>
                                    <p>Số điện thoại</p>
                                    <p>Email</p>
                                    <p>Địa chỉ</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 my-2">
                                <div class="p-3 py-3" style="color: #2C5D63;">
                                    <p>{{ $cv->name }}</p>
                                            <p>{{ $cv->birthday }}</p>
                                            <p>{{ $cv->sex }}</p>
                                            <p>{{ $cv->cccd }}</p>
                                            <p>{{ $cv->phone }}</p>
                                            <p>{{ $cv->email }}</p>
                                            <p>{{ $cv->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-5 mx-5 my-2">
                                <h2 class="text-primary">HỌC VẤN</h2>
                                <hr>
                                <p>{{ $cv->study }}</p>
                                </div>
                            <div class="col-md-5 mx-4 my-2">
                                <h2 class="text-primary">KINH NGHIỆM LÀM VIỆC</h2>
                                <hr>
                                <p>{{ $cv->experience }}</p>
                            </div>
                            <div class="col-md-5 mx-5">
                                <h2 class="text-primary">CHỨNG CHỈ</h2>
                                <hr>
                                <p>{{ $cv->certificate }}</p>
                            </div>
                            <div class="col-md-5 mx-4">
                                <h2 class="text-primary">GIẢI THƯỞNG</h2>
                                <hr>
                                <p>{{ $cv->award }}</p>
                            </div>
                        </div>
                    </form>
                    <!-- Replace nested form with a link -->
                    <div class="col-12 text-end">
                        <a href="{{ route('createCV') }}" class="btn btn-primary text-light">Hoàn thiện hồ sơ cá nhân</a>
                        <small>Nhấn vào đây để sửa hồ sơ cá nhân</small>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-secondary" onclick="window.history.back();">
                            <i class="fas fa-arrow-left me-2"></i>Quay lại
                        </button>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center fw-bold">Bạn chưa có hồ sơ cá nhân?</p>
            <div class="text-center">
                <a href="{{ route('createCV') }}" class="btn btn-primary text-light">Tạo hồ sơ cá nhân ngay!</a>
            </div>
        @endif
    </div>
</div>
@endsection
