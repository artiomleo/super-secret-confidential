<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'duration'
    ];

    public function department() {
        $this->belongsTo(Department::class);
    }
}
