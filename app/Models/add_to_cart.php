<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_to_cart extends Model
{
    use HasFactory;
    public $table = "add_to_carts";
    public $timestamp = false;
}