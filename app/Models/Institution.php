<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Institution extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id'];

}
