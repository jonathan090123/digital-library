<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {
  protected $fillable = ['user_id','book_id','returned_at'];
  public function user(){return $this->belongsTo(User::class);}
  public function book(){return $this->belongsTo(Book::class);}
  protected $casts = [
    'borrowed_at' => 'datetime',
    'returned_at' => 'datetime',
];

}
