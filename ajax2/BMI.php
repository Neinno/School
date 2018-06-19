<?php
    $gewicht = $_GET["gewicht"];
    $lengte =  $_GET["lengte_cm"];
    BMIcalc($gewicht,$lengte);

    function BMIcalc($gewicht,$lengte){
      $lengte = $lengte/100;
      $bmi = $gewicht /($lengte * $lengte);
      echo (round($bmi,1));
    }

    ?>