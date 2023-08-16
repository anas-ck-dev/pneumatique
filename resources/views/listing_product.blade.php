<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo42-shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Jul 2023 16:22:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/icons/favicon.png">


    @include('layouts/header')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="demo42.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">SHOP</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle">
                                <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1">
                                    </line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1">
                                    </line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1">
                                    </line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1">
                                    </line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1">
                                    </line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1">
                                    </line>
                                    <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path
                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>Filter</span>
                            </a>

                            <div class="toolbox-item toolbox-sort">
                                <label>Sort By:</label>

                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->


                            </div>
                            <!-- End .toolbox-item -->
                        </div>
                        <!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <div class="toolbox-item layout-modes">
                                <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="category-list.html" class="layout-btn btn-list" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div>
                            <!-- End .layout-modes -->
                        </div>
                        <!-- End .toolbox-right -->
                    </nav>

                    <div class="row">
                        
                        @foreach ($products as $product)
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo42-product.html">
                                            <img src="{{ asset('assets/images/products/' . $product->image) }}"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">-13%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>

                                    </figure>
                                    <div class="product-details">

                                        <h3 class="product-title">
                                            <a href="demo42-product.html"
                                                title="{{ $product->name }}">{{ Str::limit($product->name, 40) }} </a>
                                                {{ $product->category->name . " " .$product->category->id}} 
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top">0</span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$299.00</del>
                                            <span class="product-price">$259.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->
                        @endforeach

                    </div>
                    {{ $products->links() }}
                    <!-- End .row -->


                </div>
                <!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            {{-- @if ($fils_categorys->count()) --}}


                            <a onclick="history.back()">back</a>
                                <h3 class="widget-title">
                                    <a  @empty (!$category->parent_id)
                                        href="{{ route('category.listing', $category->parent_id) }}" 
                                    @else
                                        href="#" 
                                    @endempty  >{{$category->name}}</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">

                                            @foreach ($fils_categorys as $fil_category)
                                                {{-- @if ($fil_category->products->count()) --}}
                                                    
                                                    <li>
                                                        
                                                        <a href="{{ route('category.listing', $fil_category->id) }}">
                                                            {{ $fil_category->name }}

                                                            {{-- @if ($fil_category->filsCategorys) --}}
                                                                <i class="fa-solid fa-right-long"></i>
                                                            {{-- @endif --}}
                                                        </a>

                                                    </li>
                                                {{-- @endif --}}
                                            @endforeach
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            {{-- @endif --}}
                        </div>
                        <!-- End .widget -->
                    </div>
                    <!-- End .sidebar-wrapper -->
                </aside>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->

        <div class="mb-4"></div>
        <!-- margin -->
    </main>
    <!-- End .main -->

    @include('layouts/footer')

</html>
