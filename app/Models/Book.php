<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        "category_id",
        "author",
        "year",
        "qty",
        "title"
    ];
    public function withCategory(){
        return$this->join('categories', function($join){
            return $join->on("categories.id", "=", "books.category_id");
        })
        ->select(
            "books.id as id",
            "books.title",
            "books.author",
            "books.qty",
            "books.year",
            "categories.category_name"
        )
        ->get();
    }
}
