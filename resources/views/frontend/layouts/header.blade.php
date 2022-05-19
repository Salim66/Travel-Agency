<header>
    <div class="header-area header-style-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12 align-items-center d-xl-flex d-lg-block">
                    <div class="nav-logo d-flex justify-content-between align-items-center">
                        <a href="{{ asset('/') }}"><img src="{{ asset('frontend') }}/assets/images/logo.png" alt="logo" /></a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="nav-right d-xl-none">
                                <ul class="nav-actions">
                                    <li class="category-toggle">
                                        <i class="bx bx-category"></i>
                                    </li>
                                    <li class="search-toggle">
                                        <i class="bx bx-search-alt"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-menu d-flex">
                                <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                    <span class="h-top"></span>
                                    <span class="h-middle"></span>
                                    <span class="h-bottom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-xs-6">
                    <nav class="main-nav float-end">
                        <div class="inner-logo d-xl-none text-center">
                            <a href="{{ asset('/') }}"><img src="{{ asset('frontend') }}/assets/images/logo.png" alt="" /></a>
                        </div>
                        <ul>
                            <li>
                                @if(session()->get('language') == 'arabic')
                                <a href="{{ asset('/') }}">مسكن</a>
                                @else
                                <a href="{{ asset('/') }}">Home</a>
                                @endif
                            </li>
                            <li>
                                @if(session()->get('language') == 'arabic')
                                <a href="about.html">معلومات عنا</a>
                                @else
                                <a href="about.html">About Us</a>
                                @endif
                            </li>
                            <li>
                                @if(session()->get('language') == 'arabic')
                                <a href="{{ route('all.destination') }}">وجهة</a>
                                @else
                                <a href="{{ route('all.destination') }}">Destination</a>
                                @endif
                            </li>
                            <li>
                                @if(session()->get('language') == 'arabic')
                                <a href="{{ route('all.package') }}">طَرد</a>
                                @else
                                <a href="{{ route('all.package') }}">Package</a>
                                @endif
                            </li>
                            <li>
                                @if(session()->get('language') == 'arabic')
                                <a href="{{ route('all.blogs') }}">المدونات</a>
                                @else
                                <a href="{{ route('all.blogs') }}">Blogs</a>
                                @endif
                            </li>
                            <li>
                                @if(session()->get('language') == 'arabic')
                                <a href="{{ route('contact-us') }}">اتصل بنا</a>
                                @else
                                <a href="{{ route('contact-us') }}">Contact Us</a>
                                @endif
                            </li>
                        </ul>

                        @php
                            $contact_info = \App\Models\ContactInfo::findOrFail(1);
                        @endphp

                        <div class="inner-contact-options d-xl-none">
                            <div class="contact-box-inner"><i class="bi bi-telephone-fill"></i> <a href="tel:{{ $contact_info->phone }}">{{ $contact_info->phone }}</a></div>
                            <div class="contact-box-inner">
                                <i class="bi bi-envelope-fill"></i>
                                <a href="mailto:{{ $contact_info->email }}">
                                    <span class="__cf_email__" data-cfemail="533a3d353c13362b323e233f367d303c3e">{{ $contact_info->email }}</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-3">
                    <div class="nav-right float-end d-xl-flex d-none">
                        <ul class="nav-actions">
                            <li class="category-toggle">
                                <i class="bx bx-category"></i>
                            </li>
                            <li class="search-toggle">
                                <i class="bx bx-search-alt"></i>
                            </li>
                            <li class="search-toggle">
                                @if(session()->get('language') == 'arabic')
                                <a class="dropdown-item" href="{{ route('english.language') }}">
                                English
                                </a>
                                @else
                                <a class="dropdown-item" href="{{ route('arabic.language') }}">
                                العربيّة
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
