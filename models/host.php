<?php
class Post {
    // database settings
    private $conn;
    private $table = 'posts';

    // Post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // Setting up the constructor
    public function __construct($db) {
        $this->conn = $db;
    }
}