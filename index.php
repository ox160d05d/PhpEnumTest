<?php

require_once 'JustEnum.php';
require_once 'ReflectionEnum.php';

$n = 100;
$k = 10;

test(function($v) {JustEnum::isDefined($v);}, $n, $k, 'JustEnum');
test(function($v) {ReflectionEnum::isDefined($v);}, $n, $k, 'ReflectionEnum');

function test(callable $f, $n, $k, $name) {
    $start = microtime(true);

    for ($i = 0; $i < $n; $i++) {
        for ($j = 1; $j <= $k; $j++) {
            $f('val' . $j);
        }
    }

    printf("%s took about %f seconds for %d calls of isDefined\n", $name, microtime(true)-$start, $n*$k);
}