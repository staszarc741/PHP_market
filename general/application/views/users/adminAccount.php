<div id="menu" >
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<div id="content" >
    <div class="account_info">
        <span> Your Information</span><br><br>
        Login : <?=$_SESSION['loggedUser']['login'];?><br>
        Email: <?=$_SESSION['loggedUser']['email'];?><br>
        Firstname: <?=$_SESSION['loggedUser']['firstname'];?><br>
        Lastname: <?=$_SESSION['loggedUser']['lastname'];?><br>
        Phone: <?=$_SESSION['loggedUser']['phone'];?><br>
    </div>
</div>
