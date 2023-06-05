<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasAdvancedFilter;

    use HasFactory;

    public $table = 'projects';

    public $orderable = [
        'id', 'title', 'status', 'slug', 'client_name',
        'featured_image', 'service_id', 'content', 'meta_title',
        'meta_description', 'gallery',
    ];

    public $filterable = [
        'id', 'title', 'status', 'slug', 'client_name',
        'featured_image', 'service_id', 'content', 'meta_title',
        'meta_description', 'gallery',
    ];

    protected $fillable = [
        'id', 'title', 'status', 'slug', 'client_name',
        'featured_image', 'service_id', 'content', 'meta_title',
        'meta_description', 'gallery', 'link', 'language_id',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
