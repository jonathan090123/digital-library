<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
  protected $fillable = ['title','category_id','author_id','description','stock','thumbnail'];
  public function category(){return $this->belongsTo(Category::class);}
  public function author(){return $this->belongsTo(Author::class);}
  public function loans(){ return $this->hasMany(Loan::class); }
}
