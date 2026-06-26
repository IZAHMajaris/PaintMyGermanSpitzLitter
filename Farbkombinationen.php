<?php

namespace Ausgabe;

class Farbkombinationen
{
    public function getCombinationsOfParents($formularWerteAufbereitet) {
        $combinations = [];

        if(isset($formularWerteAufbereitet) && array_key_exists('A', $formularWerteAufbereitet)) {
            foreach ($formularWerteAufbereitet['A'] as $lokus => $parentA) {
                $combinations[$lokus] = [
                    $parentA[0] . $formularWerteAufbereitet['B'][$lokus][0],
                    $parentA[0] . $formularWerteAufbereitet['B'][$lokus][1],
                    $parentA[1] . $formularWerteAufbereitet['B'][$lokus][0],
                    $parentA[1] . $formularWerteAufbereitet['B'][$lokus][1],
                ];
            }
        }

        return $combinations;
    }

    public function transform($name, $lokus){
        $result = [];
        foreach($lokus as $l){
            $result[] = getColorCodes[$name][$l]['name'];
        }

        return $result;

    }

    public function possibilitiesLokus($name, $ArrayLokus){
        $translate = $this->transform($name, $ArrayLokus);

        // 1. Gesamtzahl der Elemente ermitteln
        $gesamtAnzahl = count($translate);

        // 2. Vorkommen jedes Wertes zählen
        $vorkommen = array_count_values($translate);

        // 3. Prozentuale Verteilung berechnen
        $verteilung = [];
        foreach ($vorkommen as $wert => $anzahl) {
            $verteilung[$wert] = ($anzahl / $gesamtAnzahl) * 100;
        }

        return $verteilung;
    }

    private function hasMask($elokus) {
        foreach($elokus as $variant => $percent){
            if(array_key_exists($variant, getTranslation['E'])){
                return true;
            }
        }
        return false;
    }

    private function showsDominantBlack($combinationsParents) {
        return array_key_exists('keine phänotypische Ausprägung von rezzesivem Gelb', $this->possibilitiesLokus('E', $combinationsParents)) ||
            array_key_exists('Träger rezzesiv Gelb', $this->possibilitiesLokus('E', $combinationsParents)) ||
            array_key_exists('Schwarzmasken', $this->possibilitiesLokus('E', $combinationsParents)) ||
            array_key_exists('Träger Schwarzmaske', $this->possibilitiesLokus('E', $combinationsParents)) ||
            array_key_exists('Träger rezzesiv Gelb und Schwarzmaske', $this->possibilitiesLokus('E', $combinationsParents));
    }

    private function showsALokus($elokus) {

    }

    private function getKombinationsOfColor($lokus, $mix)
    {
        $kombinationen = [];

        var_dump($mix[$lokus]);

//        foreach($mix[$lokus] as $grundfarbe){
//
//        }

    }

    public function giveColorPossibilities2(array $formularWerteAufbereitet)
    {
        $content = '';

        $combinationsParents = $this->getCombinationsOfParents($formularWerteAufbereitet);

        $content .= '
            <div class="farbgenetik_content">
            <h4>Farbkombinationen der Nachkommen nach Wahrscheinlichkeit</h4>
        ';

        if(count($combinationsParents) !== 0) {
            $possibilitiesELokus = $this->possibilitiesLokus('E', $combinationsParents['E']);
            $probabilityOfMask = $this->hasMask($possibilitiesELokus);
            $possibilitiesKLokus = $this->possibilitiesLokus('K', $combinationsParents['K']);
            $possibilitiesALokus = $this->possibilitiesLokus('A', $combinationsParents['A']);

            $possibilitiesSLokus = $this->possibilitiesLokus('S', $combinationsParents['S']);
            $possibilitiesBLokus = $this->possibilitiesLokus('B', $combinationsParents['B']);
            $possibilitiesDLokus = $this->possibilitiesLokus('D', $combinationsParents['D']);
            $possibilitiesILokus = $this->possibilitiesLokus('I', $combinationsParents['I']);

            //--------------------------------------------- E-Lokus Start ---------------------------------------------//

            $content .= '<b>E-Lokus</b>
                            <table style="width: 100%;">';

            //E-Lokus
            foreach ($possibilitiesELokus as $wert => $prozent) {

                if($wert === 'rezzesiv Gelb'){

                    $content .=     '<td style="width: ' . $prozent . '%;">
                                        <b>' . $prozent . '% ' . $wert . '</b>
                                        '.$this->getKombinationsOfColor('E', $combinationsParents).'
                                    </td>';
                } else {
                    $content .= '<td style="width: ' . $prozent . '%; background-color:lightyellow"><b>' . $prozent . '% ' . $wert . '</b><br>' . '</td>';
                }
            }

            $content .= '</table><br>';

            //--------------------------------------------- E-Lokus Ende ---------------------------------------------//

            //--------------------------------------------- K-Lokus Start ---------------------------------------------//

            //K-Lokus
            if($this->showsDominantBlack($combinationsParents['E'])){
                $content .= '<b>K-Lokus</b>
                            <table style="width: 100%;">';
                foreach ($possibilitiesKLokus as $wert => $prozent) {



                    $content .=     '<td style="width: ' . $prozent . '%;">
                                    <b>' . $prozent . '% ' . $wert . '</b>
                                </td>';

                }
                $content .= '</table><br>';
            }

            //--------------------------------------------- K-Lokus Ende ---------------------------------------------//

            //--------------------------------------------- A-Lokus Start ---------------------------------------------//

            //A-Lokus
            if(array_key_exists('keine phänotypische Ausprägung von dominantem Schwarz', $this->possibilitiesLokus('K', $combinationsParents['K']))){
                $content .= '<b>A-Lokus</b>
                            <table style="width: 100%;">';

                foreach ($possibilitiesALokus as $wert => $prozent) {



                    $content .=     '<td style="width: ' . $prozent . '%;">
                                    <b>' . $prozent . '% ' . $wert . '</b>
                                </td>';


                }
                $content .= '</table><br>';
            }

            //--------------------------------------------- A-Lokus Ende ---------------------------------------------//

        }

        $content .= '
            </ul></div>
        ';

        return $content;
    }


}