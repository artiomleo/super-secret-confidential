<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'name',
      'email',
      'phone_number',
      'start_time',
      'service_id',
      'user_id'
    ];
}
