<?php

namespace App\Http\Controllers\Site;

use App\CarModel;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use DB;
use App\RentalItem;
use Illuminate\Support\Facades\Auth;

class ActionController extends BaseController
{
    
    public function add_to_cart($id)
    {

        $product = RentalItem::where('id',$id)->first();

        if(Auth::check()){
           $exists = Wishlist::where('user_id',Auth::id())->where('rental_item_id',$id)->first();

           if($exists !== null){
            $cart  = Wishlist::where('user_id',Auth::id())->where('rental_item_id',$id)->delete();
       
            $count = Wishlist::where('user_id', Auth::id())
            ->select('rental_items.name', 'rental_items.id as rental_item_id','rental_items.price','Wishlists.quantity','Wishlists.id as id')
            ->join('rental_items', 'rental_items.id', '=', 'Wishlists.rental_item_id');

            
            return response()->json(['message'=>'Cartdan Silindi','count' => $count]);
             }
            else{
            $cart  = new Wishlist();
              $cart->user_id = Auth::id();
              $cart->rental_item_id = $id;
              $cart->save();


            $count = Wishlist::where('user_id', Auth::id())
            ->select('rental_items.name', 'rental_items.id as rental_item_id','rental_items.price','Wishlists.quantity','Wishlists.id as id')
            ->join('rental_items', 'rental_items.id', '=', 'Wishlists.rental_item_id');

              return response()->json(['message'=>'Carta Əlavə olundu','count' => $count]);
                }

        }
        
        else{
          $cart_items = \Cart::get($id);
              // return response()->json(['message'=> $product->carModel->brand->name]);
          if($cart_items == null){
                \Cart::add([
                  'id' => $id,
                  'name' => 'test',
                  'price' => $product->price, 
                 'attributes' => array(
                  'brand'=> $product->carModel->brand->name,
                  'model'=> $product->carModel->name,
                  'images' => json_decode($product->images),
                  'year' => $product->year,
                  'engine'=> $product->engine,
                  'created_at' => $product->created_at->format('d.m.Y H:s'),
                 ),
                  'quantity' => 1,
               
              ]);

              $count = 1;
              return response()->json(['message'=>'Carta elave olundu','count' => $count]);
          }
          else{
            \Cart::remove($product->id); 
            $count = 1;
            return response()->json(['message'=>'Cartdan Silindi','count' => $count]);
          }
         
        }

    }


    public function remove_from_cart($id){
        if(Auth::check()){
            Wishlist::findOrFail($id)->delete();
            $cart =Wishlist::where('user_id',Auth::id())->get();
            $price = 0;
          

            $count = Wishlist::where('user_id', Auth::id())
            ->select('rental_items.name', 'rental_items.id as rental_item_id','rental_items.price','Wishlists.quantity','Wishlists.id as id')
            ->join('rental_items', 'rental_items.id', '=', 'Wishlists.rental_item_id');

            $carts = Wishlist::where('user_id',Auth::id())->get();

            if($carts->isEmpty()){
              $view = view('site.partials.empty');
            }
            else{
              $view = view('site.partials.product2', compact('carts'));
            }
        }
        else{
            \Cart::remove($id);
            $carts = \Cart::getContent();
            $count = \Cart::getTotalQuantity();

            if($carts->isEmpty()){
              $view = view('site.partials.empty');
            }
            else{
              $view = view('site.partials.product', compact('carts'));
            }
     
        }
      
        return collect([
        'html' => $view->render(),
        'count'=> $count,
      ]);


    }






}
