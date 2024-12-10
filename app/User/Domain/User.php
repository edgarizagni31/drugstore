<?php

namespace App\User\Domain;

use App\Models\Action;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function actions() {
        return $this->hasMany(Action::class);
    }
}
