<!-- searchbox start -->
<section id="main-search" class="">
    <div class="container">
        <div class="row">
            <div class="col search-flex">
                <img src="{{URL::asset('frontend/img/logo.png')}}" class="img-fluid" alt="">
                <form class="form-inline form-group" method="GET">
                    <div id="search-wrapper" class="form-group">
                        <div class="autocomplete form-group">
                            <input class="form-control"
                                   id="search-box-main" type="search"
                                   placeholder="Search farms around the country"
                                   onfocus="this.placeholder=''"
                                   onblur="this.placeholder='{{__('search.search')}}'"
                                   aria-label="Search">
                        </div>
                        <button class="d-lg-none filters-toggler" type="button">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div id="search-filters" class="filters form-group collapse-md">
                            <!-- province -->
                            <div class="input-group">
                                <select class="custom-select province_dropdown" id="selectProvince">
                                    <option value="" selected> {{__('search.select_province')}}</option>
                                </select>
                            </div>
                            <!-- district -->
                            <div class="input-group">
                                <select class="custom-select district_dropdown district" id="selectDistrict">
                                    <option value="">{{__('search.select_district')}}</option>
                                </select>
                            </div>
                            <!-- categories -->
                            <div class="input-group">
                                <select class="custom-select" id="selectCategory">
                                    <option value="">{{__('search.select_category')}}</option>
                                    @foreach($allcategory as $cateogry)
                                        <option value="{{$cateogry->id}}">{{$cateogry->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button id="indexSearch" class="btn btn-secondary" type="submit">{{__('search.search_button')}}</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- searchbox end -->
