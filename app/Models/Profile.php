<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','name','gender','photo','birthdate','father_height','mother_height','birthweek','birth_weight','birth_height'];
    public $incrementing = true;
    public $timestamps = true;
}
