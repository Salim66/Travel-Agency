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
                @if(session()->get('language') == 'arabic')
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">خطأ</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">خطأ</li>
                    </ul>
                </div>
                @else     
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Error</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Error</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="error-wrapper pt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="error-content text-center">
                            <div class="error-vactor text-center">
                                <img src="{{ URL::to('frontend/assets/images/shapes/error-vactor.png') }}" alt="" class="img-fluid" />
                            </div>
                            @if(session()->get('language') == 'arabic')
                            <div class="error-text">
                                <h2>لم يتم العثور على هذه الصفحة</h2>
                                <div class="error-btn">
                                    <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> اذهب إلى المنزل</a>
                                </div>
                            </div>
                            @else   
                            <div class="error-text">
                                <h2>That Page Are Not Found</h2>
                                <div class="error-btn">
                                    <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> GO TO HOME</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
