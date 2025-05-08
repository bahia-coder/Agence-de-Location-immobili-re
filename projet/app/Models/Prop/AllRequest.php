<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'prop_id',
        'agent_name',
        'name',
        'email',
        'phone',
    ];
}

