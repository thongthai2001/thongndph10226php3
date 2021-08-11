<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //chỉ định tên table trong TH k đặt theo quy tắc eloquent
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'image',
        
    ];

    //mặc định eloquent coi primary key là cột id
    protected $primaryKey = 'id';

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

   
}
