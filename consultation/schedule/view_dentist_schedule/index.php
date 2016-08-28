<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view dentist schedule";
    $emp = $_SESSION['emp'];
  }
  else
  {
    header("Location: ../../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/cal.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Schedule</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
    </div>
    
    <div id="calendar">
    </div>
    
    <footer></footer>

    <script type="text/javascript">
        $(document).ready(function(){
          //var dat = "date=" . date("Y-m-d");

          $.ajax({
            type: "post",
            url: "../../../inc/call.php",
            //data: dat,
            success: function(result){
              $('#calendar').html(result);
              
            },
            error: function(){
              alert('something went wrong');
            }
          });

          $("#n_m").click(function(e){
            var dat = 'month=' + $(this).attr("href");

            $.ajax({
              type: "post",
              data: dat,
              url: "../../../inc/cal.php",
              success: function(result){
                $('#calendar').html(result);
                
              },
              error: function(){
                alert('something went wrong');
              }
            });

            e.preventDefault();
            });

            $('#cal > li').click(function(e){
            var dat = 'date=' + $(this).attr("id");

            $.ajax({
              type: "post",
              url: "../../../inc/call.php",
              data: dat,
              success: function(result){
                $('#calendar').html(result);
              },
              error: function(){
                alert('something went wrong');
              } 
            });

            e.preventDefault();
          });
          });
      </script>
  </body>
</html>