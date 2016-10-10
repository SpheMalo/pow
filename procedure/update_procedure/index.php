<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update procedure";
    $emp = $_SESSION['emp'];
    $o = "";

    $prtList = loadPrTList();
    
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
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../js/procedure_update.js"></script>
  </head>
  
  <body onload="getProcedureById()">
    <?php
      include '../../inc/menu.htm';
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
            <textarea id="descId" name="desc" class="procDesc" placeholder="enter a description of the procedure eg. Encounter for dental examination and cleaning without abnormal findings" title="enter a description of the procedure eg. Encounter for dental examination and cleaning without abnormal findings. A maximun of 255 alphabet characters may be used" pattern="[A-Za-z ]{1,255}" required></textarea>
            
            <label>favorite:</label>
            <input type="checkbox" id="favoId" name="favo" class="check" value=1 title="select to add procedure to shortlist when making an invoice."/>
            <label for="favo" class="check">add to favorite list</label>
          </div>

          <div>
            <label for="code">code:</label>
            <input type="text" id="codeId" name="code" placeholder="enter procedure code eg. Z01.20" title="enter procedure code eg. Z01.20 A minimum of 6 characters is required" pattern="[A-Z0-9.]{6,10}" required/>
            
            <label for="price">price:</label>
            <input type="text" id="priceId" name="price" placeholder="enter procedure price eg. 350.30" title="enter procedure price eg. 350.30" pattern="[0-9,]{2,10}" required/>
          </div>
        </fieldset>

        <fieldset>
          <legend>procedure type</legend>
          <div>
            <label>code:</label>
            <input type="text" id="p_t_codeId" name="p_t_code" placeholder="enter procedure type code eg. Z01" required title="enter procedure type code eg. Z01. If the procedure is not in the options list then add a description for the procedure type and it will be added." pattern="[A-Z0-9]{3,3}" required/>

            <label>description:</label>
            <textarea id="p_t_descId" name="p_t_desc" placeholder="enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis" pattern="[a-zA-Z0-9 ]{1,255}" title="enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis. A maximum of 255 alphanumeric characters may be used"></textarea>
          </div>
        </fieldset>

        <input type="submit" name="s_new_proc" value="Add Procedure" class="submit"/>
        <input type="submit" name="rem" value="Remove Procedure" class="submit"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>