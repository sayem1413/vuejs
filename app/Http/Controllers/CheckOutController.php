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

    public function index()
    {
        return view('frontEnd.checkOut.checkoutContent');
    }

    public function customerRegistration(Request $request)
    {
        $customerInfo = new Customer();
        $customerInfo->first_name = $request->first_name;
        $customerInfo->last_name = $request->last_name;
        $customerInfo->email = $request->email;
        $customerInfo->password = bcrypt($request->password);
        $customerInfo->address = $request->address;
        $customerInfo->phone_number = $request->phone_number;
        $customerInfo->district_name = $request->district_name;
        $customerInfo->save();
        $customerId = $customerInfo->id;
        Session::put('customerId', $customerId);
        return redirect('/checkout/shipping');
    }

    public function showShippingForm()
    {
        $customerId = Session::get('customerId');
        $customerInfo = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkOut.shippingContent', ['customerInfo' => $customerInfo]);
    }

    public function saveShippingInfo(Request $request)
    {
        $shipmentInfo = new Shipment();
        $shipmentInfo->full_name = $request->full_name;
        $shipmentInfo->email = $request->email;
        $shipmentInfo->address = $request->address;
        $shipmentInfo->phone_number = $request->phone_number;
        $shipmentInfo->district_name = $request->district_name;
        $shipmentInfo->save();
        $shipmentId = $shipmentInfo->id;
        Session::put('shipmentId', $shipmentId);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm()
    {
        return view('frontEnd.checkOut.PaymentContent');
    }

    public function saveOrderInfo(Request $request)
    {
        $paymentType = $request->paymentType;

        if ($payment_type == 'cashOnDelivery') {
            $orderInfo = new Order();
            $orderInfo->customerId = Session::get('customerId');
            $orderInfo->shipment_id = Session::get('shipmentId');
            $orderInfo->order_totall = Session::get('order_totall');
            $orderInfo->save();
            $orderId = $orderInfo->id;
            Session::put('orderId', $orderId);

            $paymentInfo = new Payment();
            $paymentInfo->order_id = Session::get('orderId');
            $paymentInfo->type = $payment_type;
            $paymentInfo->save();

            $orderDetailInfo = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetailInfo->order_id = Session::get('orderId');
                $orderDetailInfo->product_id = $cartProduct->id;
                $orderDetailInfo->product_name = $cartProduct->name;
                $orderDetailInfo->product_price = $cartProduct->price;
                $orderDetailInfo->product_quantity = $cartProduct->qty;
                $orderDetailInfo->save();
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
