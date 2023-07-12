@extends('Home::Home.layouts.master')

@section('title', 'Search products ' . $search)

@section('content')
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
                    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2
                        product-list-section">
                        @foreach ($products as $product)
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
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
{{--                                            <h6 class="unit">{{ $product->type }}</h6>--}}
                                            <h5 class="price">
                                                <span class="theme-color"> {{ $product->getPrice() }} ₽</span>
                                                {{--                                <del>$15.15</del>--}}
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a class="btn btn-add-cart addcart-button" href="{{ $product->cartPath() }}">
                                                    Добавить
                                                    <i class="fa-solid fa-plus bg-gray"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <nav class="custome-pagination">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

