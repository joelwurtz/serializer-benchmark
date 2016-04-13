<?php

require_once __DIR__ . '/vendor/autoload.php';

use Benchmark\Model\Dummy;
use Benchmark\Model\Foo;

$foo = new Foo();
$foo->setPropA('test');
$foo->setPropB(10);
$foo->setPropC(3.0);

$fooArray = [];

for ($i = 0; $i < 10; $i++) {
    $fooArray[] = clone $foo;
}

$object = new Dummy();
$object->setPropA('test');
$object->setPropB(10);
$object->setPropC(3.0);
$object->setPropD(['foo', 'bar', 'dummy']);
$object->setPropE($foo);
$object->setPropF($fooArray);

$occurence = 10000;

return [$object, $occurence];
