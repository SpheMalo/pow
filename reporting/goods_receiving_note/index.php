<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "goods receiving note";
    $emp = $_SESSION['emp'];
    $o = "";
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
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../js/goods_receiving_note_rpt.js"></script>
    <script type="text/javascript" src="../../js/jsPDF/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="../../js/generateGoodsReceivingPDF.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s105').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s105').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s105').parent().prevUntil().css({'color': '#00314c'});
        $('#s105').parent().nextUntil().css({'color': '#00314c'});
        $('#s105').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s105').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s105').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Reporting</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
     <ul id="nav_xtra">
      <li><img src="../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <form method="post" action="">
        <fieldset>
         <legend>order details</legend>
         <div>
            <label for="ord">current date:</label>
           <select id="goodsRecId" name="goodsRecId" onchange="getGoodsReceiving()">
             <option>--select current date--</option>
             <?php ?>
             <?php $name = $d['name'];?>
             <option value="<?php echo date("Y-m-d");?>"><?php echo date("Y-m-d");?></option>
             <?php;?>
           </select>
         </div>
        </fieldset>

        <span onclick="generateGoodsReceivingPDF()" name="p_weekly_stock" class="submit" style="padding: 2px;"/><a>  Print Report  </a></span>
      </form>

      <div id="receive">

      </div>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>