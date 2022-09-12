<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refer;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\RewardToUser;
use Carbon\Carbon;

class ReferUserController extends Controller
{
    public function index() {

        $refers = Refer::with('from_refer','refer_to','product')->get();
        return view('refers.index',compact('refers',$refers));
    }

    public function create() {
        $users = User::get();
        $products = Product::get();
        return view('refers.create',compact('users',$users,'products',$products));
    }

    public function store(Request $request) {

        $user_refer = new Refer;
        $user_refer->user_id = $request->user_id;
        $user_refer->user_id_refer = $request->refer_to;
        $user_refer->product_id = $request->product_id;
        $user_refer->save();
        return  redirect()->route('refers');
    }

    public function product_purchased($refer_id) {

        $product_purchase = new ProductPurchase;
        $product_purchase->refer_id = $refer_id;
        $product_purchase->status = 'confirmed';
        $product_purchase->save();

        // $referal = Refer::where('id',$refer_id)->first();
        // $product_id = $referal->product_id;
        // $my_rewards_data = Refer::where('product_id',$product_id)->orderBy('created_at','DESC')->take(3)->get();
        // $my_product = Product::where('id',$product_id)->first();

        // for($i=0; $i <count($my_rewards_data); $i++) {

        //     switch ($i) {
        //         case "0":
        //             RewardToUser::create([
        //                 'user_id'=>$my_rewards_data['0']['user_id'],
        //                 'product_id'=>$product_id,
        //                 'reward_amount'=>$my_product->price/100*1,
        //             ]);
        //           break;
        //         case "1":
        //             RewardToUser::create([
        //                 'user_id'=>$my_rewards_data['1']['user_id'],
        //                 'product_id'=>$product_id,
        //                 'reward_amount'=>$my_product->price/100*0.5,
        //             ]);
        //           break;
        //         case "2":
        //             RewardToUser::create([
        //                 'user_id'=>$my_rewards_data['2']['user_id'],
        //                 'product_id'=>$product_id,
        //                 'reward_amount'=>$my_product->price/100*0.2,
        //             ]);
        //           break;
        //       }
        // }

        return  redirect()->route('refers');
    }
}
