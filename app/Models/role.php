<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user(){
        return $this->hasMany(user::class, 'role_id', 'id');
    }
}
