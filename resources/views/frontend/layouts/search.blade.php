<div class="main-searchbar-wrapper">
    <div class="container">
        <div class="multi-main-searchber">
            <div class="main-searchbar-close search-toggle">
                <i class="bi bi-x-lg"></i>
            </div>
            <form action="{{ route('header.search.package') }}" method="POST" id="main_searchbar">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-10">
                        <div class="row gx-0 gy-4">
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single destination-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    @php
                                        $all_country = \App\Models\Country::with('districts')->get();
                                        // return $all_country;
                                    @endphp
                                    <div class="searchbox-input">
                                        @if(session()->get('language') == 'arabic')
                                        <label for="deatination_drop">وجهة</label>
                                        <select name="district_id" data-placeholder="Where Are You Going?" id="deatination_drop">
                                            <option selected>إلى أين تذهب؟</option>
                                            @foreach($all_country as $country)
                                            <optgroup label="{{ $country->country_name_ar }}">
                                                @foreach($country->districts as $dis)
                                                <option value="{{ $dis->id }}"> {{ $dis->district_name_ar }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                        @else
                                        <label for="deatination_drop">Destination</label>
                                        <select name="district_id" data-placeholder="Where Are You Going?" id="deatination_drop">
                                            <option selected>Where Are You Going?</option>
                                            @foreach($all_country as $country)
                                            <optgroup label="{{ $country->country_name_en }}">
                                                @foreach($country->districts as $dis)
                                                <option value="{{ $dis->id }}"> {{ $dis->district_name_en }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single type-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-text-paragraph"></i>
                                    </div>
                                    @php
                                        $all_cat = \App\Models\Category::all();
                                    @endphp
                                    <div class="searchbox-input">
                                        @if(session()->get('language') == 'arabic')
                                        <label for="activity-dropdown">نوع السفر</label>
                                        <select name="category_id" class="defult-select-drowpown" data-placeholder="All Activity" id="activity-dropdown">
                                            <option selected>كل نشاط</option>
                                            @foreach($all_cat as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name_ar }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <label for="activity-dropdown">Travel Type</label>
                                        <select name="category_id" class="defult-select-drowpown" data-placeholder="All Activity" id="activity-dropdown">
                                            <option selected>All Activity</option>
                                            @foreach($all_cat as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single type-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <div class="searchbox-input">
                                        @if(session()->get('language') == 'arabic')
                                        <label for="person-dropdown">شخص</label>
                                        @else
                                        <label for="person-dropdown">Person</label>
                                        @endif
                                        <select name="person" class="defult-select-drowpown" id="person-dropdown">
                                            <option selected value="0">01</option>
                                            <option value="1">02</option>
                                            <option value="2">03</option>
                                            <option value="3">04</option>
                                            <option value="4">05</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single date-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-capslock"></i>
                                    </div>
                                    <div class="searchbox-input date-picker-input">
                                        @if(session()->get('language') == 'arabic')
                                        <label for="datepicker">متى</label>
                                        @else
                                        <label for="datepicker">When</label>
                                        @endif
                                        <input placeholder="@if(session()->get('language') == 'arabic') حدد تاريخك @else Select your date @endif" type="text" name="date" id="datepicker" value="" class="calendar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="main-form-submit">
                            <button type="submit">
                                @if(session()->get('language') == 'arabic')
                                أجد الآن
                                @else
                                Find Now
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
