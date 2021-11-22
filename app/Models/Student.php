<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'class_id' , 'country_id' , 'date_of_birth'];
    
    public function class() {
        return $this->belongsTo(Classe::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
