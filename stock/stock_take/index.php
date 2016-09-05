<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "stock take";
    $emp = $_SESSION['emp'];
    $o = "";
    
    $pList = loadProdList(null);
    
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
      <form method="post" action="">
        <fieldset>
          <legend>status</legend>
          <div>
            <label for="l_run">Date of change:</label>
            <input type="text" name="l_run" placeholder="never run"/>
          </div>
          <div>
            <label for="notes">notes:</label>
            <textarea name="notes" placeholder=""></textarea>
          </div>
        </fieldset>
        <fieldset>
          <legend>product details</legend>
          <table class="tblBig">
            <tr>
              <th>product number</th>
              <th>product name</th>
              <th>product type</th>
              <th>orderID</th>
              <th>QoH</th>
              <th>Count</th>
              <th>Variances</th>
            </tr>

            <!--<?php
              if (count($pList) > 0 && $pList != false)
              {
                foreach($pList as $p)
                {
                  include 'inc/view_prod_row.php';
                }
              }
            ?>-->
            <tr>
              <td>P-0981</td>
              <td>Panado</td>
              <td>Painkiller</td>
              <td>O-7564</td>
              <td>243</td>
              <td><input type="number" placeholder="quantity counted"/></td>
              <td>3</td>
            </tr>

          </table>
        </fieldset>

        <input type="submit" name="s_stock_take" value="save" class="submit" />
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>