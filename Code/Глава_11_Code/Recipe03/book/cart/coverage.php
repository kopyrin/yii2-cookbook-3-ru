<?php

use \mageekguy\atoum;

/** @var atoum\scripts\runner $script */
$report = $script->addDefaultReport();
$coverageField = new atoum\report\fields\runner\coverage\html('Cart', __DIR__ . '/tests/coverage');
$report->addField($coverageField);