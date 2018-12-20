<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <p class="delete_p">Are You sure that want to delete this user?</p>
    <form method="post" action="/general/customer/deleteCustomer/<?= 'id:' . $customerInfo['id']; ?>">
        <input type="submit" value="Yes" name="yes"/>
        <input type="submit" value="No" name="no"/><br>
    </form>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
