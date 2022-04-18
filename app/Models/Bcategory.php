<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
    
class Bcategory extends Model
{
    use HasAdvancedFilter;

    public $table = 'bcategories';

    const BCATEGORY_ACITVE = 1;
    const BCATEGORY_INACTIVE = 0;

    public $orderable = [
           'id',
           'name',
           'status',
           'language_id'
       ];
   
       public $filterable = [
           'id',
           'name',
           'status',
           'language_id'
       ];

       protected $fillable = [
           'name',
           'status',
           'slug',
           'language_id'
    ];


    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
