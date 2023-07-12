<li class="product-box-contain">
    <div class="drop-cart">
        <a href="
{{--    route('products.details', ['sku' => $product->sku, 'slug' => $product->slug])--}}
     " class="drop-image">
            <img src="
             @if (isset($product['first_media']))
                    {{ URL::to('/') . '/'  . $product['first_media'] }}
                @else
                    {{ asset('home/images/default_item_img.jpg') }}
                @endif
{{--            {{ $product->first_media->thumb }}--}}
            "
                 class="blur-up lazyload" alt="product image">
        </a>
        <div class="drop-contain">
            <a href="
{{--            {{ route('products.details', ['sku' => $product->sku, 'slug' => $product->slug]) }}--}}
            ">
                {{ logger($product) }}
                <h5>{{ $product['title'] }}</h5>
            </a>
            <h6><span>{{ $product['quantity'] }} x</span> {{ $product['price'] }} ₽</h6>
            <a class="close-button close_button" align="right" href="#"
               onclick="showConfirmMessage('Are you sure to delete?', '{{ route('cart.delete', $product['id']) }}');">
                <i data-feather="x-circle"></i>
            </a>
        </div>
    </div>
</li>
