<div class="general">
    <form method="post" action="">
        <label>Login</label>
        <input type="text" maxlength="25" name="login" value=" "/><br>
        <label>Password</label>
        <input type="password" maxlength="25" name="password" value=""/><br>
        <input type="submit" value="LogIn" name ="loginButton"/><br>
    </form>
    <a href="/general/users/registration" class="a_reg"> Registration </a>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>

