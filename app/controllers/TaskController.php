<?php

namespace app\controllers;

use app\models\Task;
use vendor\core\base\View;

class TaskController extends AppController
{

	public function indexAction()
	{
		echo 'Posts::index';
	}

	public function editAction()
	{
		$model = new Task();
		if (isset($_GET['id'])) {
//        echo '!!!TaskController::editAction';


			$item = \R::findOne('tasklist', "id = {$_GET['id']}");
			// $this->loadView('_test', compact('post'));
		} else {
			$item['id'] = 0;
			$item['username'] = '';
			$item['email'] = '';
			$item['text'] = '';
			$item['status'] = 0;
			$item['wasedit'] = 0;
		}
		$title = 'TASK';
		$this->set(compact('title', 'item'));

	}

	public function optionAction()
	{
		$model = new Task();
		if ($this->isAjax()) {
			if ($_POST['id'] == 0) {
				\R::exec("INSERT `tasklist` SET
                `username` = :username,
                `email` = :email,
                `text` = :text,
                `status` = :status
                 ", [
					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'text' => $_POST['text'],
					'status' => $_POST['status']
				]);
			} else {
				if ($_POST['id'] > 0) {
					if (isset($_SESSION['user']) && ($_SESSION['user'] == 'admin')) {
						{
							$id = $_POST['id'];
							$task = \R::load('tasklist', $id);
							$task->username = $_POST['username'];
							$task->email = $_POST['email'];
							$task->text = $_POST['text'];
							$task->status = $_POST['status'];
							$task->wasedit = $_POST['wasedit'];
							\R::store($task);

							echo 1;
							die;
						}
					}
					echo 222;
					die;
				}
			}

		}

	}
}