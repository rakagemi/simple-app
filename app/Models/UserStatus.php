<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserStatus extends Model
{
    //use HasFactory;

    protected $table = 'users_status';
    protected $fillable = [
        'id_user',
        'status',
        'position',
    ];

    public function user()
    {
        return $this->belongsTo(User::Class, 'id_user', 'id');
    }
}
