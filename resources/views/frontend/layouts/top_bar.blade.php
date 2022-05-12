@php
    $contact_info = \App\Models\ContactInfo::findOrFail(1);
@endphp
<div class="topbar-area topbar-style-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 align-items-center d-xl-flex d-none">
                <div class="topbar-contact-left">
                    <ul class="contact-list">
                        <li><i class="bi bi-telephone-fill"></i> <a href="tel:+17632275032">{{ $contact_info->phone }}</a></li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            <a href="{{ $contact_info->email }}">
                                <span class="__cf_email__" data-cfemail="9af3f4fcf5daffe2fbf7eaf6ffb4f9f5f7">{{ $contact_info->email }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 text-xl-center text-md-start text-center">
                <div class="topbar-ad">
                    {{-- <a href="#"></a> --}}
                </div>
            </div>

            @php
                $social = \App\Models\SocialLink::findOrFail(1);
            @endphp

            <div class="col-xl-3 col-lg-6 col-md-6 d-md-flex d-none align-items-center justify-content-end">
                <ul class="topbar-social-links">
                    <li>
                        <a href="{{ $social->facebook }}"><i class="bx bxl-facebook"></i></a>
                    </li>
                    <li>
                        <a href="{{ $social->instagram }}"><i class="bx bxl-instagram-alt"></i></a>
                    </li>
                    <li>
                        <a href="{{ $social->twitter }}"><i class="bx bxl-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ $social->whatsapp }}"><i class="bx bxl-whatsapp-square"></i></a>
                    </li>
                    <li>
                        <a href="{{ $social->pintarest }}"><i class="bx bxl-pinterest"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
