<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'address', 'net_worth'
    ];

    public function members() {
        return $this->hasMany('App\Models\Member');
    }
}
