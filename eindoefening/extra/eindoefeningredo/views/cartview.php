<div class="shopping-cart">
    <?php foreach ($cart as $product) {
        if ($product instanceof Product) {
            $product_class = 'odd';
            ?>
            <div class="product row <?php echo ($product_class == 'even' ? $product_class = 'odd' : $product_class = 'even'); ?>">
                <div class="product-name">
                    <p><?php echo $product->getName(); ?></p>
                </div>
                <?php if ($product->hasAttributes()) {
                    $attribute_class = 'odd';
                    ?>
                    <div class="product-attributes">
                        <?php foreach ($product->getAttributes() as $attribute) { ?>
                            <div class="attribute row <?php echo ($attribute_class == 'even' ? $attribute_class = 'odd' : $attribute_class = 'even'); ?>">
                                <div class="attribute-name">
                                    <p><?php echo $attribute->getName(); ?></p>
                                </div>
                                <div class="attribute-action">
                                    <a class="remove-product-attribute" href="index.php?page=cart&action=updateproduct&id=<?php $product->getProductCartId(); ?>">
                                        <span class="replace">Remove Attribute</span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php }?>
                <div class="product-amount">
                    <p><?php echo $product->getCount(); ?></p>
                </div>
                <div class="product-actions">
                    <a class="remove-product" href="index.php?page=cart&action=removeproduct&id=<?php $product->getProductCartId(); ?>">
                        <span class="replace">Remove Pizza</span>
                    </a>
                    <a class="update-product" href="index.php?page=cart&action=updateproduct&id=<?php $product->getProductCartId(); ?>">
                        <span class="update">Update Pizza</span>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
