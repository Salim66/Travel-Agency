@php
    $all_data = \App\Models\Post::with('users')->latest()->get();
@endphp
<div class="blog-area blog-style-one pt-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    @if(session()->get('language') == 'arabic')
                    <h2>أحدث الأخبار</h2>
                    @else
                    <h2>Latest News</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_data as $data)
            <div class="col-lg-4 col-md-6">
                <div class="blog-card-alpha">
                    <div class="blog-thumb">
                        <a href="{{ route('blog-details', $data->title_slug) }}">
                            <img src="{{ URL::to($data->image) }}" alt="" />
                        </a>
                        <div class="blog-lavel">
                            <a href="{{ asset('/date-wise-posts/'. $data->id .'/'. $data->date) }}"><i class="bi bi-calendar3"></i>{{ date('F d, Y', strtotime($data->created_at)) }}</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-body-top">
                            <a href="{{ asset('/user-wise-posts/'. $data->id .'/'. $data->users->name) }}" class="blog-writer"><i class="bi bi-person-circle"></i> By {{ $data->users->name }} </a>
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
    </div>
</div>
