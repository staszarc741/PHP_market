<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>


<div id="content">
    <form action="/general/product/addProduct" method="post">
        <label>Product name</label>
        <input name="product_name" type="text" required><br>
        <label>Category name</label>
        <input name="category_name" type="text" required><br>
        <label>SKU</label>
         <input name="sku" type="number" required><br>
        <label>Quantity</label>
         <input name="quantity" type="number" required><br>
        <label>Price</label>
         <input name="price" type="number" required><br>
        <input type="submit" name="add_product" value="Add"><br>
    </form>
    <a href="/general/product/productList" class="a_to_list" style="margin-top: -7em;"> Back... </a>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
