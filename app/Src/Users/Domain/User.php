<?php
namespace App\Src\Users\Domain;

use App\Models\Action;
use App\Src\Roles\Domain\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
