<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'role_desc',
    ];

    public function account() {
        return $this->hasMany(Account::class, 'account_id', 'id');
    }
}
