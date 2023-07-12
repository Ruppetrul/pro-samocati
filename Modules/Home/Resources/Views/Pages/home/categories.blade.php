<section>
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Поиск по категориям</h2>
            <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
            <p>Категории</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="slider-9">

                    @foreach ($categories as $category)
{{--                        <div class="dropdown-column col-xl-3">--}}
{{--                            @foreach ($category as $cat)--}}
{{--                                <a class="dropdown-item" href="{{ $cat->path() }}">--}}
{{--                                    {{ $cat->title }}--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

                        <div>
                            <a href="categories/{{ $category['title'] }}" class="category-box wow fadeInUp">
                                <div>
                                    <img src="

                                    @if (isset($category['first_media']['filename']))
                                        {{ asset($category['first_media']['filename']) }}
                                    @else {{ asset('home/images/default_item_img.jpg')}}
                                    @endif
                                    "

                                      class="blur-up lazyload" alt="">
                                    <h5>{{ $category['title'] }}</h5>
                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
