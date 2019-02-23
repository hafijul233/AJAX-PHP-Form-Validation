<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>PHP - AJAX Form Validation</title>
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
    <center><h1>PHP - AJAX Form Validation</h1></center>
    <div class="wrapper">
      <form action="validator.php" class="form-signin" method="post">       
        <h2 class="form-signin-heading">Please login</h2>
        <input type="email" class="form-control" id="email" name="email_address" placeholder="Email Address" autofocus="" />
        <span class="error-username error">Username Empty</span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />  
        <span class="error-password error">Password Empty</span>
        <label class="checkbox">
          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
      </form>
    </div>
    <script src="assets/jquery/jquery.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('form').submit(function(e){
                e.preventDefault();
                var data = $('form').serialize();
                console.log(data);
                $.ajax({
                    type:'POST', url:'validator.php', data:data, dataType:'json',
                    success: function(d){
                        console.log(d.errors);
                        alert(d.msg);
                    }
                })
            })
        });
    </script>
  </body>
</html>
