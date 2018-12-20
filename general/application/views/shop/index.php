<div class="shop">
    <?php if (!empty($categories)):?>
        <?php for ($i=0; $i<count($categories);$i++) : ?>
            <div class="category_block">
                <a href="/general/shop/productList/id:<?php echo $categories[$i]['id'];?>"><?= $categories[$i]['category_name']; ?></a>
            </div>
        <?php endfor; ?>
    </table>
    <?php endif?>
</div>

