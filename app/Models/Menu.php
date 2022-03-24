<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Menu extends Model
{
    use HasAdvancedFilter;
    use HasFactory;
    
    public $table = 'menus';

    public $orderable = [
    ];

    public $filterable = [
    ];

    protected $fillable = [
    ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
