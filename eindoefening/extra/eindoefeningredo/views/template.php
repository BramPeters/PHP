<html>
    <head>
        <link type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="container">
                    <nav class="sitenav">
                        <ul>
                            <li><a href="index.php?page=home">Home</a></li>
                            <li><a href="index.php?page=list">Product List</a></li>
                            <li><a href="index.php?page=cart">Cart</a></li>
                        </ul>
                    </nav>
                    <div class="cart">
                        <?php if (isset($cart) && $cart instanceof Cart) { ?>
                           <header>
                                <h2>Shopping Cart</h2>
                           </header>
                            <section>
                                <?php if ($cart->countProducts() > 0) { ?>
                                    <p class="cart-filled">Your cart contains&nbsp;
                                        <span class='product-count'>
                                            <?php echo $cart->countProducts(); ?>
                                        </span>
                                        &nbsp;product<?php echo ($cart->countProducts() > 1 ? 's' : ''); ?>
                                    </p>
                                <?php } else { ?>
                                    <p class="cart-empty">No items in your cart.</p>
                                <?php } ?>
                            </section>
                        <?php } ?>
                    </div>
                </div>
            </header>
            <section id="content">
                <div class="container">
                    <?php if (isset($view)) {
                        echo $view;
                    } else { ?>
                   <!--<div class="oops">
                        <h2>Looks like something went wrong.</h2>
                        <p>Four "oh-oh" four, page not found.</p>
                    </div>-->
                    <?php }?>
                </div>
            </section>
        </div>
    </body>
</html>