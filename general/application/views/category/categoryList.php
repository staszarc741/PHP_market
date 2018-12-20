
<div id="menu">

    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content" style="margin-left: -4px;">
    <?php
    if (!empty($categories)):?>
        <table border="2px;">
            <tr>
                <th>Category name</th>
                <th>Subcategories</th>
                <th>Edit Category</th>
                <th>Delete Category</th>
            </tr>
            <?php
            for ($i=0; $i<count($categories);$i++) : ?>
                <tr>
                    <td><?= $categories[$i]['category_name']; ?></td>
                    <td><?=$categories[$i]['subcategories'];?></td>
                    <td><a href="/general/category/editCategory/id:<?php echo $categories[$i]['id'];?>">edit-view </td>
                    <td><a href="/general/category/deleteCategory/id:<?php echo $categories[$i]['id'];?>">delete </td>
                </tr>
            <?php endfor; ?>
        </table>
    <?php endif?>
    <p class="list_span">Add some <a href="/general/category/addCategory/">category</a> </p>



</div>
<?php
if(!empty($errorMess)) :
    foreach ($errorMess as $error) :
        echo $error . '<br />';
    endforeach;
endif; ?>
<!--<form method="get" action="/general/category/addCategory/">-->
<!--    <input type="submit" value="ADD"/>-->
<!--</form>-->
<br>

