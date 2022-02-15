<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderOrder extends Model
{
    use HasFactory;

    protected $table = 'header_orders';

    protected $fillable = [
        'date',
        'account_id',
    ];

    public function items() {
        return $this->hasMany(DetailOrder::class, 'order_id', 'id');
    }
}
