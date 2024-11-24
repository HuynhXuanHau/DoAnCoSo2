@extends('layouts.appUser')

@section('content')
<div class="bg py-5">
    <div class="container">
        <div class="card border border-dark rounded">
            <div class="card-body m-3">
                <form class="row g-3" method="post" action="{{ route('storeProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center">CURRICULUM VITAE</h1>

                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Họ và tên</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Nguyễn Văn A" value="{{ old('name', session('name')) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="inputBirthday" class="form-label">Năm sinh</label>
                        <input type="text" name="birthday" class="form-control" id="inputBirthday" placeholder="dd/mm/yy" value="{{ old('birthday', session('birthday')) }}">
                    </div>

                    <div class="col-md-2">
                        <label for="inputGender" class="form-label">Giới tính</label>
                        <input type="text" name="sex" class="form-control bolder-set" id="inputGender" placeholder="Nam/Nữ" value="{{ old('gender', session('gender')) }}">
                    </div>

                    <div class="col-md-5">
                        <label for="inputPhoneNumber" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" id="inputPhoneNumber" value="{{ old('phone', session('phone')) }}">
                    </div>

                    <div class="col-md-5">
                        <label for="inputID" class="form-label">Số căn cước công dân</label>
                        <input type="text" name="cccd" class="form-control" id="inputID" value="{{ old('cccd', session('cccd')) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" value="{{ old('email', session('email')) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address', session('address')) }}">
                    </div>

                    <div class="col-12">
                        <label for="inputStudy" class="form-label">Học vấn</label>
                        <textarea id="inputStudy" name="study" class="form-control" rows="3">{{ old('study', session('study')) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="experience" class="form-label">Kinh nghiệm làm việc</label>
                        <textarea id="experience" name="experience" class="form-control" rows="3">{{ old('experience', session('experience')) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="certification" class="form-label">Chứng chỉ</label>
                        <textarea id="certification" name="certificate" class="form-control" rows="3">{{ old('certificate', session('certificate')) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="award" class="form-label">Giải thưởng</label>
                        <textarea id="award" name="award" class="form-control" rows="3">{{ old('award', session('award')) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="avatarcv" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatarcv" class="form-control" id="avatarcv">
                    </div>

                    @if(session('error'))
                        <p class="text-danger">{{ session('error') }}</p>
                    @endif

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success text-white">Submit your CV</button>
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
