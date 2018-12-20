<div class="general">
    <form method="post" action="/general/users/registration">
    <label for="login">Login:</label>
    <input type="text" maxlength="25" name="login" id="login" value=" " required/><br>
    <label for="password">Password:</label>
    <input type="password" maxlength="25" name="password" id="password" value="" required/><br>
    <label for="email">E-mail:</label>
    <input type="text" maxlength="50" name="email" id="email" required/><br>
    <label for="r-pass">Re-password:</label>
    <input name="r_pass" type="password" maxlength="25" value="" id="r-pass" required /><br>
    <label for="firstname">firstname:</label>
    <input name="firstname" type="text" maxlength="20" value="" id="firstname" required/><br>
    <label for="lastname">lastname:</label>
    <input name="lastname" type="text" maxlength="20" value="" id="lastname" required/><br>
    <label for="phone">Phone:</label>
    <input name="phone" type="text" maxlength="20" value="" id="phone" required /><br>
    <input type="submit" value="Registration" name="reg"/>
</form>
<a href="/general/users/account"  class="a_reg"> Back... </a><br>
<?php
if(!empty($errorMess)) :
    foreach ($errorMess as $error) :
        echo $error . '<br />';
    endforeach;
endif; ?>
</div>
