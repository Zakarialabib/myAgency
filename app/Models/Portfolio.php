<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Support\HasAdvancedFilter;

class Portfolio extends Model
{
    use HasAdvancedFilter;

    public $table = 'portfolios';
    
    public $orderable = [
        'id','title', 'status' ,'slug','client_name',
        'featured_image' ,'service_id' ,'content' , 'meta_keywords',
        'meta_description','gallery'
    ];

    public $filterable = [
        'id','title', 'status' ,'slug','client_name',
        'featured_image' ,'service_id' ,'content' , 'meta_keywords',
        'meta_description','gallery'
    ];

    protected $fillable = [
        'id','title', 'status' ,'slug','client_name',
        'featured_image' ,'service_id' ,'content' , 'meta_keywords',
        'meta_description','gallery','link','language_id'
    ];

    public function service() : BelongsTo
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
