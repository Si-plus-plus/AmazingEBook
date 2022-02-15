<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender_desc',
    ];

    public function accounts() {
        return $this->hasMany(Account::class, 'account_id', 'id');
    }
}
