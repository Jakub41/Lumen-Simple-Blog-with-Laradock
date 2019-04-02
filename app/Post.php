<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The attributes that are mass assignable.
 * @var array
 */
class Post extends Model
{

  protected $fillable = [
    'title', 'description',
  ];
}
