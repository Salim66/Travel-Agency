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
                    <h2 class="breadcrumb-title">مدونة</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">مدونة</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Blog</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="blog-wrapper pt-80">
            <div class="container">
                <div class="row">
                    @foreach($all_data as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card-gamma">
                            <div class="blog-thumb">
                                <a href="{{ route('blog-details', $data->title_slug) }}">
                                    <img src="{{ URL::to($data->image) }}" alt="" />
                                </a>
                                <div class="blog-lavel">
                                    @if(session()->get('language') == 'arabic')
                                    <a href="#">{{ $data->tags->name_ar }}</a>
                                    @else
                                    <a href="#">{{ $data->tags->name_en }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-body-top">
                                    <a href="{{ asset('/user-wise-posts/'. $data->id .'/'. $data->users->name) }}" class="blog-writer"><i class="bi bi-person-circle"></i> By {{ $data->users->name }} </a>
                                    <a href="{{ asset('/date-wise-posts/'. $data->id .'/'. $data->date) }}" class="blog-comments"><i class="bi bi-calendar3"></i> {{ date('F d, Y', strtotime($data->created_at)) }}</a>
                                </div>
                                <h4 class="blog-title"><a href="{{ route('blog-details', $data->title_slug) }}">
                                    @if(session()->get('language') == 'arabic')
                                    {{ $data->title_ar }}
                                    @else
                                    {{ $data->title_en }}
                                    @endif
                                </a></h4>
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
