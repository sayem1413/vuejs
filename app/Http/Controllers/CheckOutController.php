<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\OrderDetail;
use App\Payment;
use Cart;

class CheckOutController extends Controller {

    public function index() {
        return view('frontEnd.checkOut.checkoutContent');
    }

    public function customerRegistration(Request $request) {
        $customer = new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->districtName = $request->districtName;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        return redirect('/checkout/shipping');
    }

    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkOut.shippingContent', ['customerById' => $customerById]);
    }

    public function saveShippingInfo(Request $request) {
        $shipping = new Shipping();

        $shipping->fullName = $request->fullName;
        $shipping->email = $request->email;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();
        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm() {
        return view('frontEnd.checkOut.PaymentContent');
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->paymentType;

        if ($paymentType == 'cashOnDelivery') {
            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotall = Session::get('orderTotall');
            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);

            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();

            $orderDetail = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->orderId = Session::get('orderId');
                $orderDetail->productId = $cartProduct->id;
                $orderDetail->productName = $cartProduct->name;
                $orderDetail->productPrice = $cartProduct->price;
                $orderDetail->productQuantity = $cartProduct->qty;
                $orderDetail->save();
                Cart::remove($cartProduct->rowId);
            }

            return redirect('/checkout/my-home');
        } else if ($paymentType == 'bKash') {
            return 'This payment method is -> Under Construction! Sorry :P ';
        } else if ($paymentType == 'paypal') {
            return 'This payment method is -> Under Construction! Sorry :P ';
        }
    }

    public function customerHome() {
        return view('frontEnd.customer.customerHome');
    }

}
