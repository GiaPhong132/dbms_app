<?php
if (!isset($_SESSION['guest']))
    header('Location: index.php?page=main&controller=login&action=index');
require_once __DIR__ . '/../navbar.php';
?>
<div class="app">
    <!--Header-->
    <header class="header-login">
        <div class="grid wide">
            <div class="header__contain">
                <div class="header__contain-login">
                    <div class="header__logo">
                        <a href="./index.html" class="header__logo-link">
                            <!-- <img src="/dbms_app/public/assets/img/logo/logo-full-orange.png" class="header__logo-img-login"> -->
                        </a>
                    </div>
                    <span class="header__label-login">Thanh Toán</span>
                </div>
                <!-- <a href="#" class="header__help">Bạn cần giúp đỡ?</a> -->
            </div>
        </div>
    </header>
    <!--Container-->
    <div class="container-payment">
        <div class="grid wide">
            <div class="row sm-gutter">
                <div class="col l-12">
                    <!-- <div class="payment-infor-form">
                                <div class="payment-address-form payment-form--separate">
                                    <div class="payment-header-form">
                                        <h3 class="payment-heading-form">Địa Chỉ Nhận Hàng</h3>
                                    </div>
                                    <div class="payment-form__form">
                                        <div class="auth-form__group">
                                            <input type="text" placeholder="Họ và tên" class="auth-form__input">
                                        </div>
                                        <div class="auth-form__group">
                                            <input type="text" placeholder="Số điện thoại" class="auth-form__input">
                                        </div>
                                        <div class="auth-form__group">
                                            <input type="text" placeholder="Địa chỉ cụ thể" class="auth-form__input">
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-method-form">
                                    <div class="payment-header-form">
                                        <h3 class="payment-heading-form">Phương thức thanh toán</h3>
                                    </div>
                                    <div class="payment-form__form">
                                        <div class="payment-form__tick">
                                            <div class="payment-method__tick">
                                                <input type="checkbox" class="payment-method-checkbox">
                                                <div class="payment-method-checkbox-name">
                                                    Thanh toán khi nhận hàng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment-form__tick">
                                            <div class="payment-method__tick">
                                                <input type="checkbox" class="payment-method-checkbox">
                                                <div class="payment-method-checkbox-name">
                                                    Chuyển khoản ngân hàng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-confirm btn--primary">Xác Nhận</div>
                                    </div>
                                </div>
                            </div> -->
                    <div class="payment-address-site">
                        <div class="payment-address-site-location">
                            <div class="payment-address-site-label">
                                <div class="payment-address-site-label-1">
                                    <i class="fa-solid fa-location-dot payment-address-site-label-icon"></i>
                                </div>
                                <div class="payment-address-site-label-2">Địa Chỉ Nhận Hàng</div>
                            </div>
                            <div class="payment-address-site-infor">
                                <div class="payment-address-site-infor-1"><?php echo $data->fname . ' '  . $data->lname . ' ' . $data->phone ?> </div>
                                <div class="payment-address-site-infor-2"><?php echo $data->address ?></div>
                                <div class="payment-address-site-infor-3">Mặc định</div>
                                <div class="payment-address-site-infor-4">Thay đổi</div>
                            </div>
                        </div>

                    </div>
                    <div class="payment-product-site">
                        <div class="payment-product-site-header">
                            <div class="payment-product-site-heading-name1">
                                Sản Phẩm
                            </div>
                            <div class="payment-product-site-heading-name2">
                                <div class="payment-site-list">Đơn Giá</div>
                                <div class="payment-site-list">Số Lượng</div>
                                <div class="payment-site-list">Thành tiền</div>
                            </div>

                        </div>

                        <form action="index.php?page=main&controller=product&action=pay" method="POST">
                            <?php
                            if (@$signal != "buyNow") {
                                foreach ($productCheck as $row) {
                                    echo '
                                            <div class="payment-product-site-container">
                                                <div class="payment-product-site-container__name1">
                                                    <img src="/dbms_app/public/assets/img/products/' . $row['id'] . '.jfif" alt="" class="payment-product-site-container__img">
                                                    <div class="payment-product-site-container__name3">
                                                     <input type="hidden" name="key" value="' . $row['id'] . '" >
                                                        <div class="payment-product-site-container__name">' . $row['name'] . '</div>
                                                        <div class="payment-product-site-container__name-2">Loại: Midnight</div>
                                                    </div>
                                                </div>
                                                <div class="payment-product-site-container__name2">
                                                    <div class="payment-product-site-container__price">
                                                        <div class="product-cart-list-price">đ</div>
                                                        ' .  number_format($row['newPrice'], 0, '', '.') . '
                                                    </div>
                                                    <div class="payment-product-site-container__quantity">
                                                        ' . $row['amount'] . '
                                                    </div>
                                                    <div class="payment-product-site-container__sum">
                                                        <div class="product-cart-list-price">đ</div>
                                                        ' . number_format($row['newPrice'] * $row['amount'], 0, '', '.') . '
                                                    </div>
                                                </div>
                                            </div>
                            ';
                                }
                            } else {
                                $_SESSION['buyNow'] = "1";
                                $_SESSION['idBuyNow'] = $productCheck->id;
                                echo '
                                <div class="payment-product-site-container">
                                                <div class="payment-product-site-container__name1">
                                                    <img src="/dbms_app/public/assets/img/products/' . $productCheck->id . '.jfif" alt="" class="payment-product-site-container__img">
                                                    <div class="payment-product-site-container__name3">
                                                     <input type="hidden" name="key" value="' . $productCheck->id . '" >
                                                        <div class="payment-product-site-container__name">' . $productCheck->name . '</div>
                                                        <div class="payment-product-site-container__name-2">Loại: Midnight</div>
                                                    </div>
                                                </div>
                                                <div class="payment-product-site-container__name2">
                                                    <div class="payment-product-site-container__price">
                                                        <div class="product-cart-list-price">đ</div>
                                                        ' .  number_format($productCheck->newPrice, 0, '', '.') . '
                                                    </div>
                                                    <div class="payment-product-site-container__quantity">
                                                        1
                                                    </div>
                                                    <div class="payment-product-site-container__sum">
                                                        <div class="product-cart-list-price">đ</div>
                                                        ' . number_format($productCheck->newPrice * 1, 0, '', '.') . '
                                                    </div>
                                                </div>
                                            </div>
                                ';
                            }
                            ?>



                            <div class="payment-product-site-footer">
                                <div class="payment-product-site-footer-category">
                                    <div class="payment-product-site-footer-category-name">Tổng tiền sản phẩm:</div>
                                    <div class="payment-product-site-footer-category-name">Phí vận chuyển:</div>
                                    <div class="payment-product-site-footer-category-name">Tổng thanh toán:</div>
                                </div>
                                <div class="payment-product-site-footer-price">
                                    <div class="payment-product-site-footer-price-num">
                                        <div class="product-cart-list-price product-cart-list-price-sum">đ</div>
                                        <div class="product-cart-list-price-sum-num"><?php echo number_format($totalPrice, 0, '', '.'); ?></div>
                                    </div>
                                    <div class="payment-product-site-footer-price-num">
                                        <div class="product-cart-list-price product-cart-list-price-sum">đ</div>
                                        <div class="product-cart-list-price-sum-num">0</div>
                                    </div>
                                    <div class="payment-product-site-footer-price-num">
                                        <div class="product-cart-list-price product-cart-list-price-sum">đ</div>
                                        <div class="product-cart-list-price-sum-num"><?php echo  number_format($totalPrice, 0, '', '.'); ?></div>
                                    </div>
                                </div>
                                <a href="index.php?page=main&controller=product&action=pay">
                                    <button type="submit" class="btn payment-btn" style="background-color: #DAD70E;">Đặt hàng</button>
                        </form>

                        </a>
                    </div>
                </div>
                <div class="col l-12">
                    <div class="payment-product">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

</div>

<?php require_once __DIR__ . '/../footer.php';
