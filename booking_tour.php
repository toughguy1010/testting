<link rel="stylesheet" href="css/booking_tour.css">

<?php
ob_start();
session_start();
include('config/constant.php')
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>CSE458_Travel</title>
  </head>
  <body >
    <!--Navbar-->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="Logo">
                </a>

                <form class="d-flex">
                      <?php
                      //echo $_SESSION['user'];
                      if(isset($_SESSION['login'])){
                        echo '<a href="logout.php">
                        <button type="button" class="btn btn-primary me-3 ">Logout</button>
                        </a>';
                      }else{
                        echo '
                        <a href="login.php">
                        <button type="button" class="btn btn-primary me-3 ">Login</button>
                        </a>';
                        echo '
                        <a href="register.php">
                        <button type="button" class="btn btn-primary me-3 ">Register</button>
                        </a>';
                      }
                      ?>
                    
                   
                </form>
               
            </div>
        </nav>
    </section>
    <!--Navbar-->

<!-- Hi???n th??? th??ng tin tour b???ng c??ch l???y t??? b???ng tour trong SQL -->

    <?php
        //Truy v???n b???ng tour (c?? th??? d??ng booking ho???c t??y)
        if(isset($_GET['tour_id']))
            $tour_id = $_GET['tour_id'];
        $sql = "SELECT * FROM tour WHERE tour_id=$tour_id";
        $result = mysqli_query($conn,$sql);
        //check xem b???ng tour c?? ??c k???t n???i hay ko
        if(mysqli_num_rows($result)>0){
           
            //tour ???????c k???t n???i
            while($row = mysqli_fetch_assoc($result)){
                
                
            
                //L???y gi?? tr???
                $tour_id = $row['tour_id'];
                $tour_Name = $row['tour_Name'];
                $img = $row['img'];
                $tour_number = $row['tour_number'];
                $tour_day_start = $row['tour_day_start'];
                $tour_day_end = $row['tour_day_end'];
                $tour_days = $row['tour_days'];
                $tour_location = $row['tour_location'];
                $tour_guild = $row['tour_guild'];
               // $tour_detail=$row['tour_detail'];

    ?>
        

        <div class="container-sm">
            <div class="row align-items-start">
                        <div class="col">
                            <a href="#">
                                <img src="<?php echo $img?> " class="img-fluid  img-cruv"  alt="... "> <!--l???y ???nh t??? csdl-->
                            </a>
                        </div>
                
                        <div class="col-6 cruv">
                            <h2 class="tour_Name">
                                <?php echo $tour_Name?> <!--l???y t??n c???a tour t??? csdl-->
                            </h2>
                                <p><b> S??? l?????ng ng?????i t???i ??a: <?php echo $tour_number ?> ng?????i </b></p><!--l???y s??? l?????ng kh??ch c???a tour t??? csdl-->
                                <p><b> Kh???i h??nh: <?php echo $tour_day_start ?> </b></p>
                                <p><b> K???t th??c: <?php echo $tour_day_end ?> </b></p>
                                <p><b> ?????a ??i???m:  <?php echo $tour_location ?> </b></p>
                                <p><b> H?????ng d???n vi??n: <?php echo $tour_guild ?> </p>

                        
                         </div>
            </div>
        </div>
        <?php
            }
        }
        
        ?>

         
        <!--tien hanh dat tour-->
       
        <div class="container Thongtinkhachhang">
        <section class="container">
        <h1> Th??ng tin kh??ch h??ng </h1>
            <div class="row">
                <div class="col-12" >
                    <form action="detail_booking_tour.php" method = "POST">
                            <div class="mb-3">
                                <label class="form-label">H??? v?? t??n*</label>
                                <input type="text" class="form-control forminputname" name="booking_guest_name" id="booking_guest_name" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control forminputname" name="booking_guest_email" id="booking_guest_email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">S??? ??i???n tho???i*</label>
                            <input type="text" class="form-control forminputname" name="booking_guest_number" id="booking_guest_number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">?????a ch???</label>
                            <input type="text" class="form-control forminputname input-lg" name="booking_guest_address" id="booking_guest_address">
                        </div>
                        <div class="mx-auto" style="width: 200px;">
                            <button type="submit" name="submit" class="btn btn-info btn-lg"> ?????t Tour</button>
                        </div>
                        
                        <input type="hidden" class="form-control" name="tour_id" id="tour_id" value="<?php echo $tour_id?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
        </section>

<?php
include('config/footer.php');
?>