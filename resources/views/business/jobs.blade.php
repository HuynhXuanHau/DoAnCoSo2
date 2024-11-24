@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $business->name }}</h2>
    <img src="{{ asset('storage/' . $business->img) }}" alt="Logo {{ $business->name }}" style="width:100px; height:100px;">
    <p>Area: {{ $business->area }}</p>
    <p>Language: {{ $business->language }}</p>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card flex-md-row box-shadow h-md-100 border border-light border-4">
                <img class="card-img-right flex-auto d-none d-md-block"
                    style="width: 110px; height: 110px;"
                    src="{{ asset('storage/' . $job->img) }}"
                    alt="{{ $job->position }}">
                <div class="card-body align-items-start pt-2 pb-1">
                    <h5 class="mb-0 job">
                        <a class="text-dark" href="#" style="text-decoration: none;">{{ $job->position }}</a>
                        <div class="btn btn-sm btn-outline pl-0 pr-4 text-muted float-right" style="font-weight: 500;">
                            <i class="bi bi-suit-heart"></i>
                        </div>
                    </h5>
                    <div class="mb-0 mt-2 text-muted d-flex justify-content-between">
                        <span>Salary: {{ $job->salary }}</span>
                        <span class="float-right">Experience: {{ $job->experience }}</span>
                    </div>
                    <div class="mb-0 mt-2 text-muted d-flex justify-content-between">
                        <span>Available: {{ $job->availableApply }}</span>
                        <button class="btn btn-secondary save_job" value="{{ $job->id }}">Save work</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection