<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'Prod_Name',
        'Description',
        'InventoryID',
        'Price',
        'image',
        'slug',
        'quantity',

    ];
    use HasFactory;
}
