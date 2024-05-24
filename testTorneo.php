<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Futbol.php");
include_once("Basquet.php");

$fecha = date("d-m-Y");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$objTorneo = new Torneo(100.000);
$objPartidoBasquet1 = new Basquet(11, "2024-05-05", $objE7, 80, $objE8, 120, 7 );
$objPartidoBasquet2 = new Basquet(12, "2024-05-06", $objE9, 81, $objE10, 110, 8 );
$objPartidoBasquet3 = new Basquet(13, "2024-05-07", $objE11, 115, $objE12, 85, 9 );

$objPartidoFutbol1 = new Futbol(14, "2024-05-07", $objE1, 3, $objE2, 2);
$objPartidoFutbol2 = new Futbol(15, "2024-05-08", $objE3, 0, $objE4, 1);
$objPartidoFutbol3 = new Futbol(16, "2024-05-09", $objE5, 2, $objE6, 3);


$partido1 = $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
$partido2 = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
$partido3 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');

$objTorneo->darGanadores("Basquet");
$objTorneo->darGanadores("Furbol");
$objTorneo->calcularPremioPartido($partido1);
$objTorneo->calcularPremioPartido($partido2);
$objTorneo->calcularPremioPartido($partido3);

echo $objTorneo;


?>
