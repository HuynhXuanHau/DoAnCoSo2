<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplyJob;
use App\Models\User;
use App\Models\Job;
use App\Models\UserCv;


class AdminController extends Controller
{
    public function home(Request $request)
    {
    $query = ApplyJob::query();

    // Thêm điều kiện lọc dựa trên input, bỏ qua giá trị mặc định
    if ($request->filled('nameCV')) {
        $query->where('userName', 'like', '%' . $request->input('nameCV') . '%');
    }
    if ($request->filled('stateCV') && $request->input('stateCV') !== '--Trạng thái--') {
        $query->where('state', $request->input('stateCV'));
    }
    if ($request->filled('positionCV')) {
        $query->where('position', 'like', '%' . $request->input('positionCV') . '%');
    }
    if ($request->filled('languageCV') && $request->input('languageCV') !== '--Ngôn ngữ--') {
        $query->where('language', 'like', '%' . $request->input('languageCV') . '%');
    }
    if ($request->filled('experienceCV') && $request->input('experienceCV') !== '--Kinh nghiệm--') {
        $query->where('experience', $request->input('experienceCV'));
    }
    if ($request->filled('interviewDateCV')) {
        $query->where('interviewDate', $request->input('interviewDateCV'));
    }

    // Debug: Hiển thị truy vấn SQL và các bindings
    // dd($query->toSql(), $query->getBindings());

    // Thực thi truy vấn và lấy kết quả
    $results = $query->get();

    return view('admin.home', compact('results'))->with('state', '');
    }
    public function pendingList()
    {
        $results = ApplyJob::where('state', 'Waiting')->get();
        return view('admin.home', compact('results'))->with('state', 'Waiting');
    }
    
    public function approvedList()
    {
        $results = ApplyJob::where('state', 'Yes')->get();
        return view('admin.home', compact('results'))->with('state', 'Yes');
    }
    public function interviewList()
{
    $state = 'Interview';
    $results = ApplyJob::where('state', 'Yes')->get();

    return view('admin.home', compact('results', 'state'));
}

    
    public function updateCv(Request $request)
    {
        // Kiểm tra nếu các giá trị cần thiết có trong request
        if ($request->has('cvId') && $request->has('cvState')) {
            $state = $request->input('cvState');
            $id = $request->input('cvId');

            // Cập nhật trạng thái
            $applyJob = ApplyJob::find($id);
            if ($applyJob) {
                $applyJob->state = $state;
                $applyJob->save();
                return response()->json(['message' => 'State updated successfully']);
            } else {
                return response()->json(['message' => 'Apply job not found'], 404);
            }
        }

        // Kiểm tra nếu có thông tin ngày phỏng vấn và ghi chú từ form
        if ($request->has('cvInterviewDate') && $request->has('cvBusinessNote')) {
            $date = $request->input('cvInterviewDate');
            $note = $request->input('cvBusinessNote');
            $id = $request->input('cvId');

            // Cập nhật ngày phỏng vấn và ghi chú
            $applyJob = ApplyJob::find($id);
            if ($applyJob) {
                $applyJob->interviewDate = $date;
                $applyJob->businessNote = $note;
                $applyJob->save();

                // Chuyển hướng về trang admin và thông báo thành công
                
               
            return redirect()->route('admin.home', ['action' => 'Yes'])
                                 ->with('success', 'CV đã được cập nhật!');
            } else {
                return response()->json(['message' => 'Apply job not found'], 404);
            }
        }

        return response()->json(['message' => 'Invalid data'], 400);
    }

public function showCV($user_id)
{
    $profile = UserCv::where('user_id', $user_id)->first();

    if (!$profile) {
        abort(404, 'CV not found');
    }

    return view('admin.cv', compact('profile'));
}

}