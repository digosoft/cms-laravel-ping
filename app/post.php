<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage; 


class Post extends Model
{

    protected $fillable  = ['title', 'description', 'content', 'image', 'status', 'publish_at', 'catagory_id'];
    
    use SoftDeletes;



    public function deleteImage(){
    	Storage::delete($this->images);
    }

    public function catagory(){
    	return $this->belongsTo(Catagory::class);
    }
     
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /*

        return post tags
    */
    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

}

