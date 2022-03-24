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

    public function sectiontitle() {
        return $this->hasOne('App\Models\Sectiontitle');
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
    
    public function menus() {
        return $this->hasMany('App\Models\Menu');
    }

}
