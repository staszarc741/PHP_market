<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <?php

    if (!empty($users)):?>
        <table border="2px">
            <tr>
                <th>Login</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php for ($i=0; $i<count($users);$i++) : ?>
                <tr>
                    <td><?=$users[$i]['login'];?></td>
                    <td><?=$users[$i]['email'];?></td>
                    <td><?=$users[$i]['firstname'];?></td>
                    <td><?=$users[$i]['lastname'];?></td>
                    <td><?=$users[$i]['phone'];?></td>
                    <td>    <a href="/general/customer/editCustomer/id:<?php echo $users[$i]['id'];?>">edit/view</a></td>
                    <td>  <a href="/general/customer/deleteCustomer/id:<?php echo $users[$i]['id'];?>">delete</a></td>
                </tr>
            <?php endfor; ?>
        </table>
    <?php endif; ?>
    <p class="list_span">Add some <a href="/general/customer/addCustomer/">customer</a> </p>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
