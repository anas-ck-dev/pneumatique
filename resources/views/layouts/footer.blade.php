
    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-1 footer-dark">
        <!-- Start Footer Top Area  -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-12">
                        <div class="axil-footer-widget">
                            <div class="logo mb--30">
                                <a href="index.html">
                                    <img class="light-logo" src="{{asset('assets/images/logo/logo-light.png')}}" alt="Logo Images">
                                </a>
                            </div>
                            <div class="inner">
                                <p>685 Market Street <br>
                                Las Vegas, LA 95820, <br>
                                United States.
                                </p>
                                <div class="social-share">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-discord"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">ABOUT</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="about-us.html">Who We Are</a></li>
                                    <li><a href="blog.html">Latest Post</a></li>
                                    <li><a href="shop-sidebar.html">New Arraival</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">ACCOUNT</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="sign-up.html">Login / Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">SUPPORT</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="terms-of-service.html">Terms Of Use</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-xl-start justify-content-center">
                            <ul class="quick-link">
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="terms-of-service.html">Terms of Service</a></li>
                            </ul>
                            <ul class="quick-link">
                                <li>© 2023. All rights reserved by <a target="_blank" href="https://axilthemes.com/">Axilthemes</a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{asset('assets/images/icons/cart/cart-1.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/images/icons/cart/cart-2.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/images/icons/cart/cart-3.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/images/icons/cart/cart-6.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/images/icons/cart/cart-5.png')}}" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
            

        
    </footer>
    <!-- End Footer Area  -->
    
    
    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group bordred">
                        <input type="search" class="form-control" name="search-input" id="search-input" placeholder="Recherche">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
            
                <div class="psearch-results" id="results-container"> 
                </div>
            </div> 
        </div>
    </div>
    <!-- Header Search Modal End -->    


<!-- Quick view panier -->
<div class="cart-dropdown" id="cart-dropdown">
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h2 class="header-title">Cart review</h2>
            <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-body">
            <ul class="cart-item-list">
                @php $total = 0 @endphp
                @foreach((array) session('cart') as $id => $details)
                    <li class="cart-item" data-id="{{ $id }}"> <!-- Add data-id attribute here -->
                        <div class="item-img">
                            <a href="{{ isset($details['id']) ? url('product/' . $details['id'], ['quantity' => $details['quantity']]) : '#' }}">
                                <img src="https://belhassan.brosstock.com/public/images/product/{{ $details['photo'] }}" alt="{{ $details['product_name'] }}">
                            </a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(64)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-3.html">{{ $details['product_name'] }}</a></h3>
                            <div class="item-price">{{ $details['price'] }}<span class="currency-symbol"> Dhs</span></div>
                            <div class="pro-qty item-quantity" data-th="Quantity">
                                <input type="number" class="quantity-input quantity cart_update" value="{{ $details['quantity'] }}" min="1">
                            </div>
                        </div>
                    </li>
                    @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
            </ul>
        </div>
        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">Subtotal:</span>
                <span class="subtotal-amount">$ {{ $total }}</span>
            </h3>
            <div class="group-btn">
                <a href="{{ route('cart') }}" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".quantity-input").change(function (e) {
                e.preventDefault();
                console.log("Quantity changed!");
                var ele = $(this);

                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: 'patch',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("li").data("id"),
                        quantity: ele.val(),
                    },
                    success: function (response) {
                        // Instead of reloading the entire page, you can manually update the UI
                        updateSubtotal();
                    },
                    error: function (xhr, status, error) {
                        console.log('Error', error);
                    },
                });
            });

            function updateSubtotal() {
                var total = 0;
                $(".cart-item").each(function () {
                    var price = parseFloat($(this).find(".item-price").text().replace(' Dhs', '').trim());
                    var quantity = parseInt($(this).find(".quantity-input").val());
                    total += price * quantity;
                });

                // Update the subtotal in the UI
                $(".subtotal-amount").text('$ ' + total.toFixed(2));
            }

            $(".close-btn").click(function (e) {
                e.preventDefault();
                console.log("Close button clicked!");
                var ele = $(this);

                if (confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("li").data("id"),
                        },
                        success: function (response) {
                            // Remove the item from the UI without reloading the page
                            ele.closest("li").remove();
                            // Update the subtotal
                            updateSubtotal();
                            //updateCartItemCount();
                        },
                        error: function (xhr, status, error) {
                            console.log('Error', error);
                        },
                    });
                }
            });

            function updateCartItemCount() {
                // Assuming you have an element with the id "cart-count" to display the count
                var itemCount = $(".cart-item").length;
                $("#cart-count").text(itemCount);
            }
        });
    </script>
</div>


<!-- End Quick view panier -->