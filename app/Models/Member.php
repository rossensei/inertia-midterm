<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name', 'first_name', 'designation', 'company_id'
    ];

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }
}
