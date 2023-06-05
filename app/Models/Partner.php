<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasAdvancedFilter;
    use HasFactory;
    
    public $table = 'partners';

    public const ATTRIBUTES = [
        'id',
        'name',
        'status',
    ];

    public $orderable = self::ATTRIBUTES;
    public $filterable = self::ATTRIBUTES;
    
    protected $fillable = [
        'id',
        'name',
        'image',
        'link',
        'content',
        'status',
        'language_id'
    ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
