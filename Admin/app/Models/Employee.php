<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable =
    [
       'e_firstname',
       'e_lastname', 
       'company',
       'e_email',
       'e_phone'
   ];
   public function company(){
    return $this->belongsTo(Company::class,'id');
}
}
