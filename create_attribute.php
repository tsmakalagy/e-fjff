<?php
require_once "bootstrap.php";
require_once "application/models/Entities/Attribute.php";

$newAttributeName = $argv[1];

$attribute = new Attribute();
$attribute->setName($newAttributeName);

$em->persist($attribute);
$em->flush();

echo "Created Attribute with ID " . $attribute->getId() . "\n";