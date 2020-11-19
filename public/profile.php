<?php
 require('config/config.php');
 require('config/db.php');

 session_name('user');
 session_start();
 $email = $_SESSION['email'];

    //create query
    // $query = "SELECT * FROM comments";
    // $sql = "SELECT
    //             *
    //         FROM
    //             users AS a
    //             INNER JOIN comments AS b ON(a.userid = b.userid)
    //         WHERE a.email='$email'";
    $sql = "SELECT * FROM comments WHERE email='$email'";
    
    //Get result
    $result = mysqli_query($conn, $sql);

    //fetch data
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result);

?>
<?php
    $query = "SELECT * FROM users WHERE email='$email'";

    //Get result
    $result1 = mysqli_query($conn, $query);

    //fetch data
    $profiles = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result1);

?>
<?php
    $pwdSuceess = $pwd = $pwdErr = "";

    if(isset($_POST['submit'])) {
        $firstname = test_input($_POST['firstname']);
        $lastname = test_input($_POST['lastname']);
        $phonenumber = test_input($_POST['phonenumber']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        foreach ($profiles as $profile) {
            if(password_verify($password, $profile['password'])){
                $pwd = true;
            }
        }

        if($pwd === true) {
            $query1 = "UPDATE users SET firstname='$firstname', lastname='$lastname', phonenumber='$phonenumber', email='$email' WHERE users.email='$email'";
            //$pwdSuceess= "Update complete";

            if(mysqli_query($conn, $query1)) {
                $pwdSuceess= "Update complete";
            } else {
                echo 'ERROR: '.mysqli_error($conn);
            }
        } else {
            $pwdErr = "Password incorrect";
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
    }
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Syke World</title>

        <!-- cdn importation -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/12c18de3e7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/">

        <!-- materialise cdn -->
        <link rel="stylesheet" href="plugins/materialise/css/materialize.css">
        <link rel="stylesheet" href="plugins/materialise/css/materialize.min.css">

        <!-- css links -->
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
<?php include('inc/nav2.php');?>

<!-- content -->
<div class="content container">
        <p class="green-text"><?php echo $pwdSuceess; ?></p>
    <h2>User Profile</h2>
    <?php foreach($profiles as $profile): ?>
        <div id="profile">
            <div class="img center-align">
                <?php if($profile['photo']) {
                    echo '<img style="border-radius: 100%; padding: 0 !important;" class="responsive-img" height="200px" width="200px" src="image/'.$profile['photo'].'">';
                } else {
                    echo '<img style="padding: 0 !important;" class="responsive-img" height="150px" width="150px" src="image/default.svg"';
                }
                ?>
                <h3><?php echo strtoupper($profile['firstname'])." ".strtoupper($profile['lastname']);?></h3>
            </div>
            <div class="body row">
                <div class="col s12 l6 m12">
                    <span>
                        <h5 class="orange-text text-darken-4">Firstname</h5>
                        <p class="grey-text text-darken-3"><?php echo $profile['firstname']?></p>
                    </span>
                    <span>
                        <h5 class="orange-text text-darken-4">Lastname</h5>
                        <p class="grey-text text-darken-3"><?php echo $profile['lastname']?></p>
                    </span>
                    <span>
                        <h5 class="orange-text text-darken-4">Email</h5>
                        <p class="grey-text text-darken-3"><?php echo $profile['email']?></p>
                    </span>
                </div>
                <div class="col s12 l6 m12">
                    <span>
                        <h5 class="orange-text text-darken-4">Phonenumber</h5>
                        <p class="grey-text text-darken-3"><?php echo $profile['phonenumber']?></p>
                    </span>
                </div>
            </div>

            <?php if(count($users) > 0): ?>
                <?php foreach($users as $user): ?>
                    <div class="comments">
                        <h4>Your comments</h4>
                        <span>
                            <h5 class="orange-text text-darken-4">Comment</h5>
                            <p>"<?php echo $user['comment']?>"</p>
                        </span>
                        <span>
                            <h5 class="orange-text text-darken-4">Created On</h5>
                            <p><?php echo $user['createdAt']?></p>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- edit profile form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h4>Edit Profile</h4>
                <div class="row">
                    <div class="col input-field s12 l12 m12">
                        <label for="firstname">First name</label>
                        <input type="text" name="firstname" value="<?php echo $profile['firstname']?>">
                    </div>
                    <div class="col input-field s12 l12 m12">
                        <label for="lastname">Last name</label>
                        <input type="text" name="lastname" value="<?php echo $profile['lastname']?>">
                    </div>
                    <div class="col input-field s12 l12 m12">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $profile['email']?>">
                    </div>
                    <div class="col input-field s12 l12 m12">
                        <label for="phonenumber">Phone number</label>
                        <input type="number" name="phonenumber" value="<?php echo $profile['phonenumber']?>">
                    </div>
                </div>
                <div class="row">
                    <h5>Enter Password to confirm changes</h5>
                    <div class="col input-field s12 l12 m12">
                        <label for="password">Password</label>
                        <input type="text" name="password">
                        <p class="red-text"><?php echo $pwdErr; ?></p>
                    </div>
                    <input type="submit" value="Submit" name="submit" class="btn orange darken-4">
                </div>
            </form>
        <!-- end of edit profile form -->
    <?php endforeach; ?>
</div>
<!-- end of content -->

<?php include('inc/footer1.php');?>
 <!-- jquery importation -->
 <script src="plugins/jquery-3.4.1/dist/jquery.min.js"></script>

<!-- materialise importation -->
<script src="plugins/materialise/js/materialize.js"></script>
<script src="plugins/materialise/js/materialize.min.js"></script>

<script>
    $(document).ready(function() {
        // initializing sidenav
        $('.sidenav').sidenav();

    });

</script>

</body>

</html>