<?php
//使用pdo连接操作数据库
try {
    $dsn = 'mysql:host=localhost;dbname=luluyii';
    $pdo = new PDO($dsn,'root','mhba82264322');
}catch (PDOException $e){
    echo $e->getMessage();
}
$todayZeroTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
$sql = "SELECT COUNT(*) FROM lulu_user_visit WHERE visit_time > ".$todayZeroTime;
$stmt = $pdo->query($sql);
foreach ($stmt as $row){
    $num = $row['0'];
    //关闭pdo连接
    $pdo = null; 
}
$visit = fopen('visit.txt', 'a');
$date = date('Y-m-d',time());
fwrite($visit, $date.':'.$num."人访问\n");
fclose($visit);
