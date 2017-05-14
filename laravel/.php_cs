<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('bootstrap/cache')
    ->exclude('resources/assets')
    ->exclude('resources/views')
    ->exclude('storage')
    ->exclude('node_modules')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
    ])
    ->setUsingCache(false)
    ->setFinder($finder)
;
