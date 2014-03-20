<div class="product-list">
    <?php foreach ($product_list as $product) {
        if ($product instanceof Product) {
            $product_class = 'odd';
            ?>
            <div class="product row <?php echo ($product_class == 'even' ? $product_class = 'odd' : $product_class = 'even'); ?>">
                <div class="product-name">
                    <p><?php echo $product->getName(); ?></p>
                </div>
                <div class="product-price">
                    <p><?php echo $product->getPrice(); ?></p>
                </div>
                <div class="product-amount">
                    <input type="text" name="product_<?php echo $product->getId() ?>_amount" placeholder="0">
                </div>
                <div class="product-actions">
                    <a class="remove-product" href="index.php?page=cart&action=addproduct&id=<?php $product->getId(); ?>">
                        <span class="replace">Add Pizza</span>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
