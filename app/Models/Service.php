<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasAdvancedFilter;
    use HasFactory;
    
    public const ATTRIBUTES = [
        'id',
        'title',
        'status',
    ];

    public $orderable = self::ATTRIBUTES;
    public $filterable = self::ATTRIBUTES;

    protected $fillable = [
        'title',
        'image',
        'content',
        'language_id',
        'features',
        'options',
        'slug',
        'status',
        'page_id',
    ];

     protected $casts = [
        'options'  => 'json',
        'features' => 'json',
        'satuts'   => Status::class,
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function language()
    {
        return $this->belongsTo(language::class);
    }
}
