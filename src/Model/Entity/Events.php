<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Events extends Entity {
    protected array $_accesible = [
        'id' => true,
        'user_id' => true,
        'location_id' => true,
        'exp_date' => true,
        'title' => true,
        'description' => true,
        'url' => true,
        'complete' => true,
        'created' => true,
        'modified' => true,
    ];
}
