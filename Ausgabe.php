<?php

namespace Ausgabe;

include 'Helper.php';
include 'Farbkombinationen.php';
use Ausgabe\Helper;
use Ausgabe\Farbkombinationen;

const savedDogs = [
    'none' =>[
        'name' => 'Hund A'
    ],
    'galahad' => [
        'name' => 'Lord Galahad von Jaluk Aurora',
        'E' => ['N', 'e1'],
        'K' => ['ky','ky'],
        'A' => ['DY','DY'],
        'B' => ['N','bs'],
        'D' => ['N','N'],
        'I' => ['i','i'],
        'S' => ['N','S']
    ],
    'ivo-wunjo' => [
        'name' => 'Ivo-Wunjo von Jaluk Aurora',
        'E' => ['N', 'e1'],
        'K' => ['ky', 'ky'],
        'A' => ['BB', 'BB'],
        'B' => ['N', 'N'],
        'D' => ['N', 'N'],
        'I' => ['i', 'i'],
        'S' => ['N', 'N'],
    ],
    'aslan' => [
        'name' => 'Aslan von der Roßsteige',
        'E' => ['N', 'e1'],
        'K' => ['ky', 'ky'],
        'A' => ['BB', 'BB'],
        'B' => ['N', 'bs'],
        'D' => ['N', 'N'],
        'I' => ['I', 'i'],
        'S' => ['N', 'N'],
    ],
];

class Ausgabe
{
    private function splitLoki($lokus, $random){
        return getColorCodes[$lokus][$random]['split'];
    }


    private function zufallPartner(){
        $werte = [];

        $werte['E'] = $this->splitLoki('E', array_rand(getColorCodes['E']));
        $werte['K'] = $this->splitLoki('K', array_rand(getColorCodes['K']));
        $werte['A'] = $this->splitLoki('A', array_rand(getColorCodes['A']));
        $werte['B'] = $this->splitLoki('B', array_rand(getColorCodes['B']));
        $werte['D'] = $this->splitLoki('D', array_rand(getColorCodes['D']));
        $werte['I'] = $this->splitLoki('I', array_rand(getColorCodes['I']));
        $werte['S'] = $this->splitLoki('S', array_rand(getColorCodes['S']));

        return $werte;
    }

    private function getImageOfParent($lokiParent): string
    {
        $result = "";
        $grundfarbe = '';
        $ilokus = '';
        $subcolor = '';
        $maske = '';
        $scheckung = '';
        $isabella = 0;

        //A-Lokus
        if(array_key_exists(getColorCodes['A'][$lokiParent['A'][0].$lokiParent['A'][1]]['name'], getGrundfarben)) {
            $grundfarbe = getGrundfarben[getColorCodes['A'][$lokiParent['A'][0] . $lokiParent['A'][1]]['name']];
        }
        //K-Lokus
        if(array_key_exists(getColorCodes['K'][$lokiParent['K'][0].$lokiParent['K'][1]]['name'], getGrundfarben)) {
            $grundfarbe = getGrundfarben[getColorCodes['K'][$lokiParent['K'][0] . $lokiParent['K'][1]]['name']];
        }

        //E-Lokus
        if(array_key_exists(getColorCodes['E'][$lokiParent['E'][0].$lokiParent['E'][1]]['name'], getGrundfarben)) {
            $grundfarbe = getGrundfarben[getColorCodes['E'][$lokiParent['E'][0] . $lokiParent['E'][1]]['name']];


        } else {
            if(getColorCodes['E'][$lokiParent['E'][0].$lokiParent['E'][1]]['name'] === 'Schwarzmasken' ||
                getColorCodes['E'][$lokiParent['E'][0].$lokiParent['E'][1]]['name'] === 'Träger rezzesiv Gelb und Schwarzmaske' ||
                getColorCodes['E'][$lokiParent['E'][0].$lokiParent['E'][1]]['name'] === 'Träger Schwarzmaske'){
                $maske = '_maske';
            }
        }

        //I-Lokus
        if($grundfarbe !== 'Schwarz'){
            $ilokus = '_'.getTranslation['I'][getColorCodes['I'][$lokiParent['I'][0].$lokiParent['I'][1]]['name']];
        }

        //B-Lokus
        if(getTranslation['B'][getColorCodes['B'][$lokiParent['B'][0].$lokiParent['B'][1]]['name']] !== ''){
            if($grundfarbe === 'Schwarz'){
                $grundfarbe = 'Braun';
                $isabella++;
            } else if($grundfarbe === 'Orange' && $maske !== '') {
                $subcolor = '_braun';
                $isabella++;
            } else {
                if($grundfarbe === 'rezessiv_gelb'){
                    $subcolor = '';
                } else if($grundfarbe === 'Orange'){
                    $subcolor = '';
                }else{
                    $subcolor = '_braun';
                    $isabella++;
                }
            }
        }

        //D-Lokus
        if(getTranslation['D'][getColorCodes['D'][$lokiParent['D'][0].$lokiParent['D'][1]]['name']] !== ''){
            if($grundfarbe === 'Schwarz' || $grundfarbe === 'Braun'){
                $grundfarbe = 'Silver';
                $isabella++;
            } else if($grundfarbe === 'Orange' && $maske !== '') {
                $subcolor = '_braun';
                $isabella++;
            }else if($grundfarbe === 'rezessiv_gelb'){
                $subcolor = '';
            } else if($grundfarbe === 'Orange'){
                $subcolor = '';
            }else{
                $subcolor = '_dilute';
                $isabella++;
            }
        }

        if($isabella === 2){
            if($grundfarbe === 'Schwarz' || $grundfarbe === 'Braun' || $grundfarbe === 'Silver'){
                $grundfarbe = 'Isabella';
            }else if($grundfarbe === 'Orange' && $maske !== '') {
                $subcolor = '_braun';
                $isabella++;
            }else{
                $subcolor = '_isabella';
            }

        }

        //S-Lokus
        if(getTranslation['S'][getColorCodes['S'][$lokiParent['S'][0].$lokiParent['S'][1]]['name']] !== ''){
            $scheckung = '_'.getTranslation['S'][getColorCodes['S'][$lokiParent['S'][0].$lokiParent['S'][1]]['name']];
        }

        if(in_array($grundfarbe, ['Schwarz', 'Braun', 'Silver', 'Isabella'])){
            $maske = '';
        }

        $result .= '<img class="simpleDogImagesMain" src="/images/'.$grundfarbe.$ilokus.$subcolor.$maske.$scheckung.'.jpg"/>';
        return $result;
    }

