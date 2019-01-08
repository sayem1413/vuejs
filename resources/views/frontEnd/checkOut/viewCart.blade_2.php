
@extends('frontEnd.master')

@section('title')
Your Cart
@endsection

@section('mainContent')
<div class="page-head">
    <div class="container">
        <h3>My Shopping Bag</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php $total = 0; ?>
                <!-- foreach -->
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <a href="#delete" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
						</div>
                    </td>
                    <td class="invert">cartProduct</td>
                    <td class="invert">
                        <div class="quantity"> 
                            <form>
                                <div class="input-group">
                                    <input type="number" name="qty" class="form-control" value="{{$cartProduct->qty}}">
                                    <span class="input-group-btn"></span>
                                    <button type="submit" name="btn" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-upload"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td class="invert">TK.price</td>
                    <td class="invert">TK. itemTotal = cartProduct->price*$cartProduct->qty</td>
                </tr>
                <!-- php code -> $total = $total + $itemTotal -->
                <!-- foreach -->
            </table>
        </div>
        <div class="checkout-left">	

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="#home"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <!-- php code ->
                    $customerId = Session::get('customerId');
                    $shippingId = Session::get('shippingId');
                    if($customerId!=null && $shippingId!=null){
                 -->
                <a href="checkout/payment"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    <!-- php code -> } else if($customerId!=null){ -->
                <a href="/checkout/shipping"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    <!-- php code -> } else { -->
                <a href="{{/checkout"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                 <!-- php code -> } -->
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    <li>Total: <i>-</i> <span>TK. total</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection