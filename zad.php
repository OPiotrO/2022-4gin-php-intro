<?php
    $dane = 'Et illum accusantium et pariatur culpa non odit assumenda et nesciunt modi. Eos dolorum veritatis quo tenetur voluptas aut natus enim qui pariatur galisum est dolorem inventore. Ut aliquam deserunt ut quia itaque et nisi quaerat. Eos nulla doloremque sit reprehenderit magni non velit amet et quam officiis sit exercitationem adipisci ut possimus impedit. Et expedita saepe est numquam explicabo et doloremque enim ut totam iure ut aperiam voluptatem in nostrum quidem id natus omnis. Non quis neque ex itaque molestiae qui neque nesciunt. Ex possimus voluptas qui iste provident id dignissimos obcaecati ut repellendus quibusdam ut modi maiores qui consectetur enim sed illo quae.';
    $tablica = explode(' ',$dane);

    $input = $_POST['input'];
    if ($input == NULL){
        natcasesort($tablica);
        print_r($tablica);
    } else {
        foreach($tablica as $word){
            if( strpos($word, $input) !== false){
                $matches[] = $word;
            }
        }
        natcasesort($matches);
        print_r($matches);
    }
    function renderHTMLTable($tablica, $kolumny) {
        $li_slow = count($tablica);
        $li_4 = ceil($li_slow/4);
        $j = 0;
        echo '<table>';
        for ($h = 0; $h < $li_4; $h++){
            echo '<tr>';
            for ($i = 0; $i < $kolumny; $i++) {
                echo '<td>';
                if ($j < $li_slow){
                    echo $tablica[$j];
                    $j=$j+1;
                };
                echo '</td>';
            };
            echo '</tr>';
        };
        echo '</table>';
    }

    $kolumny = 4;
    renderHTMLTable($tablica, $kolumny);
?>

<style>
table, th, td {
  border: 1px solid;
  border-collapse: collapse;
}
</style>