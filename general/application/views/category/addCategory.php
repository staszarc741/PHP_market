<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <form action="/general/category/addCategory" method="post">
        <label>Category name</label>
        <input name="category_name" type="text" required><br>
        <label>Subcategories</label>
        <input name="subcategories" type="text"><br>
        <input type="submit" name="category" value="Add"><br>
    </form>
    <a href="/general/category/categoryList" class="a_to_list"> Back... </a>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>



