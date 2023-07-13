@extends('Home::Home.layouts.master')

@section('title', 'Cart')

@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Корзина</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <form method="POST" action="{{ route('cart.save.full') }}">
                                @csrf
                            <table class="table">
                                <tbody>
                                @if($cart_detail)
                                    @foreach($cart_detail as $product)
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="{{ route('products.details', ['sku' => $product['sku'], 'slug' => $product['slug']]) }}"
                                                       class="product-image">
                                                        <img src="

                                                        @if (isset($product['first_media']))
                                                            {{ URL::to('/') . '/'  . $product['first_media'] }}
                                                        @else
                                                            {{ asset('home/images/default_item_img.jpg') }}
                                                        @endif

                                                        "
                                                             class="img-fluid blur-up lazyload" alt="product image">
                                                    </a>

                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name">
                                                                <a href="{{ route('products.details', ['sku' => $product['sku'], 'slug' => $product['slug']]) }}">
                                                                    {{ $product['title'] }}
                                                                </a>
                                                            </li>
                                                            <li class="text-content">
                                                                <span class="text-title">Артикул:</span> {{ $product['sku'] }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="price">
                                                <h4 class="table-title text-content">Цена</h4>
                                                <h5>{{ number_format($product['price']) }} ₽
                                                    {{--                                                    <del class="text-content">${{ number_format($product['price']) }}</del> TODO --}}
                                                </h5>
                                                {{--                                                <h6 class="theme-color">You Save : $20.68</h6>--}}
                                            </td>


                                            <td id="quantity">
                                                <h4 class="table-title text-content">Количество</h4>

                                                <div class="cart_qty qty-box product-qty">
                                                    <div class="input-group">
                                                        <button class="cart-qty-left-minus" type="button" data-type="minus" data-product="{{ $product['id'] }}">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input name="quantity[{{ $product['id'] }}]" id="quantity_{{ $product['id'] }}" class="form-control input-number qty-input" type="text"
                                                               @if (isset($cart_detail[$product['id']]))
                                                                   value="{{ $cart_detail[$product['id']]['quantity'] }}"
                                                               @else
                                                                   value="0"
                                                            @endif
                                                        >

                                                        <button class="cart-qty-right-plus" type="button" data-type="plus"
                                                                data-product="{{$product['id']}}">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                {{--                                                {{ $product['quantity'] }}--}}


                                            </td>


                                            <td class="subtotal">
                                                <h4 class="table-title text-content">Всего</h4>
                                                <h5>
                                                    {{ $product['price'] * $product['quantity'] }} ₽
                                                </h5>
                                            </td>

                                            <td class="save-remove">
                                                {{--                                                <h4 class="table-title text-content">Action</h4>--}}
                                                {{--                                                <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a> TODO--}}
                                                <a class="remove close_button" href="#"
                                                   onclick="showConfirmMessage('Удалить?', '{{ route('cart.delete', $product['id']) }}');">
                                                    Удалить
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h1>Ваша корзина пуста!</h1>
                                @endif




                                </tbody>
                            </table>

                                @if($cart_detail)
                                    <br>
                                    <button style="float: right; margin-top: 15px;" type="submit" id="cart-save" style="margin-left: 10px" class="btn btn-animation proceed-btn fw-bold" data-type="plus"
                                    >
                                        Сохранить изменения
                                        <i aria-hidden="true"></i>
                                    </button>
                                @endif


                            </form>
                        </div>
                    </div>
                </div>




                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Итог</h3>
                        </div>

{{--                        <div class="summery-contain">--}}
{{--                            <div class="coupon-cart">--}}
{{--                                <h6 class="text-content mb-2">Coupon Apply</h6>--}}
{{--                                <div class="mb-3 coupon-box input-group">--}}
{{--                                    <input type="email" class="form-control" id="exampleFormControlInput1"--}}
{{--                                           placeholder="Enter Coupon Code Here...">--}}
{{--                                    <button class="btn-apply">Apply</button>--}}
{{--                                </div>--}}
{{--                            </div> TODO--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <h4>Subtotal</h4>--}}
{{--                                    <h4 class="price">$--}}
{{--                                        {{ number_format(\Modules\Cart\Services\CartService::handleTotalPrice()) }}--}}
{{--                                    </h4>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <h4>Coupon Discount</h4>--}}
{{--                                    <h4 class="price">(-) 0.00</h4>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Сумма</h4>
                                <h4 class="price theme-color">
                                    {{ $cart_total }} ₽
                                </h4>
                            </li>
                        </ul>
                        <div class="button-group cart-button">
                            <ul>
                                @if($cart_detail)
                                    <li>
                                        <button onclick="location.href = '{{ route('cart.promote') }}';"
                                                class="btn btn-animation proceed-btn fw-bold">Отправить на обработку (Убедитесь что вы сохранили все изменения)
                                        </button>
                                    </li>
                                @endif

                                <li>
                                    <button onclick="location.href = '{{ route('products.home') }}';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i data-feather="arrow-left"></i>Вернуться к выбору
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cart-qty-right-plus').click(function () {
            let product = $(this).data('product');
            let qty = $('#quantity_' + product);
            qty.val(parseInt(qty.val()) + 1);
        });

        $('.cart-qty-left-minus').click(function () {
            let product = $(this).data('product');
            let qty = $('#quantity_' + product);

            const val = parseInt(qty.val());
            if (val > 0) {
                qty.val(parseInt(qty.val()) - 1);
            }
        });

        // $('#cart-save').click(function () {
        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: {
        //             "_token": document.querySelector('meta[name="csrf-token"]').content,
        //             product_id: product_id
        //         },
        //         success: function (data) {
        //             location. reload()
        //             console.log('Error:', data);
        //         },
        //         error: function (data) {
        //             console.log('Error:', data);
        //         }
        //     });
        // });

    });

    // cart-save
</script>
