<!DOCTYPE html>
<!--Matias Ruiz 1 DAM -->
<html>
    <head>
        <title>Ticket medio</title>
        <meta charset="utf=8">
        <style>
            table {
                width: 50%;
            }
            th {
                background-color: lightgray;
            }
            td {
                border: 1px solid #ddd;
                text-align: center;
            }
            tr:hover {
                background-color: #f5f5f5
            }
        </style>
    </head>
    <body>
        <h1>Calculamos el ticket medio</h1>
        <br />
        <?php
           include "tm.php";
           $tm=new TicketMedio();
           $valores=array(100, 210, 9.5, 103, 24.75, 378.99, 126, 97.34);
           echo "<table>";
           echo "<tr><th>Ticket</td><th>Valor</th></tr>";
           for ($i=0; $i<count($valores); $i++){
              $tm->introduceTicket($valores[$i]);
              echo "<tr>";
              $fila = $i + 1;
              echo "<td>" . $fila  . "</td>";
              echo "<td>" . $valores[$i] . "</td>";
              echo "</tr>";
           }
           echo "</table>";
           echo "<hr>";
           echo "<h2>Media de los tickets: " . $tm->calculaMedia() . "</h2>";
        ?>
    </body>
</html>

