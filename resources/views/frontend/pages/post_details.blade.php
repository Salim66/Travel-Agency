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
                    <h2 class="breadcrumb-title">تفاصيل المدونة</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">تفاصيل المدونة</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Blog Details</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="blog-details-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details">
                            <div class="post-header">
                                <h2 class="post-title">
                                    @if(session()->get('language') == 'arabic')
                                    {{ $data->title_ar }}
                                    @else
                                    {{ $data->title_en }}
                                    @endif
                                </h2>
                                <div class="post-meta">
                                    <a href="{{ asset('/user-wise-posts/'. $data->id .'/'. $data->users->name) }}" class="blog-writer"><i class="bi bi-person-circle"></i> By {{ $data->users->name }} </a>
                                    <a href="{{ asset('/date-wise-posts/'. $data->id .'/'. $data->date) }}" class="blog-comments"><i class="bi bi-calendar3"></i> {{ date('F d, Y', strtotime($data->created_at)) }}</a>
                                </div>
                            </div>
                            <div class="post-thumb">
                                <img src="{{ URL::to($data->image) }}" alt="" />
                            </div>
                            <div class="post-body">
                                @if(session()->get('language') == 'arabic')
                                {!! htmlspecialchars_decode($data->details_ar) !!}
                                @else
                                {!! htmlspecialchars_decode($data->details_en) !!}
                                @endif
                            </div>
                            <div class="post-footer flex-wrap flex-md-nowrap">

                            </div>
                        </div>
                        <div class="comment-section">
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://travel-agency-2.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-sidebar">
                            <aside class="blog-widget widget-search">
                                <div class="widget-title">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>ابحث هنا</h4>
                                    @else
                                    <h4>Search Here</h4>
                                    @endif
                                </div>
                                <div class="widget-body">
                                    <form action="{{ route('search.box.wise.post') }}" method="POST" id="blog-sidebar-search">
                                        @csrf
                                        <div class="search-input-group">
                                            <input type="search" name="search" placeholder="Your Destination" />
                                            <button type="submit">
                                                @if(session()->get('language') == 'arabic')
                                                بحث
                                                @else
                                                SEAECH
                                                @endif
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </aside>
                            @php
                                $all_cat = \App\Models\Category::withCount('posts')->limit(8)->get();
                                // dd($all_cat);
                            @endphp
                            <aside class="blog-widget widget-categories mt-30">
                                <div class="widget-title">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>فئات</h4>
                                    @else
                                    <h4>Categories</h4>
                                    @endif
                                </div>
                                <ul class="widget-body">
                                    @foreach($all_cat as $cat)
                                    <li>
                                        @if(session()->get('language') == 'arabic')
                                        <a href="{{  asset('/category-wise-post/'.$cat->id.'/'.$cat->name_en) }}">
                                            <h6><i class="bi bi-chevron-double-right"></i> {{ $cat->name_ar }}</h6>
                                            <span>({{ $cat->posts_count }})</span>
                                        </a>
                                        @else
                                        <a href="{{  asset('/category-wise-post/'.$cat->id.'/'.$cat->name_en) }}">
                                            <h6><i class="bi bi-chevron-double-right"></i> {{ $cat->name_en }}</h6>
                                            <span>({{ $cat->posts_count }})</span>
                                        </a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>

                            @php
                                $posts = \App\Models\Post::with('users')->latest()->limit(4)->get();
                            @endphp

                            <aside class="blog-widget widget-recent-entries-custom mt-30">
                                <div class="widget-title">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>منشور جديد</h4>
                                    @else
                                    <h4>New Post</h4>
                                    @endif
                                </div>
                                <ul class="widget-body">
                                    @foreach($posts as $post)
                                    <li class="clearfix">
                                        <div class="wi">
                                            <a href="{{ route('blog-details', $post->title_slug) }}"><img src="{{ URL::to($post->image) }}" alt="" /></a>
                                        </div>
                                        <div class="wb">
                                            <h6><a href="{{ route('blog-details', $post->title_slug) }}">
                                                @if(session()->get('language') == 'arabic')
                                                {{ $post->title_ar }}
                                                @else
                                                {{ $post->title_en }}
                                                @endif
                                            </a></h6>
                                            <div class="wb-info">
                                                <span class="post-date"> <i class="bi bi-person-circle"></i> By {{ $post->users->name }} </span>
                                                <span class="post-date"> <i class="bi bi-calendar3"></i> {{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                            @php
                                $all_tag = \App\Models\Tag::limit(6)->get();
                            @endphp
                            <aside class="blog-widget widget-tag-cloud mt-30">
                                <div class="widget-title">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>العلامات</h4>
                                    @else
                                    <h4>Tags</h4>
                                    @endif
                                </div>
                                <div class="tag-cloud widget-body">
                                    @foreach($all_tag as $tag)
                                        @if(session()->get('language') == 'arabic')
                                        <a href="{{  asset('/tag-wise-post/'.$tag->id.'/'.$tag->name_en) }}">{{ $tag->name_ar }}</a>
                                        @else
                                        <a href="{{  asset('/tag-wise-post/'.$tag->id.'/'.$tag->name_en) }}">{{ $tag->name_en }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </aside>
                            @php

                                $all_gallery = \App\Models\TravelGallery::latest()->limit(6)->get();

                            @endphp
                            <aside class="blog-widget widget-gallary mt-30">
                                <div class="widget-title">
                                    @if(session()->get('language') == 'arabic')
                                    <h4>صالة عرض</h4>
                                    @else
                                    <h4>Gallery</h4>
                                    @endif
                                </div>
                                <ul class="widget-body">
                                    @foreach($all_gallery as $gallery)
                                    <li>
                                        <a href="{{ URL::to($gallery->image) }}" data-fancybox="gallery" data-caption="Caption Here" class="gallary-overlay">
                                            <img src="{{ URL::to($gallery->image) }}" alt="" />
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
