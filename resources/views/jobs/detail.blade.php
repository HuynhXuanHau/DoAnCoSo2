@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-8 col-md-7">
            <div class="detail-job border rounded p-4 bg">
                <div class="detail-job-content">
                    <h1 class="detail-job-tittle mb-3">{{ $job->position ?? 'No information' }}</h1>

                    <div class="row">
                        <div class="col-8 col-lg-12 pr-0 applyBtn rounded text-center">
                            <button class="btn w-100 btn-apply-cv" id="applyCV"
                                data-user-id="{{ auth()->user()->id ?? '' }}"
                                data-name-bs="{{ $job->name }}"
                                data-position="{{ $job->position }}"
                                data-img="{{ $job->img }}"
                                data-language="{{ $job->language }}"
                                data-area="{{ $job->address }}"
                                data-experience="{{ $job->experience }}">
                                Apply Your CV Now!
                            </button>
                        </div>
                    </div>
                </div>

                <div class="detail-job-desc mt-4">
                    <h4 class="header-job-description">Thông tin ứng tuyển</h4>
                    <p>Mức Lương: {{ $job->salary ?? 'No information' }}</p>
                    <p>Ngôn ngữ: {{ $job->language ?? 'No information' }}</p>
                    <p>Thời hạn tuyển dụng: {{ $job->availableApply ?? 'No information' }}</p>
                    <p>Thời gian làm việc: {{ $job->worktime ?? 'No information' }}</p>
                    <p>Kinh nghiệm: {{ $job->experience ?? 'No information' }}</p>
                    <h4 class="header-job-description mt-4">Quyền Lợi</h4>
                    <p>{!! nl2br(e($job->benefits)) !!}</p>
                    <h4 class="header-job-description mt-4">Mô tả công việc</h4>
                    <p>{!! nl2br(e($job->description)) !!}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-5 mt-4">
            <div class="detail-job border rounded p-4 company-in4 mb-3">
                <div class="group-image text-center">
                    <img class="image-company img-fluid" src="{{ $job->img }}">
                </div>
                <h5 class="text-center pb-2">{{ $job->name ?? 'No information' }}</h5>
                <p class="mb-2">Địa chỉ: {{ $job->address ?? 'No information' }}</p>
                <a href="{{ route('business.detail', ['business' => $job->name]) }}"
                    class="btn btn-outline-primary w-100">Về Chúng Tôi</a>
            </div>
        </div>
    </div>
</div>
@endsection