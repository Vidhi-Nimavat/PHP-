<?php
// Numeric array for days Monday to Saturday
$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

// Associative array for months with total days
$months = [
    "January" => 31,
    "February" => 28,
    "March" => 31,
    "April" => 30,
    "May" => 31,
    "June" => 30,
    "July" => 31,
    "August" => 31,
    "September" => 30,
    "October" => 31,
    "November" => 30,
    "December" => 31
];

// Multidimensional array for laptops with company name, model, and price
$laptops = [
    "Dell" => [
        ["model" => "XPS 13", "price" => 1000],
        ["model" => "Inspiron 15", "price" => 700]
    ],
    "HP" => [
        ["model" => "Spectre x360", "price" => 1200],
        ["model" => "Pavilion 14", "price" => 650]
    ]
];

// Example output
print_r($days);
print_r($months);
print_r($laptops);
?>
