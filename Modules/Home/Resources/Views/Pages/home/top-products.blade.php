<section class="top-selling-section">
    <div class="container-fluid-lg">
        <div class="slider-4-1">
{{--            <div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="top-selling-box">--}}
{{--                            <div class="top-selling-title">--}}
{{--                                <h3>Популярные товары</h3>--}}
{{--                            </div>--}}
{{--                            <div class="top-selling-contain wow fadeInUp">--}}
{{--                                <a href="product-left.html" class="top-selling-image">--}}
{{--                                    <img src="{{ asset('home/images/default_item_img.jpg') }}"--}}
{{--                                         class="img-fluid blur-up lazyload" alt="">--}}
{{--                                </a>--}}

{{--                                <div class="top-selling-detail">--}}
{{--                                    <a href="product-left.html">--}}
{{--                                        <h5>Tuffets Whole Wheat Bread</h5>--}}
{{--                                    </a>--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <ul class="rating">--}}
{{--                                            <li>--}}
{{--                                                <i data-feather="star" class="fill"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i data-feather="star" class="fill"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i data-feather="star" class="fill"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i data-feather="star" class="fill"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i data-feather="star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <span>(34)</span>--}}
{{--                                    </div>--}}
{{--                                    <h6>$ 10.00</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Популярные товары</h3>
                            </div>
                            @foreach ($homeRepo->getProductsByViews() as $product)

                                <x-home-top-sell-product
                                    imagePath="{{ isset($product->first_media->thumb) ? $product->first_media->thumb : asset('home/images/default_item_img.jpg') }}"
                                    path="{{ $product->path() }}"
                                    title="{{ $product->title }}"
                                    rates="{{ $product->rates_count }}"
                                    price="{{ $product->getPrice() }}"></x-home-top-sell-product>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Случайный товар</h3>
                            </div>
                            @foreach ($homeRepo->getRandomProducts() as $product)
                                <x-home-top-sell-product
                                    imagePath="{{ $product->first_media->thumb ?? asset('home/images/default_item_img.jpg')  }}"
                                    path="{{ $product->path() }}"
                                    title="{{ $product->title }}"
                                    rates="{{ $product->rates_count }}"
                                    price="{{ $product->getPrice() }}"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Лучшая оценка</h3>
                            </div>
                            @foreach ($homeRepo->getTopRatedProducts() as $product)
                                <x-home-top-sell-product
                                    imagePath="{{ $product->first_media->thumb ?? asset('home/images/default_item_img.jpg')  }}"
                                    path="{{ $product->path() }}"
                                    title="{{ $product->title }}"
                                    rates="{{ $product->rates_count }}"
                                    price="{{ $product->getPrice() }}"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
