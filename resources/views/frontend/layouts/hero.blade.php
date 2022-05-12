@php
    $all_data = \App\Models\HeroSlider::all();
@endphp
<div class="hero-area hero-style-one overflow-hidden">
    <div class="container-fluid p-0">
        <div class="swiper hero-slider-one">
            <div class="swiper-wrapper">

                @foreach($all_data as $data)
                <div class="swiper-slide">
                    <div class="hero-single-slide">
                        <div class="hero-highlighted-bg">
                            <img src="{{ URL::to($data->hero_banner) }}" alt="" />
                        </div>
                        <div class="hero-content-bg">
                            <div class="hero-content position-relative">
                                @if(session()->get('language') == 'arabic')
                                <h2 class="hero-title">{!! htmlspecialchars_decode($data->hero_title_ar) !!}</h2>
                                <p>
                                    {{ $data->hero_short_des_ar }}
                                </p>
                                <div class="hero-btns">
                                    <a href="package.html" class="button-fill-primary">مشاهدة ملف مغامرة</a>
                                    <a href="package.html" class="button-outlined-primary">خذ جولة</a>
                                </div>
                                @else
                                <h2 class="hero-title">{!! htmlspecialchars_decode($data->hero_title_en) !!}</h2>
                                <p>
                                    {{ $data->hero_short_des_en }}
                                </p>
                                <div class="hero-btns">
                                    <a href="package.html" class="button-fill-primary">View Adventure</a>
                                    <a href="package.html" class="button-outlined-primary">Take A Tour</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="slider-arrows text-center d-lg-flex d-none">
        @if(session()->get('language') == 'arabic')
        <div class="hero-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="bi bi-arrow-left"></i> السابق</div>
        <div class="hero-next" tabindex="0" role="button" aria-label="Next slide">التالي <i class="bi bi-arrow-right"></i></div>
        @else
        <div class="hero-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="bi bi-arrow-left"></i> Prev</div>
        <div class="hero-next" tabindex="0" role="button" aria-label="Next slide">Next <i class="bi bi-arrow-right"></i></div>
        @endif
    </div>
    <div class="hero-pagination d-block w-auto"></div>
</div>
