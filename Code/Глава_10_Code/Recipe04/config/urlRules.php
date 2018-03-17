<?php

return [
    '' => 'site/index',
    '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
    '<_c:[\w\-]+/<_a:[\w\-]+>>/<id:\d+>' => '<_c>/<_a>',
    '<_c:[\w\-]+>' => '<_c>/index',
];
