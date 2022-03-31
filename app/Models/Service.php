<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Support\HasAdvancedFilter;

class Service extends Model
{
    use HasAdvancedFilter;

    public $orderable = [
        'title',
        'image',
        'content',
        'icon',
        'language_id',
        'status'
    ];

    public $filterable = [
        'title',
        'image',
        'content',
        'icon',
        'language_id',
        'status'
    ];

    protected $fillable = [
        'title',
        'image',
        'content',
        'icon',
        'language_id',
        'status'
    ];

    public function portfolios() : HasMany
    {
        return $this->hasMany('App\Models\Portfolio');
    }
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
