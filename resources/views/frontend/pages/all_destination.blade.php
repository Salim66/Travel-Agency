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
                    <h2 class="breadcrumb-title">وجهة</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">وجهة</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Destination</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Destination</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="destination-wrapper pt-110">
            <div class="container">
                <div class="row g-3">
                    @foreach($all_data as $data)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="destination-card-style-two">
                            <div class="d-card-thumb">
                                <img src="{{ $data->image }}" alt="" />
                            </div>
                            @if(session()->get('language') == 'arabic')
                            <div class="d-card-content">
                                <h4 class="destination-title"><a href="{{ route('destination-details', $data->title_slug) }}">{{ $data->title_ar }}</a></h4>
                                <div class="place-count"><span>{{ $data->number_of_place }}</span> مكان</div>
                            </div>
                            @else
                            <div class="d-card-content">
                                <h4 class="destination-title"><a href="{{ route('destination-details', $data->title_slug) }}">{{ $data->title_en }}</a></h4>
                                <div class="place-count"><span>{{ $data->number_of_place }}</span> Place</div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $all_data->links('frontend.layouts.package_paginator') }}
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
