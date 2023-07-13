@extends('Home::Home.layouts.master')

@section('title', $product->title)

@section('content')
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="product-main-1 no-arrow">
{{--                                            @foreach ($product->galleries as $gallery)--}}
{{--                                                <div>--}}
{{--                                                    <div class="slider-image">--}}
{{--                                                        <img src="{{ $gallery->thumb }}" id="img-1" alt="gallery"--}}
{{--                                                        data-zoom-image="{{ $gallery->thumb }}"--}}
{{--                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
                                            <img src="
                                            @if (isset($product->first_media->thumb))
                                                {{ URL::to('/') . '/'  . $product->first_media->thumb }}
                                            @else
                                                {{ asset('home/images/default_item_img.jpg') }}
                                            @endif
                                             "
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bottom-slider-image left-slider no-arrow slick-top">
                                            @foreach ($product->galleries as $gallery)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{ $gallery->thumb }}" alt="gallery"
                                                        class="img-fluid blur-up lazyload">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
{{--                                <h6 class="offer-top">30% Off</h6> TODO --}}
                                <h2 class="name">{{ $product->title }}</h2>
                                <div class="price-rating">
                                    <h3 class="theme-color price">
                                        {{ $product->getPrice() }} ₽
{{--                                        <del class="text-content">$58.46</del>--}}
{{--                                        <span class="offer theme-color">(8% off)</span>--}}
                                    </h3>
                                    <div class="product-rating custom-rate">
                                        <ul class="rating">
                                            @if ((int) $product->rates_count === 0)
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            @else
                                                @for ($i = 0; $i < $product->rates_count; $i++)
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                @endfor
                                            @endif
                                        </ul>
                                        <span>({{ $product->rates_count }}) Оценка пользователей</span>
                                    </div>
                                </div>
                                <div class="procuct-contain">
                                    <p>
                                        {{ $product->short_description }}
                                    </p>
                                </div>
{{--                                <div class="time deal-timer product-deal-timer mx-md-0 mx-auto">--}}
{{--                                    <div class="product-title">--}}
{{--                                        <h4>Hurry up! Sales Ends In</h4>--}}
{{--                                    </div>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <div class="counter">--}}
{{--                                                <div>--}}
{{--                                                    <h5 id="days2"></h5>--}}
{{--                                                    <h6>Days</h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="counter">--}}
{{--                                                <div>--}}
{{--                                                    <h5 id="hours2"></h5>--}}
{{--                                                    <h6>Hours</h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="counter">--}}
{{--                                                <div>--}}
{{--                                                    <h5 id="minutes2"></h5>--}}
{{--                                                    <h6>Min</h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="counter">--}}
{{--                                                <div>--}}
{{--                                                    <h5 id="seconds2"></h5>--}}
{{--                                                    <h6>Sec</h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div> TODO--}}
                                <div class="note-box product-packege">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button id="qty-left-minus" type="button" data-type="minus" data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input id="quantity" class="form-control input-number qty-input" type="text"
                                                   name="quantity"

                                                   @if (isset($cart_detail[$product['id']]))
                                                       value="{{ $cart_detail[$product['id']]['quantity'] }}"
                                                   @else
                                                       value="0"
                                                   @endif
                                            >
                                            <button id="qty-right-plus" type="button" data-type="plus"
                                                    data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div> {{-- FIX TODO --}}

                                    <button data-id="{{ $product['id'] }}" id="btn-add-cart"
                                            class="btn btn-md bg-dark cart-button text-white w-100">
                                    @if (isset($cart_detail[$product->id]['quantity']) && $cart_detail[$product->id]['quantity'])
                                        Обновить количество
                                    @else
                                        Добавить в корзину
                                    @endif
                                    </button>
                                </div>

                                @if (isset($cart_detail->count))

                                <br>
                                <button data-id="{{ $product['id'] }}" id="btn-remove-cart"
                                        class="btn btn-md bg-dark cart-button text-white w-100">Удалить из корзины
                                </button>

                                @endif
                                <div class="buy-box">
{{--                                    <a href="wishlist.html">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                        <span>Добавить в избранное</span>--}}
{{--                                    </a>--}}
{{--                                    <a href="compare.html">--}}
{{--                                        <i data-feather="shuffle"></i>--}}
{{--                                        <span>Add To Compare</span>--}}
{{--                                    </a>--}}
                                </div>

                                <div class="pickup-box">
                                    <div class="product-title">
                                        <h4>Информация о товаре</h4>
                                    </div>
                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
{{--                                            <li>Type :--}}
{{--                                                <a href="javascript:void(0)">{{ $product->type }}</a>--}}
{{--                                            </li>--}}
                                            <li>Артикул :
                                                <a href="javascript:void(0)">{{ $product->getSku() }}</a>
                                            </li>
{{--                                            <li>Created At :--}}
{{--                                                <a href="javascript:void(0)">{{ $product->getCreatedAt() }}</a>--}}
{{--                                            </li>--}}
                                            <li>Остаток :
                                                <a href="javascript:void(0)"> {{ $product->count }} шт</a>
                                            </li>
{{--                                            <li>Tags :--}}
{{--                                                @foreach ($product->tags as $tag)--}}
{{--                                                    <a href="{{ $tag->path() }}">{{ $tag->name }},</a>--}}
{{--                                                @endforeach--}}
{{--                                            </li>--}}
                                            <li>Категории :
{{--                                                {{ logger($product->categories) }}--}}
                                                @foreach ($product->categories as $category)
                                                    <a href="{{ $category->path() }}">{{ $category->title }},</a>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
{{--                                <div class="paymnet-option">--}}
{{--                                    <div class="product-title">--}}
{{--                                        <h4>Guaranteed Safe Checkout</h4>--}}
{{--                                    </div>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0)">--}}
{{--                                                <img src="{{ asset('home/svg/paypal.svg') }}"--}}
{{--                                                class="blur-up lazyload" alt="paypal">--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0)">--}}
{{--                                                <img src="{{ asset('home/svg/visa.svg') }}"--}}
{{--                                                class="blur-up lazyload" alt="visa">--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0)">--}}
{{--                                                <img src="{{ asset('home/svg/master-card.svg') }}"--}}
{{--                                                class="blur-up lazyload" alt="master card">--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0)">--}}
{{--                                                <img src="{{ asset('home/svg/stripe.svg') }}"--}}
{{--                                                class="blur-up lazyload" alt="stripe">--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0)">--}}
{{--                                                <img src="{{ asset('home/svg/express.svg') }}"--}}
{{--                                                class="blur-up lazyload" alt="express">--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Описание
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">Дополнительная информация
                                        </button>
                                    </li>
{{--                                    <li class="nav-item" role="presentation">--}}
{{--                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"--}}
{{--                                            data-bs-target="#review" type="button" role="tab" aria-controls="review"--}}
{{--                                            aria-selected="false">Review--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
                                </ul>
                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description">
                                            {!! $product->body !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                        <div class="table-responsive">
                                            <table class="table info-table">
                                                <tbody>
                                                    @foreach ($product->attributes as $attribute)
                                                        <tr>
                                                            <td>{{ $attribute->title }}</td>
                                                            <td>{{ $attribute->value }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @include('Home::Pages.products.section.details-page.comments', ['commentable' => $product])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
{{--                        @include('Home::Pages.products.section.details-page.vendor', ['vendor' => $product->vendor])--}}
                        @if (! is_null($advertising))
                            @include('Home::Pages.products.section.details-page.advertising', ['advertising' => $advertising])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Похожие товары</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="{{ asset('home/svg/leaf.svg') }}"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach ($similarProducts as $product)
                            <div>
                                <div class="product-box-3 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ $product->path() }}">
                                                <img src="

                                                            @if (isset($product->first_media->thumb))
                                                                {{ URL::to('/') . '/'  . $product->first_media->thumb }}
                                                            @else
                                                                {{ asset('home/images/default_item_img.jpg') }}
                                                            @endif
                                                             "
                                                class="img-fluid blur-up lazyload" alt="product image">
                                            </a>
{{--                                            <ul class="product-option">--}}
{{--                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">--}}
{{--                                                    <a href="compare.html">--}}
{{--                                                        <i data-feather="refresh-cw"></i>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">--}}
{{--                                                    <a href="{{ $product->addWishlist() }}" class="notifi-wishlist">--}}
{{--                                                        <i data-feather="heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
{{--                                            <span class="span-name">{{ $product->vendor->name }}</span>--}}
                                            <a href="{{ $product->path() }}">
                                                <h5 class="name">{{ $product->title }}</h5>
                                            </a>
                                            <div class="product-rating mt-2">
                                                <ul class="rating">
                                                    @if ((int) $product->rates_count === 0)
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                    @else
                                                        @for ($i = 0; $i < $product->rates_count; $i++)
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                        @endfor
                                                    @endif
                                                </ul>
                                                <span>({{ $product->rates_count }})</span>
                                            </div>
{{--                                            <h6 class="unit">{{ $product->type }}</h6>--}}
                                            <h5 class="price">
                                                <span class="theme-color">{{ $product->getPrice() }} ₽</span>
{{--                                                <del>$12.57</del>--}}
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
{{--                                                <button class="btn btn-add-cart addcart-button">Add--}}
{{--                                                    <i class="fa-solid fa-plus bg-gray"></i>--}}
{{--                                                </button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
<script>
    console.log('details set');
    $(document).ready(function() {
        console.log('set');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn-add-cart').click( function() {
            console.log('click');
            var product_id = $(this).data('id');
            var count = $('#quantity').val();
            var url = "/cart-add/" + product_id + "/" + count;
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": document.querySelector('meta[name="csrf-token"]').content,
                    product_id: product_id
                },
                success: function (data) {
                    location. reload()
                    console.log('Error:', data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('#btn-remove-cart').click( function() {
            console.log('click');
            var product_id = $(this).data('id');
            var url = "/cart/" + product_id + "/delete";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": document.querySelector('meta[name="csrf-token"]').content,
                    product_id: product_id
                },
                success: function (data) {
                    location. reload()
                    console.log('Error:', data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('#qty-right-plus').click( function() {
            let qty = $('#quantity');
            qty.val(parseInt(qty.val()) + 1);
        });

        $('#qty-left-minus').click( function() {
            let qty = $('#quantity');
            const val = parseInt(qty.val());

            if (val > 0) {
                qty.val(parseInt(qty.val()) - 1);
            }
        });
    });
</script>

