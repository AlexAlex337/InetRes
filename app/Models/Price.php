<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['name', 'description', 'price', 'created_at', 'updated_at'];
}
