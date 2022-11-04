<?php
require_once "tableTool.interface.php";

class tableTool implements tableToolInterface{
    var $table;
    public function __construct($data){
        $this->table=$data;
    }
    private function sortowanie($input){
        $matches=array();
        sort($this->table, SORT_NATURAL | SORT_FLAG_CASE);
        foreach($this->table as $word){
            if( strstr($word, $input) == true){
                $matches[] = $word;
            }
        }
        return $matches;
    }
    public function renderHTML($cols, $filterString='') {
        $posortowane = $this->sortowanie($filterString);
        $li_slow = count($posortowane);
        $li_wier = ceil($li_slow/$cols);
        $j = 0;
        $tabelka= '<table class="html">';
        for ($h = 0; $h < 1; $h++){
            $tabelka .= '<tr class="html">';
            for ($i = 0; $i < $cols; $i++) {
                $tabelka .= '<th class="html">';
                if ($j < $li_slow){
                    $tabelka .= $posortowane[$j];
                    $j=$j+1;
                };
                $tabelka .= '</th>';
            };
            $tabelka .= '</tr>';
        };
        for ($h = 1; $h < $li_wier; $h++){
            $tabelka .= '<tr class="html">';
            for ($i = 0; $i < $cols; $i++) {
                $tabelka .= '<td class="html">';
                if ($j < $li_slow){
                    $tabelka .= $posortowane[$j];
                    $j=$j+1;
                };
                $tabelka .= '</td>';
            };
            $tabelka .= '</tr>';
        };
        $tabelka .= '</table>';
        return $tabelka;
    }
    public function renderCSV($cols, $filterString='') {
        $posortowane = $this->sortowanie($filterString);
        $li_slow = count($posortowane);
        $li_wier = ceil($li_slow/$cols);
        $j = 0;
        $tabelka= '<table>';
        for ($h = 0; $h < $li_wier; $h++){
            $tabelka .= '<tr>';
            for ($i = 0; $i < $cols; $i++) {
                $tabelka .= '<td>';
                if ($j < $li_slow){
                    $tabelka .= '"';
                    $tabelka .= $posortowane[$j];
                    $tabelka .= '";';
                    $j=$j+1;
                };
                $tabelka .= '</td>';
            };
            $tabelka .= '</tr>';
        };
        $tabelka .= '</table>';
        return $tabelka;
    }
    public function renderMD($cols, $filterString='') {
        $posortowane = $this->sortowanie($filterString);
        $li_slow = count($posortowane);
        $li_wier = ceil($li_slow/$cols);
        $j = 0;
        $tabelka= '<table>';
        for ($h = 0; $h < 1; $h++){
            $tabelka .= '<tr>';
            for ($i = 0; $i < $cols; $i++) {
                $tabelka .= '<td>';
                if ($j < $li_slow){
                    $tabelka .= '|';
                    $tabelka .= $posortowane[$j];
                    $j=$j+1;
                };
                $tabelka .= '<br>';
                $tabelka .= '|---|';
                $tabelka .= '</td>';
            };

            $tabelka .= '</tr>';
        };
        for ($h = 1; $h < $li_wier; $h++){
            $tabelka .= '<tr>';
            for ($i = 0; $i < $cols; $i++) {
                $tabelka .= '<td>';
                if ($j < $li_slow){
                    $tabelka .= '|';
                    $tabelka .= $posortowane[$j];
                    $j=$j+1;
                };
                $tabelka .= '</td>';
            };
            $tabelka .= '</tr>';
        };
        $tabelka .= '</table>';
        return $tabelka;
    }
  }

// NIE DOTYKAĆ KODU PONIŻEJ TEJ LINIJKI

$array = explode(' ', file_get_contents('lorem.txt'));

$table = new tableTool($array);

// Tests
echo $table->renderHTML(3);
echo $table->renderHTML(10);
echo $table->renderHTML(5,'id');
echo $table->renderCSV(3);
echo $table->renderCSV(10);
echo $table->renderCSV(5,'id');
echo $table->renderMD(3);
echo $table->renderMD(10);
echo $table->renderMD(5,'id');