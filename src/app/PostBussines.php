<?php

namespace App;

use DB;
use \Carbon\Carbon;
use Image;

class PostBussines
{
    public static function savePost(Post $post, $imagePath, $imageExtension, $imageSaveDir) {
        
        $post->validate();
        
        DB::transaction(function() use ($post, $imagePath, $imageExtension, $imageSaveDir) {
            
            $post->setCreatedAt(Carbon::now());
            $id = DB::table('posts')->insertGetId($post->getData());
            $post->setId($id);
            
            $image = Image::make($imagePath);
            $image->widen(320);
            $image->save($imageSaveDir.$post->getImageFileName().'-mobile.'.$imageExtension);
            
            $image = Image::make($imagePath);
            $image->widen(640);
            $image->save($imageSaveDir.$post->getImageFileName().'-tablet.'.$imageExtension);
            
            $image = Image::make($imagePath);
            $image->widen(1024);
            $image->save($imageSaveDir.$post->getImageFileName().'-desktop.'.$imageExtension);
        
        });
    }

}