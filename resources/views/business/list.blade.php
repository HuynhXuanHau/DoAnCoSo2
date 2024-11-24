<div class="container">
    <div class="row">

        @foreach($businesses as $business)
        <div class="col-sm-3 mb-3">
            <div class="card m-1">
                <div class="card-body text-center">
                    <a href="{{ route('business.jobs', $business->id) }}" class="text-decoration-none">
                        <img src=" {{ asset('storage/' . $business->img) }}"
                            class="card-img-top m-3"
                            style="width:50%; height: 100px;"
                            alt="Logo {{ $business->name }}">
                        <h5 class="card-title text-center m-2" style="color: black;">
                            {{ $business->name }}
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>