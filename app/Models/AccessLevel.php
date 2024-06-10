<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    use HasFactory;

    public function add($user)
    {
    	$this->users()->save($user);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
