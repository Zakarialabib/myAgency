<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasAdvancedFilter;

    public $orderable = [
        'id', 'title', 'slug', 'language_id'
    ];

    protected $filterable = [
        'id', 'title', 'slug', 'language_id'
    ];

    protected $fillable = [
        'title', 'slug', 'details', 'meta_title', 'meta_description', 'language_id', 'image', 'status'
    ];

     /**
     * Scope a query to only include active products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
}
