<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update product";
    $emp = $_SESSION['emp'];
    $o = "";
    
    $prdList = loadProdTypeList();
    
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
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../js/product_update.js"></script>
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#s62').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
      $('#s62').parent().parent().css({'background': 'white', 'color': '#00314c'});
      $('#s62').parent().prevUntil().css({'color': '#00314c'});
      $('#s62').parent().nextUntil().css({'color': '#00314c'});
      $('#s62').parent().prevUntil().children().css({'color': '#00314c'});
      $('#s62').parent().nextUntil().children().css({'color': '#00314c'});
      $('#s62').css({'color': '#00314c', 'text-decoration': 'underline'});
    });
  </script>
  </head>
  
  <body onload="getProductById()">
    <?php
      include '../../inc/menu.htm';
    ?>    
     <div id="head">
      <h1 id="head_m">Product</h1>
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
         <legend>product details</legend>
         <div>
             <label for="name">product number:</label>
            <input type="text" id="pNumberId" name="pNumber" placeholder="Enter product number e.g. P1001" title="A maximum of 5 characters allowed 'P' must be uppercase" pattern="[-A-Z0-9]{1,6}" required/>
            <label for="name">name:</label>
            <input type="text"  id="nameId" name="name" placeholder="Enter product name e.g. Tramacet" title="A maximum of 35 letters allowed" pattern="[A-Za-z0-9 ]{1,35}" required/>
            <label for="price">price:</label>
            <input type="text"  id="priceId" name="price" placeholder="Enter product price e.g. 35.00" title="Only numerical characters allowed with no spaces" pattern="[0-9.]{2,10}" required/>
            <label for="size">size:</label>
            <input type="text"  id="sizeId" name="size" placeholder="Enter product size e.g. 32" title="Only numerical characters allowed with no spaces" pattern="[0-9]{2,10}" required/>
           
            <label>favorite:</label>
            <input type="checkbox"  id="favoId" name="favo" class="check" value=1 title="Select to add procedure to shortlist when making an invoice."/>
            <label for="favo" class="check">add to favorite list</label>        
         </div>
         <div>
            <label for="desc">description:</label>
            <textarea class="prodDesc"  id="descId" name="desc" placeholder="Enter product description e.g. For hard pain relief" title="A maximun of 255 alphabet characters may be used" pattern="[A-Za-z ]{1,255}" required></textarea>
            
            <label for="quantity">unit quantity:</label>
            <input type="text"  id="quantityId" name="quantity" placeholder="Enter product unit quantity e.g. 12" title="Only numerical characters allowed with no spaces" pattern="[0-9]{1,10}" required/>     
           
            <label for="critical">Critical Value:</label>
            <input type="text"  id="criticalId" name="critical" placeholder="Enter product re-order value e.g. 5"  title="Only numerical characters allowed with no spaces" pattern="[0-9]{1,10}" required/>
         </div>
        </fieldset>

        <fieldset>
          <legend>product type</legend>
           <div>
            <label for="name">name:</label>
            <input type="text" id="p_t_nameId" name="p_t_name" placeholder="Enter product type name e.g. Antibiotics" required pattern="[A-Za-z0-9 ]{1,35}" title="A maximum of 35 characters allowed"/>
           
            <label for="desc">description:</label>
            <textarea id="p_t_descId" name="p_t_desc" placeholder="Enter product type description e.g. For treatment of infections" pattern="[A-Za-z0-9 ]{1,255}" title="A maximum of 255 alphanumeric characters may be used"></textarea>
          </div>
        </fieldset>
        <input type="submit" name="s_upd_prod" value="update product" class="submit"/>
        <input type="submit" name="rem" value="remove product" class="submit"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>