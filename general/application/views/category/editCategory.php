<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <form action="/general/category/editCategory/<?= 'id:' . $categoryInfo['id']; ?>" method="post">
        <label>Category name</label>
        <input name="category_name" type="text" value="<?php echo (!empty($categoryInfo['category_name'])) ? $categoryInfo['category_name'] : '' ?>" /><br>
        <label>Subcategories</label>
        <input name="subcategories" type="text" value="<?php echo (!empty($categoryInfo['subcategories'])) ? $categoryInfo['subcategories'] : '' ?>" /><br>
        <input type="submit" name="category_edit" value="Edit">
    </form>
    <a href="/general/category/categoryList" class="a_to_list"> Back... </a>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>

