@extends('layouts.app')

@section('content')  
   <div class="bg py-5">
        <div class="container">
            <div class="card border border-dark rounded">
                <div class="card-body m-3">
                    <form class="row g-3">
                        <h1 class="text-center mb-5">HỒ SƠ CÁ NHÂN</h1>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . $profile->avatarcv) ?? 'N/A' }}" alt="Profile Avatar" class="img-fluid rounded" style="max-width: 200px; height: auto;">
                                </div>
                                <div class="p-3 py-4 bg-dark text-light">
                                    <p>Họ và tên: {{ $profile->name ?? 'N/A' }}</p>
                                    <p>Năm sinh: {{ $profile->birthday ?? 'N/A' }}</p>
                                    <p>Giới tính: {{ $profile->sex ?? 'N/A' }}</p>
                                    <p>Số CMND: {{ $profile->cccd ?? 'N/A' }}</p>
                                    <p>Số điện thoại: {{ $profile->phone ?? 'N/A' }}</p>
                                    <p>Email: {{ $profile->email ?? 'N/A' }}</p>
                                    <p>Địa chỉ: {{ $profile->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <section>
                                    <h2 style="color: #2C5D63;">HỌC VẤN</h2>
                                    <hr class="bg-dark" style="height: 4px;">
                                    <p>{{ $profile->study ?? 'N/A' }}</p>
                                </section>
                                <section>
                                    <h2 style="color: #2C5D63;">KINH NGHIỆM LÀM VIỆC</h2>
                                    <hr class="bg-dark" style="height: 4px;">
                                    <p>{{ $profile->experience ?? 'N/A' }}</p>
                                </section>
                                <section>
                                    <h2 style="color: #2C5D63;">CHỨNG CHỈ</h2>
                                    <hr class="bg-dark" style="height: 4px;">
                                    <p>{{ $profile->certificate ?? 'N/A' }}</p>
                                </section>
                                <section>
                                    <h2 style="color: #2C5D63;">GIẢI THƯỞNG</h2>
                                    <hr class="bg-dark" style="height: 4px;">
                                    <p>{{ $profile->award ?? 'N/A' }}</p>
                                </section>
                            </div>
                        </div>
                    </form>

                    <!-- Button to go back to the previous page -->
                    <div class="text-center mt-4">
                        <button class="btn btn-secondary" onclick="window.history.back();">
                            <i class="fas fa-arrow-left me-2"></i>Quay lại
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
