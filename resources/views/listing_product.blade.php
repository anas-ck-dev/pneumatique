<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Categorie {{ $category->name }}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="belhassan- Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">



    @include('layouts/header')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 main-content">


                    <div class="row">
                        @if ($products->count())
                            @foreach ($products as $product)
						  <?php
						
				$product_image = explode(",", $product->image); // Split the string into an array
                $product_image = htmlspecialchars($product_image[count($product_image) - 1]); // Get the last element
						
						?>
                                <div class="col-6 col-sm-4">
                               

                                    <div class="product-default">
                                        <figure class="preview_product_1"
                                        style="background-image:url('https://paradechy.com/public/images/product/{{ $product_image }}');">
                                        <a href="{{ url('product/' . $product->id) }}">
                                        </a>
                                    </figure>

                                        <div class="product-details">
                            

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
                                <!-- End .col-sm-4 -->
                            @endforeach
                        @else
                            <div class="alert alert-info w-100 pl-5">dosn't have a products</div>
                        @endif


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


                            <h3 class="widget-title">
                                @empty(!$category->parent_id)
                                    <a href="{{ route('category.listing', $category->parent_id) }}"> <span>
                                            < </span> {{ $category->name }}</a>
                                @else
                                    <a href="#">{{ $category->name }}</a>
                                @endempty
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list cat_list_scroll">

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
