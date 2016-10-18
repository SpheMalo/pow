<?php
  require '../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../login/?t");
    }

    $_SESSION['page'] = "reconcile a payment";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";
    $rList = loadReasonList();    
  }
  else
  {
    header("Location: ../../login/");
  }

  if (isset($_POST['s_rec']))
  {
    if ($_POST['reason'] != "--select a reason--")
    {
      $rec[] = array(
        'reasonID' => $_POST['reason'],
        'comment' => "NULL"
      );  
    }
    else
    {
      $rec[] = array(
        'reasonID' => "NULL",
        'comment' => $_POST['com']
      );
    }
    //echo var_dump($rec, $_POST['write'], $_POST['inv'], $_POST['amount']);
    $p = addPayment($_POST['amount'], $_POST['inv'], null, $rec);
    //echo var_dump($p);
    
    if ($p == "paid")
    {
      $o = "The selected invoice has been fully been paid for.";
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
      if ($emp_access_level == "A")
      {
        include '../../inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include '../../inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include '../../inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include '../../inc/menu_D.htm';
      }
      else
      {
        include '../../inc/menu.htm';
      }
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
      <form method="post" action="">
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
                <option value="<?php echo $p->invLine;?>" />
              <?php endforeach;?>
            </datalist>
          </div>
        </fieldset> 
        <fieldset>
          <legend>payment details</legend>
          <div>
            <label for="amount">amount:</label>
            <input type="text"  name="amount" placeholder="payment amount" required />
            <input type="checkbox" name="write" id="w_off" class="check" value=1 onchange='write_off()' checked/>
            <label for="write" id="w_o_label" class="check">is being written off</label>
          </div>
          <div>
            <label for="reason">reason:</label>
            <select name="reason">
              <option>--select a reason--</option>
              <?php foreach($rList as $r):?>
                <option value="<?php echo $r['id'];?>"><?php echo $r['desc'];?></option>
              <?php endforeach;?>
            </select>
            <label for="com">other reason:</label>
            <textarea name="com" placeholder="comments" id="w_o_comment"></textarea>
          </div>
        </fieldset>

        <input type="submit" name="s_rec" value="reconcile payment" class="submit"/>

      </form>
      
    </div>
    
    <footer></footer>
  </body>
</html>