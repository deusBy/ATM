<?php
function dvsn($dvd,$dvsr){
   $rem = $dvd % $dvsr;
   $qtnt = intdiv($dvd, $dvsr);
   return [$qtnt, $rem]; 
};

if (isset($_GET['amount'])) {
    if($_GET['amount'] < 0){
        echo "Неверная сумма. Введите положительное число";
    } else {
        $amount =  (int)$_GET['amount'];
        $remainder = $amount % 5;
        if ($remainder != 0) {
            $lessAmount = $_GET['amount'] - $remainder;
            $moreAmount = $lessAmount + 5;
            echo "Неверная сумма. Выберите: <b>" . $lessAmount . '</b> или <b>' . $moreAmount . '</b><br />';
        } else {
            echo "Ваша сумма: <b>" . $amount . "</b><br />";
            [$note500, $am200] = dvsn($amount, 500);

            echo '<table class="table-warning table-bordered border-primary"><tr><th>Номинал</th><th>Количество</th></tr>';
            echo "<tr><td>500</td><td>" . $note500 ." </td></tr>";

            [$note200, $am100] = dvsn($am200, 200);
            echo "<tr><td>200 </td><td>" . $note200 ."</td></tr>";  

            [$note100, $am50] = dvsn($am100, 100);
            echo "<tr><td>100</td><td>" . $note100 ."</td></tr>"; 

            [$note50, $am20] = dvsn($am50, 50);
            echo "<tr><td>50</td><td>" . $note50 ."</td></tr>"; 

            [$note20, $am10] = dvsn($am20, 20);
            echo "<tr><td>20</td><td>" . $note20 ."</td></tr>"; 

            [$note10, $am5] = dvsn($am10, 10);
            echo "<tr><td>20</td><td>" . $note10 ."</td></tr>"; 

            [$note5, $am5] = dvsn($am5, 5);
            echo "<tr><td>5</td><td>" . $note5 ."</td></tr></table>"; 
        }
    }
}
