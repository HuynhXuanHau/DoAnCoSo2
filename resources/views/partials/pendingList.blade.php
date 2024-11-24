<div class="border border-5 border-light m-3 rounded bg-white">
    <div class="d-flex m-3">
        <h3>Danh sách chờ duyệt</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên ứng viên</th>
                        <th>Công việc apply</th>
                        <th>Ngôn ngữ</th>
                        <th>Kinh nghiệm</th>
                        <th>Trạng thái duyệt hồ sơ</th>
                        <th>Ngày hẹn</th>
                        <th>CV ứng viên</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($results->where('stateCV', 'Waiting') as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->userName }}</td>
                        <td>{{ $row->position }}</td>
                        <td>{{ $row->language }}</td>
                        <td>{{ $row->experience }}</td>
                        <td>{{ $row->state }}</td>
                        <td>{{ $row->interviewDate ?? 'Chưa có ngày hẹn' }}</td>
                        <td>
                            @if($row->cv)
                                <a href="{{ asset('storage/cvs/' . $row->cv) }}" target="_blank" class="btn btn-primary">
                                    Xem CV ứng viên</a>
                            @else
                                Không có CV
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8">Không có ứng viên trong danh sách chờ duyệt</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>