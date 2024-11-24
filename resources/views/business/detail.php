@extends('layouts.app')

@section('content')
<div class="bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-7">
                <div class="detail-job border rounded p-4 bg-white m-4">
                    <div class="intro-company">
                        <div class="intro-company overflow-hidden d-flex bd-highlight">
                            <div class="flex-fill bd-highlight text-center">
                                <img src="{{ asset('storage/' . $business->img) }}" width="200px" alt="logo-{{ $business->name }}">
                            </div>
                            <div class="mx-3 flex-fill bd-highlight text-center">
                                <h1 class="detail-intro-tittle mb-3" style="color:rgb(19, 70, 52)">
                                    {{ $business->name }} Group
                                </h1>
                                <p class="lead" style="color:rgb(19, 70, 52)">
                                <h1>THÔNG TIN CHUNG</h1>
                                </p>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul style="list-style-type: none;">
                            <li class="active">Tên Công Ty: {{ $business->name }}</li>
                            <li class="active">Hotline: {{ $business->hotline }}</li>
                            <li class="active">Customer Email: {{ $business->customer_mail }}</li>
                            <li class="active">Official Website:
                                <a href="{{ $business->official_website }}" target="_blank">{{ $business->official_website }}</a>
                            </li>
                            <li class="active">Official Facebook:
                                <a href="{{ $business->official_facebook }}" target="_blank">{{ $business->official_facebook }}</a>
                            </li>
                        </ul>

                        <hr>
                        <div class="row justify-content-around">
                            <div class="col-4" style="width: 45%;">
                                <h5 class="text-center detail-intro-tittle m-0" style="color:rgb(19, 70, 52)">
                                    Quá trình hình thành và phát triển
                                </h5>
                                <p class="text-muted mb-0" style="white-space: pre-line;">
                                    @if (!empty($business->progress))
                                    @foreach (explode('-', $business->progress) as $progress)
                                    @if (!empty($progress))
                                    - {{ $progress }}<br>
                                    @endif
                                    @endforeach
                                    @else
                                    No information
                                    @endif
                                </p>
                            </div>

                            <div class="col-4" style="width: 45%;">
                                <h5 class="text-center detail-intro-tittle m-0" style="color:rgb(19, 70, 52)">
                                    Phạm vi hoạt động
                                </h5>
                                <p class="text-muted mb-0" style="white-space: pre-line;">
                                    @if (!empty($business->head_offices))
                                    @foreach (explode('-', $business->head_offices) as $office)
                                    @if (!empty($office))
                                    - {{ $office }}<br>
                                    @endif
                                    @endforeach
                                    @else
                                    No information
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection