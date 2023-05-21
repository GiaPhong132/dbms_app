<?php
require_once __DIR__ . '/../navbar.php';
if (!isset($_SESSION['guest']))
    header('Location: http://localhost/dbms_app/index.php?page=main&controller=login&action=index');
?>

<div class="app">
    <!--Header-->
    <!-- <header class="header-login">
        <div class="grid wide">
            <div class="header__contain">
                <div class="header__contain-login">
                    <div class="header__logo">
                        <a href="index.php?page=main&controller=product&action=index" class="header__logo-link">
                            <img src="/dbms_app/public/assets/img/logo/logo-full-orange.png" class="header__logo-img-login">
                        </a>
                    </div>
                    <span class="header__label-login">Giỏ hàng</span>
                </div>
                <a href="#" class="header__help">Bạn cần giúp đỡ?</a>
            </div>
        </div>
    </header> -->
    <!--Container-->
    <?php
    if (isset($message)) {

        echo '
                        <div class="alert alert-danger" id="myMsg" style="text-align:center">
                        <strong>
                            <h3>' . $message . '</h3>
                        </strong>
                    </div>
                        ';
    }
    ?>
    <div class="container-cart">
        <div class="grid wide">
            <div class="row sm-gutter">
                <div class="col l-11">
                    <div class="cart-page">
                        <div class="product-cart-container-box">
                            <div class="product-cart-container-turtorial">
                                <div class="product-cart-turtorial-list">


                                    <div class="product-cart-list-name product-cart-list-name-p">Sản phẩm</div>
                                    <div class="product-cart-list-name">Đơn giá</div>
                                    <div class="product-cart-list-name">Số lượng</div>
                                    <div class="product-cart-list-name">Số tiền</div>
                                    <div class="product-cart-list-name">Thao tác</div>

                                </div>
                            </div>
                        </div>
                        <form action="index.php?page=main&controller=product&action=getPay" method="POST">
                            <?php
                            $totalPrice = 0;
                            $totalAmount = 0;
                            foreach ($result as $row) {
                                $totalPrice += $row['newPrice'] * $row['amount'];
                                $totalAmount += $row['amount'];
                                echo '
                                                    <div class="product-cart-container-box-p">
                                                <div class="product-cart-container-turtorial">
                                                <div class="product-cart-turtorial-list-p">
                                                  <input type="checkbox" name="key" value="' . $row['id'] . '" >&nbsp&nbsp&nbsp&nbsp
                                                    <div class="product-cart-list-name product-cart-list-name-p">
                                                        <img src="/dbms_app/public/assets/img/products/' . $row['id'] . '.jfif" alt="" class="product-cart-img">
                                                        ' . $row['name'] . '
                                                    </div>
                                                    <div class="product-cart-list-name">
                                                        <div class="product-cart-list-price">đ</div>
                                                        ' . number_format($row['newPrice'], 0, '', '.') . '
                                                    </div>
                                                    <div class="product-cart-list-name product-cart-list-name-quantity">' . $row['amount'] . '</div>
                                                    <div class="product-cart-list-name">
                                                        <div class="product-cart-list-price product-cart-list-price-sum">đ</div>
                                                        <div class="product-cart-list-price-sum-num">' . number_format($row['newPrice'] * $row['amount'], 0, '', '.') . '</div>
                                                    </div>
                                                    <div class="product-cart-list-name">
                                                        <div class="product-cart-list-act"><a href="index.php?page=main&controller=cart&action=delete&idDel=' . $row['id'] . '">Xóa</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            ';
                            }
                            ?>

                            <?php
                            echo '
                                <div class="product-cart-container-box-footer">
                                    <div class="product-cart-container-turtorial">
                                        <div class="product-cart-turtorial-list-footer">

                                            <div class="product-cart-footer-name"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
                                            <div class="product-cart-footer-name-price-sum">Tổng Thanh Toán (' . $totalAmount . ' sản phẩm)</div>
                                            <div class="product-cart-footer-price">
                                                <div class="product-cart-list-price product-cart-list-price-sum">đ</div>
                                                <div class="product-cart-footer-price-sum">' . number_format($totalPrice, 0, '', '.')  . '</div>
                                            </div>
                                            <button class="btn buy-btn" type="submit" style="background-color: #DAD70E">Mua hàng</button>
                                        </div>

                                    </div>
                                </div>';

                            ?>

                        </form>
                    </div>
                </div>
                <div class="col l-1"></div>
            </div>
        </div>
    </div>
    <!-- Footer -->

</div>


<?php require_once __DIR__ . '/../footer.php';
