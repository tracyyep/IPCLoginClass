<?php include_once("libs/login_users.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> IPC Login </title>
<link rel="stylesheet"  href="bootstrap/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='//fonts.googleapis.com/css?family=Aclonica' rel='stylesheet' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" >
  $(function() {
    $('#show_register').click(function(){
       $('.login_form').hide();
       $('.register_form').show();
       return false;
    });
    
     $('#show_login').click(function(){
       $('.login_form').show();
       $('.register_form').hide();
       return false;
    });
  });
</script>

</head>
<body>
<body>
<div id="mainWrapper">

    <div class="navbar">
    <div class="navbar-inner">
  
    <div id="header-div"><h2> IPC LOGIN </h2>  </div> 
    
	  <form class="navbar-search pull-right">
	    <input type="text" class="search-query" placeholder="Search">
	  </form>
      
    </div>  <!-- end navbar-inner -->
    </div>  <!-- end navbar -->

     
    <div id="content">
      
    
      <?php if (isset($error)) { echo '<p class="bg-danger">'.$error.'</p>'; } ?>
      <?php if (isset($success)) { echo '<p class="bg-success">'.$success.'</p>'; } ?>

     <div class="login_form"> 
     <h2> Login Here </h2>
     <div id="form">
        <form method="post" action="login.php">
          
         <div class="form_elements" >
           <label for ="Username"> Username </label> </br>
           <input type="text" name="login_username" id="username" />
         </div> <!-- end form_elements-->

         <div class="form_elements" >
           <label for ="password"> Password </label></br>
           <input type="password" name="login_password" id="password" />
         </div> <!-- end form_elements-->
             
         </br>
         <div class="form_elements" >
           <input type="submit" name="login" id="login" class="btn btn-success" value="Login"/>
         </div> <!-- end form_elements-->
         
         </br>
         <a href="#" id="show_register"> Don''t have an account? </a>

       </form>

     </div> <!-- end of login_form -->
     </div> <!-- end of form -->    

     <div class="register_form"> 
     <h2> Register Here </h2>
     <div id="form">
        <form method="post" action="login.php">
          
         <div class="form_elements" >
           <label for ="Username"> Username </label> </br>
           <input type="text" name="username" id="username" />
         </div> <!-- end form_elements-->

         <div class="form_elements" >
           <label for ="Email"> Email </label> </br>
           <input type="text" name="email" id="email" />
         </div> <!-- end form_elements-->

         <div class="form_elements" >
           <label for ="password"> Password </label></br>
           <input type="password" name="password" id="password" />
         </div> <!-- end form_elements-->

         <div class="form_elements" >
           <label for ="Re-password"> Re-password </label><br>
           <input type="password" name="repassword" id="repassword" />
         </div> <!-- end form_elements-->

         </br>
         <div class="form_elements" >
           <input type="submit" name="register" id="register" class="btn btn-success" />
         </div> <!-- end form_elements-->
        
         </br>
         <a href="#" id="show_login"> Already have an account? </a>

      </form>

      </div> <!-- end of register_form -->
      </div> <!-- end of form -->
    </div> <!-- end of content -->

</div> <!-- end mainWrapper -->


</body>

</html>
