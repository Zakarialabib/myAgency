<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class FeaturedBanner extends Model
{
    use HasAdvancedFilter;

    public const STATUSINACTIVE = 0;

    public const STATUSACTIVE = 1;

    public $orderable = [
        'id', 'title', 'details', 'image', 'status', 'featured', 'language_id',
    ];

    public $timestamps = false;

    protected $filterable = [
        'id', 'title', 'details', 'image', 'status', 'featured', 'language_id',
    ];

    protected $fillable = [
        'title', 'details', 'image', 'embeded_video', 'status', 'featured', 'link', 'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
