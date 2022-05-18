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
                    <h2 class="breadcrumb-title">تفاصيل الوجهة</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">تفاصيل الوجهة</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Destination Details</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Destination Details</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="destination-details-wrapper pt-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="destination-details">
                            <div class="dd-thumb">
                                <img src="{{ URL::to($data->image) }}" alt="" />
                            </div>
                            <div class="dd-body">
                                @if(session()->get('language') == 'arabic')
                                <h3 class="dd-subtitle">{{ $data->title_ar }}</h3>
                                <p>
                                   {!! htmlspecialchars_decode($data->detials_en) !!}
                                </p>
                                @else
                                <h3 class="dd-subtitle">{{ $data->title_en }}</h3>
                                <p>
                                   {!! htmlspecialchars_decode($data->detials_en) !!}
                                </p>
                                @endif
                                <div class="destination-overview-table">
                                    @if(session()->get('language') == 'arabic')
                                    <h3 class="dd-subtitle">ملخص</h3>
                                    @else
                                    <h3 class="dd-subtitle">Overview</h3>
                                    @endif
                                    <table class="table overview-table">
                                        <tbody>
                                            @if(session()->get('language') == 'arabic')
                                            <tr>
                                                <th>وجهة</th>
                                                <td>{{ $data->destination_ar }}</td>
                                            </tr>
                                            <tr>
                                                <th>مقال</th>
                                                <td>{{ $data->departure_ar }}</td>
                                            </tr>
                                            <tr>
                                                <th>وقت المغادرة</th>
                                                <td>{{ $data->departure_time }}</td>
                                            </tr>
                                            <tr>
                                                <th>وقت العودة</th>
                                                <td>{{ $data->return_time }}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <th>Destination</th>
                                                <td>{{ $data->destination_en }}</td>
                                            </tr>
                                            <tr>
                                                <th>Departure</th>
                                                <td>{{ $data->departure_en }}</td>
                                            </tr>
                                            <tr>
                                                <th>Departure Time</th>
                                                <td>{{ $data->departure_time }}</td>
                                            </tr>
                                            <tr>
                                                <th>Return Time</th>
                                                <td>{{ $data->return_time }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="destination-map">
                                    <h3 class="dd-subtitle">Map</h3>
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            {!! $data->destination_map_link !!}
                                            <a href="https://123movies-to.org/"></a>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="package-sidebar">
                            <aside class="package-widget widget-search">
                                <div class="widget-title">
                                    <h4>Search Here</h4>
                                </div>
                                <div class="widget-body">
                                    <form action="#" method="post" id="blog-sidebar-search">
                                        <div class="search-input-group">
                                            <input type="search" placeholder="Your Destination" />
                                            <button type="submit">SEAECH</button>
                                        </div>
                                    </form>
                                </div>
                            </aside>
                            <aside class="package-widget widget-tour-categoris mt-30">
                                <div class="widget-title">
                                    <h4>Category</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li class="category-check">
                                            <label class="form-check-label" for="cate"> <i class="bi bi-chevron-double-right"></i> New York City </label>
                                            <input class="form-check-input" type="checkbox" id="cate" />
                                        </li>
                                        <li class="category-check">
                                            <label class="form-check-label" for="cate2"> <i class="bi bi-chevron-double-right"></i>Adventure Tour </label>
                                            <input class="form-check-input" type="checkbox" id="cate2" />
                                        </li>
                                        <li class="category-check">
                                            <label class="form-check-label" for="cate3"> <i class="bi bi-chevron-double-right"></i> Couple Tour </label>
                                            <input class="form-check-input" type="checkbox" id="cate3" />
                                        </li>
                                        <li class="category-check">
                                            <label class="form-check-label" for="cate4"> <i class="bi bi-chevron-double-right"></i> Village Tour </label>
                                            <input class="form-check-input" type="checkbox" id="cate4" />
                                        </li>
                                        <li class="category-check">
                                            <label class="form-check-label" for="cate5"> <i class="bi bi-chevron-double-right"></i>Group Tour </label>
                                            <input class="form-check-input" type="checkbox" id="cate5" />
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                            <aside class="package-widget widget-gallary mt-30">
                                <div class="widget-title">
                                    <h4>New Destination</h4>
                                </div>
                                <ul class="widget-body">
                                    <li>
                                        <a href="assets/images/gallary/sb-gallary-1.png" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="assets/images/gallary/sb-gallary-1.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/images/gallary/sb-gallary-2.png" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="assets/images/gallary/sb-gallary-2.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/images/gallary/sb-gallary-3.png" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="assets/images/gallary/sb-gallary-3.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/images/gallary/sb-gallary-4.png" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="assets/images/gallary/sb-gallary-4.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/images/gallary/sb-gallary-5.png" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="assets/images/gallary/sb-gallary-5.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/images/gallary/sb-gallary-6.png" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="assets/images/gallary/sb-gallary-6.png" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="widget-banner mt-30">
                                <a href="#">
                                    <img src="assets/images/banner/sidebar-banner.png" alt="" class="img-fluid" />
                                </a>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
