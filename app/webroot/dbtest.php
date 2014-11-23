<html>
    <head>
        <title></title>
    </head>
    <body>
<?php
//データベースのインスタンス名を指定
$serverName = "BLESS-DIG\SQLEXPRESS";
//接続情報を指定
$connectionInfo = array("UID"=>"sa",
                "PWD"=>"hatopass",
                "Database"=>"HATO_ST",
                "CharacterSet"=>"UTF-8");
//コネクションを確立
$conn = sqlsrv_connect($serverName, $connectionInfo);
print_r( sqlsrv_errors(), true);
//クエリー文を指定
$tsql = "SELECT * from M_AREA";
//クエリーを実行
$result = sqlsrv_query($conn, $tsql);
?>
  <table>
<caption>スタッフリスト</caption>
<?php
    //実行結果を描画
    while($row = sqlsrv_fetch_array($result)) {
         printf("<tr><td class='hdr'>".$row['id']."</td>");
        printf("<td>".$row['name']."</td></tr>");
    }
?>
</table>
<?php
//クエリー結果の開放
sqlsrv_free_stmt($result);
//コネクションのクローズ
sqlsrv_close($conn);
?>
    </body>
</html>