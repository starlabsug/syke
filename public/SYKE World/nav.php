<head>
    <meta charset="utf-8">
    <title>SYKE World Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<div class="row white-text grey darken-4 ">
    <div class="col l4 s12 black numbers center">
        <h4 class="orange-text text-lighten-1"><i class="small material-icons left blue-text">folder_shared</i> Admin Profile</h4>
        <p class="grey-text">You are signed in as an Administrator of SYKE World Hotel to the HomePage!</p>
        <p class="hide-on-large-only center">Profile</p>
    </div>
    <div class="col l5 s12 white-text orange profile numbers">
        
        <div class="col l6 s12 black white-text numbers center">
                <?php echo '<img style="border-radius: 100%;" height="80px" width="80px" src="image/'.$photo.'">'; ?>
            
                <div><?php echo $firstname." "; ?>
           
            <?php echo $lastname; ?></div>
            
            <div><?php echo $email; ?></div>  
            
        </div>
        <div class="col l6 s12">
            <p><i class="material-icons black-text">info</i> This is your Admin profile! As an administrator you can add a new administrator or employee</p>
            <p class="right-align black-text">Add a new user here!</p>
            <a href="signup.php">
            <button type="button" name="button" class="btn right black darken-3" title="Adds a new user">Add user</button></a>
        </div>
    </div>
    <div class="col l3 s12">
        <p>As an administrator, always remember to <span style="color:red">Logout</span> for <span style="color:aqua">security</span> purposes and donot share your credentials</p>
        <i class="pulse medium material-icons red-text">lock</i><a href="logout.php"><button type="button" name="button" class="btn right orange darken-3" title="Click to LogOut">LogOut</button></a>
    </div>
</div>