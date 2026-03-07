<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'message',
        'proficiency',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
