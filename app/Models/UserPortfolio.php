<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    protected $fillable = [
    'user_id',
    'title',
    'bio',
    'location',
    'profile_image',
    'github',
    'linkedin',
    'website',
    'headline',
    'experience_years',
    'availability',
    'primary_skill',
    'secondary_skill',
    'tools',
    'phone',
    'email_public',
    'twitter',
    'instagram',
    'country',
    'city',
    'remote_only',
    'education',
    'certifications',
    'achievements',
    'username',
    'slug',
    'meta_title',
    'meta_description',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
