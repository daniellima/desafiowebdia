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

    public function setCreatedAt($datetimeOfCreation) {
        $this->data['created_at'] = $datetimeOfCreation;
    }
    
    public function getId($id) {
        $this->data['id'];
    }
    
    public function setId($id) {
        $this->data['id'] = $id;
    }
    
    public function getImageFileName() {
        return md5($this->data['title']) . $this->data['id'];
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