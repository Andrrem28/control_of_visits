<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Sector extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $guarded = ['id'];


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
