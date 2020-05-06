<?php

namespace app\controllers;
use vendor\core\base\View;
use vendor\libs\Pagination;
use app\models\Main;

class MainController extends AppController{

    public function indexAction(){
        $model = new Main;

        $total = \R::count('tasklist');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;

        $str='';
        $dir='desc';

        if (isset($_GET['sortBy']) && ($_GET['dir'])) {
            $str = getSortLink($_GET['sortBy'],$_GET['dir']);
        }
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $items = \R::findAll('tasklist', " $str LIMIT $start, $perpage");
        $title = 'MAIN';
        $this->set(compact('title', 'items', 'dir', 'pagination', 'total'));


    }


}
