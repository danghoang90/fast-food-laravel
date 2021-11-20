<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart($id)
    {

        $product = Food::find($id);


        $cart = session()->get('cart');
        if ( isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'status' => $product->status
            ];
        session()->put('cart',$cart);
        $cart = session()->get('cart');
        $totalQuantity = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item ['quantity'];
        }

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'totalQuantity' => $totalQuantity
        ],200);

    }

    public function showCart()
    {
        $cart = session()->get('cart');
        $totalQuantity = 0;
        $totalPrice  = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item ['quantity'];
            $totalPrice += $item ['price'] * $item ['quantity'] ;
        }
        return view('frontend.carts.cart', compact('totalQuantity','cart','totalPrice' ));
    }

    public function updateCart(Request $request)
    {

            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $totalProduct = 0;
            $cartPrice = 0;
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalProduct += $item ['quantity'];
                $cartPrice = $item['price'] * $item ['quantity'];
                $totalPrice += $item['price'] * $item ['quantity'] ;
            }

            $data = [
                'totalProduct' => $totalProduct,
                'totalPrice' => $totalPrice,
                'cartPrice' => $cartPrice,
            ];
            return response()->json($data,200);

    }

    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
//            $carts = session()->get('cart');
//            $cartComponent = view('frontend.foods.showCart', compact('carts'))->render();
//            return response()->json(['cart_component' => $cartComponent, 'code' => 200],200);
//        }
            $totalProduct = 0;
            $cartPrice = 0;
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalProduct += $item ['quantity'];
                $cartPrice = $item['price'] * $item ['quantity'];
                $totalPrice += $item['price'] * $item ['quantity'] ;
            }

            $data = [
                'totalProduct' => $totalProduct,
                'totalPrice' => $totalPrice,
                'cartPrice' => $cartPrice,
            ];
            return response()->json($data,200);
        }
    }

    public function ajaxAddNewCart(Request $request)
    {
        echo json_encode(['message' => 200]);
    }

    public function order()
    {
        $cart = session()->get('cart');
        $totalQuantity = 0;
        $totalPrice  = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item ['quantity'];
            $totalPrice += $item ['price'] * $item ['quantity'] ;
        }
        return view('frontend.carts.order', compact('totalQuantity','cart','totalPrice' ));
    }

    public function payment(OrderRequest $request)
    {

        $order = Session()->get('order');
        $order = [
          'name' => $request->name ,
          'address' => $request->address ,
          'phone' => $request->phone,
          'typePay' => $request->typePay,
        ];
        Session()->put('order', $order);
        $order = Session()->get('order');
        $cart = session()->get('cart');
        $totalQuantity = 0;
        $totalPrice  = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item ['quantity'];
            $totalPrice += $item ['price'] * $item ['quantity'] ;
        }
        return view('frontend.carts.payment', compact('order','cart','totalQuantity','totalPrice'))
            ->with('messenger', 'Đơn hàng của bạn đang được chuẩn bị xin vui lòng chờ trong ít phút!');
    }
}
