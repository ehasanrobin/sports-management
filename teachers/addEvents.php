<?php

include("../tsession.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootsrap cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.rtl.min.css"
        integrity="sha512-1AUA4XywXUvp1pikc0kOnWxNn8Bm1/svdKiCpQm7i//Ao5Dor/sWF1h1A15fj0Vi69DwrlIpL2rfPYX1YNc+5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
    <?php 
 include("../config.php");
$sql = "SELECT * FROM teachers";

$result = $conn->query($sql);

$msg = "";
if (isset($_POST['submit'])) {

    
    
    $eName = $_POST['ename'];
    $type = $_POST['eventType'];
    
   
   
   $sql = "INSERT INTO `events`(`name`, `type`) VALUES ('$eName','$type')";
   $result = $conn->query($sql);
   
   if ($result == TRUE) {

    $msg .=  "New record created successfully.";

  }else{

    echo "Error:". $sql . "<br>". $conn->error;

  }
}

?>
    <section class="dashboard">
        <div class="container-fluid">
            <div class="row">
                <?php include("./sidebar.php");?>
                <div class="col-10 bg-light">
                    <div class="bg-white m-3 p-3  rounded">
                        <h2>Teachers dashboard</h2>
                    </div>
                    <div class="dashboard-content m-3 p-3  rounded">
                        <div class="row">
                            <h3>Add Events</h3>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Event Name</label>
                                    <input type="name" name="ename" required class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Event Type</label>
                                    <select class="form-select" name="eventType" required
                                        aria-label="Default select example">
                                        <option disabled selected>Open this select menu </option>
                                        <option value="indoor">Indoor</option>
                                        <option value="outdoor">Outdoor</option>

                                    </select>

                                    <div>
                                        <?php 
                                         if($msg !== "") {
                                        ?>
                                        <p class="p-3 text-white bg-primary my-3 rounded"><?php echo $msg ;?></p>
                                        <?php };?>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"
        integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>