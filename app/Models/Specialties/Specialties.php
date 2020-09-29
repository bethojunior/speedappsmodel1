<?php

namespace App\Models\Specialties;

use Illuminate\Database\Eloquent\Model;

class Specialties extends Model
{
    protected $fillable = ['title' , 'content', 'image', 'user'];
}
