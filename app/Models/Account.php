<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'role_id',
        'gender_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'display_picture_link',
        'delete_flag',
        'modified_at',
        'modified_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function orders() {
        return $this->hasMany(HeaderOrders::class, 'account_id', 'id');
    }

    public function isAdmin()
    {
        return $this->role_id === 1;
    }
}
