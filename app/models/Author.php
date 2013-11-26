<?php

class Author extends Eloquent {

	public function books()
    {
        return $this->belongsToMany('Book');
    }

}