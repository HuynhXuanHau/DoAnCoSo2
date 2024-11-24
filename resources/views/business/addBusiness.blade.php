@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 bg">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Thêm Công Ty</h3>
                </div>
                <div class="card-body">
                    <!-- Display success or error messages -->
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <!-- Business Creation Form -->
                    <form action="{{ route('business.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Company Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label"><b>Tên công ty</b></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Company Logo -->
                        <div class="mb-3">
                            <label for="img" class="form-label"><b>Logo công ty</b></label>
                            <input type="file" name="img" id="img" class="form-control">
                            @error('img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hotline -->
                        <div class="mb-3">
                            <label for="hotline" class="form-label"><b>Hotline</b></label>
                            <input type="text" name="hotline" id="hotline" class="form-control" value="{{ old('hotline') }}">
                            @error('hotline')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="customer_mail" class="form-label"><b>Email công ty</b></label>
                            <input type="email" name="customer_mail" id="customer_mail" class="form-control" value="{{ old('customer_mail') }}" required>
                            @error('customer_mail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Website -->
                        <div class="mb-3">
                            <label for="official_website" class="form-label"><b>Website</b></label>
                            <input type="text" name="official_website" id="official_website" class="form-control" value="{{ old('official_website') }}">
                            @error('official_website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Facebook -->
                        <div class="mb-3">
                            <label for="official_facebook" class="form-label"><b>Facebook</b></label>
                            <input type="text" name="official_facebook" id="official_facebook" class="form-control" value="{{ old('official_facebook') }}">
                            @error('official_facebook')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="head_offices" class="form-label"><b>Địa chỉ</b></label>
                            <textarea name="head_offices" id="head_offices" rows="3" class="form-control">{{ old('head_offices') }}</textarea>
                            @error('head_offices')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Development Progress -->
                        <div class="mb-3">
                            <label for="progress" class="form-label"><b>Quá trình phát triển</b></label>
                            <textarea name="progress" id="progress" rows="3" class="form-control">{{ old('progress') }}</textarea>
                            @error('progress')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thêm công ty</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
