<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <form action="/general/customer/editCustomer/<?= 'id:' . $customerInfo['id']; ?>" method="post">
        <label>Login</label>
        <input name="login" type="text" value="<?php echo (!empty($customerInfo['login'])) ? $customerInfo['login'] : '' ?>" /><br>
        <label>Email</label>
        <input name="email" type="text" value="<?php echo (!empty($customerInfo['email'])) ? $customerInfo['email'] : '' ?>" /><br>
        <label>Firstname</label>
        <input name="firstname" type="text" value="<?php echo (!empty($customerInfo['firstname'])) ? $customerInfo['firstname'] : '' ?>" /><br>
        <label>Lastname</label>
        <input name="lastname" type="text" value="<?php echo (!empty($customerInfo['lastname'])) ? $customerInfo['lastname'] : '' ?>" /><br>
        <label>Phone</label>
        <input name="phone" type="text" value="<?php echo (!empty($customerInfo['phone'])) ? $customerInfo['phone'] : '' ?>" /><br>
        <input type="submit" name="customer_edit" value="Edit">
    </form>
    <a href="/general/customer/customerList" class="a_to_list" style="margin-top: -7em;"> Back... </a>

    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
