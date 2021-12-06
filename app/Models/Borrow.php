<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    function borrow_details(){
        return $this->belongsToMany(BorrowDetails::class, 'borrow_details');
    }

    function student(){
        return $this->belongsTo(Student::class);
    }


    function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }
}
