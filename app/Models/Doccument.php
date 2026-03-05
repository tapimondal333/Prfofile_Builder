<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Doccument extends Model
{
    protected $table = 'doccuments';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
