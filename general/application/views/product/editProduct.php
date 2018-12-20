<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content">
    <form action="/general/product/editProduct/<?= 'id:' . $productInfo['id']; ?>" method="post">
        <label>Product name</label>
        <input name="product_name" type="text" value="<?php echo (!empty($productInfo['product_name'])) ? $productInfo['product_name'] : '' ?>" /><br>
        <label>Category name</label>
        <input name="category_name" type="text" value="<?php echo (!empty($productInfo['category_name'])) ? $productInfo['category_name'] : '' ?>" /><br>
        <label>SKU</label>
        <input name="sku" type="number" value="<?php echo (!empty($productInfo['sku'])) ? $productInfo['sku'] : '' ?>" /><br>
        <label>Quantity</label>
        <input name="quantity" type="number" value="<?php echo (!empty($productInfo['quantity'])) ? $productInfo['quantity'] : '' ?>" /><br>
        <label>Price</label>
        <input name="price" type="number" value="<?php echo (!empty($productInfo['price'])) ? $productInfo['price'] : '' ?>" /><br>
        <input type="submit" name="product_edit" value="Edit">
    </form>
    <a href="/general/product/productList" class="a_to_list" style="margin-top: -7em;"> Back... </a>
    <?php
    if(!empty($errorMess)) :
        foreach ($errorMess as $error) :
            echo $error . '<br />';
        endforeach;
    endif; ?>
</div>
