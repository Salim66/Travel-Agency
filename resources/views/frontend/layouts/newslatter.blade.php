<div class="newslatter-wrapper mt-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="newslatter-side text-center text-lg-start mx-auto mx-lg-0">
                    @if(session()->get('language') == 'arabic')
                    <h2>اشترك لدينا <span>النشرة الإخبارية</span></h2>
                    <p>اشترك لتلقي أفضل العروض الترويجية والقسائم. لا تقلق! إنها ليست رسائل غير مرغوب فيها</p>
                    @else
                    <h2>Subscribe Our <span>Newsletter</span></h2>
                    <p>Sign up to receive the best offers on promotion and coupons. Don’t worry! It’s not Spam</p>
                    @endif
                    <form action="{{ route('subscriber.store') }}" method="POST" id="newslatter-form">
                        @csrf
                        <div class="newslatter-form-input">
                            <input type="email" name="email" id="newslatter-input" placeholder="Email Here..." />
                            <button type="submit" class="newslatter-submit">
                                @if(session()->get('language') == 'arabic')
                                يشترك
                                @else
                                Subscribe
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @php
                $data = \App\Models\SubscripSection::findOrFail(1);
            @endphp
            <div class="col-lg-6">
                <div class="achievement-counter-side">
                    <div class="row g-4">
                        <div class="col-lg-6 col-md-6">
                            <div class="achievement-box-style-one">
                                <div class="achievement-icon">
                                    <img src="{{ asset('frontend') }}/assets/images/icons/counter-icon2.svg" alt="" />
                                </div>
                                @if(session()->get('language') == 'arabic')
                                <div class="achievement-box-content">
                                    <h2>{{ $data->awesome_tour }}+</h2>
                                    <h4>جولة رائعة</h4>
                                </div>
                                @else
                                <div class="achievement-box-content">
                                    <h2>{{ $data->awesome_tour }}+</h2>
                                    <h4>Awesome Tour</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="achievement-box-style-one">
                                <div class="achievement-icon">
                                    <img src="{{ asset('frontend') }}/assets/images/icons/counter-icon3.svg" alt="" />
                                </div>
                                @if(session()->get('language') == 'arabic')
                                <div class="achievement-box-content">
                                    <h2>{{ $data->new_destination }}+</h2>
                                    <h4>وجهات جديدة</h4>
                                </div>
                                @else
                                <div class="achievement-box-content">
                                    <h2>{{ $data->new_destination }}+</h2>
                                    <h4>New Destinations</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="achievement-box-style-one">
                                <div class="achievement-icon">
                                    <img src="{{ asset('frontend') }}/assets/images/icons/counter-icon1.svg" alt="" />
                                </div>
                                @if(session()->get('language') == 'arabic')
                                <div class="achievement-box-content">
                                    <h2>{{ $data->years_experiance }}+</h2>
                                    <h4>سنوات خبرة</h4>
                                </div>
                                @else
                                <div class="achievement-box-content">
                                    <h2>{{ $data->years_experiance }}+</h2>
                                    <h4>Years Experience</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="achievement-box-style-one">
                                <div class="achievement-icon">
                                    <img src="{{ asset('frontend') }}/assets/images/icons/counter-icon4.svg" alt="" />
                                </div>
                                @if(session()->get('language') == 'arabic')
                                <div class="achievement-box-content">
                                    <h2>{{ $data->best_mountains }}+</h2>
                                    <h4>أفضل الجبال</h4>
                                </div>
                                @else
                                <div class="achievement-box-content">
                                    <h2>{{ $data->best_mountains }}+</h2>
                                    <h4>Best Mountains</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
