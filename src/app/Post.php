<?php

namespace App;

use Validator;

class Post
{
    public function __construct(array $data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
    
    public function getTitle() {
        return $this->data['title'];
    }
    
    public function getSubtitle() {
        return $this->data['subtitle'];
    }
    
    public function getSecondTitle() {
        return $this->data['second-title'];
    }
    
    public function getContent() {
        return $this->data['content'];
    }

    public function setCreatedAt($datetimeOfCreation) {
        $this->data['created_at'] = $datetimeOfCreation;
    }
    
    public function setImagePath($imagePath) {
        $this->data['image-path'] = $imagePath;
    }
    
    public function getImagePath() {
        return $this->data['image-path'];
    }
    
    public function getId($id) {
        $this->data['id'];
    }
    
    public function setId($id) {
        $this->data['id'] = $id;
    }
    
    public function generateRandomImageName() {
        return md5($this->data['title']) . uniqid(mt_rand(), true);
    }
    
    public function getMobileImagePath() {
        return 'mobile-'.$this->getImagePath();
    }
    
    public function getTabletImagePath() {
        return 'tablet-'.$this->getImagePath();
    }
    
    public function getDesktopImagePath() {
        return 'desktop-'.$this->getImagePath();
    }
    
    public function validate() {
        Validator::make($this->data, [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'second-title' => 'required|max:255',
            'content' => 'required|max:4000'
        ])->validate();
    }

}