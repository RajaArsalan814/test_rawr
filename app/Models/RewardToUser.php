<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardToUser extends Model
{
    use HasFactory;

    protected $table = "reward_to_users";
    public $timestamps = false;
    protected $fillable = ['user_id','product_id','reward_amount'];
}
