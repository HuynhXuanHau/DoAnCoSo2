@section('content')
    <div class="container mt-5">
        
        
    </div>
    <div class="row">
    @include('partials.sidebar_admin')
    <div class="col-md-10 col-sm-10" style="height: 750px;">
        <div class="card">
            <div class="card-body m-3" >
                <!-- Tìm kiếm -->
                <form class="card" action="{{ route('admin.home.post') }}" method="post">
                    @csrf
                    <div class="card-header text-white" style="background-color:#2C5D63;">
                        <b>Tìm kiếm</b>
                    </div>
                    <div class="container-fluid border border-4 border-top-0">
                        <div class="row">
                            <!-- Form fields for search -->
                            <div class="col-md-6 p-2">
                                <label for="inputName" class="form-label"><b style="color:#2C5D63;">Tên ứng viên</b></label>
                                <input type="text" class="form-control bolder-set" id="inputName" placeholder="Họ và tên" name="nameCV">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="stateCV" class="form-label"><b style="color:#2C5D63;">Trạng thái duyệt hồ sơ</b></label>
                                <select class="form-control select2 select2-hidden-accessible" id="stateCV" name="stateCV">
                                    <option selected>--Trạng thái--</option>
                                    <option value="Yes">Đã duyệt</option>
                                    <option value="Waiting">Đang chờ duyệt</option>
                                    <option value="No">Từ chối</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="inputJobs" class="form-label"><b style="color:#2C5D63;">Tên
                                        công việc</b></label>
                                <input type="text" class="form-control bolder-set" id="inputJobs"
                                    name="positionCV" placeholder="Developer">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="language" class="form-label"><b style="color:#2C5D63;">Ngôn
                                        ngữ ứng tuyển</b></label>
                                <select class="form-control select2 select2-hidden-accessible"
                                    id="language" name="languageCV">
                                    <option>--Ngôn ngữ--</option>
                                    <option value="Java">Java</option>
                                    <option value="Py">Python</option>
                                    <option value="JS">JavaScript</option>
                                    <option value="Net">.NET</option>
                                    <option value="Test">Tester</option>
                                    <option value="Ruby">Ruby</option>
                                    <option value="BA">Business Analyst</option>
                                    <option value="Php">Php</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="language" class="form-label"><b style="color:#2C5D63;">Kinh
                                        nghiệm làm việc</b></label>
                                <select class="form-control select2 select2-hidden-accessible"
                                    id="language" name="experienceCV">
                                    <option>--Kinh nghiệm--</option>
                                    <option value="Trên 6 tháng">Dưới 6 tháng</option>
                                    <option value="1-2 năm">1 - 2 năm</option>
                                    <option value="2 - 3 năm">2 - 3 năm</option>
                                    <option value="Trên 3 năm">Trên 3 năm</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="inverviewDateCV" class="form-label"><b
                                        style="color:#2C5D63;">Ngày hẹn phỏng vấn</b> </label>
                                <input type="text" class="form-control bolder-set" id="inverviewDateCV"
                                    name="interviewDateCV" placeholder="dd/mm/yy">
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary" style="background-color:#2C5D63;">Tìm kiếm</button>
                            </div>
                            <small class="text-end">Nhấn vào đây tìm kiếm ứng viên</small>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- Kết quả tìm kiếm -->
                <div class="border border-5 border-light m-3 rounded bg-white">
                    <div class="d-flex m-3">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>     
                                    @if ($state == 'Waiting')
                                        <th scope="col">Mã</th>
                                        <th scope="col">Tên ứng viên</th>
                                        <th scope="col">Công việc apply</th>
                                        <th scope="col">Ngôn ngữ</th>
                                        <th scope="col">Kinh nghiệm</th>
                                        <th class="text-center">CV trên hệ thống</th>
                                        <th scope="col">Duyệt hồ sơ</th>
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
                        @if (!empty($interviewDate))
                            @foreach ($results as $row)
                                <tr>
                                    <td>{{ $row->id ?? '' }}</td>
                                    <td>{{ $row->userName ?? '' }}</td>
                                    <td>{{ $row->position ?? '' }}</td>
                                    <td>{{ $row->language ?? '' }}</td>
                                    <td>{{ $row->experience ?? '' }}</td>
                                    <td>{{ $row->state ?? '' }}</td>
                                    <td>{{ $row->interviewDate ?? '' }}</td>                                                    
                                    <th class="d-flex justify-content-center ">         
                                    <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}"
                                    class="btn btn-primary">CV ứng viên</a>
                                    </th>
                                </tr>
                            @endforeach
                        @elseif ($state == 'Waiting')                            
                            <tr>
                                <th>{{ $row->id }}</th>
                                <th>{{ $row->userName }}</th>
                                <th>{{ $row->position }}</th>
                                <th>{{ $row->language }}</th>
                                <th>{{ $row->experience }}</th>
                                <th class="d-flex justify-content-center">
                                <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}"class="btn btn-primary">CV ứng viên</a>
                                </th>
                                <th>
                                    <a class="text-decoration-none text-white acceptCV" value="{{ $row->id }}">
                                        <button class="btn btn-primary text-center btn-success">Accept</button>
                                    </a>
                                    <a class="text-decoration-none text-white denyCV" value="{{ $row->id }}">
                                        <button class="btn btn-primary text-center btn-danger">Deny</button>
                                    </a>
                                </th>
                            </tr>
                        @elseif ($state == 'Yes')
                            <tr>
                                <th>{{ $row->id }}</th>
                                <th>{{ $row->userName }}</th>
                                <th>{{ $row->position }}</th>
                                <th>{{ $row->language }}</th>
                                <th>{{ $row->experience }}</th>
                                <th>{{ $row->state }}</th>
                                <th class="text-decoration-none text-white showCV">                                                                                                                                                                                    
                                <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}"class="btn btn-primary">CV ứng viên</a>
                                </th>
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
                            </tr>                  
                        @elseif(empty(request()->query('action')))
                            <tr>
                                <td>{{ $row->id ?? '' }}</td>
                                <td>{{ $row->userName ?? '' }}</td>
                                <td>{{ $row->position ?? '' }}</td>
                                <td>{{ $row->language ?? '' }}</td>
                                <td>{{ $row->experience ?? '' }}</td>
                                <td>{{ $row->state ?? '' }}</td>
                                @if(request()->query('action') == 'Yes')
                                    <td><input type="text" name="cvInterviewDate" class="form-control" placeholder="Ngày hẹn"></td>
                                    <td><textarea name="cvBusinessNote" rows="4" cols="50">{{ $row->businessNote ?? '' }}</textarea></td>
                                    <td><button class="btn btn-success">Update</button></td>
                                @else
                                    <td>{{ $row->interviewDate ?? '' }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('showProfileForAD', ['user_id' => $row->userId]) }}"class="btn btn-primary">CV ứng viên</a>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr><td colspan="10">No results found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
