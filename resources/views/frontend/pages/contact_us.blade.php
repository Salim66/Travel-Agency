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
                <div class="col-lg-12 text-center">
                    @if(session()->get('language') == 'arabic')
                    <h2 class="breadcrumb-title">اتصل بنا</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">اتصل بنا</li>
                    </ul>
                    @else
                    <h2 class="breadcrumb-title">Contact Us</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>

        @php
            $contact_info = \App\Models\ContactInfo::findOrFail(1);
        @endphp

        <div class="contact-wrapper pt-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-center gy-5">
                    <div class="col-lg-6">
                        <div class="contatc-intro-figure">
                            <img src="{{ URL::to('frontend/') }}/assets/images/banner/contact-bg.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info">
                            @if(session()->get('language') == 'arabic')
                            <h3>معلومات الاتصال.</h3>
                            @else
                            <h3>Contact Info.</h3>
                            @endif
                            <ul>
                                <li>
                                    @if(session()->get('language') == 'arabic')
                                    <h6>لنتحدث</h6>
                                    @else
                                    <h6>Let’s Talk</h6>
                                    @endif
                                    <a href="mailto:{{ $contact_info->email }}">
                                        <span class="__cf_email__" data-cfemail="abc2c5cdc4ebced3cac6dbc7ce85c8c4c6">{{ $contact_info->email }}</span>
                                    </a>
                                    <a href="tel:{{ $contact_info->phone }}">{{ $contact_info->phone }}</a>
                                </li>
                                <li>
                                    @if(session()->get('language') == 'arabic')
                                    <h6>موقع.</h6>
                                    @else
                                    <h6>Loacation.</h6>
                                    @endif
                                    <a href="{{ $contact_info->location }}">{{ $contact_info->location }}</a>
                                </li>
                                <li>
                                    @if(session()->get('language') == 'arabic')
                                    <h6>زورنا.</h6>
                                    @else
                                    <h6>Visit Us.</h6>
                                    @endif
                                    <a href="{{ $contact_info->visit_us }}">Facebook: {{ $contact_info->visit_us }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="contact-map mt-120">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" src="{{ $contact_info->google_map_link }}"></iframe>
                            <a href="https://123movies-to.org/"></a><br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-120">
                <form action="{{ route('contact.form.submit') }}" method="POST" id="contact_form">
                    @csrf
                    <div class="contact-form-wrap">
                        @if(session()->get('language') == 'arabic')
                        <h4>احصل على عرض أسعار مجاني لضغطات المفاتيح الآن</h4>
                        <p>لن يتم نشر عنوان بريدك الإلكتروني. الحقول المطلوبة محددة *</p>
                        @else
                        <h4>Get a free Keystroke quote now</h4>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="custom-input-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="Your name" id="name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom-input-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" placeholder="Your Email" id="email" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="custom-input-group">
                            <textarea cols="20" rows="7" name="message" placeholder="Your message"></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="custom-input-group">
                            <div class="submite-btn">
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
