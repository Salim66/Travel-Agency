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
                    <h2 class="breadcrumb-title">{{ $category->name_ar }}</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">فئة</a></li>
                        <li class="breadcrumb-item active">{{ $category->name_ar }}</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">{{ $category->name_en }}</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Category</a></li>
                        <li class="breadcrumb-item active">{{ $category->name_en }}</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="package-wrapper pt-80">
            <div class="container">
                <div class="row">

                    @foreach($all_data as $data)
                        <div class="col-lg-4 col-md-6">
                            <div class="package-card-alpha">
                                <div class="package-thumb">
                                    <a href="{{ route('destination-details', $data->title_slug) }}"><img src="{{ URL::to($data->image) }}" alt="" /></a>
                                </div>
                                <div class="package-card-body">
                                    @if(session()->get('language') == 'arabic')
                                    <h3 class="p-card-title"><a href="{{ route('destination-details', $data->title_slug) }}">{{ $data->title_ar }}</a></h3>
                                    @else
                                    <h3 class="p-card-title"><a href="{{ route('destination-details', $data->title_slug) }}">{{ $data->title_en }}</a></h3>
                                    @endif
                                </div>
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
