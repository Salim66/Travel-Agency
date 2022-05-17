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
                    <h2 class="breadcrumb-title">حزمة من التفاصيل</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">حزمة من التفاصيل</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Package Details</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Package details</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="package-details-wrapper pt-76">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="tour-package-details">
                            <div class="pd-header">
                                <div class="pd-top row row-cols-lg-4 row-cols-md-2 row-cols-2 gy-4">
                                    <div class="col">
                                        <div class="pd-single-info">
                                            <div class="info-icon">
                                                <img src="{{ URL::to('frontend/assets/images/icons/pd1.svg') }}" alt="" />
                                            </div>
                                            <div class="info">
                                                @if(session()->get('language') == 'arabic')
                                                <h6>المدة الزمنية</h6>
                                                <span>{{ $data->package_duration }}</span>
                                                @else
                                                <h6>Duration</h6>
                                                <span>{{ $data->package_duration }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="pd-single-info">
                                            <div class="info-icon">
                                                <img src="{{ URL::to('frontend/assets/images/icons/pd2.svg') }}" alt="" />
                                            </div>
                                            <div class="info">
                                                @if(session()->get('language') == 'arabic')
                                                <h6>نوع الجولة</h6>
                                                <span>{{ $data->categories->name_ar }}</span>
                                                @else
                                                <h6>Tour Type</h6>
                                                <span>{{ $data->categories->name_en }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="pd-single-info">
                                            <div class="info-icon">
                                                <img src="{{ URL::to('frontend/assets/images/icons/pd3.svg') }}" alt="" />
                                            </div>
                                            <div class="info">
                                                @if(session()->get('language') == 'arabic')
                                                <h6>حجم المجموعة</h6>
                                                <span>{{ $data->package_group_size }} الناس</span>
                                                @else
                                                <h6>Group Size</h6>
                                                <span>{{ $data->package_group_size }} People</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="pd-single-info">
                                            <div class="info-icon">
                                                <img src="{{ URL::to('frontend/assets/images/icons/pd4.svg') }}" alt="" />
                                            </div>
                                            <div class="info">
                                                @if(session()->get('language') == 'arabic')
                                                <h6>مرشد سياحي</h6>
                                                <span>{{ $data->package_tour_guide }} الناس</span>
                                                @else
                                                <h6>Tour Guide</h6>
                                                <span>{{ $data->package_tour_guide }} People</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-thumb">
                                    <img src="{{ URL::to($data->package_image) }}" alt="" />
                                </div>
                                <div class="header-bottom">
                                    <div class="pd-lavel d-flex justify-content-between align-items-center flex-wrap gap-2">
                                        @if(session()->get('language') == 'arabic')
                                        <h5 class="location"><i class="bi bi-geo-alt"></i> {{ $data->districts->district_name_ar }}, {{ $data->countries->country_name_ar }}</h5>
                                        @else
                                        <h5 class="location"><i class="bi bi-geo-alt"></i> {{ $data->districts->district_name_en }}, {{ $data->countries->country_name_en }}</h5>
                                        @endif
                                        <ul class="d-flex align-items-center rating">
                                            @for($i=0; $i<$data->package_rating; $i++)
                                            <li><i class="bi bi-star-fill"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    @if(session()->get('language') == 'arabic')
                                    <h2 class="pd-title">جسر البوابة الذهبية في سان فرانسيسكو.</h2>
                                    @else
                                    <h2 class="pd-title">San Francisco Golden Gate Bridge.</h2>
                                    @endif
                                </div>
                            </div>
                            <div class="package-details-tabs">
                                <ul class="nav nav-pills tab-switchers gap-xxl-4 gap-3" id="pills-tab" role="tablist">
                                    @if(session()->get('language') == 'arabic')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-package1" data-bs-toggle="pill" data-bs-target="#pill-body1" type="button" role="tab" aria-controls="pill-body1" aria-selected="true">
                                            <i class="bi bi-info-lg"></i> معلومة
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-package2" data-bs-toggle="pill" data-bs-target="#pill-body2" type="button" role="tab" aria-controls="pill-body2" aria-selected="false">
                                            <i class="bi bi-file-earmark-spreadsheet"></i> خطة السفر
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-package3" data-bs-toggle="pill" data-bs-target="#pill-body3" type="button" role="tab" aria-controls="pill-body3" aria-selected="false">
                                            <i class="bi bi-images"></i> معرض الجولات
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-package4" data-bs-toggle="pill" data-bs-target="#pill-body4" type="button" role="tab" aria-controls="pill-body4" aria-selected="false">
                                            <i class="bi bi-geo-alt"></i> موقع
                                        </button>
                                    </li>
                                    @else
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-package1" data-bs-toggle="pill" data-bs-target="#pill-body1" type="button" role="tab" aria-controls="pill-body1" aria-selected="true">
                                            <i class="bi bi-info-lg"></i> Information
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-package2" data-bs-toggle="pill" data-bs-target="#pill-body2" type="button" role="tab" aria-controls="pill-body2" aria-selected="false">
                                            <i class="bi bi-file-earmark-spreadsheet"></i> Travel Plan
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-package3" data-bs-toggle="pill" data-bs-target="#pill-body3" type="button" role="tab" aria-controls="pill-body3" aria-selected="false">
                                            <i class="bi bi-images"></i> Tour Gallary
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-package4" data-bs-toggle="pill" data-bs-target="#pill-body4" type="button" role="tab" aria-controls="pill-body4" aria-selected="false">
                                            <i class="bi bi-geo-alt"></i> Location
                                        </button>
                                    </li>
                                    @endif
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active package-info-tab mt-3" id="pill-body1" role="tabpanel" aria-labelledby="pills-package1">
                                        @if(session()->get('language') == 'arabic')
                                        <h3 class="d-subtitle">حزمة من التفاصيل</h3>
                                        <p>
                                            {!! htmlspecialchars_decode($data->information_details_ar) !!}
                                        </p>
                                        @else
                                        <h3 class="d-subtitle">Package Details</h3>
                                        <p>
                                            {!! htmlspecialchars_decode($data->information_details_en) !!}
                                        </p>
                                        @endif

                                        <table class="table package-info-table mb-0">
                                            <tbody>
                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>وجهة</th>
                                                    <td>{{ $data->destination_ar }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Destination</th>
                                                    <td>{{ $data->destination_en }}</td>
                                                </tr>
                                                @endif

                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>الاقلاع</th>
                                                    <td>{{ $data->depature_ar }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Depature</th>
                                                    <td>{{ $data->depature_en }}</td>
                                                </tr>
                                                @endif

                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>وقت المغادرة</th>
                                                    <td>{{ $data->departure_time }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Departure Time</th>
                                                    <td>{{ $data->departure_time }}</td>
                                                </tr>
                                                @endif

                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>وقت العودة</th>
                                                    <td>{{ $data->return_time }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Return Time</th>
                                                    <td>{{ $data->return_time }}</td>
                                                </tr>
                                                @endif

                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>متضمن</th>
                                                    <td>
                                                        <ul class="included-list">
                                                            {!! htmlspecialchars_decode($data->included_ar) !!}
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Included</th>
                                                    <td>
                                                        <ul class="included-list">
                                                            <ul class="included-list">
                                                                {!! htmlspecialchars_decode($data->included_en) !!}
                                                            </ul>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endif

                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>مستبعد</th>
                                                    <td>
                                                        <ul class="excluded-list">
                                                            {!! htmlspecialchars_decode($data->excluded_ar) !!}
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Excluded</th>
                                                    <td>
                                                        <ul class="excluded-list">
                                                            {!! htmlspecialchars_decode($data->excluded_en) !!}
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endif

                                                @if(session()->get('language') == 'arabic')
                                                <tr>
                                                    <th>السفر مع</th>
                                                    <td>{{ $data->travel_with_ar }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Travel With</th>
                                                    <td>{{ $data->travel_with_en }}</td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                        <div class="rating-overview">
                                            @if(session()->get('language') == 'arabic')
                                            <h3 class="d-subtitle">نظرة عامة</h3>
                                            <div class="rating-overview-row row g-0">
                                                <div class="col-lg-4 col-md-5 col-sm-5">
                                                    <div class="total-rating d-flex justify-content-center align-items-center flex-column h-100">
                                                        <h3>10.00</h3>
                                                        <h5>ممتاز</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7">
                                                    <div class="rating-info">
                                                        <div class="rating-box">
                                                            <h6>إقامة <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>المواصلات <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>راحة <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>حسن الضيافة <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>غذاء <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <h3 class="d-subtitle">Overview</h3>
                                            <div class="rating-overview-row row g-0">
                                                <div class="col-lg-4 col-md-5 col-sm-5">
                                                    <div class="total-rating d-flex justify-content-center align-items-center flex-column h-100">
                                                        <h3>10.00</h3>
                                                        <h5>Excellent</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7">
                                                    <div class="rating-info">
                                                        <div class="rating-box">
                                                            <h6>Accommodation <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>Transport <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>Comfort <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>Hospitality <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                        <div class="rating-box">
                                                            <h6>Food <span>5.0</span></h6>
                                                            <div class="rating-bar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="comment-section">
                                            <div id="disqus_thread"></div>
                                            <script>
                                                /**
                                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                                /*
                                                var disqus_config = function () {
                                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                                };
                                                */
                                                (function() { // DON'T EDIT BELOW THIS LINE
                                                var d = document, s = d.createElement('script');
                                                s.src = 'https://travel-agency-2.disqus.com/embed.js';
                                                s.setAttribute('data-timestamp', +new Date());
                                                (d.head || d.body).appendChild(s);
                                                })();
                                            </script>
                                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade package-plan-tab tab-body mt-3" id="pill-body2" role="tabpanel" aria-labelledby="pills-package2">
                                        @if(session()->get('language') == 'arabic')
                                        <h3 class="d-subtitle">تفاصيل</h3>
                                        <p>
                                            {!! htmlspecialchars_decode($data->package_travel_plan_detials_ar) !!}
                                        </p>
                                        @else
                                        <h3 class="d-subtitle">Details</h3>
                                        <p>
                                            {!! htmlspecialchars_decode($data->package_travel_plan_detials_en) !!}
                                        </p>
                                        @endif
                                    </div>

                                    @php
                                        $all_gallery = json_decode($data->package_tour_gallery);
                                    @endphp
                                    <div class="tab-pane fade package-gallary-tab mt-3" id="pill-body3" role="tabpanel" aria-labelledby="pills-package3">
                                        <div class="row g-4">
                                            @foreach($all_gallery as $img)
                                            <div class="col-6">
                                                <div class="package-gallary-item">
                                                    <a href="{{ URL::to($img) }}" data-fancybox="gallery" data-caption="Caption Here"><img src="{{ URL::to($img) }}" alt="" /></a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade package-location-tab mt-3" id="pill-body4" role="tabpanel" aria-labelledby="pills-package4">
                                        <div class="mapouter">
                                            <div class="gmap_canvas">
                                                {{-- <iframe id="gmap_canvas" src="{{ $data->package_location_link }}"></iframe> --}}
                                                {!! $data->package_location_link !!}
                                                <a href="https://123movies-to.org/"></a><br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="package-sidebar">
                            <aside class="package-widget-style-2 widget-form mt-30">
                                <div class="widget-title text-center d-flex justify-content-between">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>احجز هذه الجولة</h4>
                                    <h3 class="widget-lavel">${{ $data->package_amount }} <span>للشخص الواحد</span></h3>
                                    @else
                                    <h4>Book This Tour</h4>
                                    <h3 class="widget-lavel">${{ $data->package_amount }} <span>Per Person</span></h3>
                                    @endif
                                </div>
                                <div class="widget-body">
                                    <form action="{{ route('package.book.form') }}" method="post" id="booking-form">
                                        @csrf

                                        <input type="hidden" name="package_id" value="{{ $data->id }}">

                                        <div class="booking-form-wrapper">
                                            <div class="custom-input-group">
                                                <input name="name" type="text" placeholder="Your Full Name" id="name" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="custom-input-group">
                                                <input name="email" type="email" placeholder="Your Email" id="email" />
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="custom-input-group">
                                                <input name="phone" type="tel" placeholder="Phone" id="phone" />
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-input-group">
                                                        <i class="bi bi-chevron-down"></i>
                                                        <select name="adult" id="truist-adult">
                                                            <option selected disabled>Adult</option>
                                                            <option value="1"> 1</option>
                                                            <option value="2"> 2</option>
                                                            <option value="3"> 3</option>
                                                            <option value="4"> 4</option>
                                                            <option value="5"> 5</option>
                                                            <option value="6"> 6</option>
                                                            <option value="7"> 7</option>
                                                            <option value="8"> 8</option>
                                                            <option value="9"> 9</option>
                                                            <option value="10"> 10</option>
                                                        </select>
                                                        @error('adult')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-input-group">
                                                        <i class="bi bi-chevron-down"></i>
                                                        <select name="child" id="tourist-child">
                                                            <option selected disabled>Child</option>
                                                            <option value="1"> 1</option>
                                                            <option value="2">2</option>
                                                            <option value="3"> 3</option>
                                                            <option value="4"> 4</option>
                                                            <option value="5"> 5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom-input-group">
                                                <i class="bi bi-calendar3"></i>
                                                <input placeholder="Select your date" type="text" name="date" id="datepicker2" value="" class="calendar" />
                                                @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="custom-input-group">
                                                <textarea name="message" cols="20" rows="7" placeholder="Your message"></textarea>
                                            </div>
                                            <div class="custom-input-group">
                                                <div class="submite-btn">

                                                    <button type="submit">
                                                        @if(session()->get('language') == 'arabic')
                                                        احجز الآن
                                                        @else
                                                        Book Now
                                                        @endif
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </aside>

                            @php
                                $all_data = \App\Models\Package::where('package_holiday_offer', 1)->latest()->get();
                            @endphp
                            <aside class="package-widget-style-2 widget-recent-package-entries mt-30">
                                @if(session()->get('language') == 'arabic')
                                <div class="widget-title text-center">
                                    <h4>عرض الحزمة</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>

                                        @foreach($all_data as $data)
                                        <li class="package-sm">
                                            <div class="thumb">
                                                <a href="{{ route('package-details', $data->package_title_slug) }}">
                                                    <img src="{{ URL::to($data->package_image) }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h6><a href="{{ route('package-details', $data->package_title_slug) }}">{{ $data->package_title_ar }}</a></h6>
                                                <div class="price">
                                                    <span>من عند</span>
                                                    <h6>${{ $data->package_amount }} <span>للشخص الواحد</span></h6>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                                @else
                                <div class="widget-title text-center">
                                    <h4>Offer Package</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>

                                        @foreach($all_data as $data)
                                        <li class="package-sm">
                                            <div class="thumb">
                                                <a href="{{ route('package-details', $data->package_title_slug) }}">
                                                    <img src="{{ URL::to($data->package_image) }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h6><a href="{{ route('package-details', $data->package_title_slug) }}">{{ $data->package_title_en }}</a></h6>
                                                <div class="price">
                                                    <span>From</span>
                                                    <h6>${{ $data->package_amount }} <span>Per Person</span></h6>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach


                                    </ul>
                                </div>
                                @endif
                            </aside>
                            {{-- <aside class="widget-banner mt-30">
                                <a href="#">
                                    <img src="{{ URL::to('frontend/assets/images/banner/sidebar-banner.png') }}" alt="" class="img-fluid" />
                                </a>
                            </aside> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
