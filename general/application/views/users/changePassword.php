<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <form action="/general/users/changePassword/" method="post">
        <label>Current password </label>
        <input name="c_password" type="password"><br>
        <label>New password</label>
         <input name="n_password" type="password"><br>
        <label>Confirm new password </label>
        <input name="rn_password" type="password"><br>
        <input type="submit" value="Змінити" name="new_pass"><br>
    </form>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
