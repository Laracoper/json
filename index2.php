<?
require 'conn.php';
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

$data = [
    'name' => 'alex',
    'bio' => [
        'sex' => 'man',
        'woman' => true,
        'addres' => [
            'city' => 'london',
            'country' => 'great britan'
        ],
    ],

    'age' => 43,
    'phone' => 34 - 567 - 756 - 45
];

$json = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/users'),true);
function debug($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// debug($json);
// arrrec($json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?
    // arrrec($json)
    // debug($json)
    foreach ($json as $el){
        echo $el['address']['geo']['lat'] .'<br>';
    }
    ?>
</body>
</html>

