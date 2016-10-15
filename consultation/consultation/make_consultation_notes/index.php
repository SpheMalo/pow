<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "make consultation notes";
    $emp = $_SESSION['emp'];
    $pList = loadprodList(null, null);
    $pcList = loadProcList(null, null);
    $o = "";
  }
  else
  {
    header("Location: ../../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s33').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s33').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s33').parent().prevUntil().css({'color': '#00314c'});
        $('#s33').parent().nextUntil().css({'color': '#00314c'});
        $('#s33').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s33').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s33').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>

<!--  <script>-->
<!--    document.body.onload = function() {-->
<!--      getOrderProdConsultation();-->
<!--      getOrderProcConsultation();-->
<!--    };-->
<!--  </script>-->

  <body onload="getOrderProdConsultation()">
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Consultation</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o?></h5>
    </div>
    <ul id="nav_xtra">
      <li><img src="../../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <form method="post" action="" class="">
        <fieldset>
          <legend>consultation notes summary</legend>
          <div>
            <label for="booking">patient name:</label>
            <input type="text" name="booking" placeholder="Search patient name eg. Sarah" required pattern="[A-Za-z]{1,35}" title="A maximum of 35 letters with no spaces"/>
            <label for="id">ID/Passport number:</label>
            <input type="text" name="id" placeholder="Enter patent id/passport number eg. 8612170554087" required pattern="[0-9]{13}" title="A number of 13 characters"/>
          </div>
          <div>
            <label for="booking">medical aid:</label>
            <input type="text" name="booking" placeholder="Enter medical aid name e.g. Bonitas" pattern="[a-zA-Z ]{1,35}" required title="Only alphanumeric characters with no spaces"/>
            <label for="booking">booking id:</label>
            <input type="text" name="booking" placeholder="Enter booking ID e.g B-0101" pattern="[-B0-9]{6,8}" title="Only alphanumeric characters with no spaces 'B' must precede the number" />
          </div>
        </fieldset>

        <div id="consult">
          <ul>
            <li><a href="note" class="active">Notes</a></li>
            <li><a href="inv" >Invoice</a></li>
            <li><a href="pre">Prescription</a></li>
            <div class="clear"></div>
          </ul>

          <div>
            <label for="notes">Notes describing the general condition of the patient:</label>
            <textarea name="notes" placeholder="Enter patient consulation notes..."></textarea>
            <label>Upload hand written notes:</label>
            <input type="file" name=notes_h />
            <a href="" class="submitt">next</a>
          </div>

          <div class="conInv">
            <legend>products:</legend>
            <div>
              <label>Product Name:</label>
              <input type="text" id="prodNameId" name="product" placeholder="Select product used" list="prodList"/>

              <datalist id="prodList">
                <?php foreach ($pList as $p):?>
                <option value="<?php echo $p->name . '-' . $p->type;?>">
                  <?php endforeach?>
              </datalist>
<!--              <label>Price:</label>-->
<!--              <input type="text" name="price" placeholder="product price"/>-->
              <label>Quantity:</label>
              <input id="prodQtyId" type="number" name="quantity" placeholder="Select product quantity used"/>
              
              <span onclick="addProdOrderCon()" class="submitt" id="orderProdSubmit"><a>Add</a></span>

              <label class="display">Price:</label>
              <input class="display" type="text" name="price" placeholder="Product price"/>
<!--          <input type="submit" value="add product" name="s_add_prod" class="submit" />-->
            </div>

            <div id="prodOrderCon">

            </div>

            <legend>procedures:</legend>
            <div>
              <label>Procedure Name:</label>
              <input type="text" id="procNameId" name="procedure" placeholder="Select procedure used" list="procList"/>
              <datalist id="procList">
                <?php foreach ($pcList as $p):?>
                <option value="<?php echo $p->desc;?>">
                  <?php endforeach?>
              </datalist>

              <label class="display">Procedure Price:</label>
              <input class="display" type="text" id="procPriceId" name="price" placeholder="Procedure price"/>

              <span onclick="addProcOrderCon()" class="submitt" id="orderProcSubmit"><a>Add</a></span>
            </div>

            <div id="procOrderCon">

            </div>

            <a href="" class="submitt">Next</a>
          </div>


          <div>
            <label>Medicines prescribed for the patient:</label>
            <textarea name="Prescription"></textarea>
            <input type="submit" name="s_new_consult" value="add consultation" class="submitt" /> 
          </div>

        </div>        

      </form>
      
    </div>
    
    <footer></footer>
  </body>
</html>