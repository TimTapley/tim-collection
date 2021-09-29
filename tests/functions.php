<?php

require 'functions.php';

use PHPUnit\Framework\TestCase;

//create success test code: class = filename
class Functions extends TestCase
{
    public function testSuccessDisplayBooks()
    {
       $testArray=[
           'title'=> 'How naughty is my dog',
           'author'=> 'John Brown',
           'covertype' => 'Hardback',
           'published' => '1984',
           'condition' => 'Good',
           'signed'=> 1,
           'image' => "picture.jpg"
       ];

        $expected = '<article class="item"><div class="book"><img src="images/picture.jpg"" alt="a picture of How naughty is my dog book cover" /><h1>How naughty is my dog</h1></div><div><h2>John Brown</h2><h3>Covertype:Hardback</h3><h3>1984</h3><h3>Good</h3><h3>Yes</h3></div></article>';


        $result = displayBooks($testArray);

            $this->assertEquals($expected, $result);
    }
}