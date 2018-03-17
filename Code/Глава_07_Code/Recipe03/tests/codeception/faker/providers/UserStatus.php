<?php

namespace tests\codeception\faker\providers;

use Faker\Provider\Base;

class UserStatus extends Base
{
    public function userStatus()
    {
        return $this->randomElement([0, 10, 20, 30]);
    }
} 