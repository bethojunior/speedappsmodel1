<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_types';

    protected $fillable = ['name'];

    protected $primaryKey = 'id';
}
