<div class="gallary-area gallary-style-one pt-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha section-padding-15 text-center mx-auto">
                    @if(session()->get('language') == 'arabic')
                    <h2>معرض السفر</h2>
                    @else
                    <h2>Travel Gallery</h2>
                    @endif
                </div>
            </div>
        </div>
        @php
            $first_section = \App\Models\TravelGallery::latest()->limit(3)->get();
            $second_section = \App\Models\TravelGallery::skip(3)->latest()->limit(3)->get();
            $third_section = \App\Models\TravelGallery::skip(6)->latest()->limit(3)->get();
        @endphp
        <div class="row">
            <div class="col-lg-4 col-md-4">
                @foreach($first_section as $first)
                <div class="gallary-item">
                    <img src="{{ URL::to($first->image) }}" alt="Image Gallery" />
                    <a class="gallary-item-overlay" data-fancybox="gallery" data-caption="Caption Here" href="{{ URL::to($first->image) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-4">
                @foreach($second_section as $first)
                <div class="gallary-item">
                    <img src="{{ URL::to($first->image) }}" alt="Image Gallery" />
                    <a class="gallary-item-overlay" data-fancybox="gallery" data-caption="Caption Here" href="{{ URL::to($first->image) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-4">
                @foreach($third_section as $first)
                <div class="gallary-item">
                    <img src="{{ URL::to($first->image) }}" alt="Image Gallery" />
                    <a class="gallary-item-overlay" data-fancybox="gallery" data-caption="Caption Here" href="{{ URL::to($first->image) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
