<HEAD>
    <TITLE>ADMINISTRADOR</TITLE>
</HEAD>
body {
    background-color: #34D2E1;
}
    
<BODY>
<?php
//variables

date_default_timezone_set("America/Bogota");
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "dbunad12";

//Para utiliar Mysqldump y realizar el respaldo, se debe declarar una variable haciendo referencia a la ubicación del archivo mysqldump.exe
$mysqldump = '"C:\AppServ\MySQL\bin\mysqldump.exe"';
$backup_file = '"C:\AppServ\www\ComputerStoreApp\backup\"' . $dbname. "-" .date("Y-m-d-H-i-s"). ".sql";
system("$mysqldump --no-defaults -u $username -p$password $dbname > $backup_file" );

?>
<h2><p align = "center">COPIA DE SEGURIDAD RELIZADA SATISFACTORIAMENTE</P></h2>
</BODY>
</HTML>