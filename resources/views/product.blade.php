<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $product->name }}</title>


    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ Str::limit($product->name, 60) }}" />
    <meta property="og:description" content="{{ Str::limit($product->product_details, 80) }}" />
    <meta property="og:image" content="https://belhassan.brosstock.com/public/images/product/{{ $product->image }}" />

    <meta name="keywords" content="Pneumatiques belhassan,Pneumatiques " />
    <meta name="description" content="{{ $product->product_details }}">
    @include('layouts/header')
    <main class="main">
        <div class="container">


            <div class="product-single-container product-single-default">
                <div class="cart-message d-none">
                    <strong class="single-cart-notice">{{ $product->name }}</strong>
                    <span>has been added to your cart.</span>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                <div class="product-item">
                                    <img class="product-single-image"
                                        src="https://belhassan.brosstock.com/public/images/product/{{ $product->image }}"
                                        data-zoom-image="https://belhassan.brosstock.com/public/images/product/{{ $product->image }}"
                                        width="468" height="468" alt="product" />
                                </div>
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        {{-- <div class="prod-thumbnail owl-dots">
                            <div class="owl-dot">
                                <img src="/assets/images/demoes/demo42/product/product14-150x150.jpg" width="110"
                                    height="110" alt="product-thumbnail" />
                            </div>
                        </div> --}}
                    </div><!-- End .product-single-gallery -->

                    <div class="col-lg-7 col-md-6 product-single-details" style="padding: 50px">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('failed'))
                            <div class="alert alert-danger">
                                {{ session()->get('failed') }}
                            </div>
                        @endif
                        <h1 class="product-title" title="{{ $product->name }}">
                            {{ Str::limit($product->name, 60) }}</h1>

                        <div class="product-nav d-none">
                            <div class="product-prev">
                                <a href="#">
                                    <span class="product-link"></span>

                                    <span class="product-popup">
                                        <span class="box-content">
                                            <img alt="product" width="150" height="150"
                                                src="/assets/images/products/product-3.jpg" style="padding-top: 0px;">

                                            <span>Circled Ultimate 3D Speaker</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="product-next">
                                <a href="#">
                                    <span class="product-link"></span>

                                    <span class="product-popup">
                                        <span class="box-content">
                                            <img alt="product" width="150" height="150"
                                                src="/assets/images/products/product-4.jpg" style="padding-top: 0px;">

                                            <span>Blue Backpack for the Young</span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <hr class="short-divider">

                        <div class="price-box mt-5">
                            <span class="product-price"> {{ $product->price }}Dh</span>
                        </div><!-- End .price-box -->

                        <div class="product-desc">
                            <p>{{ $product->product_details }}</p>
                        </div><!-- End .product-desc -->

                        <ul class="single-info-list">
                            <!---->
                            {{-- <li>
                                SKU:
                                <strong>654111995-1-1-2</strong>
                            </li> --}}

                            <li>
                                CATEGORY:
                                <strong>
                                    <a href="#" class="product-category">{{ $product->category->name
                                     }}
                                    </a>


                                    <?php
                                    $disabled="";
                                    if ($product->qty <= 0) {
                                        $disabled="disabled";
                                    ?>
<br>
                                        <span class="alert-danger" > Ripture de stock</span>

                                        <?php

                                    }


                                    ?>
                                </strong>
                            </li>


                            <form action="{{ route('command.store') }}" method="post">
                                @csrf
                                <input type="number"  class="d-none" name="product_id" value="{{ $product->id }}">
                                <div class="product-container">
                                    <div class="product-quantity">
                                        <input type="number" name="quantity"  value="1" min="1" <?php echo $disabled ?>
                                            max="{{ $product->qty }}" />
                                        @error('quantity')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="full_name">Nom Complet</label>
                                                <input type="text" id="full_name" name="full_name"
                                                    class="form-control" required
                                                    placeholder="Entrez votre nom complet"  <?php echo $disabled ?>>
                                                @error('full_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" name="address"
                                                    class="form-control" required placeholder="Entrez votre Address" <?php echo $disabled ?>>
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="tel">tele</label>
                                                <input type="tel" id="tel" name="tel"
                                                    class="form-control" required placeholder="Entrez votre tel" <?php echo $disabled ?>>
                                                @error('tel')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" <?php echo $disabled ?>>shop now</button>
                                </div>
                            </form>
                        </ul>

                        <div class="product-action d-none">

                            <div class="product-single-qty">
                                <input class="horizontal-quantity form-control" type="text">
                            </div><!-- End .product-single-qty -->

                            <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                                Cart</a>

                            <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                        </div><!-- End .product-action -->

                        <hr class="divider mb-0 mt-0">

                        <div class="product-single-share mb-2">
                            <label class="sr-only">Share:</label>

                            {{-- <button type="button" onclick="shareOnWhatsApp()">Share on WhatsApp</button> --}}
                            <script>
                                function shareOnWhatsApp() {
                                    const productLink = 'http://127.0.0.1:8000/product/11';

                                    // Generate the WhatsApp sharing URL with the product link and a default message (optional).
                                    const sharingUrl =
                                        `https://api.whatsapp.com/send?text=${encodeURIComponent(productLink)}`;

                                    // Open a new window to share the product on WhatsApp.
                                    window.open(sharingUrl, '_blank', 'width=600,height=400');
                                }
                            </script>
                            {{-- <div class="social-icons mr-2">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                    title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                    title="Twitter"></a>
                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in"
                                    target="_blank" title="Linkedin"></a>
                                <a href="#" class="social-icon social-gplus fab fa-google-plus-g"
                                    target="_blank" title="Google +"></a>
                                <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                    title="Mail"></a>
                            </div><!-- End .social-icons --> --}}

                            <a href="wishlist.html" class="btn-icon-wish add-wishlist d-none"
                                title="Add to Wishlist"><i class="icon-wishlist-2"></i><span>Add to
                                    Wishlist</span></a>
                        </div><!-- End .product single-share -->
                    </div><!-- End .product-single-details -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                            href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                            aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item d-none">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                            role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                            Information</a>
                    </li>

                    <li class="nav-item d-none">
                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                            href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                            aria-selected="false">Reviews (1)</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                        aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                            {{ $product->product_details }}
                        </div><!-- End .product-desc-content -->
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade d-none" id="product-tags-content" role="tabpanel"
                        aria-labelledby="product-tab-tags">
                        <table class="table table-striped mt-2">
                            <tbody>
                                <tr>
                                    <th>Weight</th>
                                    <td>23 kg</td>
                                </tr>

                                <tr>
                                    <th>Dimensions</th>
                                    <td>12 × 24 × 35 cm</td>
                                </tr>

                                <tr>
                                    <th>Color</th>
                                    <td>Black, Green, Indigo</td>
                                </tr>

                                <tr>
                                    <th>Size</th>
                                    <td>Large, Medium, Small</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade d-none" id="product-reviews-content" role="tabpanel"
                        aria-labelledby="product-tab-reviews">
                        <div class="product-reviews-content">
                            <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                            <div class="comment-list">
                                <div class="comments">
                                    <figure class="img-thumbnail">
                                        <img src="/assets/images/blog/author.jpg" alt="author" width="80"
                                            height="80">
                                    </figure>

                                    <div class="comment-block">
                                        <div class="comment-header">
                                            <div class="comment-arrow"></div>

                                            <div class="ratings-container float-sm-right">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div>

                                            <span class="comment-by">
                                                <strong>Joe Doe</strong> – April 12, 2018
                                            </span>
                                        </div>

                                        <div class="comment-content">
                                            <p>Excellent.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="add-product-review">
                                <h3 class="review-title">Add a review</h3>

                                <form action="#" class="comment-form m-0">
                                    <div class="rating-form">
                                        <label for="rating">Your rating <span class="required">*</span></label>
                                        <span class="rating-stars">
                                            <a class="star-1" href="#">1</a>
                                            <a class="star-2" href="#">2</a>
                                            <a class="star-3" href="#">3</a>
                                            <a class="star-4" href="#">4</a>
                                            <a class="star-5" href="#">5</a>
                                        </span>

                                        <select name="rating" id="rating" required="" style="display: none;">
                                            <option value="">Rate…</option>
                                            <option value="5">Perfect</option>
                                            <option value="4">Good</option>
                                            <option value="3">Average</option>
                                            <option value="2">Not that bad</option>
                                            <option value="1">Very poor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Your review <span class="required">*</span></label>
                                        <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                    </div><!-- End .form-group -->


                                    <div class="row">
                                        <div class="col-md-6 col-xl-12">
                                            <div class="form-group">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" class="form-control form-control-sm" required>
                                            </div><!-- End .form-group -->
                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="form-group">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" class="form-control form-control-sm" required>
                                            </div><!-- End .form-group -->
                                        </div>

                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="save-name" />
                                                <label class="custom-control-label mb-0" for="save-name">Save my
                                                    name, email, and website in this browser for the next time I
                                                    comment.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
                            </div><!-- End .add-product-review -->
                        </div><!-- End .product-reviews-content -->
                    </div><!-- End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-single-tabs -->

            {{-- <div class="products-section pt-0 d-none">
                <h2 class="section-title">Related Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small dots-simple">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="demo42-product.html">
                                <img src="/assets/images/demoes/demo42/product/product6-300x300.jpg" width="300"
                                    height="300" alt="product">
                            </a>
                            <div class="btn-icon-group">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                            </div>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="#">Fluids &amp; Chemicals</a>,
                                    <a href="#">Hot Deals</a>
                                </div>
                                <a href="wishlist.html" class="btn-icon-wish"><i class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title">
                                <a href="demo42-product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$299.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>

                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="demo42-product.html">
                                <img src="/assets/images/demoes/demo42/product/product11-300x300.jpg" width="300"
                                    height="300" alt="product">
                            </a>
                            <div class="btn-icon-group">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                            </div>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="#">Sound &amp; Video</a>
                                </div>
                                <a href="wishlist.html" class="btn-icon-wish"><i class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title">
                                <a href="demo42-product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top">4.00</span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$299.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>

                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="demo42-product.html">
                                <img src="/assets/images/demoes/demo42/product/product5-300x300.jpg" width="300"
                                    height="300" alt="product">
                            </a>
                            <div class="btn-icon-group">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                            </div>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="#">Hot Deals</a>,
                                    <a href="#">Steering Wheels</a>
                                </div>
                                <a href="wishlist.html" class="btn-icon-wish"><i class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title">
                                <a href="demo42-product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$55.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>

                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="demo42-product.html">
                                <img src="/assets/images/demoes/demo42/product/product7-300x300.jpg" width="300"
                                    height="300" alt="product">
                            </a>
                            <div class="label-group">
                                <span class="product-label label-hot">HOT</span>
                                <span class="product-label label-sale">-35%</span>
                            </div>
                            <div class="btn-icon-group">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                            </div>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="#">Interior Accessories</a>
                                </div>
                                <a href="wishlist.html" class="btn-icon-wish"><i class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title">
                                <a href="demo42-product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$299.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>

                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="demo42-product.html">
                                <img src="/assets/images/demoes/demo42/product/product13-300x300.jpg" width="300"
                                    height="300" alt="product">
                            </a>
                            <div class="label-group">
                                <span class="product-label label-sale">-17%</span>
                            </div>
                            <div class="btn-icon-group">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                            </div>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="#">Auto Parts</a>
                                </div>
                                <a href="wishlist.html" class="btn-icon-wish"><i class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title">
                                <a href="demo42-product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">$59.00</del>
                                <span class="product-price">$49.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>
                </div><!-- End .products-slider -->
            </div><!-- End .products-section --> --}}
        </div><!-- End .container -->
    </main><!-- End .main -->

    <script>
        $(function() {

            $('<span class="add" uk-icon="plus">+</span>').insertAfter(
                '.product-container .product-quantity input');
            $('<span class="sub" uk-icon="minus">-</span>').insertBefore(
                '.product-container .product-quantity input');


            $('.add').click(function() {
                var selectedInput = $(this).prev('input');
                if (selectedInput.val() < 10) {
                    selectedInput[0].stepUp(1);
                }
            });

            $('.sub').click(function() {
                var selectedInput = $(this).next('input');
                if (selectedInput.val() > 0) {
                    selectedInput[0].stepDown(1);
                }
            });


        });
    </script>
    @include('layouts/footer')

</html>
