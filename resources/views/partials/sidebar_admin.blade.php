<div class="col-md-2 col-sm-2">
    <!-- Sidebar Menu -->
    <div class="card bg-light">
        <div class="card-header text-center">
            <a href="{{ url('/admin/home') }}" class="text-decoration-none text-dark">
                <i class="fa-solid fa-house m-1"></i>
                <h5>Trang chủ</h5>
            </a>
        </div>
        <div class="card-body">
            <div class="menu-item mb-2">
                <a href="{{ route('jobs.create') }}" class="text-decoration-none text-dark d-flex align-items-center" id="addJob">
                    <i class="fa-solid fa-suitcase me-2"></i> Thêm job
                </a>
            </div>
            <div class="menu-item mb-2">
                <a href="{{ route('business.create') }}"  class="text-decoration-none text-dark d-flex align-items-center" id="addBusiness">
                    <i class="fa-solid fa-building me-2"></i> Thêm công ty
                </a>
            </div>
            <div class="menu-item mb-2">
                <a href="{{ route('admin.home.pending') }}" class="text-decoration-none text-dark d-flex align-items-center">
                    <i class="fa-solid fa-clock me-2"></i> Danh sách chờ duyệt
                </a>
            </div>
            <div class="menu-item mb-2">
                <a href="{{ route('admin.home.approved') }}" class="text-decoration-none text-dark d-flex align-items-center">
                    <i class="fa-solid fa-check-to-slot me-2"></i> Danh sách đã duyệt
                </a>
            </div>
            <div class="menu-item mb-2">
                <a href="{{route('admin.home.interview') }}" class="text-decoration-none text-dark d-flex align-items-center">
                    <i class="fa-solid fa-clipboard-question me-2"></i> Chờ phỏng vấn
                </a>
            </div>
            <hr>
            <div class="menu-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="text-decoration-none text-white d-flex align-items-center bg-danger p-2">
                    <i class="fa-solid fa-right-from-bracket me-2"></i><b>Đăng xuất</b>
                </a>
            </div>
        </div>
    </div>
</div>
