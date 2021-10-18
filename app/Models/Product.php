<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    protected $fillable =[
        'name',
        'detail',
        'price',
        'image',
        'idRestaurant'=>1,
        'idCategory'
    ];

    public function category(){
        return $this->hasOne(Menu::class,'id','idCategory');
    }
}
