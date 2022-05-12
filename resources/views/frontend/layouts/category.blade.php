@php
    $all_data = \App\Models\Category::all();
@endphp
<div class="category-sidebar-wrapper">
    <div class="category-sidebar">
        <div class="category-header d-flex justify-content-between align-items-center">
            @if(session()->get('language') == 'arabic')
            <h4>فئة</h4>
            @else
            <h4>Category</h4>
            @endif
            <div class="category-toggle">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <div class="row row-cols-lg-3 row-cols-2 gy-5 mt-3">
            @foreach($all_data as $data)
            <div class="col">
                <a class="category-box" href="package.html">
                    <div class="cate-icon mx-auto">
                        <img src="{{ URL::to('/') }}/upload/category/{{ $data->image }}" alt="" />
                    </div>
                    @if(session()->get('language') == 'arabic')
                    <h5>{{ $data->name_ar }}</h5>
                    @else
                    <h5>{{ $data->name_en }}</h5>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
