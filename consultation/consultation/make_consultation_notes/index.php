<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "make consultation notes";
    $emp = $_SESSION['emp'];
  }
  else
  {
    header("Location: ../../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Consultation</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
    </div>
    
    <div id="cont">
      <form method="post" action="" class="">
        <fieldset>
          <legend>consultation notes summary</legend>
          <div>
            <label for="booking">patient name:</label>
            <input type="text" name="booking" placeholder="" />
            <label for="booking">medical aid:</label>
            <input type="text" name="booking" placeholder="" />
          </div>
          <div>
            <label for="booking">booking id:</label>
            <input type="text" name="booking" placeholder="" />
          </div>
        </fieldset>

        <ul>
          <li><a href="#" class="active">notes</a></li>
          <li><a href="#" >invoice</a></li>
          <li><a href="#">prescription</a></li>
          <div class="clear"></div>
        </ul>

        <div  style="visibility: ; display: ;">
          <label>notes describing the general condition of the patient:</label>
          <textarea name="notes" placeholder="the patient was..."></textarea>
          <a href="" class="submitt">next</a>
        </div>
          
        <div class="conInv" style="visibility: hidden; display: none;">
          <div>
            <input type="text" name="product" placeholder="select product used"/>
            <input type="text" name="price" placeholder="product price"/>
            <input type="number" name="quantity" placeholder="select product quantity used"/>
            <input type="submit" value="add product" name="s_add_prod" class="submit" />
          </div>
          <div>
            <table>
              <tr>
                <th>name</th>
                <th>type</th>
                <th>price</th>
                <th>quantity</th>
                <th>action</th>
              </tr>
              <tr>
                <td>Syringe</td>
                <td>Tuberculin</td>
                <td>R30</td>
                <td>1</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Panado</td>
                <td>Painkiller</td>
                <td>R30</td>
                <td>2</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Penicillins</td>
                <td>Antibiotic</td>
                <td>R160</td>
                <td>10</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>novocaine</td>
                <td>Anesthetic</td>
                <td>R70</td>
                <td>1</td>
                <td><a href="">remove</a></td>
              </tr>
            </table>
          </div>
          <div>
            <input type="text" name="procedure" placeholder="select procedure used"/>
            <input type="text" name="price" placeholder="procedure price"/>
            <input type="submit" value="add procedure" name="s_add_prov" class="submit" />
          </div>
          <div>
            <table>
              <tr>
                <th>name</th>
                <th>type</th>
                <th>price</th>
                <th>action</th>
              </tr>
              <tr>
                <td>Consultation Fee</td>
                <td>Standard</td>
                <td>R350.00</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Root canal preparatory</td>
                <td>Root canal</td>
                <td>R650</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Root Canal therapy</td>
                <td>Root canal</td>
                <td>R1200</td>
                <td><a href="">remove</a></td>
              </tr>
            </table>
          </div>

          <a href="" class="submitt">next</a>
        </div>

        <div>
         <!-- <label>Medicines prescribed for the patient:</label>
          <textarea name="prescription"></textarea>
          <input type="submit" name="s_new_consult" value="add consultation" class="submitt" /> -->
        </div>

      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>