<?php
require_once __DIR__ . '/../navbar.php';
?>

<div class="app" style="background-color: #f5f5f5;">
    <!-- header -->

    <!-- Container -->
    <div class="container">
        <div class="grid wide">
            <div class="row sm-gutter">

                <?php require_once __DIR__ . '/sidebar.php'; ?>

                <div class="col l-10">

                    <div class="container-profile">
                        <div class="container-address-header container-profile-header--separate">
                            <div class="container-address-header-1">Địa chỉ của tôi</div>
                            <!-- <input type="button" class="container-address-header-btn" value="Thêm địa chỉ mới"> -->
                        </div>
                        <div class="container-address-body">
                            <!-- <div class="container-address-body-header">Địa chỉ</div> -->
                        </div>
                        <div class="container-address-group">
                            <div class="container-address-group-header"></div>

                            <div class="container-address-group-body">
                                <div class="container-address-group-body-container">
                                    <div class="container-address-group-body-top">

                                        <form action="index.php?page=main&controller=profile&action=updateAddress" method="post" id="addressForm">
                                            <div class="container-address-group-body-left">
                                                <div class="container-address-group-body-name container-address-group-body-name--separate"><?php echo $data->fname . ' ' . $data->lname ?></div>
                                                <br>
                                                <div class="container-address-group-body-phone">
                                                    <input type="text" name="phone" value="<?php echo $data->phone ?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="container-address-group-body-infor">
                                        <div class="container-address-group-body-infor-address">
                                            <textarea name="address" id="addressForm" cols="50" rows="10"><?php echo $data->address ?></textarea>
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary" style="background-color:cadetblue">Cập Nhật</button>

                                        </form>

                                    </div>
                                    <?php
                                    if (isset($message)) {

                                        echo '
                        <div class="alert alert-success">
                        <strong>' . $message . '</strong>
                    </div>
                        ';
                                    }
                                    ?>
                                </div>

                            </div>

                            <div class="container-address-group-footer--separate-extra"></div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
        <!-- footer -->
    </div>







    <?php require_once __DIR__ . '/../footer.php';
