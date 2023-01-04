<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentLog extends Model
{
    protected $table = 'rent_logs';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'book_id',
        'rent_date',
        'return_date',
        'actual_return_date'
    ];

    // relasi rentlog ke book
    // foreign key di book
    // primary key di rentlog
    public function book() {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
