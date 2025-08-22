<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 */
class EventsController extends AppController
{
    private $Events = null;

    public function initialize(): void {
        parent::initialize();
        $this->Events = $this->fetchTable('Events');
    }

    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index() {
        $events = $this->Events->find()->all();
        $tableKeys = [
            'id',
            'user_id',
            'location_id',
            'exp_date',
            'title',
            'description',
            'url',
            'complete',
            'created',
            'modified',
        ];
        $this->set(compact('events'));
        $this->set(compact('tableKeys'));
    }

    public function edit($id) {
        $event = $this->Events->findById($id)->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Events->patchEntity($event, $this->request->getData());

            if ($this->Events->save($event)) {
                $this->Flash->success(__('Your event has been saved successfully'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to update your event.'));
        }

        $this->set('event', $event);
    }

    public function add() {
        $event = $this->Events->newEmptyEntity();

        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());

            if ($this->Events->save($event)) {
                $this->Flash->success(__('Event added successfully'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Error adding event'));
        }

        $this->set('event', $event);
    }

    public function delete($id) {
        $event = $this->Events->findById($id)->firstOrFail();

        if ($this->Events->delete($event)) {
            $this->Flash->success(__('Event deleted successfully'));

            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('Error deleting event'));
    }
}
