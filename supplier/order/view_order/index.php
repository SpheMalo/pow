<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view order";
    $emp = $_SESSION['emp'];
    $o = "";

    if (isset($_GET['id']))
    {
      header("Location: ../receive_order/?id=" . $_GET['id']);
    }
    else if (isset($_GET['s']))
    {
      $oList = loadOrderList(null, $_GET['s']);
    }
    else
    {
      $oList = loadOrderList(null, null);
    }
  }
  else
  {
    header("Location: ../../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s93').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s93').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s93').parent().prevUntil().css({'color': '#00314c'});
        $('#s93').parent().nextUntil().css({'color': '#00314c'});
        $('#s93').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s93').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s93').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Order</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>

    <ul id="nav_xtra">
    <li><img src="../../../img/ico/gear.png" alt="gear"/>
       <ul>
        <li><a onclick=toExcel("view_orders")>Export to excel</a></li>
        <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
       </ul>
      </li>
    </ul>

    <div id="cont">
      <?php
        if ($oList == "query")
        {
          echo "<p>There was a problem retrieving orders. Reffer to help for assistance</p>";
        }
        else
        {
          if (isset($_GET['s']))
          { 
            if ($oList == "rows")
            {
              echo "<p>There were no matches for what you are are looking for.  <a href='../view_order/'>Reload the page</a> or try refining your search citeria.</p>";
            }
            else
            {
              include 'inc/cont.php';
            }
          }
          else
          {
            if ($oList == "rows")
            {
              echo "<p>There are currently no orders according to your database</p>";
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

<!--
  <table>
        <tr>
          <th>order number</th>
          <th>order status</th>
          <th>order date</th>
          <th>order supplier</th>
          <th>action</th>
        </tr>
        <tr>
          <td>O-1234</td>
          <td>pending</td>
          <td>2016-08-02</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
        <tr>
          <td>O-7654</td>
          <td>cancelled</td>
          <td>2016-07-10</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
        <tr>
          <td>O-9875</td>
          <td>paid</td>
          <td>2016-05-15</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
        <tr>
          <td>O-2755</td>
          <td>recieved</td>
          <td>2016-07-02</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
      </table>
                -->