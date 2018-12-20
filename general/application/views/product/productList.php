<div id="menu">
    <ul>
        <?php foreach($menu as $menu_item_text => $menu_item_link) : ?>
            <li><a href='<?=$menu_item_link?>'><?=$menu_item_text?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php
    ?>
</div>
<div id="content">
    <?php if (!empty($product)): ?>
        <table border=2px;>
            <tr>
                <th>Product name</th>
                <th>Category name</th>
                <th>SKU</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Edit Contact</th>
                <th>Delete Contact</th>
            </tr>
            <?php for ($i=0;$i<count($product); $i++):
                ?>
                <tr>
                    <td><?=$product[$i]['product_name'];?></td>
                    <td><?=$product[$i]['category_name'];?></td>
                    <td><?=$product[$i]['sku'];?></td>
                    <td><?=$product[$i]['quantity'];?></td>
                    <td><?=$product[$i]['price'];?></td>
                    <td><a href="/general/product/editProduct/id:<?php echo $product[$i]['id'];?>">edit/view</a> </td>
                    <td><a href="/general/product/deleteProduct/id:<?php echo $product[$i]['id'];?>">delete</a> </td>
                </tr>
            <?php endfor;?>
        </table>
    <?php endif;?>
    <p class="list_span">Add some <a href="/general/product/addProduct">product</a> </p>
</div>

