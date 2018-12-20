<div id="menu" style="width:25%">


    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>

</div>

<div id="content">
    <form action="/general/users/addAddress" method="post">
        <label>Street </label>
           <input type="text"  value="<?php echo (!empty($address['street'])) ? $address['street'] : '' ?>" name="street" /><br>
        <label>City </label>
           <input type="text" value="<?php echo (!empty($address['city'])) ? $address['city'] : ''  ?>" name="city"/><br>
        <label>Country </label>
           <input type="text" value="<?php echo (!empty($address['country'])) ? $address['country'] : ''  ?>" name="country"/><br>
        <input type="submit" name="addresses" value="Change">
    </form>
</div>
<?php
if(!empty($errorMess)) :
    foreach ($errorMess as $error) :
        echo $error . '<br />';
    endforeach;
endif; ?>