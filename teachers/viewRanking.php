<?php

include("../tsession.php");
?>

<?php 
 include("../config.php");

 $count = 0;
 $success= "";
$sql1 = "SELECT * FROM events";
$result1 = $conn->query($sql1);


if (isset($_POST['ranking'])) {

    $sport = $_POST['sport'];
    $sql = "SELECT * FROM students INNER JOIN events ON students.sportsClass = events.e_id WHERE sportsClass = $sport ORDER BY ranking " ;

    $result = $conn->query($sql);
    $count .= $result->num_rows;
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
                    </div>
                    <div class="dashboard-content m-3 p-3  rounded">
                        <div class="row">
                            <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                                <select class="form-select" required name="sport" aria-label="Default select example">
                                    <option disabled selected value="">Open this select menu</option>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                        while ($row = $result1->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row["e_id"]; ?>"><?php echo $row["eventName"]; ?>
                                    </option>

                                    <?php }} ?>
                                </select>
                                <input type="submit" name="ranking" class="btn form-control btn-primary mt-3"
                                    value="search">
                            </form>

                        </div>
                        <div class="row">
                            <h3>Rankings</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Sports Event</th>
                                        <th scope="col">Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if ($count > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                
                                ?>
                                    <tr>
                                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                                            <th scope="row">
                                                <input type="text" name="sid" class="form-control-plaintext"
                                                    value="<?php echo $row["id"]?>" readonly>
                                            </th>

                                            <td> <input type="text" class="form-control-plaintext"
                                                    value="<?php echo $row["name"]?>" readonly></td>
                                            <td><input type="text" class="form-control-plaintext"
                                                    value="<?php echo $row["email"]?>" readonly>

                                            </td>
                                            <td><input type="text" class="form-control-plaintext"
                                                    value="<?php echo $row["eventName"]?>" readonly>

                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext"
                                                    value="<?php echo $row["ranking"];?>" readonly>
                                            </td>

                                        </form>



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