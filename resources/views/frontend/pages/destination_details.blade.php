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
                                    @if(session()->get('language') == 'arabic')
                                    <h4>ابحث هنا</h4>
                                    @else
                                    <h4>Search Here</h4>
                                    @endif
                                </div>
                                <div class="widget-body">
                                    <form action="{{ route('search.wise.destination') }}"  method="POST" id="blog-sidebar-search">
                                        @csrf
                                        <div class="search-input-group">
                                            <input type="search" name="search" placeholder="Your Destination" />
                                            <button type="submit">@if(session()->get('language') == 'arabic') بحث @else SEAECH @endif</button>
                                        </div>
                                    </form>
                                </div>
                            </aside>
                            @php
                                $all_cat = \App\Models\Category::limit(8)->get();
                            @endphp
                            <aside class="package-widget widget-tour-categoris mt-30">
                                <div class="widget-title">
                                    <h4>Category</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @foreach($all_cat as $cat)
                                        <li class="category-check">
                                            @if(session()->get('language') == 'arabic')
                                            <a class="des_cat" href="{{  asset('/category-wise-destination/'.$cat->id.'/'.$cat->name_en) }}" target="_blank" rel="noopener noreferrer">{{ $cat->name_ar }}</a>
                                            @else
                                            <a class="des_cat" href="{{ asset('/category-wise-destination/'.$cat->id.'/'.$cat->name_en) }}" target="_blank" rel="noopener noreferrer">{{ $cat->name_en }}</a>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>

                            @php
                                $all_des = \App\Models\Destination::where('status', true)->latest()->get();
                            @endphp
                            <aside class="package-widget widget-gallary mt-30">
                                <div class="widget-title">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>الوجهة الجديدة</h4>
                                    @else
                                    <h4>New Destination</h4>
                                    @endif
                                </div>
                                <ul class="widget-body">
                                    @foreach($all_des as $des)
                                    <li>
                                        <a href="{{ URL::to($des->image) }}" data-fancybox="gallery" data-caption="Caption Here">
                                            <img src="{{ URL::to($des->image) }}" alt="" />
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
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
