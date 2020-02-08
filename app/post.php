<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

    protected $fillable  = ['title', 'description', 'content', 'images', 'status', 'publish_at'  ];

     use SoftDeletes;
}
