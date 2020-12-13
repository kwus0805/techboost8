<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
   protected $guarded = array('id');

   public static $rules = array(
      'news_id' => 'required',
      'edited_at' => 'required',
   );

    use HasFactory;
}
