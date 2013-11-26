<?php

class Book extends Eloquent {

	protected $guarded = array();

	public function authors()
    {
        return $this->belongsToMany('Author');
    }
    
}