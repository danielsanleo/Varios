<?php
$fecha_vencimiento = DateTime::createFromFormat('d/m/Y', '16/12/2016') -> modify("+5 month") -> format('Y-m-d');
?>
