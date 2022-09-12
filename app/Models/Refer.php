<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function from_refer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function refer_to()
    {
        return $this->belongsTo(User::class, 'user_id_refer', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
