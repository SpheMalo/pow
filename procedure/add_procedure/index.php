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

    $_SESSION['page'] = "add procedure";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";

    $prtList = loadPrTList();
  }
  else
  {
    header("Location: ../../login/");
  }

  $o = "";

  if (isset($_POST['s_new_proc']))
  {
    if (!isset($_POST['favo']) || $_POST['favo'] == null)
    {
      $f = 0;
    }
    else 
    {
      $f = $_POST['favo'];
    }

    $proc = addProcedure($_POST['desc'], $_POST['code'], $_POST['price'], $f, $_POST['p_t_code'], $_POST['p_t_desc'], $prtList);
    
    if ($proc == true)
    {
      $o = "The procedure was added successfuly";
    }
    else if( $proc == "query")
    {
      $o = "The procedure was not added due to a server error, please try again";
    }
    else if( $proc == "rows")
    {
      $o = "The procedure was not added, please try again";
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
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s52').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s52').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s52').parent().prevUntil().css({'color': '#00314c'});
        $('#s52').parent().nextUntil().css({'color': '#00314c'});
        $('#s52').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s52').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s52').css({'color': '#00314c', 'text-decoration': 'underline'});
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
      <h1 id="head_m">Procedure</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o; ?></h5>
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
          <legend>procedure details</legend>
          <div>
            <label for="desc">description:</label>
            <textarea name="desc" class="procDesc" placeholder="Enter a description of the procedure eg. Encounter for dental examination and cleaning without abnormal findings" title="Enter a description of the procedure eg. Encounter for dental examination and cleaning without abnormal findings. A maximun of 255 alphabet characters may be used" pattern="[A-Za-z ]{1,255}" required></textarea>
            
            <label>favorite:</label>
            <input type="checkbox" name="favo" class="check" value=1 title="Select to add procedure to shortlist when making an invoice."/>
            <label for="favo" class="check">add to favorite list</label>
            
          </div>

          <div>
            <label for="code">code:</label>
            <input type="text" name="code" placeholder="Enter procedure code eg. Z01.20" title="Enter procedure code eg. Z01.20 A minimum of 6 characters is required" pattern="[A-Z0-9.]{6,10}" required/>
            
            <label for="price">price:</label>
            <input type="text" name="price" placeholder="Enter procedure price eg. 350.30" title="Enter procedure price eg. 350.30" pattern="[0-9.]{2,10}" required/>
          </div>
        </fieldset>

        <fieldset>
          <legend>procedure type</legend>
          <div>
            <label>code:</label>
            <input type="text" name="p_t_code" placeholder="Enter procedure type code eg. Z01" required title="Enter procedure type code eg. Z01. If the procedure is not in the options list then add a description for the procedure type and it will be added." pattern="[A-Z0-9]{3,3}" required/>

            <label>description:</label>
            <textarea name="p_t_desc" placeholder="Enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis" pattern="[a-zA-Z0-9 ]{1,255}" title="Enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis. A maximum of 255 alphanumeric characters may be used" required></textarea>
          </div>
        </fieldset>
        <input type="submit" name="s_new_proc" value="Add Procedure" class="submit"/>
      </form>
    </div>
    <footer></footer>
  </body>
</html>