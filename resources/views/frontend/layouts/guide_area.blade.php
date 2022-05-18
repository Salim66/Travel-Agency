@php
    $all_data = \App\Models\TourGuide::latest()->limit(3)->get();
@endphp
<div class="guide-area guide-style-one pt-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    @if(session()->get('language') == 'arabic')
                    <h2>مرشد سياحي</h2>
                    @else
                    <h2>Tour Guide</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_data as $data)
            <div class="col-lg-4 col-md-6">
                <div class="guide-card-alpha">
                    <div class="guide-image">
                        <img src="{{ URL::to($data->image) }}" alt="" />
                        <ul class="guide-social-links">
                            <li>
                                <a href="{{ $data->instagram_link }}"><i class="bx bxl-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{ $data->facebook_link }}"><i class="bx bxl-facebook"></i></a>
                            </li>
                            <li>
                                <a href="{{ $data->twitter_link }}"><i class="bx bxl-twitter"></i></a>
                            </li>
                            <li>
                                <a href="tel:{{ $data->whatsapp_number }}"><i class="bx bxl-whatsapp"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="guide-content">
                        <h4 class="guide-name">{{ $data->name }}</h4>
                        @if(session()->get('language') == 'arabic')
                        <h6 class="guide-designation">مرشد سياحي</h6>
                        @else
                        <h6 class="guide-designation">Tour Guide</h6>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
