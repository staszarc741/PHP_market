<span class="header_span"> Hello, <?php echo (!empty($_SESSION['loggedUser'])) ? $_SESSION['loggedUser']['login'] : 'Incognito';?></span>



<?php if (!empty($_SESSION['loggedUser'])) { ?>
    <div class="header_a">
        <a href="/general/users/adminAccount">Account</a>
        <a href="/general/shop/index">Shop</a>
    </div>
    <form method="post" action="/general/users/logout">
        <input type="submit" value="Logout" name="logout" class="logout_btn"/>
    </form>
<?php }

?>
