<?php

require_once 'Collection.php';

$items = [1,2,3,4,5,6,7,8,9,10];

$collection = new Collection($items);

echo "Sum of elements:" . $collection->getSum() . "\n";