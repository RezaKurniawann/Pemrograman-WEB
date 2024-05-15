<?php
    interface Shape {
        public function calculateArea ();
    }

    class Circle implements Shape {
        private $radius;

        public function __construct($radius) {
            $this -> radius = $radius;
        }

        public function calculateArea() {
            return pi() * pow ($this -> radius, 2);
        }
    }

    class Rectangle implements Shape {
        private $widht;
        private $height;

        public function __construct($widht, $height) {
            $this -> widht = $widht;
            $this -> height = $height;
        }

        public function calculateArea() {
            return $this -> widht * $this -> height;
        }
    }

    function printArea (Shape $shape) {
        echo "Area: " . $shape -> calculateArea() . "<br>";
    }

    $circle = new Circle(5);
    $rectangel = new Rectangle(4, 6);

    printArea($circle);
    printArea($rectangel);
?>