<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabela i javascript</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
    <body onload = "columnWBut()">
        <?php
            $dane = 'Et illum accusantium et pariatur culpa non odit assumenda et nesciunt modi. Eos dolorum veritatis quo tenetur voluptas aut natus enim qui pariatur galisum est dolorem inventore. Ut aliquam deserunt ut quia itaque et nisi quaerat. Eos nulla doloremque sit reprehenderit magni non velit amet et quam officiis sit exercitationem adipisci ut possimus impedit. Et expedita saepe est numquam explicabo et doloremque enim ut totam iure ut aperiam voluptatem in nostrum quidem id natus omnis. Non quis neque ex itaque molestiae qui neque nesciunt. Ex possimus voluptas qui iste provident id dignissimos obcaecati ut repellendus quibusdam ut modi maiores qui consectetur enim sed illo quae.';
            $tablica = explode(' ',$dane);

            $input = $_POST['input'];
            if ($input == NULL){
                natcasesort($tablica);
            } else {
                foreach($tablica as $word){
                    if( strpos($word, $input) !== false){
                        $matches[] = $word;
                    }
                }
                natcasesort($matches);
            }
            function renderHTMLTable($tablica, $kolumny) {
                $li_slow = count($tablica);
                $li_4 = ceil($li_slow/4);
                $j = 0;
                echo '<table class="html">';
                for ($h = 0; $h < $li_4; $h++){
                    echo '<tr class="html" onmouseover="Change(this)" onmouseout="Restore(this)">';
                    for ($i = 0; $i < $kolumny; $i++) {
                        echo '<td class="html" id="tab">';
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
    </body>
</html>
<script type="text/javascript">
    var TableBackgroundNormalColor = "#ffffff";
    var TableBackgroundMouseoverColor = "#eddc1f";

    function Change(row) {
        var element = document.getElementsByName(tab);
        row.style.backgroundColor = TableBackgroundMouseoverColor ; 
        row.style.fontWeight = "bold";
    }
    function Restore(row) { 
        var element = document.getElementsByName(tab);
        row.style.backgroundColor = TableBackgroundNormalColor ;
        row.style.fontWeight = "normal";
    }
</script>


