
<html>
<head>
	<title>Calculator</title>
</head>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>


  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       
  <link rel='stylesheet' type='text/css' href='style.css'/>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  

<body>
  

	<div id="title">Tippy</div>


  <?php
    $subtotalErr = "";
    $error = false;
    if(!is_numeric($_POST["total"]) && $_POST) {
      $subtotalErr = "*Bill must be a number";
      $error = true;
    }
   ?>
  <div class = "container">
  <form action="index.php" method ="post">
	      <div class="row">
          <div class="input-field col s8 offset-s2 ">
            <input id="equation" type="text" name="total">
            <label for="equation" >Insert Amount Here</label>
          </div>
          
        </div>

            <div class ="row">
      <div style="margin-left: 35%;">

    <?php
      for ($x = 0.1; $x <= 0.20; $x += 0.05) {
        $xpercent = $x * 100;
        $word = "test" + (string)$x;
        echo "<div class='col s2'><input type='radio' name='tip' value='$x' id='$word'";
        if (!$_POST && $x == 0.1) {
          echo "checked";
        }
        $tip = number_format($_POST["tip"], 2);
         if(abs($_POST["tip"] - $x) < .01)
         {
           echo "checked";
           echo "><label for='$word'>$xpercent%</label>";
         }
         else {
           echo "><label for='$word'>$xpercent%</label>";
         }
         echo "</div>";
         echo "<div class = 'col s2'></div>";
      }
     ?>
 </div>
   </div>
</form>
</div>
        <div class="ex" style="text-align: center;">
        	<?php
 if (!$error && $_POST) {
   $subtotal = $_POST["total"];
   $percent = $_POST["tip"];
   $tip = $subtotal * $percent;
   $total = $subtotal + $tip;
   echo "<div id = 'output'>";
     echo "<div class='row'>";
       echo ' <div class="col m4 offset-m2"> <div class="card"> <div class="card-content"> <span class="card-title">';
       echo $tip;
       echo '</span> </div> <div class="card-action"> Tip Amount </div> </div> </div>';
       echo '<div class="col m4"> <div class="card"> <div class="card-content"> <span class="card-title">';
       echo $total;
       echo '</span> </div> <div class="card-action"> Total </div> </div> </div>';
     echo "</div>";
   echo "</div>";
 } else if ($_POST) {
   echo '<div class="col m8 offset-m2"> <div class="card"> <div class="card-content"> <span class="card-title">Please enter valid input</span> </div> </div> </div>' ;
 }
?>

        </div>


    <a href="http://architrathi.com/">
    <div class="footer">
        Made By Archit Rathi
    </div>
  </a>
   

</body>
</html>