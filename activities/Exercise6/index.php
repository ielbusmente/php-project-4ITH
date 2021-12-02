<?php
function dbconnect($action, $input)
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'sleepyDB';

    $conn = mysqli_connect($dbhost, $dbuser,  $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    if ($action === 'insert') {
        $conn->query("INSERT INTO `adminUser` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES ('" . $input[0] . "', '" . $input[1] . "', '" . $input[2] . "', '" . $input[3] . "', '" . $input[4] . "')");
    } else {
        if ($action === 'view_one') {
            $sql = "SELECT id, firstName, lastName, email FROM adminUser WHERE id = " . $input;
        }
        if ($action === 'view_all') {
            $sql = "SELECT id, firstName, lastName, email FROM adminUser";
        }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<br/>User ID: " . $row['id'] . "<br/>First Name: " . $row['firstName'] . "<br/>Last Name: " . $row['lastName'] . "<br/>Email: " . $row['email'] . "<br/><br/>";
            }
        } else {
            echo '0 results';
        }
    }
    $conn->close();
    // $dbhost = 'localhost';
    // $dbuser = 'root';
    // $dbpass = '';
    // $dbname = 'sleepyDB';

    // $conn = mysqli_connect($dbhost, $dbuser,  $dbpass, $dbname);
    // if ($conn->connect_error) {
    //     die("Connection Failed: " . $conn->connect_error);
    // }

    // $conn->query("INSERT INTO `adminuser` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES ('1', 'Jose', 'Rizal', 'jrizal@gmail.com', '123123aA'), ('2', 'Andres', 'Bonifacio', 'abonifacio@gmail.com', '123123aA')");
    // $sql = "SELECT id, firstName, lastName, email FROM adminUser";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo "User ID: " . $row['id'] . "First Name: " . $row['firstName'] . "Last Name: " . $row['lastName'] . "Email: " . $row['email'] . "<br/>";
    //     }
    // } else {
    //     echo '0 results';
    // }

    // $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="Styles/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="Styles/bootstrap-4.1.0.min.js" type="text/javascript"></script>
    <link href="Styles/bootstrap-4.1.0.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="index.css" rel="stylesheet" type="text/css"> -->
    <?php include "index-css.php" ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="true">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="insert-tab" data-toggle="tab" href="#insert" role="tab" aria-controls="insert" aria-selected="true">Insert</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show text-align m-4 form-new active" id="view" role="tabpanel" aria-labelledby="view-tab">
                        <h3 class="register-heading text-center"> View Form </h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="id" class="form-control" placeholder="Input ID" value="" required />
                                    </div>
                                    <div class="form-group text-center ">
                                        <input type="submit" name="view_one" class="btnContactSubmit" value="Search using ID" />

                                        <div style="color:#fff;">
                                            <?php
                                            if (isset($_POST['view_one'])) {
                                                if (!empty($_POST['id'])) {
                                                    dbconnect('view_one',  $_POST['id']);
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </form>
                                <form method='post'>
                                    <div class="form-group text-center  ">
                                        <input type="submit" name="view_all" class="btnContactSubmit" value="View All" />

                                        <div style="color:#fff;">
                                            <?php
                                            if (isset($_POST['view_all'])) {
                                                dbconnect('view_all',  '');
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show  text-align form-new" id="insert" role="tabpanel" aria-labelledby="insert-tab">
                        <h3 class="register-heading text-center m-4">Insert Form</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="id" class="form-control" placeholder="ID" value="" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="firstName" class="form-control" placeholder="First Name" value="" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="" required="" />
                                    </div>

                                    <div class="form-group text-center">
                                        <input type="submit" name="insert" class="btnContactSubmit" value="Insert" />
                                    </div>
                                    <?php
                                    if (isset($_POST['insert'])) {
                                        if (!empty($_POST['id']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                            dbconnect('insert', [$_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']]);
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>