<?php

use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

list($object, $occurence) = require_once __DIR__ . '/base.php';

$encoders = [new JsonEncoder(new JsonEncode(JSON_UNESCAPED_SLASHES), new JsonDecode(true))];
$normalizers = [new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer()];
$serializer = new Serializer($normalizers, $encoders);
$serialized = $serializer->serialize($object, 'json');

$startSerialization = microtime(true);

for ($i = 0; $i < $occurence; $i++) {
    $serializer->serialize($object, 'json');
}

$stopSerialization = microtime(true);
$timeSerialization = $stopSerialization - $startSerialization;

echo sprintf("Serialization total : %f secondes, %f per item\n", $timeSerialization, $timeSerialization / $occurence);

$startDeserialization = microtime(true);

for ($i = 0; $i < $occurence; $i++) {
    $result = $serializer->deserialize($serialized, \Benchmark\Model\Dummy::class, 'json');
}

$stopDeserialization = microtime(true);
$timeDeserialization = $stopDeserialization - $startDeserialization;

echo sprintf("Deserialization total : %f secondes, %f per item\n", $timeDeserialization, $timeDeserialization / $occurence);
