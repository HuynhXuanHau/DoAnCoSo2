@extends('layouts.app')

@section('content')
<div class="bg">
    <h3 class="text-center p-4"><b>DANH SÁCH CÁC CÔNG VIỆC ĐÃ NỘP CV</b></h3>
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <form class="col-md-9 col-sm-12 overflow-auto" style="height: 750px;">
                <div class="card">
                    <div class="card-body m-3">
                        @foreach ($jobs as $job)
                        <div class="border border-5 border-light m-3 rounded bg-white">
                            <div class="d-flex m-3">
                                <!-- Job Image -->
                                <div>
                                    <img src="{{ $job->img }}" class="card-img-top m-3" style="width:150px; height: 100px;" alt="Logo">
                                </div>
                                <div>
                                    <!-- Job Details -->
                                    <a href="#" class="text-decoration-none text-dark">
                                        <h5>{{ $job->position }}</h5>
                                        <div>{{ $job->name }}</div>
                                        <div>{{ $job->language ?? 'Python' }}</div>
                                        <div class="d-flex">
                                            <p class="my-1 me-2" style="color: red;">Salary: 400$</p>
                                            <p class="m-1">Experience: {{ $job->experience }}</p>
                                            <p class="m-1" style="color: green;">Available: {{ $job->available }}</p>
                                        </div>
                                    </a>
                                </div>
                                <!-- Delete Button for Loved Jobs -->
                                @if (request()->has('loveWork'))
                                <div class="text-end ms-auto p-2 bd-highlight">
                                    <button style="background-color: white; border: red; width: 28px; height: 28px;" class="deleteLoveJob" value="{{ $job->id }}"><i class="fa-solid fa-xmark text-black"></i></button>
                                    <div class="my-4">Area: {{ $job->area }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>

            <!-- Right Column -->
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>DANH MỤC</h5>
                    </div>
                    <div class="card-body">
                        <div class="my-1 mx-3"><a href="{{ route('profile.show') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-user m-1"></i> Hồ sơ cá nhân</a></div>
                        <div class="my-1 mx-3"><a href="{{ route('CV.statusCV') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-briefcase m-1"></i> Việc làm chờ duyệt</a></div>
                        <div class="my-1 mx-3"><a href="{{ route('CV.statusCV', ['interview' => true]) }}" class="text-decoration-none text-dark"><i class="fa-solid fa-briefcase m-1"></i> Việc làm chờ phỏng vấn</a></div>
                        <div class="my-1 mx-3"><a href="{{ route('CV.statusCV', ['loveWork' => true]) }}" class="text-decoration-none text-dark"><i class="fa-solid fa-briefcase m-1"></i> Việc làm yêu thích</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".deleteLoveJob").click(function() {
            const jobId = $(this).val();
            $.post("{{ url('/CV/deleteLoveJob') }}", {
                idLovingJob: jobId,
                _token: '{{ csrf_token() }}'
            }, function(response) {
                if (response == "Delete loving job successfully!") {
                    location.reload();
                } else {
                    alert(response);
                }
            });
        });
    });
</script>
@endsection