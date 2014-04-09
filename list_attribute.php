<?php
// list_attributes.php
require_once "application/models/Entities/Attribute.php";
require_once "bootstrap.php";

$attributeRepository = $em->getRepository('Attribute');
$attributes = $attributeRepository->findAll();

foreach ($attributes as $attribute) {
    echo sprintf("-%s\n", $attribute->getName());
}