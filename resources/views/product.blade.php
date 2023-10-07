<!doctype html>
<html class="no-js" lang="en">


<head>

    <title>{{ $product->name }}</title>


    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ Str::limit($product->name, 60) }}" />
    <meta property="og:description" content="{{ Str::limit($product->product_details, 80) }}" />
    <meta property="og:image" content="https://belhassan.brosstock.com/public/images/product/{{ $product->image }}" />

    <meta name="keywords" content="Pneumatiques belhassan,Pneumatiques " />
    <meta name="description" content="{{ $product->product_details }}">
</head> 
  
<body> 
    @include('layouts/header')
    <div class="offer">
        <p class="offer-text">............</p>
    </div>
    <main class="main-wrapper">
        <div class="axil-single-product-area bg-color-white">
            <div class="single-product-thumb axil-section-gapcommon single-product-modern">
                <div class="container">
                    <div class="row row--20">
                        <div class="col-lg-6 mb--40">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php $product_image = explode(",", $product->image); // Split the string into an array
                                    $product_image = htmlspecialchars($product_image[count($product_image) - 1]); // Get the last element
                                    ?>
                                    <div class="product-large-thumbnail-4 single-product-thumbnail axil-product">
                                        <div class="thumbnail">
                                            <img src="https://belhassan.brosstock.com/public/images/product/{{ $product_image }}" alt="Product Images">
                                        </div>
                                    
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{$product->name}}</h2>
                                    <span class="price-amount">{{$product->price}} Dhs</span>
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    
                                    </div>
                                    <ul class="description">
                                        <p>{{$product->product_details}}</p>
                   
                                    </ul>
                                   
                                        <div class="product-variations-wrapper">
                                            <?php
                                            $disabled="";
                                            if ($product->qty <= 0 or !auth()->check() ) {
                                                $disabled="disabled";
                                            ?> 
                                                <span class="alert-danger" > Ripture de stock</span>
                                                <?php
                                            }
                                            ?>
                                     
                                    <form action="{{ route('command.store') }}" method="POST">
                                    @csrf
                                        <input type="number"  class="d-none" name="product_id" value="{{ $product->id }}">
                                            <!-- End Product Variation  -->
                                            <div class="product-variation quantity-variant-wrapper">
                                                <label for="quantity" class="title">Quantity</label>
                                                <div class="pro-qty">
                                                <input type="text" name="quantity" value="{{ isset(session('cart')[$product->id]['quantity']) 
                                                    ? session('cart')[$product->id]['quantity'] : 1 }}" min="1" <?php echo $disabled ?> 
                                                    max="{{ $product->qty }}" />
                                                    @error('quantity')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        @if (!auth()->check()) 
                                        
                                            <div class="alert alert-warning alert-dismissible fade show alert-custom mb-5" role="alert">
                                                <ul class="list-unstyled mb-0">
                                                    <li> You need to login to command 
                                                        <?php
                                                            $previous_url = url('product/' . $product->id);
                                                        ?>
                                                        <a href="{{ route('login.perform', ['redirect' => $previous_url]) }}">click here</a>

                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    

                                        <div class="mt-3 mb-4">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class=" ">
                                                        <label for="full_name">Nom Complet</label>
                                                        <input type="text" id="full_name" name="full_name"
                                                            class="form-control com"
                                                            placeholder="Entrez votre nom complet"  
                                                            value= "{{ old('full_name') }}"
                                                            <?php echo $disabled ?>>
                                                        @error('full_name')
                                                            <span class="text-danger text-left">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class=" ">
                                                        <label for="address">Address</label>
                                                        <input type="text" id="address" name="address"
                                                            class="form-control com"  
                                                            placeholder="Entrez votre Address" 
                                                            value="{{ old('address') }}" 
                                                            <?php echo $disabled ?>>
                                                        @error('address')
                                                            <span class="text-danger text-left">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class=" ">
                                                        <label for="tel">Téléphone</label>
                                                        <input type="tel" id="tel" name="tel"
                                                            class="form-control com"  
                                                            placeholder="Entrez votre tel" 
                                                            value="{{ old('tel') }}"  
                                                            <?php echo $disabled ?>>
                                                        @error('tel')
                                                            <span class="text-danger text-left">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper">
                                            <!-- Start Product Action -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart">
                                                    <button type="submit" class="axil-btn btn-bg-secondary text-larger" <?php echo $disabled ?> >
                                                        <i class="far fa-shopping-bag"></i>
                                                        Commander
                                                    </button>
                                                </li>
                                            </ul>
                                            <!-- End Product Action -->
                                        </div>
                                    </form>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
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
  
     

<style>
.modal-success-message button{
    right: 20px !important;
    top: 15px !important;
}
</style>
<!-- Your existing code -->


    @if (session('success'))
        <!-- Success Modal -->
        <div class="header-search-modal modal-success-message open" id="header-search-modal">
            <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
            <div class="header-search-wrap">
                <div class="card-header">
                    {{ session('success') }}
                </div>
                <div class="card-body">
                
                    <div class="psearch-results" id="results-container"> 
                    </div>
                </div> 
            </div>
        </div>
            
        
        <!-- JavaScript to show the modal -->
        <!-- <script>
            $(document).ready(function () {
                $('.modal-success-message').modal('open');
            });
        </script> -->
    @endif



<!-- Your existing code -->


    </main>

    @include('layouts/footer')

</body>
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js')}}"></script>


    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/sal.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/counterup.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js')}}"></script>



<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

</html>