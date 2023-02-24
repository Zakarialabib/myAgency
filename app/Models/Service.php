<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasAdvancedFilter;

    public $orderable = [
        'id',
        'title',
        'image',
        'content',
        'language_id',
        'page_id',
        'status',
    ];

    public $filterable = [
        'id',
        'title',
        'image',
        'content',
        'language_id',
        'page_id',
        'status',
    ];

    protected $fillable = [
        'title',
        'image',
        'content',
        'language_id',
        'slug',
        'status',
        'page_id',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }
}
