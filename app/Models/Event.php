<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'title',
      'name',
      'email',
      'phone_number',
      'start',
      'end',
      'service_id',
      'user_id'
    ];
// nustiu exact daca folosesc dar e okay sa fie nu incurca la nimic
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
