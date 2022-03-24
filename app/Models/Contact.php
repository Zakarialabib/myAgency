<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Contact extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'contacts';
    
    protected $fillable = [
      'id','name', 'email', 'phone_number', 'subject', 'message'
    ];
 
    public $orderable = [
      'id', 'name', 'email', 'phone_number', 'subject', 'message','created_at'
  ];

  public $filterable = [
    'id', 'name', 'email', 'phone_number', 'subject', 'message'
  ];
  
    protected $dates = [
      'created_at',
      'updated_at',
  ];

}