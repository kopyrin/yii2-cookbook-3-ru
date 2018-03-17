<?php

require 'recipe/yii2-app-basic.php';

set('shared_files', [
    'config/db.php',
    'config/params.php',
    'web/index.php',
    'yii',
]);

server('prod', 'site.com', 22) // SSH access to remote server
    ->user('user')
    // ->password(password) // uncomment for authentication by password
    // ->identityFile()     // uncomment for authentication by SSH key
    ->stage('production')
    ->env('deploy_path', '/var/www/project');

set('repository', 'git@github.com:user/repo.git');

