<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $table = 'languages';

    public $orderable = [
    ];

    public $filterable = [
    ];

    protected $fillable = [
    ];

    protected $guarded = [];
    
    public function setting() {
        return $this->hasOne('App\Models\Setting');
    }

    public function section() {
        return $this->hasOne('App\Models\Section');
    }

    public function teams() {
        return $this->hasMany('App\Models\Team');
    }

    public function services() {
        return $this->hasMany('App\Models\Service');
    }

    public function portfolios() {
        return $this->hasMany('App\Models\Portfolio');
    }

    public function faqs() {
        return $this->hasMany('App\Models\Faq');
    }

    public function bcategories() {
        return $this->hasMany('App\Models\Bcategory');
    }

    public function blogs() {
        return $this->hasMany('App\Models\Blog');
    }
    
    public function abouts() {
        return $this->hasMany('App\Models\About');
    }
    
    public function menus() {
        return $this->hasMany('App\Models\Menu');
    }

}
