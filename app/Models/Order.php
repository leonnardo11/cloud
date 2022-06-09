<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'email'];

    public function Products()
    {
        return $this->belongsToMany(Product::class)->withPivot('name','price','units');
    }
}