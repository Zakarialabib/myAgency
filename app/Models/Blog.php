<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasAdvancedFilter;

    public $orderable = [
        'id',
        'title',
        'slug',
        'status',
        'featured',
        'language_id',
    ];

    public $timestamps = false;

    protected $filterable = [
        'id',
        'title',
        'slug',
        'status',
        'featured',
        'language_id',
    ];

    protected $fillable = [
        'title',
        'details',
        'image',
        'slug',
        'status',
        'featured',
        'meta_title',
        'meta_description',
        'language_id',
    ];

    protected $dates = ['created_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'category_id')->withDefault();
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'language_id')->withDefault();
    }
}
