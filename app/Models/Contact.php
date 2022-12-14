<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'company_id','email', 'position', 'contact'];
    
    public function notes(){
        return $this->hasMany(Note::class);
    }
}
