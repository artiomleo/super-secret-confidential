<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'email',
        'user_id',
        'rating',
        'description'
    ];
    // aceasta o folosesc in home.blade linia: 94 si in reviews.blade linia: 140
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
