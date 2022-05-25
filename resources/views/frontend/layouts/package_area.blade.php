@php
    $all_data = \App\Models\Package::where('package_holiday_offer', null)->latest()->limit(6)->get();
@endphp
<div class="package-area package-style-one pt-110">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-head-alpha">
                    @if(session()->get('language') == 'arabic')
                    <h2>حزمة جولة شعبية</h2>
                    @else
                    <h2>Popular Tour Package</h2>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="package-btn text-lg-end">
                    @if(session()->get('language') == 'arabic')
                    <a href="{{ route('all.package') }}" class="button-fill-primary">مشاهدة الكل جولة</a>
                    @else
                    <a href="{{ route('all.package') }}" class="button-fill-primary">View All Tour</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row g-4">

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
                                <h6 class="package-h-3">${{ $data->package_amount_adult }} <span><small>شخص بالغ</small></span></h6>
                                @if($data->package_amount_child != null)
                                <h6>${{ $data->package_amount_child }} <span><small>لكل طفل</small></span></h6>
                                @endif
                                @else
                                <span>From</span>
                                <h6 class="package-h-1">${{ $data->package_amount_adult }} <span><small>Adult Person</small></span></h6><br>
                                @if($data->package_amount_child != null)
                                <h6 class="package-h-2">${{ $data->package_amount_child }} <span><small>Per Child</small></span></h6>
                                @endif
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
