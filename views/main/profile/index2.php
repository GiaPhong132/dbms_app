<?php
// if (!isset($_SESSION['guest']))
//     header('Location: index.php?page=main&controller=login&action=index');
require_once("/xampp/htdocs/dbms_app/views/main/navbar.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/png" href="/dbms_app/public/images/icons/favicon_profile.png" /> -->
    <title>Document</title>


    <style>
        img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>

</body>

</html>


<div class="container rounded bg-white mt-5 mb-5">
    <form action="index.php?page=main&controller=profile&action=editInfo" enctype="multipart/form-data" method="POST">

        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">


                    <?php
                    echo "<img src='$data->profile_photo' >";
                    ?>
                    <!-- <img class="rounded-circle mt-5" width="150px" src="$data->profile_photo" alt="avatar"> -->

                    <br>
                    <span class="font-weight-bold"><?php echo  $data->lname; ?></span>
                    <!-- <span class="text-black-50"><?php echo $data->email ?></span> -->
                </div>

            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">First Name</label>
                            <input type="text" class="form-control" name='fname' value="<?php echo $data->fname; ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $data->lname; ?>" name='lname'>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Phone Number</label>
                            <input type="number" class="form-control" name='phone' value="<?php echo $data->phone; ?>">
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Age</label>
                            <input type="number" class="form-control" name='age' value="<?php echo $data->age; ?>">
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" name='email' readonly value="<?php echo $data->email; ?>">
                        </div>
                    </div>

                    <div class="form-check" style="padding-left: 0;">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Gender:</label>
                        </div>
                    </div>

                    <?php
                    if ($data->gender == 1) {
                        echo '
                        <div class="form-check form-check-inline" style="padding-left: 1cm;">
                        <input class="form-check-input" type="radio" name="gender" value="1" checked>
                        <label class="form-check-label">Male</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="0">
                        <label class="form-check-label">Female</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="-1">
                        <label class="form-check-label">Other</label>
                    </div>
                        ';
                    } else if ($data->gender == 0) {
                        echo '
                        <div class="form-check form-check-inline" style="padding-left: 1cm;">
                        <input class="form-check-input" type="radio" name="gender" value="1" >
                        <label class="form-check-label">Male</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="0" checked>
                        <label class="form-check-label">Female</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="-1">
                        <label class="form-check-label">Other</label>
                    </div>
                        ';
                    } else {
                        echo '
                        <div class="form-check form-check-inline" style="padding-left: 1cm;">
                        <input class="form-check-input" type="radio" name="gender" value="1" >
                        <label class="form-check-label">Male</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="0" >
                        <label class="form-check-label">Female</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" checked value="-1">
                        <label class="form-check-label">Other</label>
                    </div>
                        ';
                    }

                    ?>
                    <div><span>Choose file to upload</span></div>
                    <div class="row mt-4">
                        <input type="file" name="" id="fileToUpload" value="<?php $data->profile_photo; ?>">
                    </div>
                    <div class="row mt-3">
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>

                    </div>

                </div>

            </div>


        </div>

    </form>

</div>

</div>



<?php include_once("/xampp/htdocs/dbms_app/views/main/footer.php"); ?>