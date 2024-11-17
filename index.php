<?

require 'conn.php';
// json в бд сохраняем как тип данных текст
function arrrec($arr)
{
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            arrrec($v);
        } else {
            echo "$v</br>";
        }
    }
}

$data = file_get_contents('https://jsonplaceholder.typicode.com/users');
json_decode($data, true);
// print_r($data);

if (isset($data)) {
    // "INSERT INTO datafield (field) VALUES ('$data')";

    // print_r($data);

    // $sql = 'SELECT field FROM datafield';

    $sql = "INSERT INTO datafield (fieldfield) VALUES (?)";
    $res = $pdo->prepare($sql);
    $res->execute([$data]);

    $sql = 'SELECT fieldfield FROM datafield';
    $res = $pdo->prepare($sql);
    $res->execute();
    $datas = $res->fetch(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // print_r($datas);
    // echo '</pre>';

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <button type="submit">enter</button>
    </form>


    <!-- <? var_dump($datas) ?> -->
    <!-- <? print_r(json_encode($datas)) ?> -->
    <?
    // json в бд сохраняем как тип данных текст
    foreach ($datas as $k => $v) {
        
        $v = json_decode($v, true);
         echo '<pre>';
        print_r($v);
         echo '</pre>';
        foreach($v as $item){
            echo'имя: '. $item['name'].'</br>';
            echo'улица: '. $item['address']['street'].'</br>';
        }
    }
    ?>


</body>

</html>