<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCv;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Hiển thị trang hồ sơ cá nhân

    // Điều hướng tới form tạo hồ sơ
    public function createCV()
    {
        return view('createCV');
    }

    // Lưu thông tin hồ sơ vào session
    public function storeProfile(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:100',
            'birthday' => 'required|string|max:20',
            'sex' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'cccd' => 'required|string|max:100',
            'email' => 'required|email|max:50',
            'address' => 'required|string|max:200',
            'study' => 'required|string|max:1000',
            'experience' => 'nullable|string|max:1000',
            'certificate' => 'nullable|string|max:1000',
            'award' => 'nullable|string|max:1000',
            'avatarcv' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);



        // Tìm hoặc lấy `user_id`
        $user_id = \App\Models\User::where('mail', $request->input('email'))->value('user_id');
        if (!$user_id) {
            return redirect()->route('createCV')->with('error', 'Bạn đã nhập email khác form đăng kí!');
        }

        // Xử lý upload ảnh avatar nếu có
        $avatarPath = null;
        if ($request->hasFile('avatarcv')) {
            $filename = uniqid() . '.' . $request->file('avatarcv')->getClientOriginalExtension();
            $avatarPath = $request->file('avatarcv')->storeAs('avatars', $filename, 'public');
        }

        // Tạo hoặc cập nhật hồ sơ CV
        $cv = UserCv::updateOrCreate(
            ['user_id' => $user_id],
            [
                'name' => $request->input('name'),
                'birthday' => $request->input('birthday'),
                'sex' => $request->input('sex'),
                'phone' => $request->input('phone'),
                'cccd' => $request->input('cccd'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'study' => $request->input('study'),
                'experience' => $request->input('experience'),
                'certificate' => $request->input('certificate'),
                'award' => $request->input('award'),
                'avatarcv' => $avatarPath,
            ]
        );

        // Lưu `user_id` vào session
        session(['user_id' => $user_id]);
        $cv = UserCv::where('user_id', $user_id)->first();

        return redirect()->route('profile')->with('success', 'Thông tin hồ sơ đã được lưu!');
    }

    public function showProfile()
    {
        $user_id = session('user_id');
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem hồ sơ.');
        }

        $cv = UserCv::where('user_id', $user_id)->first();

        if (!$cv) {
            return redirect()->route('createCV')->with('error', 'Không tìm thấy hồ sơ. Vui lòng tạo một hồ sơ.');
        }

        // Gán CV vào session
        session(['cv' => $cv]);
        return view('profile', compact('cv'));
    }



    public function showApplications(Request $request)
    {
        $results = UserCv::query()
            ->when($request->has('nameCV'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->nameCV . '%');
            })
            ->when($request->has('experienceCV'), function ($query) use ($request) { // Note: sửa stateCV thành experienceCV
                $query->where('experience', $request->experienceCV);
            })
            ->get();

        return view('admin.home', compact('results'));
    }


    // fdjiidhsufgigijp[]

    public function showProfileForAD($user_id)
    {
        $profile = \App\Models\UserCv::where('user_id', $user_id)->first();

        if (!$profile) {
            return redirect()->route('errorPage')->with('error', 'Không tìm thấy người dùng!');
        }

        return view('showProfileForAD', compact('profile'));
    }
}
