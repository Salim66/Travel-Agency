@php
    $all_data = \App\Models\Destination::where('status', true)->get();
@endphp

<div class="destination-area destination-style-one pt-110">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-head-alpha">
                    @if(session()->get('language') == 'arabic')
                    <h2>اكتشف أفضل وجهة</h2>
                    @else
                    <h2>Explore Top Destination</h2>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="slider-arrows text-center d-lg-flex d-none justify-content-end mb-3">
                    <div class="testi-prev custom-swiper-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="bi bi-chevron-left"></i></div>
                    <div class="testi-next custom-swiper-next" tabindex="0" role="button" aria-label="Next slide"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 overflow-hidden">
        <div class="swiper destination-slider-one">
            <div class="swiper-wrapper">
                @foreach($all_data as $data)
                <div class="swiper-slide">
                    <div class="destination-card-style-one">
                        <div class="d-card-thumb">
                            <a href="{{ route('destination-details', $data->title_slug) }}"><img src="{{ URL::to($data->image) }}" alt="" /></a>
                        </div>
                        <div class="d-card-overlay">
                            <div class="d-card-content">
                                @if(session()->get('language') == 'arabic')
                                <h3 class="d-card-title"><a href="{{ route('destination-details', $data->title_slug) }}">{{ $data->title_ar }}</a></h3>
                                @else
                                <h3 class="d-card-title"><a href="{{ route('destination-details', $data->title_slug) }}">{{ $data->title_en }}</a></h3>
                                @endif
                                <div class="d-card-info">
                                    <div class="place-count"><span>{{ $data->number_of_place }}</span> Place</div>
                                    <div class="hotel-count"><span>{{ $data->number_of_hotal }}</span> Hotel</div>
                                </div>
                                <ul class="d-rating">
                                    @for($i=0; $i<$data->rating; $i++)
                                    <li><i class="bi bi-star-fill"></i></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
