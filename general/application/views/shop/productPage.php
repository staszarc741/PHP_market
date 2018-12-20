<div class="shop">
    <?php if (!empty($productInfo)):?>
        <div class="product_media">
            <img src="http://www.bradleysbookoutlet.com/wp-content/uploads/2013/06/bradleys-book-outlet-books-only-logo.png" />
        </div>
        <div class="product_content">
            <span class="span_product_name"><?= $productInfo['product_name']; ?></span><br>
            <span>Price $<?= $productInfo['price']; ?></span><br>
            <span>SKU <?= $productInfo['sku']; ?></span><br>

            <span>Product from <?= $productInfo['category_name']; ?> category </span><br>

        </div>
    <?php endif; ?>
</div>

