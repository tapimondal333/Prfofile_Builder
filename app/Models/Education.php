<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
'user_id',
'level',
'course_name',
'stream',
'passing_year',
'marks',
'institution',
'certificate',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
