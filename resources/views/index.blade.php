<!doctype html>
<html>
    <head>
        <title>Pneumatiques belhassan</title>
        @include("layouts.style_links")
    </head>

<body> 
    @include('layouts/header')

    <main class="main-wrapper">
        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="main-slider-content">
                            <span class="subtitle"><i class="fas fa-fire"></i>PARADECHY VOTRE PARAPHARMACIE EN LIGNE</span>
                            <h1 class="title">
                                
                                ﻿ PARA DECHY votre parapharmacie en ligne ! Retrouvez vos produits de parapharmacie livraison gratuite.
                            </h1>
                            <div class="shop-btn">
                                <a href="shop.html" class="axil-btn btn-bg-white right-icon">Explorer <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        
                        <div class="main-slider-large-thumb">
                            <div class="slider-thumb-activation-two axil-slick-dots">
                                @foreach($tops as $top)
                                <?php
                                $top_product_image = explode(",", $top->image); // Split the string into an array
                                $top_product_image = htmlspecialchars($top_product_image[count($top_product_image) - 1]); // Get the last element
                                ?>
                                    @if($loop->iteration <= 4)
                                        <!-- Display item -->
                                        <div class="single-slide slick-slide">
                                            <div class="axil-product product-style-five">
                                                <div class="thumbnail">
                                                    <a href="{{ url('product/' . $top->id) }}">
                                                        <img src="{{asset('assets')}}/images/product/m_exemple.jpg" 
                                                            style="width: auto !important; height: 250px !important;" 
                                                            alt="Product Images">
                                                    </a>
                                                </div>                                                
                                                <div class="product-content">
                                                    <div class="inner">
                                                        <h5 class="title"><a href="{{ url('product/' . $top->id) }}">{{ $top->name }}</a></h5>
                                                        <div class="product-price-variant">
                                                            <span class="price current-price">{{ $top->price }} Dhs</span>
                                                        </div>
                                                        <ul class="cart-action">
                                                            <li class="select-option"><a href="{{ url('product/' . $top->id) }}">Acheter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
         
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Nos Produits</span>
                    <h2 class="title">Produits nouveautés</h2>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-3">
                         <div class="axil-shop-sidebar">
                            <div class="d-lg-none">
                                <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="toggle-list product-categories active">
                                <h6 class="title"><a href="/">CATEGORIES</a></h6>
                                <div class="widget scrollable-container shop-submenu">
                                    <h3 class="widget-title">
                                        @isset($category)
        
                                            @isset($category)

                                                @empty(!$category->parent_id)
                                                    <a href="{{route('product.searchByCategorie', $category->parent_id)}}"> <span> < </span> {{ $category->name }}</a>
                                                    @else
                                                   
                                                @endempty
            
                                                @else
                                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                                        aria-controls="widget-body-2">Categories</a>
                                            @endisset
            
                                            @else
                                               
                                        @endisset
                                    </h3>
        
                                    <div class="collapse show" id="widget-body-2">
                                        <div class="widget-body">
                                            <ul class="cat-list cat_list_scroll">
                                                @foreach ($categorys as $category)
                                                    <li>
                                                        <a href="{{ route('product.searchByCategorie', $category->id) }}"
                                                            aria-expanded="true" aria-controls="widget-category-1">
                                                            {{ $category->name }} <span class="products-count"></span>
        
                                                        </a>
        
                                                    </li>
                                                @endforeach
        
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                            <button class="axil-btn btn-bg-primaryb hj">All Reset</button>
                        </div>-->
                        <!-- End .axil-shop-sidebar 
                    </div>-->
                    <div class="col-lg-12">
                        <div class="row row--15 results-products-container">
                            <?php
                                if (is_null($category->parent_id)) {
                                    $var = $tops;
                                } else {
                                    $var = $products;
                                }
                                
                                $iteration = 4;
                            ?>
                        
                            @foreach ($var as $key => $product)
                                @if($loop->iteration <= $iteration)
                                    @include('product_card')
                                @endif
                            @endforeach
                        
                      
   
                    </div>
                </div> 
            </div>
            <!-- End .container -->
        </div>
       

    
    
   

   

    </main>
    <!-- End .main -->

    @include('layouts/footer')
    @include("layouts.script_links")
    </body>                                
</html>


<!-- Add jQuery library -->

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
