<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Sectiontitle extends Model
{
    use HasAdvancedFilter;

    public $table = 'sectiontitles';

    public $orderable = [
    ];

    public $filterable = [
    ];

    protected $fillable = [
    ];

    protected $guarded = [];
    
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
