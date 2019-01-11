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
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->district_name = $request->district_name;
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

        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->address = $request->address;
        $shipping->phone_number = $request->phone_number;
        $shipping->district_name = $request->district_name;
        $shipping->save();
        $shipping_id = $shipping->id;
        Session::put('shipping_id', $shipping_id);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm() {
        return view('frontEnd.checkOut.PaymentContent');
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->payment_type;

        if ($paymentType == 'cashOnDelivery') {
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_totall = Session::get('order_totall');
            $order->save();
            $orderId = $order->id;
            Session::put('order_id', $orderId);

            $payment = new Payment();
            $payment->order_id = Session::get('order_id');
            $payment->payment_type = $paymentType;
            $payment->save();

            $orderDetail = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->order_id = Session::get('order_id');
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
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
