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
                    <h2 class="breadcrumb-title">حزمة جولة</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">حزمة جولة</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Tour Package</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Tour Package</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="package-wrapper pt-80">
            <div class="container">
                <div class="row">

                    @foreach($all_data as $data)
                        <div class="col-lg-4 col-md-6">
                            <div class="package-card-alpha">
                                <div class="package-thumb">
                                    <a href="{{ route('package-details', $data->package_title_slug) }}"><img src="{{ URL::to($data->package_image) }}" alt="" /></a>
                                    <p class="card-lavel"><i class="bi bi-clock"></i> <span>{{ $data->package_duration }}</span></p>
                                </div>
                                <div class="package-card-body">
                                    @if(session()->get('language') == 'arabic')
                                    <h3 class="p-card-title"><a href="{{ route('package-details', $data->package_title_slug) }}">{{ $data->package_title_ar }}</a></h3>
                                    @else
                                    <h3 class="p-card-title"><a href="{{ route('package-details', $data->package_title_slug) }}">{{ $data->package_title_en }}</a></h3>
                                    @endif
                                    <div class="p-card-bottom">
                                        <div class="book-btn">
                                            @if(session()->get('language') == 'arabic')
                                            <a href="{{ route('package-details', $data->package_title_slug) }}">احجز الآن <i class="bx bxs-right-arrow-alt"></i></a>
                                            @else
                                            <a href="{{ route('package-details', $data->package_title_slug) }}">Book Now <i class="bx bxs-right-arrow-alt"></i></a>
                                            @endif
                                        </div>
                                        <div class="p-card-info">
                                            @if(session()->get('language') == 'arabic')
                                            <span>من عند</span>
                                            <h6>${{ $data->package_amount }} <span>لكل شخص</span></h6>
                                            @else
                                            <span>From</span>
                                            <h6>${{ $data->package_amount }} <span>Per Person</span></h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
