<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Users extends Entity {
    protected array $_accesible = [
        'id' => true,
        'email' => true,
        'pass' => true,
        'enabled' => true,
        'activated' => true,
        'ac_code' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
    ];
}