    private function buildFormular($formularWerte, $formularWerteAufbereitet)
    {
        $selected = "selected";
        $false = "false";

        $formularArray = [
            'eLokus_Hund_1_1' => ['none' => '', 'N' => '', 'EM' => '', 'e1' => ''],
            'eLokus_Hund_1_2' => ['none' => '', 'N' => '', 'EM' => '', 'e1' => ''],
            'eLokus_Hund_2_1' => ['none' => '', 'N' => '', 'EM' => '', 'e1' => ''],
            'eLokus_Hund_2_2' => ['none' => '', 'N' => '', 'EM' => '', 'e1' => ''],
            'kLokus_Hund_1_1' => ['none' => '', 'Kb' => '', 'ky' => ''],
            'kLokus_Hund_1_2' => ['none' => '', 'Kb' => '', 'ky' => ''],
            'kLokus_Hund_2_1' => ['none' => '', 'Kb' => '', 'ky' => ''],
            'kLokus_Hund_2_2' => ['none' => '', 'Kb' => '', 'ky' => ''],
            'aLokus_Hund_1_1' => ['none' => '', 'DY' => '', 'SY' => '', 'AG' => '', 'BS' => '', 'BB' => '', 'a' => ''],
            'aLokus_Hund_1_2' => ['none' => '', 'DY' => '', 'SY' => '', 'AG' => '', 'BS' => '', 'BB' => '', 'a' => ''],
            'aLokus_Hund_2_1' => ['none' => '', 'DY' => '', 'SY' => '', 'AG' => '', 'BS' => '', 'BB' => '', 'a' => ''],
            'aLokus_Hund_2_2' => ['none' => '', 'DY' => '', 'SY' => '', 'AG' => '', 'BS' => '', 'BB' => '', 'a' => ''],
            'bLokus_Hund_1_1' => ['none' => '', 'N' => '', 'bd' => '', 'bc' => '', 'bs' => ''],
            'bLokus_Hund_1_2' => ['none' => '', 'N' => '', 'bd' => '', 'bc' => '', 'bs' => ''],
            'bLokus_Hund_2_1' => ['none' => '', 'N' => '', 'bd' => '', 'bc' => '', 'bs' => ''],
            'bLokus_Hund_2_2' => ['none' => '', 'N' => '', 'bd' => '', 'bc' => '', 'bs' => ''],
            'dLokus_Hund_1_1' => ['none' => '', 'N' => '', 'd1' => ''],
            'dLokus_Hund_1_2' => ['none' => '', 'N' => '', 'd1' => ''],
            'dLokus_Hund_2_1' => ['none' => '', 'N' => '', 'd1' => ''],
            'dLokus_Hund_2_2' => ['none' => '', 'N' => '', 'd1' => ''],
            'iLokus_Hund_1_1' => ['none' => '', 'I' => '', 'i' => ''],
            'iLokus_Hund_1_2' => ['none' => '', 'I' => '', 'i' => ''],
            'iLokus_Hund_2_1' => ['none' => '', 'I' => '', 'i' => ''],
            'iLokus_Hund_2_2' => ['none' => '', 'I' => '', 'i' => ''],
            'sLokus_Hund_1_1' => ['none' => '', 'N' => '', 'S' => ''],
            'sLokus_Hund_1_2' => ['none' => '', 'N' => '', 'S' => ''],
            'sLokus_Hund_2_1' => ['none' => '', 'N' => '', 'S' => ''],
            'sLokus_Hund_2_2' => ['none' => '', 'N' => '', 'S' => ''],
            'savesDogA' => ['none' => '', 'galahad' => '', 'ivo-wunjo' => '', 'aslan' => ''],
            'random' => ['no' => '', 'yes' => ''],
        ];

        $dogName = (array_key_exists('savesDogA', $formularWerte))?savedDogs[$formularWerte['savesDogA']]:'';

//        if(array_key_exists('savesDogA', $formularWerte) && $formularWerte['savesDogA'] !== 'none'){
//            $formularWerte['eLokus_Hund_1_1'] = $dogName['E'][0];
//            $formularWerte['eLokus_Hund_1_2'] = $dogName['E'][1];
//            $formularWerte['kLokus_Hund_1_1'] = $dogName['K'][0];
//            $formularWerte['kLokus_Hund_1_2'] = $dogName['K'][1];
//            $formularWerte['aLokus_Hund_1_1'] = $dogName['A'][0];
//            $formularWerte['aLokus_Hund_1_2'] = $dogName['A'][1];
//            $formularWerte['bLokus_Hund_1_1'] = $dogName['B'][0];
//            $formularWerte['bLokus_Hund_1_2'] = $dogName['B'][1];
//            $formularWerte['dLokus_Hund_1_1'] = $dogName['D'][0];
//            $formularWerte['dLokus_Hund_1_2'] = $dogName['D'][1];
//            $formularWerte['iLokus_Hund_1_1'] = $dogName['I'][0];
//            $formularWerte['iLokus_Hund_1_2'] = $dogName['I'][1];
//            $formularWerte['sLokus_Hund_1_1'] = $dogName['S'][0];
//            $formularWerte['sLokus_Hund_1_2'] = $dogName['S'][1];
//            $formularWerte['savesDogA'] = 'none';
//        }
//
//        if(array_key_exists('random', $formularWerte) && $formularWerte['random'] === 'yes'){
//            $random = $this->zufallPartner();
//            $formularWerte['eLokus_Hund_2_1'] = $random['E'][0];
//            $formularWerte['eLokus_Hund_2_2'] = $random['E'][1];
//            $formularWerte['kLokus_Hund_2_1'] = $random['K'][0];
//            $formularWerte['kLokus_Hund_2_2'] = $random['K'][1];
//            $formularWerte['aLokus_Hund_2_1'] = $random['A'][0];
//            $formularWerte['aLokus_Hund_2_2'] = $random['A'][1];
//            $formularWerte['bLokus_Hund_2_1'] = $random['B'][0];
//            $formularWerte['bLokus_Hund_2_2'] = $random['B'][1];
//            $formularWerte['dLokus_Hund_2_1'] = $random['D'][0];
//            $formularWerte['dLokus_Hund_2_2'] = $random['D'][1];
//            $formularWerte['iLokus_Hund_2_1'] = $random['I'][0];
//            $formularWerte['iLokus_Hund_2_2'] = $random['I'][1];
//            $formularWerte['sLokus_Hund_2_1'] = $random['S'][0];
//            $formularWerte['sLokus_Hund_2_2'] = $random['S'][1];
//            $formularWerte['random'] = 'no';
//        }

        foreach($formularWerte as $key => $wert){
            $formularArray[$key][$wert] = 'selected="selected"';
        }

        $show_parent_a = '';
        $show_parent_b = '';

        var_dump($formularWerteAufbereitet['A']); echo '<br><br>';

        if (!empty($formularWerteAufbereitet)) {
            $show_parent_a = $this->getImageOfParent($formularWerteAufbereitet['A']);
            $show_parent_b = $this->getImageOfParent($formularWerteAufbereitet['B']);
        }

        $bezeichnung = ($dogName !== '') ? $dogName['name'] :'Hund A';

        $formular = '
            <div class="farbgenetik_content_genetikrechner">
                <form action="index_genetikrechner.php" method="post">
                
                    <table>
                        <tr>
                            <th>Lokus</th>
                            <th colspan="2">'.$bezeichnung.'</th>
                            <th colspan="2">Hund B</th>
                        </tr>
                        <tr>
                            <td>E Lokus</td>
                            <td>
                                <select name="eLokus_Hund_1_1" id="eLokus_Hund_1_1">
                                    <option value="N" '.$formularArray['eLokus_Hund_1_1']['N'].'>N(E)</option>
                                    <option value="EM" '.$formularArray['eLokus_Hund_1_1']['EM'].'>EM(Schwarzmaske)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_1_1']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_1_2" id="eLokus_Hund_1_2">
                                    <option value="N" '.$formularArray['eLokus_Hund_1_2']['N'].'>N(E)</option>
                                    <option value="EM" '.$formularArray['eLokus_Hund_1_2']['EM'].'>EM(Schwarzmaske)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_1_2']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_2_1" id="eLokus_Hund_2_1">
                                    <option value="N" '.$formularArray['eLokus_Hund_2_1']['N'].'>N(E)</option>
                                    <option value="EM" '.$formularArray['eLokus_Hund_2_1']['EM'].'>EM(Schwarzmaske)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_2_1']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_2_2" id="eLokus_Hund_2_2">
                                    <option value="N" '.$formularArray['eLokus_Hund_2_2']['N'].'>N(E)</option>
                                    <option value="EM" '.$formularArray['eLokus_Hund_2_2']['EM'].'>EM(Schwarzmaske)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_2_2']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>K Lokus</td>
                            <td>
                                <select name="kLokus_Hund_1_1" id="kLokus_Hund_1_1">
                                    <option value="Kb" '.$formularArray['kLokus_Hund_1_1']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_1_1']['ky'].'>ky</option>
                                </select>
                            </td>
                            <td>
                                <select name="kLokus_Hund_1_2" id="kLokus_Hund_1_2">
                                    <option value="Kb" '.$formularArray['kLokus_Hund_1_2']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_1_2']['ky'].'>ky</option>
                                </select>
                            </td>
                            <td>
                                <select name="kLokus_Hund_2_1" id="kLokus_Hund_2_1">
                                    <option value="Kb" '.$formularArray['kLokus_Hund_2_1']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_2_1']['ky'].'>ky</option>
                                </select>
                            </td>
                            <td>
                                <select name="kLokus_Hund_2_2" id="kLokus_Hund_2_2">
                                    <option value="Kb" '.$formularArray['kLokus_Hund_2_2']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_2_2']['ky'].'>ky</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>A Lokus</td>
                            <td>
                                <select name="aLokus_Hund_1_1" id="aLokus_Hund_1_1">
                                    <option value="DY" '.$formularArray['aLokus_Hund_1_1']['DY'].'>DY(Ay)</option>
                                    <option value="SY" '.$formularArray['aLokus_Hund_1_1']['SY'].'>SY(Ay)</option>
                                    <option value="AG" '.$formularArray['aLokus_Hund_1_1']['AG'].'>AG(Aw)</option>
                                    <option value="BS" '.$formularArray['aLokus_Hund_1_1']['BS'].'>BS(at)</option>
                                    <option value="BB" '.$formularArray['aLokus_Hund_1_1']['BB'].'>BB(at)</option>
                                    <option value="a" '.$formularArray['aLokus_Hund_1_1']['a'].'>a</option>
                                </select>
                            </td>
                            <td>
                                <select name="aLokus_Hund_1_2" id="aLokus_Hund_1_2">
                                    <option value="DY" '.$formularArray['aLokus_Hund_1_2']['DY'].'>DY(Ay)</option>
                                    <option value="SY" '.$formularArray['aLokus_Hund_1_2']['SY'].'>SY(Ay)</option>
                                    <option value="AG" '.$formularArray['aLokus_Hund_1_2']['AG'].'>AG(Aw)</option>
                                    <option value="BS" '.$formularArray['aLokus_Hund_1_2']['BS'].'>BS(at)</option>
                                    <option value="BB" '.$formularArray['aLokus_Hund_1_2']['BB'].'>BB(at)</option>
                                    <option value="a" '.$formularArray['aLokus_Hund_1_2']['a'].'>a</option>
                                </select>
                            </td>
                            <td>
                                <select name="aLokus_Hund_2_1" id="aLokus_Hund_2_1">
                                    <option value="DY" '.$formularArray['aLokus_Hund_2_1']['DY'].'>DY(Ay)</option>
                                    <option value="SY" '.$formularArray['aLokus_Hund_2_1']['SY'].'>SY(Ay)</option>
                                    <option value="AG" '.$formularArray['aLokus_Hund_2_1']['AG'].'>AG(Aw)</option>
                                    <option value="BS" '.$formularArray['aLokus_Hund_2_1']['BS'].'>BS(at)</option>
                                    <option value="BB" '.$formularArray['aLokus_Hund_2_1']['BB'].'>BB(at)</option>
                                    <option value="a" '.$formularArray['aLokus_Hund_2_1']['a'].'>a</option>
                                </select>
                            </td>
                            <td>
                                <select name="aLokus_Hund_2_2" id="aLokus_Hund_2_2">
                                    <option value="DY" '.$formularArray['aLokus_Hund_2_2']['DY'].'>DY(Ay)</option>
                                    <option value="SY" '.$formularArray['aLokus_Hund_2_2']['SY'].'>SY(Ay)</option>
                                    <option value="AG" '.$formularArray['aLokus_Hund_2_2']['AG'].'>AG(Aw)</option>
                                    <option value="BS" '.$formularArray['aLokus_Hund_2_2']['BS'].'>BS(at)</option>
                                    <option value="BB" '.$formularArray['aLokus_Hund_2_2']['BB'].'>BB(at)</option>
                                    <option value="a" '.$formularArray['aLokus_Hund_2_2']['a'].'>a</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>B Lokus</td>
                            <td>
                                <select name="bLokus_Hund_1_1" id="bLokus_Hund_1_1">
                                    <option value="N" '.$formularArray['bLokus_Hund_1_1']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_1_1']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_1_1']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_1_1']['bs'].'>bs</option>
                                </select>
                            </td>
                            <td>
                                <select name="bLokus_Hund_1_2" id="bLokus_Hund_1_2">
                                    <option value="N" '.$formularArray['bLokus_Hund_1_2']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_1_2']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_1_2']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_1_2']['bs'].'>bs</option>
                                </select>
                            </td>
                            <td>
                                <select name="bLokus_Hund_2_1" id="bLokus_Hund_2_1">
                                    <option value="N" '.$formularArray['bLokus_Hund_2_1']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_2_1']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_2_1']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_2_1']['bs'].'>bs</option>
                                </select>
                            </td>
                            <td>
                                <select name="bLokus_Hund_2_2" id="bLokus_Hund_2_2">
                                    <option value="N" '.$formularArray['bLokus_Hund_2_2']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_2_2']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_2_2']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_2_2']['bs'].'>bs</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>D Lokus</td>
                            <td>
                                <select name="dLokus_Hund_1_1" id="dLokus_Hund_1_1">
                                    <option value="N" '.$formularArray['dLokus_Hund_1_1']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_1_1']['d1'].'>d1</option>
                                </select>
                            </td>
                            <td>
                                <select name="dLokus_Hund_1_2" id="dLokus_Hund_1_2">
                                    <option value="N" '.$formularArray['dLokus_Hund_1_2']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_1_2']['d1'].'>d1</option>
                                </select>
                            </td>
                            <td>
                                <select name="dLokus_Hund_2_1" id="dLokus_Hund_2_1">
                                    <option value="N" '.$formularArray['dLokus_Hund_2_1']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_2_1']['d1'].'>d1</option>
                                </select>
                            </td>
                            <td>
                                <select name="dLokus_Hund_2_2" id="dLokus_Hund_2_2">
                                    <option value="N" '.$formularArray['dLokus_Hund_2_2']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_2_2']['d1'].'>d1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I Lokus</td>
                            <td>
                                <select name="iLokus_Hund_1_1" id="iLokus_Hund_1_1">
                                    <option value="I" '.$formularArray['iLokus_Hund_1_1']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_1_1']['i'].'>i</option>
                                </select>
                            </td>
                            <td>
                                <select name="iLokus_Hund_1_2" id="iLokus_Hund_1_2">
                                    <option value="I" '.$formularArray['iLokus_Hund_1_2']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_1_2']['i'].'>i</option>
                                </select>
                            </td>
                            <td>
                                <select name="iLokus_Hund_2_1" id="iLokus_Hund_2_1">
                                    <option value="I" '.$formularArray['iLokus_Hund_2_1']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_2_1']['i'].'>i</option>
                                </select>
                            </td>
                            <td>
                                <select name="iLokus_Hund_2_2" id="iLokus_Hund_2_2">
                                    <option value="I" '.$formularArray['iLokus_Hund_2_2']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_2_2']['i'].'>i</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>S Lokus</td>
                            <td>
                                <select name="sLokus_Hund_1_1" id="sLokus_Hund_1_1">
                                    <option value="N" '.$formularArray['sLokus_Hund_1_1']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_1_1']['S'].'>S</option>
                                </select>
                            </td>
                            <td>
                                <select name="sLokus_Hund_1_2" id="sLokus_Hund_1_2">
                                    <option value="N" '.$formularArray['sLokus_Hund_1_2']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_1_2']['S'].'>S</option>
                                </select>
                            </td>
                            <td>
                                <select name="sLokus_Hund_2_1" id="sLokus_Hund_2_1">
                                    <option value="N" '.$formularArray['sLokus_Hund_2_1']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_2_1']['S'].'>S</option>
                                </select>
                            </td>
                            <td>
                                <select name="sLokus_Hund_2_2" id="sLokus_Hund_2_2">
                                    <option value="N" '.$formularArray['sLokus_Hund_2_2']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_2_2']['S'].'>S</option>
                                </select>
                            </td>
                        </tr>
    
                    </table>
                    <br>
                    <b>Vordefinierte Werte für Hund A</b><br>
                    <select name="savesDogA" id="savesDogA">
                        <option value="none" '.$formularArray['savesDogA']['none'].'>-- Kein Hund Gewählt --</option>
                        <option value="galahad" '.$formularArray['savesDogA']['galahad'].'>Lord Galahad von Jaluk Aurora</option>
                        <option value="ivo-wunjo" '.$formularArray['savesDogA']['ivo-wunjo'].'>Ivo-Wunjo von Jaluk Aurora</option>
                        <option value="aslan" '.$formularArray['savesDogA']['aslan'].'>Aslan von der Rosssteige</option>
                    </select>
                    <br>
                    <br>
                    <b>Zufällige Werte für Hund B</b><br>
                    <select name="random" id="random">
                        <option value="none" '.$formularArray['random']['no'].'>Nein</option>
                        <option value="yes" '.$formularArray['random']['yes'].'>Ja</option>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="absenden" />
                </form>
                <table class="parentTable">
                    <tr>
                        <th>Hund A</th>
                        <th>Hund B</th>
                    </tr>
                    <tr>
                        <td>' . $show_parent_a . '</td>
                        <td>' . $show_parent_b . '</td>
                    </tr>
                </table>
            </div>
            ';

        return $formular;

    }

    private function showLokiPossibilities($h, $formularWerteAufbereitet)
    {
        $test = [];
        $output = '
            <div class="farbgenetik_content">
            <h4>Kombinationen der Loki und der daraus resultierenden Wahrscheinlichkeiten</h4>
            <div class="rowChildren">
        ';
        if(isset($formularWerteAufbereitet) && array_key_exists('A', $formularWerteAufbereitet)) {
            foreach ($formularWerteAufbereitet['A'] as $lokus => $parentA) {
                $test[$lokus] = [
                    $parentA[0] . $formularWerteAufbereitet['B'][$lokus][0],
                    $parentA[0] . $formularWerteAufbereitet['B'][$lokus][1],
                    $parentA[1] . $formularWerteAufbereitet['B'][$lokus][0],
                    $parentA[1] . $formularWerteAufbereitet['B'][$lokus][1],
                ];
            }

            foreach ($test as $lokus => $combination) {
                $output .= '
                    <div class="columnChildren">
                        <b>'.$lokus.' - Lokus</b>
                        <table class="Children">
                            <th class="Children">
                                <td class="Children">'.$formularWerteAufbereitet['A'][$lokus][0].'</td>
                                <td class="Children">'.$formularWerteAufbereitet['A'][$lokus][1].'</td>
                            </th>
                            <tr class="Children">
                                <td class="Children">'.$formularWerteAufbereitet['B'][$lokus][0].'</td>
                                <td class="Children">'.$combination[0].'</td>
                                <td class="Children">'.$combination[2].'</td>
                            </tr>
                            <tr class="Children">
                                <td class="Children">'.$formularWerteAufbereitet['B'][$lokus][1].'</td>
                                <td class="Children">'.$combination[1].'</td>
                                <td class="Children">'.$combination[3].'</td>
                            </tr>
                        </table>';

                    $output .= $h->ausgabePossibilities($lokus, $combination);
                    $output .='</div>';

            }
        }
        $output .= '</div></div>';
        return $output;
    }

    public function showContent()
    {
        $content = '<div class="content">';

        $formularWerte = $_POST;
        $formularWerteAufbereitet = [];

        if(!empty($formularWerte) && count($formularWerte)>1){
            $random = $this->zufallPartner();

            if($formularWerte['savesDogA'] !== 'none' && $formularWerte['random'] === 'yes'){
                $formularWerteAufbereitet = [
                    'A' => [
                        'E' => savedDogs[$formularWerte['savesDogA']]['E'],
                        'K' => savedDogs[$formularWerte['savesDogA']]['K'],
                        'A' => savedDogs[$formularWerte['savesDogA']]['A'],
                        'B' => savedDogs[$formularWerte['savesDogA']]['B'],
                        'D' => savedDogs[$formularWerte['savesDogA']]['D'],
                        'I' => savedDogs[$formularWerte['savesDogA']]['I'],
                        'S' => savedDogs[$formularWerte['savesDogA']]['S'],
                    ],
                    'B' => [
                        'E' => [$random['E'][0], $random['E'][1]],
                        'K' => [$random['K'][0], $random['K'][1]],
                        'A' => [$random['A'][0], $random['A'][1]],
                        'B' => [$random['B'][0], $random['B'][1]],
                        'D' => [$random['D'][0], $random['D'][1]],
                        'I' => [$random['I'][0], $random['I'][1]],
                        'S' => [$random['S'][0], $random['S'][1]],
                    ],
                ];

                $dogName = (array_key_exists('savesDogA', $formularWerte))?savedDogs[$formularWerte['savesDogA']]:'';
                $formularWerte['eLokus_Hund_1_1'] = $dogName['E'][0];
                $formularWerte['eLokus_Hund_1_2'] = $dogName['E'][1];
                $formularWerte['kLokus_Hund_1_1'] = $dogName['K'][0];
                $formularWerte['kLokus_Hund_1_2'] = $dogName['K'][1];
                $formularWerte['aLokus_Hund_1_1'] = $dogName['A'][0];
                $formularWerte['aLokus_Hund_1_2'] = $dogName['A'][1];
                $formularWerte['bLokus_Hund_1_1'] = $dogName['B'][0];
                $formularWerte['bLokus_Hund_1_2'] = $dogName['B'][1];
                $formularWerte['dLokus_Hund_1_1'] = $dogName['D'][0];
                $formularWerte['dLokus_Hund_1_2'] = $dogName['D'][1];
                $formularWerte['iLokus_Hund_1_1'] = $dogName['I'][0];
                $formularWerte['iLokus_Hund_1_2'] = $dogName['I'][1];
                $formularWerte['sLokus_Hund_1_1'] = $dogName['S'][0];
                $formularWerte['sLokus_Hund_1_2'] = $dogName['S'][1];
                $formularWerte['savesDogA'] = 'none';

                $formularWerte['eLokus_Hund_2_1'] = $random['E'][0];
                $formularWerte['eLokus_Hund_2_2'] = $random['E'][1];
                $formularWerte['kLokus_Hund_2_1'] = $random['K'][0];
                $formularWerte['kLokus_Hund_2_2'] = $random['K'][1];
                $formularWerte['aLokus_Hund_2_1'] = $random['A'][0];
                $formularWerte['aLokus_Hund_2_2'] = $random['A'][1];
                $formularWerte['bLokus_Hund_2_1'] = $random['B'][0];
                $formularWerte['bLokus_Hund_2_2'] = $random['B'][1];
                $formularWerte['dLokus_Hund_2_1'] = $random['D'][0];
                $formularWerte['dLokus_Hund_2_2'] = $random['D'][1];
                $formularWerte['iLokus_Hund_2_1'] = $random['I'][0];
                $formularWerte['iLokus_Hund_2_2'] = $random['I'][1];
                $formularWerte['sLokus_Hund_2_1'] = $random['S'][0];
                $formularWerte['sLokus_Hund_2_2'] = $random['S'][1];
                $formularWerte['random'] = 'no';

            } else if($formularWerte['savesDogA'] !== 'none'){
                $formularWerteAufbereitet = [
                    'A' => [
                        'E' => savedDogs[$formularWerte['savesDogA']]['E'],
                        'K' => savedDogs[$formularWerte['savesDogA']]['K'],
                        'A' => savedDogs[$formularWerte['savesDogA']]['A'],
                        'B' => savedDogs[$formularWerte['savesDogA']]['B'],
                        'D' => savedDogs[$formularWerte['savesDogA']]['D'],
                        'I' => savedDogs[$formularWerte['savesDogA']]['I'],
                        'S' => savedDogs[$formularWerte['savesDogA']]['S'],
                    ],
                    'B' => [
                        'E' => [$formularWerte['eLokus_Hund_2_1'], $formularWerte['eLokus_Hund_2_2']],
                        'K' => [$formularWerte['kLokus_Hund_2_1'], $formularWerte['kLokus_Hund_2_2']],
                        'A' => [$formularWerte['aLokus_Hund_2_1'], $formularWerte['aLokus_Hund_2_2']],
                        'B' => [$formularWerte['bLokus_Hund_2_1'], $formularWerte['bLokus_Hund_2_2']],
                        'D' => [$formularWerte['dLokus_Hund_2_1'], $formularWerte['dLokus_Hund_2_2']],
                        'I' => [$formularWerte['iLokus_Hund_2_1'], $formularWerte['iLokus_Hund_2_2']],
                        'S' => [$formularWerte['sLokus_Hund_2_1'], $formularWerte['sLokus_Hund_2_2']],
                    ],
                ];

                $dogName = (array_key_exists('savesDogA', $formularWerte))?savedDogs[$formularWerte['savesDogA']]:'';
                $formularWerte['eLokus_Hund_1_1'] = $dogName['E'][0];
                $formularWerte['eLokus_Hund_1_2'] = $dogName['E'][1];
                $formularWerte['kLokus_Hund_1_1'] = $dogName['K'][0];
                $formularWerte['kLokus_Hund_1_2'] = $dogName['K'][1];
                $formularWerte['aLokus_Hund_1_1'] = $dogName['A'][0];
                $formularWerte['aLokus_Hund_1_2'] = $dogName['A'][1];
                $formularWerte['bLokus_Hund_1_1'] = $dogName['B'][0];
                $formularWerte['bLokus_Hund_1_2'] = $dogName['B'][1];
                $formularWerte['dLokus_Hund_1_1'] = $dogName['D'][0];
                $formularWerte['dLokus_Hund_1_2'] = $dogName['D'][1];
                $formularWerte['iLokus_Hund_1_1'] = $dogName['I'][0];
                $formularWerte['iLokus_Hund_1_2'] = $dogName['I'][1];
                $formularWerte['sLokus_Hund_1_1'] = $dogName['S'][0];
                $formularWerte['sLokus_Hund_1_2'] = $dogName['S'][1];
                $formularWerte['savesDogA'] = 'none';

            } else if ($formularWerte['random'] === 'yes'){
                $formularWerteAufbereitet = [
                    'A' => [
                        'E' => [$formularWerte['eLokus_Hund_1_1'], $formularWerte['eLokus_Hund_1_2']],
                        'K' => [$formularWerte['kLokus_Hund_1_1'], $formularWerte['kLokus_Hund_1_2']],
                        'A' => [$formularWerte['aLokus_Hund_1_1'], $formularWerte['aLokus_Hund_1_2']],
                        'B' => [$formularWerte['bLokus_Hund_1_1'], $formularWerte['bLokus_Hund_1_2']],
                        'D' => [$formularWerte['dLokus_Hund_1_1'], $formularWerte['dLokus_Hund_1_2']],
                        'I' => [$formularWerte['iLokus_Hund_1_1'], $formularWerte['iLokus_Hund_1_2']],
                        'S' => [$formularWerte['sLokus_Hund_1_1'], $formularWerte['sLokus_Hund_1_2']],
                    ],
                    'B' => [
                        'E' => [$random['E'][0], $random['E'][1]],
                        'K' => [$random['K'][0], $random['K'][1]],
                        'A' => [$random['A'][0], $random['A'][1]],
                        'B' => [$random['B'][0], $random['B'][1]],
                        'D' => [$random['D'][0], $random['D'][1]],
                        'I' => [$random['I'][0], $random['I'][1]],
                        'S' => [$random['S'][0], $random['S'][1]],
                    ],
                ];

                $formularWerte['eLokus_Hund_2_1'] = $random['E'][0];
                $formularWerte['eLokus_Hund_2_2'] = $random['E'][1];
                $formularWerte['kLokus_Hund_2_1'] = $random['K'][0];
                $formularWerte['kLokus_Hund_2_2'] = $random['K'][1];
                $formularWerte['aLokus_Hund_2_1'] = $random['A'][0];
                $formularWerte['aLokus_Hund_2_2'] = $random['A'][1];
                $formularWerte['bLokus_Hund_2_1'] = $random['B'][0];
                $formularWerte['bLokus_Hund_2_2'] = $random['B'][1];
                $formularWerte['dLokus_Hund_2_1'] = $random['D'][0];
                $formularWerte['dLokus_Hund_2_2'] = $random['D'][1];
                $formularWerte['iLokus_Hund_2_1'] = $random['I'][0];
                $formularWerte['iLokus_Hund_2_2'] = $random['I'][1];
                $formularWerte['sLokus_Hund_2_1'] = $random['S'][0];
                $formularWerte['sLokus_Hund_2_2'] = $random['S'][1];
                $formularWerte['random'] = 'no';

            } else {
                $formularWerteAufbereitet = [
                    'A' => [
                        'E' => [$formularWerte['eLokus_Hund_1_1'], $formularWerte['eLokus_Hund_1_2']],
                        'K' => [$formularWerte['kLokus_Hund_1_1'], $formularWerte['kLokus_Hund_1_2']],
                        'A' => [$formularWerte['aLokus_Hund_1_1'], $formularWerte['aLokus_Hund_1_2']],
                        'B' => [$formularWerte['bLokus_Hund_1_1'], $formularWerte['bLokus_Hund_1_2']],
                        'D' => [$formularWerte['dLokus_Hund_1_1'], $formularWerte['dLokus_Hund_1_2']],
                        'I' => [$formularWerte['iLokus_Hund_1_1'], $formularWerte['iLokus_Hund_1_2']],
                        'S' => [$formularWerte['sLokus_Hund_1_1'], $formularWerte['sLokus_Hund_1_2']],
                    ],
                    'B' => [
                        'E' => [$formularWerte['eLokus_Hund_2_1'], $formularWerte['eLokus_Hund_2_2']],
                        'K' => [$formularWerte['kLokus_Hund_2_1'], $formularWerte['kLokus_Hund_2_2']],
                        'A' => [$formularWerte['aLokus_Hund_2_1'], $formularWerte['aLokus_Hund_2_2']],
                        'B' => [$formularWerte['bLokus_Hund_2_1'], $formularWerte['bLokus_Hund_2_2']],
                        'D' => [$formularWerte['dLokus_Hund_2_1'], $formularWerte['dLokus_Hund_2_2']],
                        'I' => [$formularWerte['iLokus_Hund_2_1'], $formularWerte['iLokus_Hund_2_2']],
                        'S' => [$formularWerte['sLokus_Hund_2_1'], $formularWerte['sLokus_Hund_2_2']],
                    ],
                ];
            }

//            if($formularWerte['savesDogA'] !== 'none'){
//                $formularWerteAufbereitet = [
//                    'A' => [
//                        'E' => savedDogs[$formularWerte['savesDogA']]['E'],
//                        'K' => savedDogs[$formularWerte['savesDogA']]['K'],
//                        'A' => savedDogs[$formularWerte['savesDogA']]['A'],
//                        'B' => savedDogs[$formularWerte['savesDogA']]['B'],
//                        'D' => savedDogs[$formularWerte['savesDogA']]['D'],
//                        'I' => savedDogs[$formularWerte['savesDogA']]['I'],
//                        'S' => savedDogs[$formularWerte['savesDogA']]['S'],
//                    ],
//                    'B' => [
//                        'E' => [$formularWerte['eLokus_Hund_2_1'], $formularWerte['eLokus_Hund_2_2']],
//                        'K' => [$formularWerte['kLokus_Hund_2_1'], $formularWerte['kLokus_Hund_2_2']],
//                        'A' => [$formularWerte['aLokus_Hund_2_1'], $formularWerte['aLokus_Hund_2_2']],
//                        'B' => [$formularWerte['bLokus_Hund_2_1'], $formularWerte['bLokus_Hund_2_2']],
//                        'D' => [$formularWerte['dLokus_Hund_2_1'], $formularWerte['dLokus_Hund_2_2']],
//                        'I' => [$formularWerte['iLokus_Hund_2_1'], $formularWerte['iLokus_Hund_2_2']],
//                        'S' => [$formularWerte['sLokus_Hund_2_1'], $formularWerte['sLokus_Hund_2_2']],
//                    ],
//                ];
//            } else {
//                $formularWerteAufbereitet = [
//                    'A' => [
//                        'E' => [$formularWerte['eLokus_Hund_1_1'], $formularWerte['eLokus_Hund_1_2']],
//                        'K' => [$formularWerte['kLokus_Hund_1_1'], $formularWerte['kLokus_Hund_1_2']],
//                        'A' => [$formularWerte['aLokus_Hund_1_1'], $formularWerte['aLokus_Hund_1_2']],
//                        'B' => [$formularWerte['bLokus_Hund_1_1'], $formularWerte['bLokus_Hund_1_2']],
//                        'D' => [$formularWerte['dLokus_Hund_1_1'], $formularWerte['dLokus_Hund_1_2']],
//                        'I' => [$formularWerte['iLokus_Hund_1_1'], $formularWerte['iLokus_Hund_1_2']],
//                        'S' => [$formularWerte['sLokus_Hund_1_1'], $formularWerte['sLokus_Hund_1_2']],
//                    ],
//                    'B' => [
//                        'E' => [$formularWerte['eLokus_Hund_2_1'], $formularWerte['eLokus_Hund_2_2']],
//                        'K' => [$formularWerte['kLokus_Hund_2_1'], $formularWerte['kLokus_Hund_2_2']],
//                        'A' => [$formularWerte['aLokus_Hund_2_1'], $formularWerte['aLokus_Hund_2_2']],
//                        'B' => [$formularWerte['bLokus_Hund_2_1'], $formularWerte['bLokus_Hund_2_2']],
//                        'D' => [$formularWerte['dLokus_Hund_2_1'], $formularWerte['dLokus_Hund_2_2']],
//                        'I' => [$formularWerte['iLokus_Hund_2_1'], $formularWerte['iLokus_Hund_2_2']],
//                        'S' => [$formularWerte['sLokus_Hund_2_1'], $formularWerte['sLokus_Hund_2_2']],
//                    ],
//                ];
//            }
        }

        $h = new Helper();
        $f = new Farbkombinationen();

        $content .= $this->buildFormular($formularWerte, $formularWerteAufbereitet);
        $content .= '<br>';
        $content .= $this->showLokiPossibilities($h, $formularWerteAufbereitet);
        $content .= '<br>';
        $content .= $f->giveColorPossibilities2($formularWerteAufbereitet);
        $content .= '<br>';
//        $content .= $this->uncompressFile($formularWerteAufbereitet);

        $content .= '</div>';

        echo $content;
    }

    public function uncompressFile() {
        $file= file_get_contents('pprneo_chronik_antwort-17apäterbeschreibung_html (1).bin');

        $tmp = gzuncompress($file);

        if($tmp === false ){
            return "Blöder Mist!";
        } else {
            return $tmp;
        }


    }
}