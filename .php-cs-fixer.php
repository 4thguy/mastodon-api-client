<?php

declare(strict_types=1);

use Ergebnis\PhpCsFixer\Config;

$config = Config\Factory::fromRuleSet(Config\RuleSet\Php82::create());

$config->getFinder()->in(__DIR__)
    ->exclude([
        'var/',
    ]);
$rules= $config->getRules();
$config->setRules(
    array_merge(
        $config->getRules(),
        [
            'class_attributes_separation' => true,
            'final_class' => false,
            'final_public_method_for_abstract_class' => false,
            'native_function_invocation' => false,
            'protected_to_private' => false,
            'return_assignment' => false,
            'yoda_style' => false,
            'no_unused_imports' => true,
        ]
    )
);

return $config;
