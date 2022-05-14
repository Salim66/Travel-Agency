<div class="main-searchbar-wrapper">
    <div class="container">
        <div class="multi-main-searchber">
            <div class="main-searchbar-close search-toggle">
                <i class="bi bi-x-lg"></i>
            </div>
            <form action="#" method="post" id="main_searchbar">
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
                                        <label for="deatination_drop">Destination</label>
                                        <select data-placeholder="Where Are You Going?" id="deatination_drop">
                                            <option value="">Where Are You Going?</option>
                                            @foreach($all_country as $country)
                                            <optgroup label="{{ $country->country_name_en }}">
                                                @foreach($country->districts as $dis)
                                                <option>
                                                    {{ $dis->district_name_en }}
                                                </option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single type-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-text-paragraph"></i>
                                    </div>
                                    <div class="searchbox-input">
                                        <label for="activity-dropdown">Travel Type</label>
                                        <select class="defult-select-drowpown" data-placeholder="All Activity" id="activity-dropdown">
                                            <option value="">All Activity</option>
                                            <option value="1">Type 1</option>
                                            <option value="2">Type 2</option>
                                            <option value="3">Type 3</option>
                                            <option value="4">Type 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single type-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <div class="searchbox-input">
                                        <label for="person-dropdown">Person</label>
                                        <select class="defult-select-drowpown" id="person-dropdown">
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
                                        <label for="datepicker">When</label>
                                        <input placeholder="Select your date" type="text" name="checkIn" id="datepicker" value="" class="calendar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="main-form-submit">
                            <button type="submit">Find Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
