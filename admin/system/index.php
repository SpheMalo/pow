<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "System";
    $emp = $_SESSION['emp'];
    $o = "";

  }
  else
  {
    header("Location: ../../login/");
  }

  if(isset($_REQUEST['backUp']))
  {
    $temp = backUp();

    echo json_encode($temp);
  }

?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../js/backup.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s24').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s24').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s24').parent().prevUntil().css({'color': '#00314c'});
        $('#s24').parent().nextUntil().css({'color': '#00314c'});
        $('#s24').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s24').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s24').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">System Admin</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"></h5>
    </div>

     <ul id="nav_xtra">
      <li><img src="../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>

    <div id="cont">
      <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
          <legend>Backup System</legend>
          <div>
            <label class="display">types:</label>
            <a onclick="backUp()" style="padding: 5px;" class="submit" title="Triggers the system to run a back up" id="btnBackUp">Back up system</a>
            <a id="downLink" href="../../admin/system/backUpFile.sql" download></a>
          </div>
          <div>
            <label class="display">types:</label>
            <a class="submit" style="padding: 5px;" title="Triggers the system to run a restore" id="btnRestore">Restore system</a>
          </div>
        </fieldset>

        <fieldset>
          <legend>Audit Log</legend>
          <div>
            <label>types:</label>
            <input type="text" name="type1" placeHolder="Medical Aid Type 1" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type2" placeHolder="Medical Aid Type 2" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type3" placeHolder="Medical Aid Type 3" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type4" placeHolder="Medical Aid Type 4" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type5" placeHolder="Medical Aid Type 5" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
          </div>
        </fieldset>

        <input type="submit" name="add_new_med" value="Add Medical Aid" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>