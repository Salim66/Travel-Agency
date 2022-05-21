<!DOCTYPE html>
<html lang="en">

    @include('frontend.layouts.head')

    <body>
        @include('frontend.layouts.pre_loader')

        @include('frontend.layouts.search')

        @include('frontend.layouts.category')

        @include('frontend.layouts.top_bar')

        @include('frontend.layouts.header')

        <div class="breadcrumb breadcrumb-style-one">
            <div class="container">
                @if(session()->get('language') == 'arabic')
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">معلومات عنا</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">معلومات عنا</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">About Us</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="about-main-wrappper pt-100">
            <div class="container">
                <div class="about-tab-wrapper">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="about-tab-image-grid text-center">
                                <div class="about-video d-inline-block">
                                    <img src="{{ URL::to($data->image_one) }}" alt="" />
                                </div>
                                <div class="row float-images g-4">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="about-image">
                                            <img src="{{ URL::to($data->image_two) }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="about-image">
                                            <img src="{{ URL::to($data->image_three) }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-5 mt-lg-0">
                            <div class="about-tab-wrap">
                                @if(session()->get('language') == 'arabic')
                                <h2 class="about-wrap-title">حول شركتنا و <span>مانكون</span> عرض.</h2>
                                @else
                                <h2 class="about-wrap-title">About Our Company And <span>What We Are</span> Offer.</h2>
                                @endif
                                <div class="about-tab-switcher">
                                    @if(session()->get('language') == 'arabic')
                                    <ul class="nav nav-pills mb-3 justify-content-md-between justify-content-center" id="about-tab-pills" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link active" id="pills-about1" data-bs-toggle="pill" data-bs-target="#about-pills1" role="tab" aria-controls="about-pills1" aria-selected="true">
                                                <h3>{{ $data->yours_experience }}</h3>
                                                <h6>سنوات خبرة</h6>
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link" id="pills-about2" data-bs-toggle="pill" data-bs-target="#about-pills2" role="tab" aria-controls="about-pills2" aria-selected="false">
                                                <h3>{{ $data->your_guide }}+</h3>
                                                <h6>مرشد سياحي</h6>
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link" id="pills-about3" data-bs-toggle="pill" data-bs-target="#about-pills3" role="tab" aria-controls="about-pills3" aria-selected="false">
                                                <h3>{{ $data->travelar_connect }}+</h3>
                                                <h6>ترافيلار كونيكت</h6>
                                            </div>
                                        </li>
                                    </ul>
                                    @else
                                    <ul class="nav nav-pills mb-3 justify-content-md-between justify-content-center" id="about-tab-pills" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link active" id="pills-about1" data-bs-toggle="pill" data-bs-target="#about-pills1" role="tab" aria-controls="about-pills1" aria-selected="true">
                                                <h3>{{ $data->yours_experience }}</h3>
                                                <h6>Years Experience</h6>
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link" id="pills-about2" data-bs-toggle="pill" data-bs-target="#about-pills2" role="tab" aria-controls="about-pills2" aria-selected="false">
                                                <h3>{{ $data->your_guide }}+</h3>
                                                <h6>Tour Guide</h6>
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link" id="pills-about3" data-bs-toggle="pill" data-bs-target="#about-pills3" role="tab" aria-controls="about-pills3" aria-selected="false">
                                                <h3>{{ $data->travelar_connect }}+</h3>
                                                <h6>Travelar Connect</h6>
                                            </div>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                                <div class="tab-content about-tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="about-pills1" role="tabpanel" aria-labelledby="pills-about1">
                                        <p>
                                            @if(session()->get('language') == 'arabic')
                                            {!! htmlspecialchars_decode($data->description_ar) !!}
                                            @else
                                            {!! htmlspecialchars_decode($data->description_en) !!}
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

        @include('frontend.layouts.testimonial_area')

        @include('frontend.layouts.guide_area')

        @include('frontend.layouts.blog_area')

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
