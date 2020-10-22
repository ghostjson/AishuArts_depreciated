           <!-- Shop products -->
           <section id="page-content" class="sidebar-left">
            <div class="container">
                <div class="row">
                    <!-- Content-->
                    <div class="content col-lg-9">
                        <div class="row m-b-20">
                            <div class="col-lg-6 p-t-10 m-b-20">
                                <h3 class="m-b-20">Welcome to my mesmerizing world</h3>
                                <p>“Painting is easy when you don’t know how, but very difficult when you do” - Edgar Degas</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="order-select">
                                    <h6>Sort by</h6>
                                    {{-- <p>Showing 1&ndash;12 of 25 results</p> --}}
                                    <form method="get">
                                        <select class="form-control" id="product_sorting" onchange="sortProducts();">
                                            <option selected="selected" value="default">Default sorting</option>
                                            {{-- <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option> --}}
                                            <option value="date">Sort by new arrivals</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="col-lg-3">
                                <div class="order-select">
                                    <h6>Sort by Price</h6>
                                    <p>From 0 - 190$</p>
                                    <form method="get">
                                        <select class="form-control">
                                            <option selected="selected" value="">0$ - 50$</option>
                                            <option value="">51$ - 90$</option>
                                            <option value="">91$ - 120$</option>
                                            <option value="">121$ - 200$</option>
                                        </select>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                        <!--Product list-->
                        <div class="shop">
                            <div class="grid-layout grid-3-columns" data-item="grid-item">
                                @foreach($products as $product)
                                    <div class="grid-item">
                                        <div class="product">
                                            <div class="product-image">
                                            <a href="/product/{{$product->id}}"><img alt="Shop product image!" src="{{ asset('product_images/'.$product->image) }}">
                                                </a>
                                                <a href="/product/{{$product->id}}"><img alt="Shop product image!" src="{{ asset('product_images/'.$product->image) }}">
                                                </a>
                                                {{-- <span class="product-new">NEW</span> --}}
                                                {{-- <span class="product-wishlist">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </span> --}}
                                                <div class="product-overlay">
                                                    <a href="/product/{{$product->id}}" >View</a>
                                                </div>
                                            </div>
                                            <div class="product-description">
                                                <div class="product-category">{{$product->category}}</div>
                                                <div class="product-title">
                                                    <h3><a href="#">{{$product->name}}</a></h3>
                                                </div>
                                                <div class="product-price"><ins>{{$product->price}}</ins>
                                                </div>
                                                {{-- <div class="product-rate">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <div class="product-reviews"><a href="#">6 customer reviews</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <!-- Pagination -->
                            {{$products->links('pagination::bootstrap-4')}}
                            {{-- <ul class="pagination">
                                
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul> --}}
                            <!-- end: Pagination -->
                        </div>
                        <!--End: Product list-->
                    </div>
                    <!-- end: Content-->
                    <!-- Sidebar-->
                    <div class="sidebar col-lg-3">
                        <!--widget newsletter-->
                        <div class="widget clearfix widget-archive">
                            <h4 class="widget-title">Art categories</h4>
                            <ul class="list list-lines">
                                @foreach ($categories as $category)
                                    <li><a href="/products/{{$category->id}}">{{$category->name}}</a> 
                                        {{-- <span class="count">(6)</span> --}}
                                    </li> 
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget clearfix widget-shop">
                            <h4 class="widget-title">Latest Art works</h4>
                            @foreach ($products_sorted as $product)
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('product_images/'.$product->image) }}" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">{{$product->category}}</div>
                                    <div class="product-title">
                                        <h3><a href="#">{{$product->name}}</a></h3>
                                    </div>
                                    <div class="product-price"><ins>{{$product->price}}</ins>
                                    </div>
                                    {{-- <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div> --}}
                                </div>
                            </div>  
                            @endforeach
                        </div>
                        {{-- <div class="widget clearfix widget-tags">
                            <h4 class="widget-title">Tags</h4>
                            <div class="tags">
                                <a href="#">Design</a>
                                <a href="#">Portfolio</a>
                                <a href="#">Digital</a>
                                <a href="#">Branding</a>
                                <a href="#">HTML</a>
                                <a href="#">Clean</a>
                                <a href="#">Peace</a>
                                <a href="#">Love</a>
                                <a href="#">CSS3</a>
                                <a href="#">jQuery</a>
                            </div>
                        </div>
                        <div class="widget clearfix widget-newsletter">
                            <form class="form-inline" method="get" action="#">
                                <h4 class="widget-title">Subscribe for Latest Offers</h4>
                                <small>Subscribe to our Newsletter to get Sales Offers &amp; Coupon Codes etc.</small>
                                <div class="input-group">
                                    <input type="email" placeholder="Enter your Email" class="form-control required email" name="widget-subscribe-form-email" aria-required="true">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                    <!-- end: Sidebar-->
                </div>
            </div>
        </section>
        <script>
            var url1 = "{{asset('js/plugins.js')}}";
            $.getScript(url1);
        </script>
        <script>
            var url2 = "{{asset('js/functions.js')}}";
            $.getScript(url2);
        </script>
        {{-- <script src="{{asset('js/plugins.js')}}"></script> --}}
        <!-- end: Shop products --> 