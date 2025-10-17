<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class UsersFixture extends TestFixture
{
    public string $connection = "test_sqlite3";
    public string $table = 'users';

    public array $records = array(
        array(
            'id' => 2,
            'email' => 'name@example.com',
            'pass' => '1234',
            'enabled' => 'yes',
            'activated' => 'yes',
            'ac_code' => 'KY',
            'role' => 'admin',
            'created' => '2007-03-18 10:43:23',
            'modified' => '2007-03-18 10:45:31'
        ),
        array(
            'id' => 3,
            'email' => 'name2@example.com',
            'pass' => '4567',
            'enabled' => 'yes',
            'activated' => 'yes',
            'ac_code' => 'KY',
            'role' => 'user',
            'created' => '2007-03-18 11:43:23',
            'modified' => '2007-03-18 11:45:31'
        )
    );
}
?>
