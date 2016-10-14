<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "reconcile a payment";
    $emp = $_SESSION['emp'];
    $o = "";
    
  }
  else
  {
    header("Location: ../../login/");
  }

  if (isset($_POST['s_new_pay']))
  {
    $p = addPayment($_POST['amount'], $_POST['inv'], null);
    //echo var_dump($p);
    
    if ($p == "paid")
    {
      $o = "There invoice has been fully been paid for.";
    }
    else if ($p == "query" || $p == "query1")
    {
      $o = "There was an error capturing the payment due to a server error.";
    }
    else if ($p == "rows" || $p == "rows1")
    {
      $o = "The selected invoice number does not exist";
    }
    else
    {
      $o = "The payment has been added successfuly.";
    }

  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s83').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s83').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s83').parent().prevUntil().css({'color': '#00314c'});
        $('#s83').parent().nextUntil().css({'color': '#00314c'});
        $('#s83').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s83').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s83').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Payment</h1>
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
      <form method="" action="">
        <fieldset>
        <legend>invoice details</legend>
          <!--<div>
            <label for="patient">patient name:</label>
            <input type="text"  name="patient" placeholder="select patient" required />
            
          </div>-->
          <div>
            <label for="inv">invoice id:</label>
            <input type="text"  name="inv" placeholder="invoice number" required list="invNum"/>

            <datalist id="invNum">
              <?php foreach($payList as $p):?>
                <option value="<?php echo $p->invLine?>" />
              <?php endforeach;?>
            </datalist>
          </div>
        </fieldset>
        <fieldset>
          <legend>payment details</legend>
          <div>
            <label for="amount">amount:</label>
            <input type="text"  name="amount" placeholder="payment amount" required />
            <input type="checkbox" name="write" required class="check"/>
            <label for="write" class="check">is being written off</label>
          </div>
          <div>
            <label for="com">comments:</label>
            <textarea name="com" placeholder="comments"></textarea>
          </div>
        </fieldset>

        <input type="submit" name="s_new_pay" value="capture payment" class="submit"/>

      </form>
      
    </div>
    
    <footer></footer>
  </body>
</html>