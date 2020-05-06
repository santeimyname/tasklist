<style>
    input {
        float: right;
        border: 1px solid black;
    }
    form  {
        width: 350px;
    }
</style>
<body>
<form method="post">
    <fieldset>
        <legend>Авторизация</legend>
        <p>Логин:  <input type="text" name="user" /></p>
        <p>Пароль: <input type="password" name="pass" /><br /></p>
        <?php if (!isset($_SESSION['user'])) echo '<input type="submit" name="submit" formaction="/user/signin" value="Войти" />'?>
        <?php
        if (isset($_SESSION['user'])) echo '<input type="submit" name="submit"  value="Выйти" />'?>
    </fieldset>
</form>

</body>







