<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'color_id',  'memory', 'display_diagonal', 'os', 'copmany_id'];

    public function color(){
      return $this->belongsTo(Color::class);
    }

    public function company(){
      return $this->belongsTo(Company::class);
    }
}
