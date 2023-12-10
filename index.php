<?php
    session_start();

    // Check if the session variable 'username' exists and has the value 'admin'
    if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
        header('Location: admin.php');
        exit();
    } elseif (isset($_SESSION['username'])) {
        header('Location: dashboard.php');
    }
?>

<html>
<head>
    <title>PHP Login System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div id="frm">
        <h1>Login</h1>
        <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
            <p>
                <label> UserName: </label>
                <input type="text" id="user" name="user" />
            </p>
            <p>
                <label> Password: </label>
                <input type="password" id="pass" name="pass" />
            </p>
            <p>
                <input type="submit" id="btn" value="Login" />
            </p>
            <p class="create-account-link">
                <a href="registration.html">Create an Account</a>
            </p>
        </form>
    </div>
    <script>  
      function validation()  
      {  
          var id=document.f1.user.value;  
          var ps=document.f1.pass.value;  
          if(id.length=="" && ps.length=="") {  
              alert("User Name and Password fields are empty");  
              return false;  
          }  
          else  
          {  
              if(id.length=="") {  
                  alert("User Name is empty");  
                  return false;  
              }   
              if (ps.length=="") {  
              alert("Password field is empty");  
              return false;  
              }  
          }                             
      }  
  </script>  
</body>
</html>