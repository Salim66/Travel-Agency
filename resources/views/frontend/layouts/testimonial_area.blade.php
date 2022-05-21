<div class="testimonial-area testimonial-style-one mt-120">
    <div class="testimonial-shape-group"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-head-alpha">
                    @if(session()->get('language') == 'arabic')
                    <h2>ماذا يقول عملائنا عنا</h2>
                    @else
                    <h2>What Our Client Say About Us</h2>
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
        <div class="swiper testimonial-slider-one position-relative">
            <div class="swiper-wrapper">
                @php
                    $i = 1;
                    $all_data = \App\Models\Reviewer::where('status', true)->latest()->get();
                @endphp
                @foreach($all_data as $data)
                <div class="swiper-slide">
                    <div class="testimonial-card testimonial-card-alpha">
                        <div class="testimonial-overlay-img">
                            <img src="{{ URL::to($data->image) }}" alt="" />
                        </div>
                        <div class="testimonial-card-top">
                            <div class="qoute-icon"><i class="bx bxs-quote-left"></i></div>
                            <div class="testimonial-thumb"><img src="{{ URL::to($data->image) }}" alt="" /></div>
                            <h3 class="testimonial-count">{{ $loop->index + 1 }}</h3>
                        </div>
                        <div class="testimonial-body">
                            <p>{{ $data->message }}</p>
                            <div class="testimonial-bottom">
                                <div class="reviewer-info">
                                    <h4 class="reviewer-name">{{ $data->name }}</h4>
                                    @if(session()->get('language') == 'arabic')
                                    <h6>المسافر</h6>
                                    @else
                                    <h6>Traveller</h6>
                                    @endif
                                </div>
                                <ul class="testimonial-rating">
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
