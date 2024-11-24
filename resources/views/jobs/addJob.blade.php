<!-- @extends('layouts.app') -->

@section('content')
<div class="container-fluid p-4 bg-light">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="mb-0">Thông Tin Công Việc</h3>
                    </div>

                    <div class="card-body">
                        <!-- Display success or error messages -->
                        @if(session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <!-- Job Name Field -->
                        <div class="form-group">
                            <label for="name" class="col-form-label"><b>Tên công ty</b></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Logo Field -->
                        <div class="form-group">
                            <label for="img" class="col-form-label"><b>Logo công ty</b></label>
                            <input type="file" id="img" name="img" class="form-control">
                            @error('img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Area Field -->
                        <div class="form-group">
                            <label for="area" class="col-form-label"><b>Khu vực</b></label>
                            <input type="text" id="area" name="area" class="form-control" value="{{ old('area') }}">
                            @error('area')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Language Field -->
                        <div class="form-group">
                            <label for="language" class="col-form-label"><b>Chọn ngôn ngữ</b></label>
                            <select id="language" name="language" class="form-control">
                                <option value="0" {{ old('language') == '0' ? 'selected' : '' }}>Chọn ngôn ngữ</option>
                                <option value="Java" {{ old('language') == 'Java' ? 'selected' : '' }}>Java</option>
                                <option value="Python" {{ old('language') == 'Python' ? 'selected' : '' }}>Python</option>
                                <option value="JavaScript" {{ old('language') == 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                                <option value=".NET" {{ old('language') == '.NET' ? 'selected' : '' }}>.NET</option>
                                <option value="Tester" {{ old('language') == 'Tester' ? 'selected' : '' }}>Tester</option>
                                <option value="Ruby" {{ old('language') == 'Ruby' ? 'selected' : '' }}>Ruby</option>
                                <option value="Business Analyst" {{ old('language') == 'Business Analyst' ? 'selected' : '' }}>Business Analyst</option>
                                <option value="PHP" {{ old('language') == 'PHP' ? 'selected' : '' }}>PHP</option>
                            </select>
                            @error('language')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Experience Field -->
                        <div class="form-group">
                            <label for="experience" class="col-form-label"><b>Số năm kinh nghiệm</b></label>
                            <select class="form-control select2 select2-hidden-accessible" id="experience" name="experience">
                                <option value="0" {{ old('experience') == '0' ? 'selected' : '' }}>Chọn năm kinh nghiệm</option>
                                <option value="Dưới 6 tháng" {{ old('experience') == 'Dưới 6 tháng' ? 'selected' : '' }}>Dưới 6 tháng</option>
                                <option value="1 - 2 năm" {{ old('experience') == '1 - 2 năm' ? 'selected' : '' }}>1 - 2 năm</option>
                                <option value="2 - 3 năm" {{ old('experience') == '2 - 3 năm' ? 'selected' : '' }}>2 - 3 năm</option>
                                <option value="Trên 3 năm" {{ old('experience') == 'Trên 3 năm' ? 'selected' : '' }}>Trên 3 năm</option>
                            </select>
                            @error('experience')
                               <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Salary, Position, Description, Address, Work Time Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="salary" class="form-label"><b>Lương</b></label>
                                <input class="form-control" id="salary" name="salary" type="text" value="{{ old('salary') }}">
                                @error('salary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="form-label"><b>Vị trí</b></label>
                                <input class="form-control" id="position" name="position" type="text" value="{{ old('position') }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label"><b>Mô tả</b></label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address" class="form-label"><b>Địa chỉ</b></label>
                            <input class="form-control" id="address" name="address" type="text" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Work Time Field -->
                        <div class="form-group mb-3">
                            <label for="worktime" class="form-label"><b>Thời gian làm việc</b></label>
                            <select class="form-control" id="worktime" name="worktime">
                                <option value="" {{ old('worktime') == '' ? 'selected' : '' }}>Thời gian làm</option>
                                <option value="Part-time" {{ old('worktime') == 'Part-time' ? 'selected' : '' }}>Việc làm part-time</option>
                                <option value="Full-time" {{ old('worktime') == 'Full-time' ? 'selected' : '' }}>Việc làm full-time</option>
                            </select>
                            @error('worktime')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="availableApply" class="form-label"><b>Thời gian nhận hồ sơ</b></label>
                            <input class="form-control" id="availableApply" name="availableApply" type="text" value="{{ old('availableApply') }}">
                            @error('availableApply')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Benefits Field -->
                        <div class="form-group mb-3">
                            <label for="benefits" class="form-label"><b>Quyền lợi khi tham gia làm việc</b></label>
                            <textarea class="form-control" id="benefits" name="benefits" rows="4">{{ old('benefits') }}</textarea>
                            @error('benefits')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-success">Thêm công việc</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
