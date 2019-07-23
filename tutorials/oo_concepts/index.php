<?php
    interface Paperback {
            public function setTitle($var);
            public function getTitle();
    }

    class Book implements Paperback {
        const pi = 3.1427;
        var $title;
        var $price;

        function __construct($title, $price) {
            $this->title = $title;
            $this->price = $price;
        }

        function __destruct() {
            $this->title = null;
            $this->price = null;
            echo "destruct done";
        }

        function setTitle($ref) {
            $this->title = $ref;
        }

        function getTitle() {
            echo "Title: $this->title<br/>";
        }

        function setPrice($ref) {
            $this->price = $ref;
        }

        final protected function getPrice() {
            echo "Price: $this->price<br/>";
        }
    }

    class Novel extends Book {
        var $author;
        private $address;

        function __construct($title, $price, $author, $add) {
            parent::__construct($title, $price);
            $this->author = $author;
            $this->address = $add;
        }

        function setAuthor($author) {
            $this->author = $author;
        }

        function getAuthor() {
            echo "author: $this->author ".parent::pi."<br/>";
        }

        function setAddress($add) {
            $this->address = $add;
        }

        function getPriceT() {
            parent::getPrice();
        }

        function getAddress() {
            echo "address: $this->address<br/>";
        }
    }

    $physics = new Novel("Theory of relativity", 6000, "Albert E.", "h/no:232, in road");
    // $physics->setTitle("Theory of relativity");
    // $physics->setPrice(5000);

    $physics->getTitle();
    $physics->getPriceT();
    $physics->getAuthor();
    $physics->getAddress();

    $physics = null;
?>