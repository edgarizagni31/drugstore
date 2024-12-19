<?php

namespace App\Src\Roles\Domain;

use App\Src\Users\Domain\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
