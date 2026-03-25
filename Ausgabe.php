<?php

namespace Ausgabe;

include 'Helper.php';
use Ausgabe\Helper;

const savedDogs = [
    'none' =>[
        'name' => 'none'
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
    private function getNoneVisibleHelper() {
        return [
            'B' => ['NN', 'Nbs', 'Nbd', 'Nbc', 'bdN', 'bcN', 'bsN', 'N', 0, 'Nnone', 'noneN', 'bsnone', 'nonebs', 'bdnone', 'nonebd', 'bcnone', 'nonebc', 'nonenone'],
            'D' => ['NN', 'Nd1', 'd1N', 'N', 0, 'Nnone', 'noneN', 'd1none', 'noned1', 'nonenone'],
            'I' => ['N', 'Nnone', 'noneN', 'I', 'Inone', 'noneI', 0, 'nonenone'],
            'S' => ['NN', 'N', 0, 'Snone', 'noneS', 'Nnone', 'noneN', 'nonenone'],
        ];
    }
    private function getLokiMapAdvanced() {
        return [
            'E' => [
                'e1e1' => 'DYDY',
            ],
            'K' => [
                'KbKb' => 'KBKB',
                'Kbky' => 'KBKB',
                'kyKb' => 'KBKB',
            ],
            'A' => [
                'DYDY' => 'DYDY',
                'DYSY' => 'DYDY',
                'DYAG' => 'DYDY',
                'DYBS' => 'DYDY',
                'DYBB' => 'DYDY',
                'DYa' => 'DYDY',
                'SYDY' => 'DYDY',
                'SYSY' => 'SYSY',
                'SYAG' => 'SYSY',
                'SYBS' => 'SYSY',
                'SYBB' => 'SYSY',
                'SYa' => 'SYSY',
                'AGDY' => 'DYDY',
                'AGSY' => 'SYSY',
                'AGAG' => 'AGAG',
                'AGBS' => 'AGAG',
                'AGBB' => 'AGAG',
                'AGa' => 'AGAG',
                'BSDY' => 'DYDY',
                'BSSY' => 'SYSY',
                'BSAG' => 'AGAG',
                'BSBS' => 'BSBS',
                'BSBB' => 'BSBB',
                'BSa' => 'BSBB',
                'BBDY' => 'DYDY',
                'BBSY' => 'SYSY',
                'BBAG' => 'AGAG',
                'BBBS' => 'BSBB',
                'BBBB' => 'BBBB',
                'BBa' => 'BBBB',
                'aDY' => 'DYDY',
                'aSY' => 'SYSY',
                'aAG' => 'AGAG',
                'ABS' => 'BSBB',
                'aBB' => 'BBBB',
                'aa' => 'aa',
            ],
        ];
    }

    private function getImageOfParent($lokiParent) {
        $noneVisible = [
            'E' => ['NN', 'Ne1', 'e1N', 'N', 0, 'nonenone'],
            'K' => ['kyky', 'N', 'k', 0, 'nonenone'],
            'A' => ['NN', 'N', 0, 'nonenone'],
        ];

        $result = "keine Verwertbaren Loki hinterlegt";

        foreach ($lokiParent as $key => $loki) {
            $combination = $loki[0].$loki[1];

            if (!in_array($combination, $noneVisible[$key], true)) {

                if ($key === 'E' && !in_array($lokiParent['I'][0].$lokiParent['I'][1], $this->getNoneVisibleHelper()['I'], true)) {
                    if (!in_array($lokiParent['S'][0] . $lokiParent['S'][1], $this->getNoneVisibleHelper()['S'], true)) {
                        $result = $key.' Loki mit S Lokus sichtbar';
                        break;
                    }
                    $type = $this->getILokusFaktor($lokiParent['I'][0].$lokiParent['I'][1], $key);
                    $result = '<img src="images/' . $this->getLokiMapAdvanced()[$key][$combination].$type . '.png" alt="' . $key . '-Lokus" style="height:300px;">';
                    break;
                }

                if (
                    $key === 'K' &&
                    !in_array($lokiParent['B'][0].$lokiParent['B'][1], $this->getNoneVisibleHelper()['B'], true) &&
                    !in_array($lokiParent['D'][0].$lokiParent['D'][1], $this->getNoneVisibleHelper()['D'], true))
                {
                    if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $this->getNoneVisibleHelper()['S'], true)) {
                        $result = $key.' Loki mit B, D und S Lokus sichtbar';
                        break;
                    }
                    $result = '<img src="images/Isabella.png" alt="' . $key . '-Lokus" style="height:300px;">';
                    break;
                }

                if ($key === 'K' && !in_array($lokiParent['B'][0].$lokiParent['B'][1], $this->getNoneVisibleHelper()['B'], true)) {
                    if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $this->getNoneVisibleHelper()['S'], true)) {
                        $result = $key.' Loki mit B und S Lokus sichtbar';
                        break;
                    }
                    $result = '<img src="images/Brown.png" alt="' . $key . '-Lokus" style="height:300px;">';
                    break;
                }

                if ($key === 'K' && !in_array($lokiParent['D'][0].$lokiParent['D'][1], $this->getNoneVisibleHelper()['D'], true)) {
                    if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $this->getNoneVisibleHelper()['S'], true)) {
                        $result = $key.' Loki mit D und S Lokus sichtbar';
                        break;
                    }

                    $result = '<img src="images/Blue.png" alt="' . $key . '-Lokus" style="height:300px;">';
                    break;
                }

                if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $this->getNoneVisibleHelper()['S'], true)) {
                    $result = $key.' Loki mit S Lokus sichtbar';
                    break;
                }

                $type = $this->getILokusFaktor($lokiParent['I'][0].$lokiParent['I'][1], $key);
                $result = '<img src="images/' . $this->getLokiMapAdvanced()[$key][$combination].$type . '.png" alt="' . $key . '-Lokus" style="height:300px;">';
                break;
            }
        }

        return $result;
    }

    function getILokusFaktor($wert, $parentLokus) {
        if ($parentLokus === "K") {
            return '';
        }

        $type = '';
        switch ($wert) {
            case 'ii':
                $type = '_hell';
                break;
            case 'Ii':
                $type = '_mittel';
                break;
            case 'II':
                $type = '_dunkel';
                break;
        }
        return $type;
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
        ];

        $dogName = savedDogs[$formularWerte['savesDogA']];

        if(array_key_exists('savesDogA',$formularWerte) && $formularWerte['savesDogA'] !== 'none'){
            $formularArray['eLokus_Hund_1_1'][$dogName['E'][0]] = 'selected="selected"';
            $formularArray['eLokus_Hund_1_2'][$dogName['E'][1]] = 'selected="selected"';
            $formularArray['kLokus_Hund_1_1'][$dogName['K'][0]] = 'selected="selected"';
            $formularArray['kLokus_Hund_1_2'][$dogName['K'][1]] = 'selected="selected"';
            $formularArray['aLokus_Hund_1_1'][$dogName['A'][0]] = 'selected="selected"';
            $formularArray['aLokus_Hund_1_2'][$dogName['A'][1]] = 'selected="selected"';
            $formularArray['bLokus_Hund_1_1'][$dogName['B'][0]] = 'selected="selected"';
            $formularArray['bLokus_Hund_1_2'][$dogName['B'][1]] = 'selected="selected"';
            $formularArray['dLokus_Hund_1_1'][$dogName['D'][0]] = 'selected="selected"';
            $formularArray['dLokus_Hund_1_2'][$dogName['D'][1]] = 'selected="selected"';
            $formularArray['iLokus_Hund_1_1'][$dogName['I'][0]] = 'selected="selected"';
            $formularArray['iLokus_Hund_1_2'][$dogName['I'][1]] = 'selected="selected"';
            $formularArray['sLokus_Hund_1_1'][$dogName['S'][0]] = 'selected="selected"';
            $formularArray['sLokus_Hund_1_2'][$dogName['S'][1]] = 'selected="selected"';

            $formularArray['eLokus_Hund_2_1'][$formularWerte['eLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['eLokus_Hund_2_2'][$formularWerte['eLokus_Hund_2_2']] = 'selected="selected"';
            $formularArray['kLokus_Hund_2_1'][$formularWerte['kLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['kLokus_Hund_2_2'][$formularWerte['kLokus_Hund_2_2']] = 'selected="selected"';
            $formularArray['aLokus_Hund_2_1'][$formularWerte['aLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['aLokus_Hund_2_2'][$formularWerte['aLokus_Hund_2_2']] = 'selected="selected"';
            $formularArray['bLokus_Hund_2_1'][$formularWerte['bLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['bLokus_Hund_2_2'][$formularWerte['bLokus_Hund_2_2']] = 'selected="selected"';
            $formularArray['dLokus_Hund_2_1'][$formularWerte['dLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['dLokus_Hund_2_2'][$formularWerte['dLokus_Hund_2_2']] = 'selected="selected"';
            $formularArray['iLokus_Hund_2_1'][$formularWerte['iLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['iLokus_Hund_2_2'][$formularWerte['iLokus_Hund_2_2']] = 'selected="selected"';
            $formularArray['sLokus_Hund_2_1'][$formularWerte['sLokus_Hund_2_1']] = 'selected="selected"';
            $formularArray['sLokus_Hund_2_2'][$formularWerte['sLokus_Hund_2_2']] = 'selected="selected"';

            $formularArray['savesDogA'][$formularWerte['savesDogA']] = 'selected="selected"';
        } else {
            foreach($formularWerte as $key => $wert){
                $formularArray[$key][$wert] = 'selected="selected"';
            }
        }

        $show_parent_a = '';
        $show_parent_b = '';

        if (!empty($formularWerteAufbereitet)) {
//            $show_parent_a = $this->getImageOfParent($formularWerteAufbereitet['A']); //TODO: überarbeiten
//            $show_parent_b = $this->getImageOfParent($formularWerteAufbereitet['B']);
        }

        $bezeichnung = ($dogName['name'] !== 'none') ? $dogName['name'] :'Hund A';

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
                                    <option value="EM" '.$formularArray['eLokus_Hund_1_1']['EM'].'>EM(Schwarzmaske)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_1_2']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_2_1" id="eLokus_Hund_2_1">
                                    <option value="N" '.$formularArray['eLokus_Hund_2_1']['N'].'>N(E)</option>
                                    <option value="EM" '.$formularArray['eLokus_Hund_1_1']['EM'].'>EM(Schwarzmaske)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_2_1']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_2_2" id="eLokus_Hund_2_2">
                                    <option value="N" '.$formularArray['eLokus_Hund_2_2']['N'].'>N(E)</option>
                                    <option value="EM" '.$formularArray['eLokus_Hund_1_1']['EM'].'>EM(Schwarzmaske)</option>
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
                    <select name="savesDogA" id="savesDogA"">
                        <option value="none" '.$formularArray['savesDogA']['none'].'>-- Kein Wert Gewählt --</option>
                        <option value="galahad" '.$formularArray['savesDogA']['galahad'].'>Lord Galahad von Jaluk Aurora</option>
                        <option value="ivo-wunjo" '.$formularArray['savesDogA']['ivo-wunjo'].'>Ivo-Wunjo von Jaluk Aurora</option>
                        <option value="aslan" '.$formularArray['savesDogA']['aslan'].'>Aslan von der Rosssteige</option>
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

            if($formularWerte['savesDogA'] !== 'none'){
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
        }

        $h = new Helper();

        $content .= $this->buildFormular($formularWerte, $formularWerteAufbereitet);
        $content .= '<br>';
        $content .= $this->showLokiPossibilities($h, $formularWerteAufbereitet);
        $content .= '<br>';
        $content .= $h->giveColorPossibilities($formularWerteAufbereitet);

        $content .= '</div>';

        echo $content;
    }
}