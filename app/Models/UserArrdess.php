<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArrdess extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'delivery_address',
        'delivery_cost',
        'is_approved'
    ];
}
