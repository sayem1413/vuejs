<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipment;
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
        $customer_id = $customer->id;
        Session::put('customer_id', $customer_id);
        return redirect('/checkout/shipping');
    }

    public function showShippingForm() {
        $customer_id = Session::get('customer_id');
        $customer_by_id = Customer::where('id', $customer_id)->first();
        return view('frontEnd.checkOut.shippingContent', ['customer_by_id' => $customer_by_id]);
    }

    public function saveShippingInfo(Request $request) {
        $shipment = new Shipment();

        $shipment->full_name = $request->full_name;
        $shipment->email = $request->email;
        $shipment->address = $request->address;
        $shipment->phone_number = $request->phone_number;
        $shipment->district_name = $request->district_name;
        $shipment->save();
        $shipment_id = $shipment->id;
        Session::put('shipment_id', $shipment_id);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm() {
        return view('frontEnd.checkOut.PaymentContent');
    }

    public function saveOrderInfo(Request $request) {
        $payment_type = $request->payment_type;

        if ($payment_type == 'cashOnDelivery') {
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipment_id = Session::get('shipment_id');
            $order->order_totall = Session::get('order_totall');
            $order->save();
            $orderId = $order->id;
            Session::put('order_id', $orderId);

            $payment = new Payment();
            $payment->order_id = Session::get('order_id');
            $payment->payment_type = $payment_type;
            $payment->save();

            $order_detail = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $order_detail->order_id = Session::get('order_id');
                $order_detail->product_id = $cartProduct->id;
                $order_detail->product_name = $cartProduct->name;
                $order_detail->product_price = $cartProduct->price;
                $order_detail->product_quantity = $cartProduct->qty;
                $order_detail->save();
                Cart::remove($cartProduct->rowId);
            }

            return redirect('/checkout/my-home');
        } else if ($payment_type == 'bKash') {
            return 'This payment method is -> Under Construction! Sorry :P ';
        } else if ($payment_type == 'paypal') {
            return 'This payment method is -> Under Construction! Sorry :P ';
        }
    }

    public function customerHome() {
        return view('frontEnd.customer.customerHome');
    }

}
