<?php
$canedit='';
$isadm=0;
if (isset($_SESSION['user'])&& ($_SESSION['user']=='admin')){
    echo 'Режим: администратор';
    $canedit='';
    $isadm=1;
}
else{
    if ($item['id']>0)
    $canedit='readonly';
}
?>
<script src="/public/js/js/jquery.min.js"></script>
<h2>Редактирование задачи</h2>
<script src="/public/js/task.js"></script>
<script src="/public/js/js/jquery.min.js"></script>
<div class="col-md-9">
    <?php if($item['id']==0 || $isadm>0) {  ?></php>
    <button type="button" class="btn btn-outline-secondary" onclick="DoSaveTask();">Сохранить</button>
    <?php }?>
    <form action="" method="post">
            <label>Имя пользователя:</label><br />
            <input type="text" name="CustName" id="username" size="80" <?php echo $canedit?> value="<?php echo $item['username'] ?>"> </input>
        </p>
        <p>
            <label>Email:</label><br />
            <input type="text" name="CustFam" id="email" size="80" <?php echo $canedit?> value="<?php echo $item['email'] ?>"> </input>
        </p>
        <p>
            <label>Задача:</label><br />
            <input type = "text" name="CustOt" id="text" size="80" <?php echo $canedit?> value="<?php echo $item['text'] ?>"> </input>
        </p>
        <p>

            <label>Выполнена:</label><br />
        <input type='checkbox' name='checkbox' id="status" <?php echo ($item['status'] > 0 ? "checked=checked" : " "); ?>
        value="<?php echo $item['status'] ?>"> </input>
        </p>
        <?php
        if ($item['wasedit'] > 0) {
            echo '
             <label>Отредактировано администратором:</label><br />
        <input type="checkbox" name="checkbox" id="wasedit" '. ($item['wasedit'] > 0 ? "checked=checked" : " ")
        .'> </input>';
        }
        ?>
        <input type = "hidden" name="id" id="id" value="<?php echo $item['id'] ?>"> </input>
    </form>
</div>
