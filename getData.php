<?php
    session_start();
    include_once 'dbConfig.php';

    $sql = "SELECT * FROM result";
    $result = mysqli_query($db, $sql);
    $masterarray = array();
    $mbarcodearray = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $master = $row["Master"];
            $mbarcode = $row["MBarcode"];
            // echo $master . "<br>";
            array_push($masterarray,$master,);
            array_push($mbarcodearray,$mbarcode,);
        }
    } else {
        echo "0 results";
    }
    // print_r($masterarray);
    mysqli_close($db);

    $listItems = "";
    $i = 0;
    $j = 0;
    while ($i < count($masterarray)) {
        while ($j < count($mbarcodearray)) {
            $listItems .= "<tr><td>" . $masterarray[$i] ."</td>" . "<td>" . $mbarcodearray[$j] . "</td>" ."</td>";
            $i++;
            $j++;
        }
    }

    $html = <<<EOT
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>MBarcode</th>
                </tr>
            </thead>
            <tbody>
                $listItems
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">รวม 3 รายการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
    EOT;

    echo $html;
?>