<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{   
    protected $table = 'experiences';
    protected $fillable = [
        'user_id',
        'company',
        'location',
        'position',
        'start_date',
        'end_date',
        'description',
        'reason_to_leave',
        'experience_certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
