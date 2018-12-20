<div id="menu" >
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">

    <form action="/general/users/editAccount" method="post">
        <label>Email </label>
         <input type="text" name="email" value="<?php echo (!empty($_SESSION['loggedUser']['email'])) ? $_SESSION['loggedUser']['email'] : '' ?>"><br>
        <label>Name</label>
         <input type="text" name="firstname" value="<?php echo (!empty($_SESSION['loggedUser']['firstname'])) ? $_SESSION['loggedUser']['firstname'] : '' ?>"><br>
        <label>Surname </label>
         <input type="text" name="lastname" value="<?php echo (!empty($_SESSION['loggedUser']['lastname'])) ? $_SESSION['loggedUser']['lastname'] : '' ?>"><br>
        <label>Phone</label>
         <input type="text" name="phone" value="<?php echo (!empty($_SESSION['loggedUser']['phone'])) ? $_SESSION['loggedUser']['phone'] : '' ?>"><br>
        <input type="submit" name="edition" value="Change">
    </form>
</div>
<?php
if(!empty($errorMess)) :
    foreach ($errorMess as $error) :
        echo $error . '<br />';
    endforeach;
endif; ?>