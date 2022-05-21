@php
    $seo = \App\Models\Seo::findOrFail(1);
@endphp
<div class="footer-area mt-110">
    <div class="footer-main-wrapper">
        <div class="footer-vactor">
            <img src="{{ asset('frontend') }}/assets/images/banner/footer-bg.png" alt="" />
        </div>
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-lg-4">
                    <div class="footer-about text-lg-start text-center">
                        <p>{{ $seo->footer_description }}</p>

                        @php
                            $social = \App\Models\SocialLink::findOrFail(1);
                        @endphp
                        <div class="footer-social-wrap">
                            <h5>Follow Us On:</h5>
                            <ul class="footer-social-links justify-content-lg-start justify-content-center">
                                <li>
                                    <a href="{{ $social->instagram }}"><i class="bx bxl-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $social->facebook }}"><i class="bx bxl-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $social->twitter }}"><i class="bx bxl-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $social->whatsapp }}"><i class="bx bxl-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $social->pintarest }}"><i class="bx bxl-pinterest-alt"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        @if(session()->get('language') == 'arabic')
                        <h4 class="footer-widget-title">رابط سريع</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('about-us') }}">معلومات عنا</a></li>
                            <li><a href="{{ route('all.package') }}">حزمة جولة</a></li>
                            <li><a href="{{ route('all.destination') }}">وجهة</a></li>
                            <li><a href="{{ route('all.blogs') }}">مدونة</a></li>
                            <li><a href="{{ route('contact-us') }}">اتصل بنا</a></li>
                        </ul>
                        @else
                        <h4 class="footer-widget-title">Quick Link</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('all.package') }}">Tour Package</a></li>
                            <li><a href="{{ route('all.destination') }}">Destination</a></li>
                            <li><a href="{{ route('all.blogs') }}">Blog</a></li>
                            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                        </ul>
                        @endif
                    </div>
                </div>
                @php
                    $all_data = \App\Models\Category::limit(5)->get();
                @endphp
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        @if(session()->get('language') == 'arabic')
                        <h4 class="footer-widget-title">نوع الجولة</h4>
                        @else
                        <h4 class="footer-widget-title">Tour Type</h4>
                        @endif
                        <ul class="footer-links">
                            @foreach($all_data as $data)
                            <li><a href="{{ asset('/category-wise-package/'.$data->id.'/'.$data->name_en) }}">
                                @if(session()->get('language') == 'arabic')
                                {{ $data->name_ar }}
                                @else
                                {{ $data->name_en }}
                                @endif
                            </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @php

                    $all_gallery = \App\Models\TravelGallery::latest()->limit(6)->get();

                @endphp
                <div class="col-lg-4 col-md-8">
                    <div class="footer-widget">
                        @if(session()->get('language') == 'arabic')
                        <h4 class="footer-widget-title text-center">صالة عرض</h4>
                        @else
                        <h4 class="footer-widget-title text-center">Gallery</h4>
                        @endif
                        <div class="footer-gallary-grid">
                            @foreach($all_gallery as $gallery)
                            <div class="footer-gallary-item">
                                <a href="{{ URL::to($gallery->image) }}" data-fancybox="footer" data-caption="Caption Here"><img src="{{ URL::to($gallery->image) }}" alt="" /></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @php
                $contact_info = \App\Models\ContactInfo::findOrFail(1);
            @endphp
            <div class="footer-contact-wrapper">
                @if(session()->get('language') == 'arabic')

                @else
                <h5>Contact Us:</h5>
                <ul class="footer-contact-list">
                    <li><i class="bi bi-telephone-x"></i> <a href="tel:{{ $contact_info->phone }}">{{ $contact_info->phone }}</a></li>
                    <li>
                        <i class="bi bi-envelope-open"></i>
                        <a href="mailto:{{ $contact_info->email }}">
                            <span class="__cf_email__" data-cfemail="771e19111837031802050f0705185914181a">{{ $contact_info->email }}</span>
                        </a>
                    </li>
                    <li><i class="bi bi-geo-alt"></i> <a href="{{ $contact_info->location }}">{{ $contact_info->location }}</a></li>
                </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 order-lg-1 order-3">
                    <div class="copyright-link text-lg-start text-center">
                        <p>Copyright 2022 Anova Tours and Travels | Design By <a href="www.techdynobd.com"> TechDynoBD</a></p>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="footer-logo text-center">
                        <a href="index.html"><img src="{{ URL::to($seo->logo) }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 order-lg-3 order-2">
                    <div class="policy-links">
                        <ul class="policy-list justify-content-lg-end justify-content-center">
                            <li><a href="{{ route('terms.condition') }}">Terms & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
