<!DOCTYPE html>
<?php
    session_start();
?>

<?php include('redirect.php');?>
<html>
<head>
	<title>OTH 2k15</title>
	 <link href="common/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="common/css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css" media="screen">
        
        #main {
            margin-top: 80px;
        }

        #main > img {
            vertical-align: middle;
            width: 600px;
            height: 500px;
            margin-top: -30px;
            margin-left: auto;
            margin-right: auto;
        }

        #main #field1 {
           
            //margin: 8px;
            //margin-left: 120px;
            
        }

        #main #field2 {
           
            //margin: 8px;
            margin-left: 10px;
           
        }

        #main #submit {
            //margin: 8px;
            margin-left: 10px;
        }

        #main #skiper {
            //margin: 8px;
            margin-left: 10px;
       }

       #main #changer {
            //margin: 8px;
            margin-left: 3px;    
       }

       #main .field {
        position: fixed;
        bottom: 20px;
        //right: 60px;
         margin-left: auto;
            margin-right: auto;
       }


    </style>
</head>
<body>

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">OTH</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="#" id="h">HOME <span class="sr-only">(current)</span></a></li>
       <?php
if(isset($_SESSION['user'])) {
        echo "<li><a href=\"#\" id=\"c\">Contest</a></li>";
}
?>
        <li><a href="#" id="lb">Leader Baord</a></li>
        <li><a href="http://vce-csfest.in/acumen/" id="ac" target="_blank">AcumenCS2k15</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <?php
if(isset($_SESSION['user'])) {
	echo "<li><a href=\"logout.php\" id=\"l\">Logout</a></li>";
}
?>
<?php
if(!isset($_SESSION['user'])) {
	echo "<li><a href=\"signup.php\" id=\"l\">Signup</a></li>";
}
?>
<?php
if(!isset($_SESSION['user'])) {
	echo "<li><a href=\"login.php\" id=\"l\">Login</a></li>";
}
?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div id="main" align="center">

		
</div>


<script src="common/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="common/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    
    $("document").ready(function(){
        $("#h").on("click",function(e) {
            $.ajax({
                url:'home.php',
                type:'POST',
                success: function(data) {
                    $("#main").html(data);
                },
                error: function() {
                    alert("something went weong");
                }

            });
        });

        $("#c").on("click",function(e) {
            $.ajax({
                url:'contest.php',
                type:'POST',
                success: function(data) {
                    $("#main").html(data);
                },
                error: function() {
                    alert("something went weong");
                }

            });
        });

        $("#lb").on("click",function(e) {
            $.ajax({
                url:'leaderboard.php',
                type:'POST',
                success: function(data) {
                    $("#main").html(data);
                },
                error: function() {
                    alert("something went weong");
                }


            });
        });

        $("#cu").on("click",function(e) {
            $.ajax({
                url:'contactus.php',
                type:'POST',
                success: function(data) {
                    $("#main").html(data);
                },
                error: function() {
                    alert("something went weong");
                }

            });
        });

       

        // intially load contest.php
        $.ajax({
                url:'home.php',
                type:'POST',
                async:'true',
                success: function(data) {
                    //alert(data);
                    $("#main").html(data);
                },
                error: function() {
                    alert("something went weong");
                }

            });

        $("#main").on("submit","#myform",function(e) {
            e.preventDefault();
          $("#skip").val("0");
          $("#change").val("0");
            //see console its working baby
            wowser();
        });
        function wowser()
        {
            console.log($("#myform").serialize());
            $.ajax({
                url: "hello.php",
                type: "POST",
                data: $("#myform").serialize(),
                success: function(data) {
                  $("#main").html(data);  
                } 
            });
        }

            
        
        function wowser()
        {
            console.log($("#myform").serialize());
            $.ajax({
                url: "hello.php",
                type: "POST",
                data: $("#myform").serialize(),
                success: function(data) {
                  $("#main").html(data);  
                } 
            });
        }


  
        $( "#main").on("click","#changer",function() {
          $("#skip").val("0");
          $("#change").val("1");
          wowser();
        });
        $( "#main" ).on("click","#skiper",function() {
          $("#change").val("0");
          $("#skip").val("1");
            wowser();
        });
    });
    </script>
</body>


</html>

