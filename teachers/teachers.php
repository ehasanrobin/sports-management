<?php

include("../tsession.php");
?>

<?php 
 
 $sql1 = "SELECT * FROM events";
 $result1 = $conn->query($sql1);
 
$sql = "SELECT * FROM teachers";

$result = $conn->query($sql);

if (isset($_POST['etype'])) {

  
  
    $sport = $_POST['type'];
    $sql = "SELECT * FROM teachers WHERE status = '$sport'";

$result = $conn->query($sql);

}
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
    <section class="dashboard">
        <div class="container-fluid">
            <div class="row">
                <?php include("./sidebar.php");?>
                <div class="col-10 bg-light">
                    <div class="bg-white m-3 p-3  rounded">
                        <h2>Teachers dashboard</h2>

                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                            <select class="form-select" name="type" required aria-label="Default select example">
                                <option disabled selected value="">Open this select menu</option>
                                <option value="varified">verified</option>
                                <option value="unverified ">unverified</option>



                            </select>
                            <input type="submit" name="etype" class="btn form-control btn-primary mt-3" value="search">
                        </form>
                    </div>
                    <div class="dashboard-content m-3 p-3  rounded">
                        <div class="row">
                            <h3>All Teachers</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Sports Event</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($result->num_rows > 0){
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row["id"];?></th>
                                        <td><?php echo $row["name"];?></td>
                                        <td>
                                            <?php echo $row["email"];?>
                                        </td>
                                        <td><?php echo $row["status"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
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