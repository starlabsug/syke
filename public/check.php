<?php
      require('config/config.php');
      require('config/db.php');

        $roomType = "";
        $roomTypeErr = "";
        // $checkInErr = $checkOutErr = $roomErr = $guestErr = "";
        
       if(isset($_POST['check'])) {
            if(empty($_POST['room'])) {
                $roomTypeErr = 'Field is required';  
            } else {
                $roomType = test_input($_POST['room']);
            }

            //create query
            $query = "SELECT * FROM rooms WHERE type='$roomType' and available=1";

            //Get result
            $result = mysqli_query($conn, $query);

            //fetch data
            $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

            //free result
            mysqli_free_result($result);

            if(count($rooms) > 0) {

                session_name('check');
                session_start();
                $_SESSION['checkIn'] = test_input($_POST['checkIn']);
                $_SESSION['checkOut'] = test_input($_POST['checkOut']);
                $_SESSION['room'] = test_input($_POST['room']);
                $_SESSION['guest'] = test_input($_POST['guest']);

                header('Location: '.ROOT_URL.'/booking.php');
            } else {
                //create query
                $query1 = "SELECT checkout FROM booking WHERE date(checkout) = (select min(date(checkout)) FROM booking WHERE date(checkout) > date(now()))";

                //Get result
                $result1 = mysqli_query($conn, $query1);

                //fetch data
                $dates = mysqli_fetch_all($result1, MYSQLI_ASSOC);

                //free result
                mysqli_free_result($result1);

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

    </head>

    <body class="grey lighten-3">
        <main id="checkAvailability">
            <div class="container" style="padding: 10% 10%;">
                <div class="black-text z-depth-1 white" style="padding: 15% 5%; border-radius: 2px;">
                    <h5><i class="material-icons medium green-text">info_outline</i> <span class="orange-text text-darken-4">OOPS.</span> There are no <?php echo $roomType; ?> rooms currently available
                    </h5>
                    <?php foreach ($dates as $date): ?>
                    <h5>Check in on <?php echo $date['checkout'];?>
                    </h5>
                    <?php endforeach; ?>
                    <h5>Back to <a href="<?php echo htmlspecialchars(ROOT_URL); ?>" class="orange-text text-darken-4">homepage</a></h5>
                </div>
            </div>
        </main>
        

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