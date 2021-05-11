<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class SaveForLaterController extends Controller
{
    /**
     * Add to Product to Save for Later
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $exists = Cart::instance('saveForLater')
            ->search(function ($cartItem, $rowId) use ($id) {
                return $rowId === $id;
            });

        if($exists->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->withWarning('Item already saved for later.');
        }

        Cart::instance('saveForLater')
            ->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()
            ->route('cart.index')
            ->withSuccess('Item has been saved for later.')
            ->withInfo("{$item->name}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->withWarning('Item was removed from save for later.');
    }

    /**
     * Move to Product to Cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $exists = Cart::instance('default')
            ->search(function ($cartItem, $rowId) use ($id) {
                return $rowId === $id;
            });

        if($exists->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->withWarning('Item already exists in your cart.');
        }

        Cart::instance('default')
            ->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()
            ->route('cart.index')
            ->withSuccess('Item has move to your cart.')
            ->withInfo("{$item->name}");
    }
}
