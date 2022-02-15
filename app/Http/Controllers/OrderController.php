<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\HeaderOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function history()
    {
        $orders = HeaderOrder::where('account_id', Auth::id())
            ->whereNotNull('order_date')
            ->get();

        return view('pages.history', [
            'orders' => $orders,
        ]);
    }

    public function show($id) {
        $order = HeaderOrder::find($id);

        return view('pages.order', [
            'invoice' => $order,
        ]);
    }

    public function cart() {
        $id = $this->findCartId();
        if ($id === null) {
            return view('pages.cart', [
                'cart_items' => [],
            ]);
        }

        return view('pages.cart', [
            'cart_items' => HeaderOrder::find($id)->items,
        ]);
    }

    public function add(Request $request) {
        $cart_id = $this->findOrCreateCartId();
        $cart = HeaderOrder::find($cart_id);

        $item = new DetailOrder;
        $item->order_id = $cart_id;
        $item->e_book_id = $request->e_book_id;
        $item->save();

        return redirect()->route('order.cart')->with(['success' => 'Item added successfully']);
    }

    public function delete(Request $request) {
        $cart_id = $this->findOrCreateCartId();
        DetailOrder::destroy($request->order_id);

        return redirect()->route('order.cart')->with(['success' => 'Item deleted successfully']);
    }

    public function checkout() {
        $id = $this->findCartId();

        $cart = HeaderOrder::find($id);
        $cart->order_date = now();
        $cart->save();

        return redirect()->route('order.history')->with(['success' => 'Order checked out successfully']);
    }

    //--------------------------------
    // cart related function
    //--------------------------------

    private function findCartId() {
        $ids = HeaderOrder::where('account_id', Auth::id())->whereNull('order_date');

        if ($ids->count() === 0) {
            return null;
        }

        return $ids->get()[0]->id;
    }

    private function findOrCreateCartId() {
        $cart_id = $this->findCartId();

        if ($cart_id === null) {
            $cart = new HeaderOrder;
            $cart->account_id = Auth::id();
            $cart->save();

            $cart_id = $cart->id;
        }

        return $cart_id;
    }
}
