@extends('Home::Home.layouts.master')

@section('title', 'Products')

@section('content')
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
                    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        @if (count($products))
                            @foreach ($products as $product)
                                <div>
                                    <div class="product-box-3 h-100 wow fadeInUp">
                                        <div class="product-header">
                                            <div class="product-image">
                                                <a href="{{ $product->path() }}">
                                                    <img src="@if (isset($product->first_media->thumb))
                                                                {{ URL::to('/') . '/'  . $product->first_media->thumb }}
                                                            @else
                                                                {{ asset('home/images/default_item_img.jpg') }}
                                                            @endif

                                               "
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>
{{--                                                <ul class="product-option">--}}
{{--                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">--}}
{{--                                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                                           data-bs-target="#view">--}}
{{--                                                            <i data-feather="eye"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">--}}
{{--                                                        <a href="compare.html">--}}
{{--                                                            <i data-feather="refresh-cw"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}

{{--                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">--}}
{{--                                                        <a href="wishlist.html" class="notifi-wishlist">--}}
{{--                                                            <i data-feather="heart"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
                                            </div>
                                        </div>
                                        <div class="product-footer">
                                            <div class="product-detail">
                                                <span class="span-name">{{ $product->getSku() }}</span>
                                                <a href="{{ $product->path() }}">
                                                    <h5 class="name">{{ $product->title }}</h5>
                                                </a>
                                                <p class="text-content mt-1 mb-2 product-content">
                                                    {{ $product->description }}
                                                </p>
                                                <div class="product-rating">
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
{{--                                                <h6 class="unit">{{ $product->type }}</h6>--}}
                                                <h5 class="price">
                                                    <span class="theme-color"> {{ $product->getPrice() }} ₽</span>
                                                    {{--                                <del>$15.15</del>--}}
                                                </h5>
                                                <div class="add-to-cart-box bg-white">
                                                    @if (isset($cart_detail[$product->id]))
                                                        <a data-id="{{ $product->id }}" class="btn btn-remove-cart addcart-button">
                                                            Убрать из корзины
                                                            <i class="fa-solid fa-minus bg-gray"></i>
                                                        </a>
                                                    @else
                                                        <a data-id="{{ $product->id }}" class="btn btn-add-cart addcart-button">
                                                            Добавить
                                                            <i class="fa-solid fa-plus bg-gray"></i>
                                                        </a>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>Товаров в этой категории не найдено ;(</h3>
                        @endif

                    </div>
                    <nav class="custome-pagination">
                        {{ $products->render() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection


<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('details set');
        $('.btn-add-cart').click(function () {
            console.log('details click add');

            var product_id = $(this).data('id');
            var url = "/cart-add/" + product_id;
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": document.querySelector('meta[name="csrf-token"]').content,
                    product_id: product_id
                },
                success: function (data) {
                    location.reload()
                    console.log('Error:', data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('.btn-remove-cart').click( function() {
            // console.log('click');
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
    });
</script>
{{--    $(document).ready(function() {--}}
{{--        console.log('set');--}}
{{--        // $.ajaxSetup({--}}
{{--        //     headers: {--}}
{{--        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        //     }--}}
{{--        // });--}}

{{--       // $('#btn-add-cart').click( function() {--}}
{{--            // console.log('click');--}}
{{--            // var product_id = $(this).data('id');--}}
{{--            // var url = "/cart-add/" + product_id;--}}
{{--            // $.ajax({--}}
{{--            //     type: "POST",--}}
{{--            //     url: url,--}}
{{--            //     data: {--}}
{{--            //         "_token": document.querySelector('meta[name="csrf-token"]').content,--}}
{{--            //         product_id: product_id--}}
{{--            //     },--}}
{{--            //     success: function (data) {--}}
{{--            //         location. reload()--}}
{{--            //         console.log('Error:', data);--}}
{{--            //     },--}}
{{--            //     error: function (data) {--}}
{{--            //         console.log('Error:', data);--}}
{{--            //     }--}}
{{--            // });--}}
{{--       // });--}}


{{--    });--}}
{{--</script>--}}

