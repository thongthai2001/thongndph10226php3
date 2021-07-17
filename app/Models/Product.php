<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //chỉ định tên table trong TH k đặt theo quy tắc eloquent
    protected $table = 'products';

    //mặc định eloquent coi primary key là cột id
    protected $primaryKey = 'id';
}
