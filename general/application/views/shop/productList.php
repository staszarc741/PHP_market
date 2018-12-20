<div class="shop">
    <?php if (!empty($products)):?>
        <?php for ($i=0; $i<count($products);$i++) : ?>
            <div class="product_block">
                <a href="/general/shop/productPage/id:<?php echo $products[$i]['id'];?>"><img src="http://www.bradleysbookoutlet.com/wp-content/uploads/2013/06/bradleys-book-outlet-books-only-logo.png" /></a>
                <a href="/general/shop/productPage/id:<?php echo $products[$i]['id'];?>"><?= $products[$i]['product_name']; ?></a>
                <span>Price: $<?= $products[$i]['price']; ?></span>
            </div>
        <?php endfor; ?>
    <?php else : ?>
        <span> This category is epmty </span>
    <?php endif?>
</div>

