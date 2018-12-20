<div id="menu" style="width:25%">
<ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
    <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
<?php endforeach; ?>
</ul>
</div>

<div id="content">
    <?php
    if (!empty($address)): ?>
    <div class="account_info">
        <span> Your Address</span><br><br>
        Street : <?=$address['street'];?><br>
        City: <?=$address['city'];?><br>
        Country: <?=$address['country'];?><br>
        <p class="list_span" style="margin-left: 0em;">Edit your <a href="/general/users/addAddress">address</a> </p>
    </div>
    <?php else : ?>
        <p class="list_span">You don’t have any address. Please, add some <a href="/general/users/addAddress">address</a> </p>
    <?php endif;
    ?>
</div>
<?php
if(!empty($errorMess)) :
    foreach ($errorMess as $error) :
        echo $error . '<br />';
    endforeach;
endif; ?>