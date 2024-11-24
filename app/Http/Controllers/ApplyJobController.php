<?php
namespace App\Http\Controllers;

use App\Models\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    public function approve(Request $request)
    {
        $applyJobId = $request->input('id');
        $applyJob = ApplyJob::find($applyJobId);

        if ($applyJob) {
            $applyJob->state = 'Yes'; // Cập nhật trạng thái
            $applyJob->save();
            return redirect()->back()->with('success', 'Ứng viên đã được duyệt.');
        }

        return redirect()->back()->with('error', 'Không tìm thấy ứng viên.');
    }

    public function reject(Request $request)
    {
        $applyJobId = $request->input('id');
        $applyJob = ApplyJob::find($applyJobId);

        if ($applyJob) {
            $applyJob->state = 'No'; // Cập nhật trạng thái
            $applyJob->save();
            return redirect()->back()->with('success', 'Ứng viên đã bị từ chối và xóa khỏi danh sách.');
        }

        return redirect()->back()->with('error', 'Không tìm thấy ứng viên.');
    }
}
