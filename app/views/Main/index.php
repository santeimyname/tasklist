<script src="/public/js/js/jquery.min.js"></script>
<script src="/public/js/js/jquery.dataTables.min.js"></script>
<script src="/public/js/js/dataTables.bootstrap4.min.js"></script>
<link href="/public/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
<div class="container">
<?php

if (isset($_GET['dir'])) {
    switch ($_GET['dir']):
        case "": {
            $dir = 'asc';
        };
            break;
        case "asc": {
            $dir = 'desc';
        };
            break;
        case "desc": {
            $dir = 'asc';
        };
            break;
    endswitch;
}
?>
    <form action="/task/edit" method="post" name="adminForm" >
    <div id="answer"></div>
    <button class="btn btn-default" id="send" onclick="javascript:document.location.href='task/edit?id=1'">Создать задачу</button>
    <br>

        <table id="utable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th><a href="\main?sortBy=id&dir=<?php echo $dir;?>">ИД</a></th>
                <th><a href="\main?sortBy=username&dir=<?php echo $dir;?>">Имя пользователя</a></th>
                <th><a href="\main?sortBy=email&dir=<?php echo $dir;?>">Email</a></th>
                <th><a href="\main?sortBy=text&dir=<?php echo $dir;?>">Текст задачи</a></th>
                <th><a href="\main?sortBy=status&dir=<?php echo $dir;?>">Статус</a></th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($items)): ?>
            <?php foreach ($items as $item) : ?>
                <?php $lnk = "/task/edit?id=" . $item["id"];
                ?>
                <tr>
                    <td align="center" width="5%"><a href=<?php echo $lnk; ?>><?php echo $item["id"] ?></td>
                    <td><a href=<?php echo $lnk; ?>><?php echo $item["username"] ?></td>
                    <td><a href=<?php echo $lnk; ?>><?php echo $item["email"] ?></td>
                    <td><a href=<?php echo $lnk; ?>><?php echo $item["text"] ?></td>
                    <td><a href=<?php echo $lnk; ?>><?php if ($item["status"] > 0) {
                           echo 'Выполнена';
                        }
                        else
                            echo 'В работе'; ?></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <p>Статей: <?=count($items);?> из <?=$total;?></p>
            <?php if($pagination->countPages > 1): ?>
                <?=$pagination;?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</form>
<script src="/public/js/test.js"></script>

