<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
    
class Bcategory extends Model
{
    use HasAdvancedFilter;

    public $table = 'bcategories';

    public $orderable = [
           'id',
           'name',
           'serial_number',
           'status',
       ];
   
       public $filterable = [
           'id',
           'name',
           'serial_number',
           'status',
       ];

       protected $fillable = [
           'name',
           'serial_number',
           'status',
    ];


    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
