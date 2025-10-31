<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use App\Model\Table\UsersTable;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\I18n\DateTime;

#[TestCase]
#[uses('\App\Controller\UsersController')]
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    private $Users = null;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Users',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->Users =  $this->fetchTable('Users');
    }

    // public function tearDown(): void
    // {

    // }

    #[Test]
    #[uses('\App\Controller\UsersController:display()')]
    public function testDisplay(): void
    {
        $this->get('/eventPlanner');
        $this->assertResponseOk();
    }

    #[Test]
    #[uses('\App\Controller\UsersController::index()')]
    public function testIndex(): void
    {
        $this->get('/eventPlanner/users');
        $this->assertResponseOk();
    }

    #[Test]
    #[uses('\App\Controller\UsersController::edit()')]
    public function testEdit(): void
    {
        $this->get('/eventPlanner/users/edit/2');
        $this->assertResponseOk();
    }

    #[Test]
    #[uses('\App\Controller\UsersController::add()')]
    public function testAdd(): void
    {
        $this->get('/eventPlanner/users/add');
        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $postData = [
            'id' => '4',
            'email' => 'user4@example.com',
            'pass' => '1234',
            'enabled' => 'yes',
            'activated' => 'yes',
            'ac_code' => '302',
            'role' => 'user',
            'created' => DateTime::now(),
            'modified' => DateTime::now()
        ];

        $this->post('/eventPlanner/users/add', $postData);
        $this->assertFlashMessage('User added successfully');
        $this->assertResponseCode(302);

        // TODO: Test when the insertion of a new user fails.
    }

    #[Test]
    #[uses('\App\Controller\UsersController::delete()')]
    public function testDelete(): void
    {
        $this->get('/eventPlanner/users/delete/2');
        $this->assertResponseCode(302);
    }
}
