
<?php
$product_image = explode(",", $product->image); // Split the string into an array
$product_image = htmlspecialchars($product_image[count($product_image) - 1]); // Get the last element
?>
<div class="col-xl-3 col-sm-6 product-card">
    <div class="axil-product product-style-one mb--30">
        <div class="thumbnail">

            <a href="{{ url('product/' . $product->id) }}">

            <figure class="preview_product_1"
            style="background-image:url('https://belhassan.brosstock.com/public/images/product/{{ $product_image }}">
            </a>
        </figure>
            @if (!is_null($product->promotion))
            <!-- Code to execute if the promotion is null -->
                <div class="label-block label-right">
                    <div class="product-badget">{{ $product->promotion }}% OFF</div>
                </div>
                @else
                <!-- Code to execute if the promotion is not null -->
                @endif
                @if(isset(session('cart')[$product->id]['quantity']))                   
                    <div class="label-block label-left count-panier">
                        <a href="#" class="cart-dropdown-btn count-centent">
                            <span class="cart-count">         
                                {{ session('cart')[$product->id]['quantity'] }}
                            </span>
                            <i class="flaticon-shopping-cart"></i>
                        </a>
                    </div>
                @endif

        
        </div>
        <div class="product-content">
            <div class="inner">
                <h5 class="title"><a href="{{ url('product/' . $product->id) }}">{{ $product->name }}</a></h5>
                <div class="product-price-variant">
                    <span class="price current-price">{{ $product->price }} Dhs</span>

                    <ul class="cart-action product">
                        <li class="select-option">
                            <a href="{{ url('product/' . $product->id) }}" tabindex="0">Acheter</a>
                        </li>
                        <li class="select-option">
                            <a href="{{ route('add_to_cart', $product->id) }}" tabindex="0">
                            Ajouter au panier
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
