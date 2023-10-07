<!doctype html>
<html>
    <head>
        <title>Your Carts</title>
        @include("layouts.style_links")
    </head>


    @include('layouts/header')
    <div class="offer">
        <p class="offer-text">............</p>
    </div>
<body class="sticky-header">
    <main class="main-wrapper">
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Your Cart</h4>
                        <a href="#" class="cart-clear">Clear Shoping Cart</a>
                    </div>
                    <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(empty(session('cart')))
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning text-center alert-dismissible fade show alert-custom mb-5" role="alert">
                                            <ul class="list-unstyled mb-0">
                                                <li>Il n'y a pas de produit dans le panier.
                                                <a href="{{ route('home') }}" style="text-decoration: underline;">Back</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <!-- le contenu du panier ici -->
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="product-remove close-btn"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.html">
                                                <img src="https://belhassan.brosstock.com/public/images/product/{{ $details['photo'] }}" alt="{{ $details['product_name'] }}">
                                            </a>
                                        </td>
                                        <td class="product-title"><a href="single-product.html">{{ $details['product_name'] }}</a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">${{ $details['price'] }}</span></td>
                                        <td class="product-quantity" data-th="Quantity">
                                            <div class="pro-qty" data-th="Quantity">
                                                <input type="number" class="quantity-input quantity cart_update"  value="{{ $details['quantity'] }}">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">${{ $details['price'] * $details['quantity'] }}</span></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    </div>
                    <div class="cart-update-btn-area">
                        <div class="input-group product-cupon">
                            <input placeholder="Enter coupon code" type="text">
                            <div class="product-cupon-btn">
                                <button type="submit" class="axil-btn btn-outline">Apply</button>
                            </div>
                        </div>
                        <div class="update-btn">
                            <a href="#" class="axil-btn btn-outline">Update Cart</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                            <div class="axil-order-summery mt--80">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td>${{ $total }}</td> <!-- Replace $subtotal with your actual subtotal value -->
                                            </tr>
                                            <tr class="order-shipping">
                                                <td>Shipping</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio1" name="shipping" checked="">
                                                        <label for="radio1">Free Shipping</label>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">${{ $total }}</td> <!-- Replace $total with your actual total value -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    
    @include('layouts/footer')
    @include("layouts.script_links")
</body>

<script>
$(document).ready(function () {
    function performSearch(searchText, brand_id = null) {
        var category_id = {!! json_encode($category->parent_id) !!};
        $.ajax({
            url: "{{ route('search') }}",
            method: 'GET',
            data: {
                searchText: searchText,
                idParentCategorie: category_id || null,
                brand: brand_id,
            },
            success: function (response) {
                $('#results-container').html(response);
            },
            error: function (xhr, status, error) {
                console.log('Error', error);
            },
        });
    }

    $('#sortSelect').change(function () {
        var selectedValue = $(this).val();
        performSort(selectedValue);
    });

    function performSort(selectedValue, brand_id = null, searchText) {
        var category_id = {!! json_encode($category->parent_id) !!};
        $.ajax({
            url: "/",
            method: 'GET',
            data: {
                searchText: searchText,
                idParentCategorie: category_id || null,
                brand: brand_id,
                sortOption: selectedValue
            },
            success: function (response) {
                $('#results-products-container').html(response);
            },
            error: function (xhr, status, error) {
                console.log('Error', error);
            },
        });
    }

    $('.brand-img').on('click', function () {
        var searchText = $('#search-input').val();
        var brand_id = $(this).data('brand');
        $('#brandid').val(brand_id);

        $('#brandmodal').modal('hide');
        performSearch(searchText, brand_id);
    });

    $('#search-input').on('keyup', function () {
        var searchText = $(this).val().trim();
        var brandid = $('#brandid').val();
        performSearch(searchText, brandid);
    });
});
</script>



<script>

    $(".pro-qty .cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
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

    // function updateCartItemCount() {
    //     var itemCount = $(".cart-item").length;
    //     $("#cart-count").text(itemCount);
    // }

    // Use event delegation for dynamically added elements
    $(document).on("click", ".close-btn", function (e) {
        e.preventDefault();
        console.log("Close button clicked!");

        var ele = $(this);

        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest("tr").data("id"), // Find the closest table row
                },
                success: function (response) {
                    // Remove the item from the UI without reloading the page
                    ele.closest("tr").remove();
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


</script>
</html>