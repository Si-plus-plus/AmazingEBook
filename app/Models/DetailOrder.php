<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';

    protected $fillable = [
        'order_id',
        'e_book_id',
    ];

    public function order() {
        return $this->belongsTo(HeaderOrder::class);
    }

    public function e_book() {
        return $this->belongsTo(EBook::class);
    }
}
