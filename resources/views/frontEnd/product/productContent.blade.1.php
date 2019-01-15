@extends('frontEnd.master')

@section('title')
{{$productById->productName}}
@endsection

@section('mainContent')
<div class="page-head">
    <div class="container">
        <h3>Single</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function () {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- //FlexSlider-->
                    <ul class="slides">
                        <li data-thumb="{{asset('public/productImage/'.$productById->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset('public/productImage/'.$productById->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset('public/productImage/'.$productById->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset('public/productImage/'.$productById->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>	
                        <li data-thumb="{{asset('public/productImage/'.$productById->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset('public/productImage/'.$productById->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset('public/productImage/'.$productById->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset('public/productImage/'.$productById->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>	
                    </ul>
                    <div class="clearfix"></div>
                </div>	
            </div>
        </div>
        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>productName</h3>
            <p><span class="item_price">BDT productPrice</span></p>
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <div class="color-quality">
                <div class="color-quality-right">
                    <h5>Quality :</h5>
                    <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">5 Qty</option>
                        <option value="null">6 Qty</option> 
                        <option value="null">7 Qty</option>					
                        <option value="null">10 Qty</option>								
                    </select>
                </div>
            </div>
            <div class="occasion-cart">
                <a href="#" class="item_add hvr-outline-out button2">Add to cart</a>
            </div>

        </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>Product Brief Description</h5>
                        <p>{{$productById->productLongDescription}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


