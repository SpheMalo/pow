<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view patient";
    $emp = $_SESSION['emp'];
    $o = "";

    if (isset($_GET['id']))
    {
      header("Location: ../update_patient/?id=" . $_GET['id']);
    }
    else if (isset($_GET['s']))
    {
       $pList = loadPatList(null, $_GET['s']);
    }
    else
    {
      $pList = loadPatList(null, null);
    }
  }
  else
  {
    header("Location: ../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/viewBase.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s41').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s41').parent().parent().css({'background': 'white', 'color': '#00314c'});
        //$('#s41').parent().prevUntil().css({'color': '#00314c'});
        //$('#s41').parent().nextUntil().css({'color': '#00314c'});
        $('#s41').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s41').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s41').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Patient</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <div id="cont">
      <?php
        if ($pList == "query")
        {
          echo "<p>There was a problem retrieving patients. Reffer to help for assistance</p>";
        }
        else
        {
          if (isset($_GET['s']))
          { 
            if ($pList == "rows")
            {
              echo "<p>There were no matches for what you are looking for. <a href='../view_patient/'>Reload the page</a> or try refining your search criteria.</p>";
            }
            else
            {
              include 'inc/cont.php';
            }
          }
          else
          {
            if ($pList == "rows")
            {
              echo "<p>There are currently no patients according to your database</p>";
            }
            else
            {
              include 'inc/cont.php';
            }
          }
        }
      ?>
    </div>
    <form method="get" action="" enctype="multipart/form-data" id="search">
      <input type="search" name="s" placeholder="Search criteria" id="search_input"/>
      <button>s</button>
    </form>
    <footer></footer>
  </body>
</html>