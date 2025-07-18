<?php 

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class EventsTable extends Table {
    public function initialize(array $config): void {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->setTable('events');
        $this->setPrimaryKey('id');
    }

    public static function defaultConnectionName(): string {
        return 'sqlite3';
    }
}
