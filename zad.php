<?php

$dane = 'Et illum accusantium et pariatur culpa non odit assumenda et nesciunt modi. Eos dolorum veritatis quo tenetur voluptas aut natus enim qui pariatur galisum est dolorem inventore. Ut aliquam deserunt ut quia itaque et nisi quaerat.
Eos nulla doloremque sit reprehenderit magni non velit amet et quam officiis sit exercitationem adipisci ut possimus impedit. Et expedita saepe est numquam explicabo et doloremque enim ut totam iure ut aperiam voluptatem in nostrum quidem id natus omnis.
Non quis neque ex itaque molestiae qui neque nesciunt. Ex possimus voluptas qui iste provident id dignissimos obcaecati ut repellendus quibusdam ut modi maiores qui consectetur enim sed illo quae.';
$array = explode(' ',$dane);

$input = $_POST['input'];
if ($input == NULL){
    natcasesort($array);
    print_r($array);
} else {
    foreach($array as $word){
        if( strpos($word, $input) !== false){
        $matches[] = $word;
        }
    }
    natcasesort($matches);
    print_r($matches);
}
$kolumny = 4;
$h = 4;
$li_array = count($array);
$li_4 = ceil($li_array/4);
$j = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lorem ipsum</title>
    </head>
    <body>
        <table>
        <?php    
        for ($h = 0; $h < $li_4; $h++){
        echo '<tr>';
            for ($i = 0; $i < $kolumny; $i++) {
            echo '<td>';
                if ($j < $li_array){
                echo $array[$j];
                $j=$j+1;
                };
            echo '</td>';
            };
        echo '</tr>';
        };
        ?>
        </table>
    </body>
</html>
<style>
table, th, td {
  border: 1px solid;
  border-collapse: collapse;
}
</style>