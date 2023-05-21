<?php
require_once(__DIR__ . "/../navbar.php");
if (isset($message)) {

    echo '
                        <div class="alert alert-success" id="myMsg" style="text-align:center">
                        <strong>
                            <h3>' . $message . '</h3>
                        </strong>
                    </div>
                        ';
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <!-- main -->
    <div class="app">
        <!-- header -->

        <!-- container -->
        <div class="container-search-result">
            <div class="grid wide">
                <div class="row sm-gutter">



                    <?php
                    if (count($result) > 0) {
                        echo '
                                <div class="col l-2 m-0 ">
                                        <!-- category -->
                                        <nav class="category">
                                            <h3 class="category__heading">
                                                <i class="category__heading-icon fa-solid fa-list"></i> Danh Mục
                                            </h3>
                                            <ul class="category-list">
                                                <li class="category-item category-item-active">
                                                    <a href="#" class="category-item-link">Khác</a>
                                                </li>
                                                <li class="category-item category-item-active">
                                                    <a href="#" class="category-item-link">Iphone</a>
                                                </li>
                                                <li class="category-item category-item-active">
                                                    <a href="#" class="category-item-link">Xiaomi</a>
                                                </li>
                                                <li class="category-item category-item-active">
                                                    <a href="#" class="category-item-link">Samsung</a>
                                                </li>
                                                <li class="category-item category-item-active">
                                                    <a href="#" class="category-item-link">Oppo</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col l-10 m-12">
                                        <!-- home filter -->

                                        <div class="home-filter hide-on-mobile-tablet">
                                            <div class="home-filter-control">
                                                <p class="home-filter-title">Sắp xếp theo</p>
                                                <form action="index.php?page=main&controller=product&action=getFilter" method="POST">
                                                    ';
                        if (@$signal == 'getPopular') {
                            echo '
                                                    <button type="submit" name="getPopular" class="btn btn--primary home-filter-btn">Phổ biến</button>
                                                    <button type="submit" name="getLatest" class="btn home-filter-btn">Mới nhất</button>
                                                    <button type="submit" name="getMost" class="btn home-filter-btn">Bán chạy</button>
                                                    ';
                        } elseif (@$signal == 'getLatest') {
                            echo '
                                                    <button type="submit" name="getPopular" class="btn home-filter-btn">Phổ biến</button>
                                                    <button type="submit" name="getLatest" class="btn btn--primary home-filter-btn">Mới nhất</button>
                                                    <button type="submit" name="getMost" class="btn home-filter-btn">Bán chạy</button>
                                                    ';
                        } elseif (@$signal == 'getMost') {
                            echo '
                                                    <button type="submit" name="getPopular" class="btn home-filter-btn">Phổ biến</button>
                                                    <button type="submit" name="getLatest" class="btn home-filter-btn">Mới nhất</button>
                                                    <button type="submit" name="getMost" class="btn btn--primary home-filter-btn">Bán chạy</button>
                                                    ';
                        } else {
                            echo '
                                                    <button type="submit" name="getPopular" class="btn home-filter-btn">Phổ biến</button>
                                                    <button type="submit" name="getLatest" class="btn home-filter-btn">Mới nhất</button>
                                                    <button type="submit" name="getMost" class="btn home-filter-btn">Bán chạy</button>
                                                    ';
                        }


                        if (@$signal == 'descending' || @$signal == "ascending") {
                            echo '
                                                </form>
                                                <div class="btn home-filter-sort" style="background-color:white">


                                                      <button  type="button" class="btn home-filter-btn" style="background-color:white">Giá</button>

                                                    <ul class="home-filter-sort-list">

                                                            <form action="index.php?page=main&controller=product&action=getFilter" method="POST">
                                    ';
                        } else {
                            echo '
                                                </form>
                                                <div class="btn home-filter-sort">

                                                <button  type="button" class="btn home-filter-btn" style="background-color:white">Giá</button>

                                                    <ul class="home-filter-sort-list">

                                                            <form action="index.php?page=main&controller=product&action=getFilter" method="POST">
                                    ';
                        }
                        if (@$signal == "ascending") {
                            echo '
                                        <li >
                                                                <a href="#" class="home-filter-sort-item-link">
                                                                    <button type="submit" name="descending" class="home-filter-sort-item-link" style="background:none; border:none">GIẢM DẦN</button>
                                                                    <i class="fas fa-sort-amount-down-alt"></i>
                                                                  </a>
                                                                  </li>

                                                                <li style="background-color:#78bc5c">
                                                                <a href="#" class="home-filter-sort-item-link">
                                                                   <button type="submit" name="ascending" class="home-filter-sort-item-link" style="background:none; border:none">TĂNG DẦN</button>
                                                                    <i class="fas fa-sort-amount-up-alt"></i>
                                                                </a>
                                                            </li>
                                        ';
                        } elseif (@$signal == "descending") {
                            echo '
                            <li style="background-color:#78bc5c">
                                                                <a href="#" class="home-filter-sort-item-link">
                                                                    <button type="submit" name="descending" class="home-filter-sort-item-link" style="background:none; border:none">GIẢM DẦN</button>
                                                                    <i class="fas fa-sort-amount-down-alt"></i>
                                                                  </a>
                                                                  </li>

                                                                <li>
                                                                <a href="#" class="home-filter-sort-item-link">
                                                                   <button type="submit" name="ascending" class="home-filter-sort-item-link" style="background:none; border:none">TĂNG DẦN</button>
                                                                    <i class="fas fa-sort-amount-up-alt"></i>
                                                                </a>
                                                            </li>

                                        ';
                        } else {

                            echo '
                             <li>
                                                                <a href="#" class="home-filter-sort-item-link">
                                                                    <button type="submit" name="descending" class="home-filter-sort-item-link" style="background:none; border:none">GIẢM DẦN</button>
                                                                    <i class="fas fa-sort-amount-down-alt"></i>
                                                                  </a>
                                                                  </li>

                                                                <li>
                                                                <a href="#" class="home-filter-sort-item-link">
                                                                   <button type="submit" name="ascending" class="home-filter-sort-item-link" style="background:none; border:none">TĂNG DẦN</button>
                                                                    <i class="fas fa-sort-amount-up-alt"></i>
                                                                </a>
                                                            </li>
                            ';
                        }

                        echo                '
                                                            </form>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="home-filter-page">
                                                <div class="home-filter-page-number">
                                                    <p class="home-filter-page-now">' . $currPage . '</p>
                                                    /' . ceil($_SESSION['num_rows'] / 20) . '
                                                </div>
                                                <div class="home-filter-page-control">
                                                    ';

                        echo '
                                                    </div>
                                            </div>
                                        </div>

                                        <!-- home product -->
                                        <div class="home-product">
                                            <div id="list-product" class="row sm-gutter">
                        ';
                        foreach ($result as $row)
                            echo '
                                        <div class="col l-2-4 m-3 c-6 home-product-item">
                                             <a class="home-product-item-link" href="index.php?page=main&controller=product&action=getDetail&productKey=' . $row->id . '">
                                        <div class="home-product-item__img" style="background-image: url(/dbms_app/public/assets/img/products/' . $row->id . '.jfif);"></div>
                                        <div class="home-product-item__info">
                                            <h4 class="home-product-item__name">' . $row->name . '</h4>
                                            <div class="home-product-item__price">
                                                <p class="home-product-item__price-old">' .  number_format($row->oldPrice, 0, '', '.') . 'đ</p>
                                                <p class="home-product-item__price-new">' .  number_format($row->newPrice, 0, '', '.') . 'đ</p>
                                                <i class="home-product-item__ship fas fa-shipping-fast"></i>
                                            </div>
                                            <div class="home-product-item__footer">
                                                <div class="home-product-item__save">
                                                    <input type="checkbox" name="save-check" id="heart-save">
                                                    <label for="heart-save" class="far fa-heart"></label>
                                                </div>
                                                <div class="home-product-item__rating-star">
                                                    <i class="star-checked far fa-star"></i>
                                                    <i class="star-checked far fa-star"></i>
                                                    <i class="star-checked far fa-star"></i>
                                                    <i class="star-checked far fa-star"></i>
                                                    <i class="star-checked far fa-star"></i>
                                                </div>
                                                <div class="home-product-item__saled">Đã bán ' . $row->sold . 'k</div>
                                            </div>
                                            <div class="home-product-item__origin">' . $row->origin . '</div>
                                            <div class="home-product-item__favourite">
                                                Yêu thích
                                            </div>
                                            <div class="home-product-item__sale-off">
                                                <div class="home-product-item__sale-off-value">' . $row->saleOff . '%</div>
                                                <div class="home-product-item__sale-off-label">GIẢM</div>
                                            </div>
                                        </div>
                                        <div class="home-product-item-footer">Tìm sản phẩm tương tự</div>
                                        </a>
                                    </div>

                                ';
                    } else {
                        echo '<div class="shopee-search-empty-result-section" style="margin: auto;"><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/a60759ad1dabe909c46a817ecbf71878.png" class="shopee-search-empty-result-section__icon"><div class="shopee-search-empty-result-section__title">Không tìm thấy kết quả nào</div><div class="shopee-search-empty-result-section__hint">Hãy thử sử dụng các từ khóa chung chung hơn</div></div>';
                    }

                    ?>
                </div>
            </div>




            <!--  -->
            <!-- pagination -->

            <?php require_once __DIR__ . '/paginate.php'; ?>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        function timedMsg() {
            var t = setTimeout("document.getElementById('myMsg').style.display='none';", 4000);
        }
        timedMsg();
    </script>

    <?php require_once __DIR__ . '/../footer.php';
