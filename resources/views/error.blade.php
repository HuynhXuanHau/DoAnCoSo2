<!-- resources/views/error.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="alert alert-danger">
        <strong>Oops!</strong> Không tìm thấy hồ sơ người dùng.
    </div>
    <a href="{{ route('admin.home') }}" class="btn btn-primary">Quay lại trang chủ</a>
@endsection
