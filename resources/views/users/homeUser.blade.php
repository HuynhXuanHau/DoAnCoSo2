<!-- resources/views/home.blade.php -->

@extends('layouts.appUser')
<!-- Include the navbar -->


@section('content')
<div class="container-fluid " style="width:100%">
    <div class="text-white max-h-100 d-block text-center align-items-center justify-content-center">
        <!-- <div class=" my-2 my-lg-0 text-center " style=""> -->
        <div class=" my-2 my-lg-0 text-center ">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="margin-bottom: 1px solid #000;">
                    <!-- #region  -->
                    <div class="carousel-item active" data-bs-interval="2500">
                        <img src="../public/images/carosel_Imgs/c7.png" class="d-block w-100;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-size: 5 0px; ">Uy tín tạo thương hiệu</h5>
                            <p style="font-size: 20px;">Hãy bắt đầu tìm công việc phù hợp với bạn thôi nào</p>
                        </div>
                    </div>
                    <div class=" carousel-item" data-bs-interval="2500">
                        <img src="../public/images/carosel_Imgs/c8.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Công việc đúng chuyên ngành</h5>
                            <p>Với sự hợp tác rất nhiều doanh nghiệp</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2500">
                        <img src="../public/images/carosel_Imgs/c6.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ở đây tuyển nhân sự IT</h5>
                            <p>Luôn có công việc tốt dành cho bạn</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- <h1>1000 + IT Jobs For Developers</h1>
                <p style="font-size: 20px;">Java - Python - C# - Frontend - Backend - Javascript - Business Analyst -
                    Designer - Tester</p>
            </div> -->
        </div>
        <!-- Bảng tìm kiếm -->
        <!-- <div class="container"> -->

        <!-- </div> -->

    </div>
    <form class="form_Find_Job text-white row g-3 " id="find_Job_Form" action="../Job_handle/job.php" method="post">
        <!-- Tìm kiếm theo công ty -->
        <h3 style="color: black; text-align:center; margin-bottom: 20px;">Tìm công việc của bạn tại đây!</h3>
        <div class="d-flex text-center justify-content-around" style="padding-left: 5% ; flex-wrap:wrap">
            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" style="background-color: #495579;" id="addon-wrapping"><i
                            class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" name="nameBusiness" class="form-control" placeholder="Nhập công ty cần tìm"
                        style="height:50px ;" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
            </div>


            <!-- Tìm kiếm theo ngôn ngữ -->
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <label class="input-group-text" style="background-color: #495579;" for="inputGroupSelect01"><i
                            class="fa fa-code" aria-hidden="true"></i></label>
                    <select class="form-select" id="inputGroupSelect01" style="height:50px;" name="language">
                        <option selected>Ngôn ngữ</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value=".NET">.NET</option>
                        <option value="Tester">Tester</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Business Analyst">Business Analyst</option>
                        <option value="thoivu">Thời Vụ</option>
                    </select>
                </div>
            </div>


            <!-- Tìm kiếm theo khu vực -->
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <label class="input-group-text" style="background-color: #495579;" for="inputGroupSelect01"><i
                            class="fa fa-map-marker sfa" aria-hidden="true"></i></label>
                    <select class="form-select" id="inputGroupSelect01" style="height:50px;" name="area">
                        <option selected>Khu vực làm việc</option>
                        <option value="Quận 1">Quận 1</option>
                        <option value="Quận 2">Quận 2</option>
                        <option value="Quận 3">Quận 3</option>
                        <option value="Quận 4">Quận 4</option>
                        <option value="Quận 5">Quận 5</option>
                        <option value="Quận 6">Quận 6</option>
                        <option value="Quận 7">Quận 7</option>
                        <option value="Quận 8">Quận 8</option>
                        <option value="Quận 9">Quận 9</option>
                        <option value="Quận 10">Quận 10</option>
                        <option value="Quận 11">Quận 11</option>
                        <option value="Quận 12">Quận 12</option>
                        <option value="Quận Tân Phú">Tân Phú</option>
                        <option value="Quận Tân Bình">Tân Bình</option>
                        <option value="Quận Thủ Đức">Thủ Đức</option>
                        <option value="Quận Bình Tân">Bình Tân</option>
                        <option value="Quận Gò Vấp">Gò Vấp</option>
                        <option value="Quận Bình Thạnh">Bình Thạnh</option>
                        <option value="Quận Phú Nhuận">Phú Nhuận</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="col-12 ">
                    <button type="submit" class="btn text-white"
                        style="background-color: #495579; height:50px; width: 100px;">Search</button>
                </div>
            </div>
        </div>
    </form>



    <!-- Sections for Employers and Job Opportunities -->
    <div class="container_Business bg">
        <div id="section2">
            <h3 class="text-center mb-4" style="color: black;">NHÀ TUYỂN DỤNG HÀNG ĐẦU</h3>
            <div class="container">
                <div class="row w-80%">
                    <!-- Include Business List Component -->

                    @include('business.list', ['businesses' => $businesses])
                </div>
            </div>
        </div>


    </div>


    <div class="container" id="section3">
        <!-- Blog IT -->
        <div class="row ">
            <div class="col-sm-4  " style="height: 480px;">
                <div class="card rounded">
                    <a href="#" class="text-decoration-none text-dark">
                        <img src="../public/images/blog-1.jpg" alt="Blog-1" width="100%" height="300px"
                            class=" rounded">
                        <div class="card-body">
                            <small>QUYỀN LỢI NGƯỜI XIN VIỆC</small>
                            <h5 class="card-title">Những điều cần chú ý khi đi xin việc làm và việc huẩn bị
                                nó
                                quan
                                trọng như thế nào</h5>
                            <p class="card-text">Một công ty muốn tuyển nhân sự chắc chắn sẽ phụ thuộc vào
                                nhiều
                                yếu
                                tố. Giữa nhiều người đến ...</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-4" style="height: 480px;">
                <div class="card rounded">
                    <a href="#" class="text-decoration-none text-dark">
                        <img src="../public/images/CV.jpg" alt="Blog-1" width="100%" height="300px" class=" rounded">
                        <div class="card-body">
                            <small>TẠO CV</small>
                            <h5 class="card-title">Làm thế nào để viết một bản CV hoàn chỉnh</h5>
                            <p class="card-text">Người ta cho rằng bản CV đầu tiên được viết bởi Leonardo Da
                                Vinci
                                cách đây 500 năm. Cho đến nay, mọi thứ đã có một chút thay đổi.
                                Một...</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-4" style="height: 480px;">
                <div class="card">
                    <a href="#" class="text-decoration-none text-dark">
                        <img src="../public/images/trangphuc.jpg" alt="Blog-1" width="100%" height="300px"
                            class="rounded">
                        <div class="card-body">
                            <small>TRANG PHỤC KHI ĐI XIN VIỆC</small>
                            <h5 class="card-title">Gợi ý các trang phục đi phỏng vấn xin việc chuẩn không
                                cần
                                chỉnh
                            </h5>
                            <p class="card-text">Bên cạnh việc lo lắng cách trả lời các câu hỏi phỏng vấn
                                xin
                                việc
                                thì lựa chọn trang phục khi đi phỏng vấn cũng là mối quan tâm
                                hàng đầu của các ứng viên...</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
@endsection