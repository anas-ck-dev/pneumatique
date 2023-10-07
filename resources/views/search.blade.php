@if ($searchText)
    @if ($products->count() > 0)
        @foreach ($products as $key => $product)
            <?php
                $product_images = explode(",", $product->image);
                $product_image = htmlspecialchars(end($product_images));
            ?>
            <div class="axil-product-list">
                <div class="thumbnail">
                    <a href="{{ url('product/' . $product->id) }}">
                        <img style="width: 200px; height: 200px;" src="{{ asset('images/product/' . $product_image) }}" alt="Product Images">
                    </a>
                </div>
                <div class="product-content axil-product">
                    <div class="product-rating">
                        <span class="rating-icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fal fa-star"></i>
                        </span>
                    </div>
                    <h6 class="product-title"><a href="{{ url('product/' . $product->id) }}">{{ $product->name }}</a></h6>
                    <div class="product-price-variant">
                        <span class="price current-price">{{ $product->price }}</span>
                    </div>
                    <ul class="cart-action product">
                        <li class="select-option"><a href="{{ url('product/' . $product->id) }}" tabindex="0">Acheter</a></li>
                    </ul>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info w-100 pl-5">No products available.</div>
    @endif
@else
    <div class="alert alert-info w-100 pl-5">Search for products.</div>
@endif










