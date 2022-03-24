<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = 'settings';
    protected $guarded = [];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}