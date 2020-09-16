<?php

namespace App\Models;

use DigitalCloud\Blameable\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, Blameable, SoftDeletes;

    public function parent()
    {
        return $this->belongsTo('Tag', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Tag', 'parent_id');
    }
}
