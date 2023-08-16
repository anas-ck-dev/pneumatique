<div class="row" >
@foreach ($products as $key => $product)
<?php $product_image = explode(',', $product->image);
$product_image = htmlspecialchars($product_image[0]); ?>

<div class="col-6 col-sm-4 col-md-3">
    <div class="product-default">
        <figure class="preview_product_1"
            style="background-image: url('https://belhassan.brosstock.com/public/images/product/{{ $product_image }}');}">
            <a href="{{ url('product/' . $product->id) }}">
            </a>
        </figure>

        <div class="product-details">
            <div class="category-wrap">
                <div class="category-list">
                    <a href=""
                        class="product-category">{{ $product->category->name }}</a>
                </div>
            </div>

            <h3 class="product-title">
                <a href="{{ url('product/' . $product->id) }}">{{ $product->name }}</a>
            </h3>

            <div class="ratings-container">
                <div class="product-ratings">
                    <span class="ratings"
                        style="width:{{ $product->ratings_percentage }}"></span>
                    <!-- Assuming $product->ratings_percentage contains the percentage of ratings -->
                    <span class="tooltiptext tooltip-top"></span>
                </div>
            </div>

            <div class="price-box">

                <span class="product-price">{{ $product->price }}Dh</span>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
{{ $products->links() }}

dfshsghsd
