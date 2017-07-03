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
            
            $imageName = $post->generateRandomImageName().'.'.$imageExtension;
            
            $post->setCreatedAt(Carbon::now());
            $post->setImagePath($imageName);
            $id = DB::table('posts')->insertGetId($post->getData());
            $post->setId($id);
            
            $image = Image::make($imagePath);
            $image->widen(320);
            $image->save($imageSaveDir.$post->getMobileImagePath());
            
            $image = Image::make($imagePath);
            $image->widen(640);
            $image->save($imageSaveDir.$post->getTabletImagePath());
            
            $image = Image::make($imagePath);
            $image->widen(1024);
            $image->save($imageSaveDir.$post->getDesktopImagePath());
        
        });
    }
    
    public static function listPostsOrderedByCreationTime() {
        return DB::table('posts')->orderBy('created_at', 'desc')->get()->map(function($postData){
            return new Post((array)$postData);
        });
    }

}