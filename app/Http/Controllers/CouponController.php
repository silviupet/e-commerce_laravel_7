<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Cart;

class CouponController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::findByCode($request->coupon);

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        // dispatch_now(new UpdateCoupon($coupon));
        session()->put('coupon', [
            'name'      => $coupon->code,
            'discount'  => $coupon->discount( (int) Cart::subtotal()),
        ]);

        return back()->with('success', 'Coupon has been applied!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon has been removed.');
    }
}
