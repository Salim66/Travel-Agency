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
                    <h2 class="breadcrumb-title">سياسة الخصوصية</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">مسكن</a></li>
                        <li class="breadcrumb-item active">سياسة الخصوصية</li>
                    </ul>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title">Privacy Policy</h2>
                    <ul class="d-flex justify-content-center breadcrumb-items">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Privacy Policy</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="faq-wrapper pt-76">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="faqs mt-30">
                            @if(session()->get('language') == 'arabic')
                            <h2>
                                مرارًا <span>طلبت </span>سؤال
                            </h2>
                            @else
                            <h2>
                                Frequently <span>Asked </span>Question
                            </h2>
                            @endif
                            <div class="accordion faq-accordion accordion-flush" id="faq-accordion-example">
                                @foreach($all_data as $key => $data)
                                @if(session()->get('language') == 'arabic')
                                <div class="accordion-item faq-accordion">
                                    <h2 class="accordion-header" id="faq-headingOne_{{ $key }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseOne_{{ $key }}" aria-expanded="false" aria-controls="faq-collapseOne_{{ $key }}">
                                            {{ $data->question_ar }}
                                        </button>
                                    </h2>
                                    <div id="faq-collapseOne_{{ $key }}" class="accordion-collapse collapse show" aria-labelledby="faq-headingOne_{{ $key }}" data-bs-parent="#faq-accordion-example">
                                        <div class="accordion-body">
                                            <p>
                                                {{ $data->answer_ar }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="accordion-item faq-accordion">
                                    <h2 class="accordion-header" id="faq-headingOne_{{ $key }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseOne_{{ $key }}" aria-expanded="false" aria-controls="faq-collapseOne_{{ $key }}">
                                            {{ $data->question_en }}
                                        </button>
                                    </h2>
                                    <div id="faq-collapseOne_{{ $key }}" class="accordion-collapse collapse show" aria-labelledby="faq-headingOne_{{ $key }}" data-bs-parent="#faq-accordion-example">
                                        <div class="accordion-body">
                                            <p>
                                                {{ $data->answer_en }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.scripts')
    </body>

</html>
