@php
    $all_data = \App\Models\Package::where('package_holiday_offer', true)->latest()->limit(6)->get();
@endphp
<div class="package-area package-style-one pt-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    @if(session()->get('language') == 'arabic')
                    <h2>اختر عرض العطلة</h2>
                    @else
                    <h2>Choose Holiday Offer</h2>
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
        <div class="row text-center">
            <div class="package-bottom-btn">
                @if(session()->get('language') == 'arabic')
                <a href="{{ route('holiday.packages') }}" class="button-fill-primary">مشاهدة الكل العروض</a>
                @else
                <a href="{{ route('holiday.packages') }}" class="button-fill-primary">View All Offer</a>
                @endif
            </div>
        </div>
    </div>
</div>
