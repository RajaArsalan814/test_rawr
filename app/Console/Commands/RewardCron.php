<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductPurchase;
use App\Models\RewardToUser;
use App\Models\Product;
use App\Models\Refer;
use Carbon\Carbon;

class RewardCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reward:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Scheduling daily at 3 am ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = Carbon::now()->subDays(1)->startOfDay();
        $to = Carbon::now()->endOfDay();

        $product_purchased = ProductPurchase::whereBetween('created_at', [$from, $to])->get();
        foreach($product_purchased as $item){
            $referal = Refer::where('id',$item->refer_id)->first();
            $product_id = $referal->product_id;

            $my_rewards_data = Refer::where('product_id',$product_id)->orderBy('created_at','DESC')->take(3)->get();
            $my_product = Product::where('id',$product_id)->first();

            for($i=0; $i <count($my_rewards_data); $i++) {

                switch ($i) {
                    case "0":
                        RewardToUser::create([
                            'user_id'=>$my_rewards_data['0']['user_id'],
                            'product_id'=>$product_id,
                            'reward_amount'=>$my_product->price/100*1,
                        ]);
                    break;
                    case "1":
                        RewardToUser::create([
                            'user_id'=>$my_rewards_data['1']['user_id'],
                            'product_id'=>$product_id,
                            'reward_amount'=>$my_product->price/100*0.5,
                        ]);
                    break;
                    case "2":
                        RewardToUser::create([
                            'user_id'=>$my_rewards_data['2']['user_id'],
                            'product_id'=>$product_id,
                            'reward_amount'=>$my_product->price/100*0.2,
                        ]);
                    break;
                }
            }
        }


        \Log::info("Thats working!");

    }
}
