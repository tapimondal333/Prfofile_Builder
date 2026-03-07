<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'user_id',
        'name',
        'proficiency',
        'description',
        'certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
