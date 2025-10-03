<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Growth extends Model
{
    //
    use HasFactory;
    protected $table = 'growth';
    protected $primaryKey = 'id';

    protected $fillable = [
        'profile_id' , 'adddate','height','weight','breastleft','breastright','pubic_hair','genital','boneage','dof','ballleft','ballright',
        'menarche','note'
    ];

}
