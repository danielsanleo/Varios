<?php

$year=2014;

$month=1;

$day=26;

 

# Obtenemos el numero de la semana

$semana=date("W",mktime(0,0,0,$month,$day,$year));

 

# Obtenemos el día de la semana de la fecha dada

$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));

 

# el 0 equivale al domingo...

if($diaSemana==0)

    $diaSemana=7;

 

# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes

$primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1,$year));

 

# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo

$ultimoDia=date("d-m-Y",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));

 

echo "<br>Semana: ".$semana." - año: ".$year;

echo "<br>Primer día ".$primerDia;

echo "<br>Ultimo día ".$ultimoDia;

?>
