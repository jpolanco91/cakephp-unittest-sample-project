<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Locations extends Entity {
    protected array $_accesible = [
        'id' => true,
        'user_id' => true,
        'title' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'address1' => true,
        'address2' => true,
        'created' => true,
        'modified' => true,
    ];
}
