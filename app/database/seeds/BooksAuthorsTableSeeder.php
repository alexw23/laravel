<?php

class BooksAuthorsTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('authors')->delete();

        $author1 = Author::create(array('name' => 'Steve Jobs'));
        $author2 = Author::create(array('name' => 'Bill Gates'));

        DB::table('books')->delete();

        $book = Book::create(array('name' => 'Life of Pi'));

        $book->authors()->attach([$author1->id, $author2->id]);
    }

}