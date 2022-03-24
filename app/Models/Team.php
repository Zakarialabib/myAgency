<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $table = 'teams';
    protected $guarded = [];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
