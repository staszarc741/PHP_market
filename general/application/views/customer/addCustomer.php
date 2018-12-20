<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>


<div id="content">
    <form action="/general/customer/addCustomer" method="post">
        <label>Login</label>
        <input name="login" type="text" required><br>
        <label>Email</label>
         <input name="email" type="text" required><br>
        <label>Firstname</label>
         <input name="firstname" type="text" required><br>
        <label>Lastname</label>
         <input name="lastname" type="text" required><br>
        <label>Phone</label>
         <input name="phone" type="text" required><br>
        <input type="submit" name="add_product" value="Add"><br>
    </form>
    <a href="/general/customer/customerList" class="a_to_list" style="margin-top: -7em;"> Back... </a>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
