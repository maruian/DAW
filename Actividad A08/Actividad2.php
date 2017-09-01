<!DOCTYPE html>
<!-- Matias Ruiz 1 DAM -->
<html>
<head>
<title>Actividad 2 Arrays</title>
<meta charset="utf-8">
</head>
<body>
<?php 
$personas = [
   'juan' => [
       'altura'=>175, 'pelo'=>'rubio', 'ojos'=>'azules' 
       ],
   'maria' => [
       'altura'=>168, 'pelo'=>'castaña', 'ojos'=>'marrones'
       ],
   'pedro' => [
       'altura'=>180, 'pelo'=>'castaño', 'ojos'=>'verdes'
       ]
    ];

echo "La altura de Juan es " . $personas['juan']['altura'] . "<br />";
echo "Los ojos de Maria son " . $personas['maria']['ojos'] . "<br />";
echo "El pelo de pedro es " . $personas['pedro']['pelo'];

?>
</body>
</html>
