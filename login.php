<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user'])) {
      header( 'Location: index.php') ;
}
?>

<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<head>
<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
<link href="./select/dist/css/bootstrap-select.css" rel="stylesheet">
<link href="./select/dist/css/bootstrap-select.css.map" rel="stylesheet">
<link href="./select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="./anim.css" rel="stylesheet">
<link href="dialog/src/css/bootstrap-dialog.css" rel="stylesheet">

</head>
<body>


<div class="container">

<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 

<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" id="data" enctype="multipart/form-data" method="post" >
			<br />
			<br />
			<br />
			<br />
			<br />
			<h2> Log In </h2>
			<hr class="colorgraph">
    	<div class="form-group">
				<input type="text" name="teamname" id="teamname" class="form-control input-lg" placeholder="Enter Teamname" tabindex="1">
		</div>
		<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Enter Password" tabindex="1">
		</div>
		<div class="row">
				<div class="col-xs-12 col-md-8">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" id="Login" name="Login" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="7">
				</div>
				</div>


        <br >
        <br >
        <br >
        
            <h3> Not Yet Registered ?? <h3>
          <input type="button"  value="Sign Up" class="btn btn-primary btn-block btn-lg" onclick="location.href = 'SignUp.php'" tabindex="1">

		</form>
		</div>
</div>

   </div>

<div class="modal"><!-- Place at bottom of page --></div>
    <script src="./dist/js/jquery.js"></script>

    <script src="./dist/js/bootstrap.min.js"></script>
    <script src="./select/js/bootstrap-select.js"></script>    
    <script src="./dist/js/bootstrapfilestyle.js"></script>
    <script src="dialog/src/js/bootstrap-dialog.js"></script>
    <script src="js/login.js"></script>
    
</body>
</html>

