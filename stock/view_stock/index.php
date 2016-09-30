<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view stock";
    $emp = $_SESSION['emp'];
    $o = "";
    
    $pList = loadProdList(null, null);
    
  }
  else
  {
    header("Location: ../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/viewBase.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s71').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s71').parent().parent().css({'background': 'white', 'color': '#00314c'});
        //$('#s71').parent().prevUntil().css({'color': '#00314c'});
        //$('#s71').parent().nextUntil().css({'color': '#00314c'});
        $('#s71').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s71').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s71').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Stock</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <div id="cont">
      <table>
        <tr>
          <th>product number</th>
          <th>product name</th>
          <th>product type</th>
          <th>orderID</th>
          <th>QoH</th>
          <th>Available</th>
          <th>action</th>
        </tr>

        <tr>
          <td>P-0981</td>
          <td>Panado</td>
          <td>Painkiller</td>
          <td>O-7564</td>
          <td>243</td>
          <td>243</td>
          <td><a href="../write_off_stock/">Write-Off</a></td>
        </tr>
      </table>
    </div>
    <form method="get" action="" enctype="multipart/form-data" id="search">
      <input type="search" name="s" placeholder="Search criteria" id="search_input"/>
      <button>s</button>
    </form>
    <footer></footer>
  </body>
</html>