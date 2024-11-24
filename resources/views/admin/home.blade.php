@extends('layouts.app') <!-- Or your main layout -->


@section('content')
<div class="container-fluid py-4" style="margin-top: 7%;">
  <div class="row">
    @include('partials.sidebar_admin')
    
    <div class="col-md-10 col-sm-12">
      <div class="card shadow-sm">
        <div class="card-body p-0">
          <!-- Search Form -->
          <form class="mb-4" action="{{ route('admin.home.post') }}" method="post">
            @csrf
            <div class="bg-primary bg-gradient text-white p-3 rounded-top">
              <h5 class="mb-0"><i class="fas fa-search me-2"></i>Tìm kiếm</h5>
            </div>
            
            <div class="p-4 border border-1 rounded-bottom">
              <div class="row g-3">
                <!-- Name Field -->
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label class="form-label fw-bold text-primary">
                      <i class="fas fa-user me-1"></i>Tên ứng viên
                    </label>
                    <input type="text" class="form-control form-control-lg shadow-sm" 
                           id="inputName" name="nameCV" placeholder="Nhập họ và tên">
                  </div>
                </div>

                <!-- Status Field -->
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label class="form-label fw-bold text-primary">
                      <i class="fas fa-clipboard-check me-1"></i>Trạng thái duyệt hồ sơ
                    </label>
                    <select class="form-select form-select-lg shadow-sm" id="stateCV" name="stateCV">
                      <option selected>--Trạng thái--</option>
                      <option value="Yes">Đã duyệt</option>
                      <option value="Waiting">Đang chờ duyệt</option>
                      <option value="No">Từ chối</option>
                    </select>
                  </div>
                </div>

                <!-- Job Field -->
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label class="form-label fw-bold text-primary">
                      <i class="fas fa-briefcase me-1"></i>Tên công việc
                    </label>
                    <input type="text" class="form-control form-control-lg shadow-sm" 
                           id="inputJobs" name="positionCV" placeholder="Ví dụ: Developer">
                  </div>
                </div>

                <!-- Language Field -->
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label class="form-label fw-bold text-primary">
                      <i class="fas fa-code me-1"></i>Ngôn ngữ ứng tuyển
                    </label>
                    <select class="form-select form-select-lg shadow-sm" id="language" name="languageCV">
                      <option>--Ngôn ngữ--</option>
                      <option value="Java">Java</option>
                      <option value="Py">Python</option>
                      <option value="JS">JavaScript</option>
                      <option value="Net">.NET</option>
                      <option value="Test">Tester</option>
                      <option value="Ruby">Ruby</option>
                      <option value="BA">Business Analyst</option>
                      <option value="Php">PHP</option>
                    </select>
                  </div>
                </div>

                <!-- Experience Field -->
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label class="form-label fw-bold text-primary">
                      <i class="fas fa-star me-1"></i>Kinh nghiệm làm việc
                    </label>
                    <select class="form-select form-select-lg shadow-sm" id="experience" name="experienceCV">
                      <option>--Kinh nghiệm--</option>
                      <option value="Trên 6 tháng">Dưới 6 tháng</option>
                      <option value="1-2 năm">1 - 2 năm</option>
                      <option value="2 - 3 năm">2 - 3 năm</option>
                      <option value="Trên 3 năm">Trên 3 năm</option>
                    </select>
                  </div>
                </div>

                <!-- Interview Date Field -->
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label class="form-label fw-bold text-primary">
                      <i class="fas fa-calendar me-1"></i>Ngày hẹn phỏng vấn
                    </label>
                    <input type="date" class="form-control form-control-lg shadow-sm" 
                           id="inverviewDateCV" name="interviewDateCV">
                  </div>
                </div>
              </div>

              <!-- Search Button -->
              <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-4">
                  <i class="fas fa-search me-2"></i>Tìm kiếm
                </button>
              </div>
            </div>
          </form>

          <!-- Results Table -->
          <div class="table-responsive mt-4">
            <table class="table table-hover table-striped align-middle">
              <thead class="bg-light">
                <tr>
                  @if ($state == 'Waiting')
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Tên ứng viên</th>
                    <th scope="col">Công việc apply</th>
                    <th scope="col">Ngôn ngữ</th>
                    <th scope="col">Kinh nghiệm</th>
                    <th scope="col" class="text-center">CV</th>
                    <th scope="col" class="text-center">Thao tác</th>
                @elseif ($state == 'Yes')
                    <th scope="col">Mã</th>
                    <th scope="col">Tên ứng viên</th>
                    <th scope="col">Công việc apply</th>
                    <th scope="col">Ngôn ngữ</th>
                    <th scope="col">Kinh nghiệm</th>
                    <th scope="col">Trạng thái hồ sơ</th>
                    <th class="text-center">CV trên hệ thống</th>
                    <th scope="col">Hẹn ngày phỏng vấn</th>
                    <th class="text-center">Ghi chú của công ty</th>
                    <th scope="col">Update Interview</th>
                @elseif ($state == 'Interview')
                    <th scope="col">#</th>
                    <th scope="col">Tên ứng viên</th>
                    <th scope="col">Công việc apply</th>
                    <th scope="col">Ngôn ngữ</th>
                    <th scope="col">Kinh nghiệm</th>
                    <th scope="col">Trạng thái duyệt hồ sơ</th>
                    <th scope="col">Ngày được hẹn phỏng vấn</th>
                    <th class="text-center">CV đã tạo trên hệ thống</th>
                @elseif(empty(request()->query('action')))
                    <th scope="col">#</th>
                    <th scope="col">Tên ứng viên</th>
                    <th scope="col">Công việc apply</th>
                    <th scope="col">Ngôn ngữ</th>
                    <th scope="col">Kinh nghiệm</th>
                    <th scope="col">Trạng thái duyệt hồ sơ</th>
                    <th scope="col">Ngày hẹn</th>
                    <th scope="col">CV ứng viên</th>
                @endif
                </tr>
              </thead>
              <tbody>
                @forelse($results as $row)
                  <tr>
                    <td class="text-center">{{ $row->id }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm me-2">
                          <img src="https://ui-avatars.com/api/?name={{ urlencode($row->userName) }}" 
                               class="rounded-circle" alt="Avatar">
                        </div>
                        <div>{{ $row->userName }}</div>
                      </div>
                    </td>
                    <td>{{ $row->position }}</td>
                    <td>
                      <span class="badge bg-primary">{{ $row->language }}</span>
                    </td>
                    <td>{{ $row->experience }}</td>
                        @if (!empty($interviewDate))
                        <td class="text-center">{{ $row->state }}</td>
                            <td class="text-center">
                              <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}" 
                                 class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-file-alt me-1"></i>Xem CV
                              </a>
                            </td>
                            <form action="{{ route('cv.update') }}" method="post">
                                @csrf
                                <th>
                                <input type="text" name="cvInterviewDate" class="form-control" placeholder="dd/mm/yy" value="{{ $row->interviewDate }}">
                                </th>
                                <th>
                                <textarea name="cvBusinessNote" rows="4" cols="50" placeholder="Business notes">{{ $row->businessNote }}</textarea>
                                </th>
                                <th>
                                    <button class="btn btn-primary text-center btn-success">Update</button>
                                </th>
                                <input type="hidden" name="cvId" value="{{ $row->id }}">
                            </form>
                            </td>
                          @elseif($state == 'Waiting')
                            <td class="text-center">
                              <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}" 
                                class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-file-alt me-1"></i>Xem CV
                              </a>
                            </td>
                            <td style="text-align: center;">
                              <div class="btn-group" role="group">
                                <!-- Form for Approve -->
                                <form action="{{ route('applyJob.approve') }}" method="POST" style="display:inline;">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $row->id }}">
                                  <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check me-1"></i>Duyệt
                                  </button>
                                </form>
                                
                                <!-- Form for Reject -->
                                <form action="{{ route('applyJob.reject') }}" method="POST" style="display:inline;">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $row->id }}">
                                  <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-times me-1"></i>Từ chối
                                  </button>
                                </form>
                              </div>
                            </td>
                        @elseif ($state == 'Yes')
                        <td >{{ $row->state }}</td>
                            <td class="text-center">
                              <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}" 
                                 class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-file-alt me-1"></i>Xem CV
                              </a>
                            </td>
                            <form action="{{ route('cv.update') }}" method="post">
                                @csrf
                                <th>
                                <input type="text" name="cvInterviewDate" class="form-control" placeholder="dd/mm/yy" value="{{ $row->interviewDate }}">
                                </th>
                                <th>
                                <textarea name="cvBusinessNote" rows="3" cols="40" placeholder="Business notes">{{ $row->businessNote }}</textarea>
                                </th>
                                <th>
                                    <button class="btn btn-primary text-center btn-success">Update</button>
                                </th>
                                <input type="hidden" name="cvId" value="{{ $row->id }}">
                            </form>
                            </td>
                        @elseif ($state == 'Interview')
                          <td class="text-center">{{ $row->state }}</td>
                          <td class="text-center">{{ $row->interviewDate }}</td>
                          <td class="text-center">
                            <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}" 
                               class="btn btn-sm btn-outline-primary">
                              <i class="fas fa-file-alt me-1"></i> Xem CV
                            </a>
                          </td>  
                          @elseif(empty(request()->query('action')))
                          <td >{{ $row->state }}</td>
                          <td class="text-center">{{ $row->interviewDate }}</td>
                          <td class="text-center">
                            <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}" 
                               class="btn btn-sm btn-outline-primary">
                              <i class="fas fa-file-alt me-1"></i> Xem CV
                            </a>
                          </td>  
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center py-4 text-muted">
                      <i class="fas fa-inbox fa-3x mb-3"></i>
                      <p>Không tìm thấy kết quả nào</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Custom CSS -->
<style>
  .form-control:focus,
  .form-select:focus {
    border-color: #2C5D63;
    box-shadow: 0 0 0 0.25rem rgba(44, 93, 99, 0.25);
  }

  .btn-primary {
    background-color: #2C5D63;
    border-color: #2C5D63;
  }

  .btn-primary:hover {
    background-color: #234951;
    border-color: #234951;
  }

  .text-primary {
    color: #2C5D63 !important;
  }

  .bg-primary {
    background-color: #2C5D63 !important;
  }

  .table th {
    font-weight: 600;
    background-color: #f8f9fa;
  }

  .avatar {
    width: 32px;
    height: 32px;
    overflow: hidden;
  }

  .avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  @media (max-width: 768px) {
    .btn-group {
      flex-direction: column;
    }
    
    .btn-group .btn {
      width: 100%;
      margin-bottom: 0.25rem;
    }
    
    .table-responsive {
      font-size: 0.875rem;
    }
  }
</style>

<!-- Add Font Awesome CDN in your layout file if not already included -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
