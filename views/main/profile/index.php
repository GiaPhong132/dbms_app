<?php require_once __DIR__ . '/../navbar.php';
?>

<div class="app" style="background-color: #f5f5f5;">
    <!-- header -->

    <!-- Container -->
    <div class="container">
        <div class="grid wide">
            <div class="row sm-gutter">
                <div class="col l-2">
                    <div class="container-profile-list">
                        <div class="container-profile-list-header"></div>
                        <div class="container-profile-list-body">
                            <div class="container-profile-list-name">
                                <div class="container-profile-list-name-1">
                                    <i class="fa-solid fa-user container-profile-list-name-icon"></i>
                                </div>
                                <div class="container-profile-list-name-2">Tài khoản của tôi</div>
                            </div>
                            <div class="container-profile-list-name">
                                <div class="container-profile-list-name-3">
                                    <a href="profile.html" class="container-profile-list-name-5">
                                        <div class="container-profile-list-name-4 container-profile-list-name-active">Hồ sơ</div>
                                    </a>
                                </div>
                            </div>
                            <div class="container-profile-list-name">
                                <div class="container-profile-list-name-3">
                                    <a href="index.php?page=main&controller=profile&action=getAddress" class="container-profile-list-name-5">
                                        <div class="container-profile-list-name-4">Địa chỉ</div>
                                    </a>
                                </div>
                            </div>
                            <div class="container-profile-list-name">
                                <div class="container-profile-list-name-3">
                                    <a href="#" class="container-profile-list-name-5">
                                        <div class="container-profile-list-name-4">Đổi mật khẩu</div>
                                    </a>
                                </div>
                            </div>
                            <div class="container-profile-list-name">
                                <div class="container-profile-list-name-1">
                                    <i class="fa-regular fa-clipboard container-profile-list-name-icon"></i>
                                </div>
                                <div class="container-profile-list-name-2">Đơn mua</div>
                            </div>
                            <div class="container-profile-list-name">
                                <div class="container-profile-list-name-1">
                                    <i class="fa-solid fa-bell container-profile-list-name-icon"></i>
                                </div>
                                <div class="container-profile-list-name-2">Thông báo</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-10">
                    <div class="container-profile">
                        <div class="container-profile-header container-profile-header--separate">
                            <div class="container-profile-header-1">Hồ sơ của tôi</div>
                            <div class="container-profile-header-2">Quản lí thông tin hồ sơ để bảo mật tài khoản</div>
                        </div>
                        <div class="container-profile-body">
                            <div class="col l-8">
                                <?php
                                if (isset($message)) {

                                    echo '
                        <div class="alert alert-success" id="myMessage">
                        <strong>' . $message . '</strong>
                    </div>
                        ';
                                }
                                ?>
                                <div class="container-profile-body-content container-profile-body-content--separate">
                                    <div class="container-profile-body-content-name">
                                        <div class="container-profile-body-content-name-label">Tên đăng nhập</div>
                                        <div class="container-profile-body-content-name-label">First Name</div>
                                        <div class="container-profile-body-content-name-label">Last Name</div>
                                        <div class="container-profile-body-content-name-label">Số điện thoại</div>
                                        <div class="container-profile-body-content-name-label">Giới tính</div>
                                        <div class="container-profile-body-content-name-label">Ngày sinh</div>
                                    </div>

                                    <form action="index.php?page=main&controller=profile&action=editInfo" enctype="multipart/form-data" method="POST">
                                        <div class="container-profile-body-content-detail">
                                            <div class="container-profile-body-content-name-infor">
                                                <input type="hidden" name="email" value="<?php echo $data->email ?>">

                                                <?php echo $data->email ?>

                                            </div>
                                            <div class="container-profile-body-content-name-infor">
                                                <input type="text" name="fname" value="<?php echo $data->fname ?>">
                                            </div>

                                            <div class="container-profile-body-content-name-infor">
                                                <input type="text" name="lname" value="<?php echo $data->lname ?>">
                                            </div>


                                            <div class="container-profile-body-content-name-infor">
                                                <input type="text" name="phone" value="<?php echo $data->phone ?>">
                                            </div>
                                            <div class="container-profile-body-content-name-infor-sex">
                                                <div class="container-profile-body-content-name-infor-sex-val">
                                                    <?php
                                                    $gender = $data->gender;
                                                    if ($gender == 1) {
                                                        echo '
                                                        <input type="radio" name="gender" value="1"  checked>
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nam</div>
                                                        <input type="radio" name="gender"  value="0" >
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nữ</div>
                                                        <input type="radio" name="gender"  value="-1" >
                                                        <div class="container-profile-body-content-name-infor-sex-name">Khác</div>
                                                        ';
                                                    } elseif ($gender == 0) {
                                                        echo '
                                                        <input type="radio" name="gender" value="1">
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nam</div>
                                                        <input type="radio" name="gender" value="0" checked>
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nữ</div>
                                                        <input type="radio" name="gender" value="-1" >
                                                        <div class="container-profile-body-content-name-infor-sex-name">Khác</div>
                                                        ';
                                                    } else {
                                                        echo '
                                                        <input type="radio" name="gender" value="1" >
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nam</div>
                                                        <input type="radio" name="gender" value="0" >
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nữ</div>
                                                        <input type="radio" name="gender" value="-1"  checked>
                                                        <div class="container-profile-body-content-name-infor-sex-name" checked>Khác</div>
                                                        ';
                                                    }
                                                    ?>





                                                </div>
                                                <!-- <div class="container-profile-body-content-name-infor-sex-val">
                                                        <input type="radio" class="container-profile-body-content-name-infor-val" value="Nam">
                                                        <div class="container-profile-body-content-name-infor-sex-name">Nữ</div>
                                                    </div>
                                                    <div class="container-profile-body-content-name-infor-sex-val">
                                                        <input type="radio" class="container-profile-body-content-name-infor-val" value="Nam">
                                                        <div class="container-profile-body-content-name-infor-sex-name">Khác</div>
                                                    </div> -->
                                            </div>
                                            <div class="container-profile-body-content-name-infor-birthday">
                                                <?php

                                                $date = date_create($data->birthday);
                                                // echo var_dump($date);
                                                $dateUI = date_format($date, 'Y') . '-' . date_format($date, 'm') . '-' . date_format($date, 'd');
                                                ?>
                                                <input type="date" name="birthday" value="<?php echo $dateUI ?>" class="container-profile-body-content-name-infor-birthday-val">
                                            </div>
                                        </div>
                                </div>
                                <input type="submit" class="container-profile-button" value="Lưu">
                            </div>
                            <div class="col l-2">
                                <div class="container-profile-body-avt">
                                    <div class="container-profile-body-avt-in">
                                        <img src=" <?php echo $data->profile_photo ?>" alt="" class="container-profile-body-avt-img">
                                        <!-- <input type="button" class="container-profile-body-avt-choose-img-btn" value="Chọn ảnh"> -->
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <input type="file" name="fileToUpload" id="fileToUpload" value="<?php $data->profile_photo; ?>">
                                        <div class="container-profile-body-avt-name-reg">
                                            <!-- <div class="container-profile-body-avt-name">Dung lượng file tối đa 1 MB</div>
                                            <div class="container-profile-body-avt-name">Định dạng: .JPEG, >PNG</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- footer -->

</div>
<script>
    setTimeout(function() {
        document.getElementById('myMessage').style.display = 'none';
    }, 4000);
</script>

<?php require_once __DIR__ . '/../footer.php';
