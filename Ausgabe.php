<?php

namespace Ausgabe;
class Ausgabe
{
    public function isELokusShown($elokusKombination) {
        $result = false;
        if(array_key_exists($elokusKombination, $this->getLokiMapAdvanced()['E'])){
            $result = true;
        }
        return $result;
    }

    public function isKLokusShown($klokusKombination) {
        $result = false;
        if(array_key_exists($klokusKombination, $this->getLokiMapAdvanced()['K'])){
            $result = true;
        }
        return $result;
    }

    public function isALokusShown($alokusKombination) {
        $result = 'false';
        if(array_key_exists($alokusKombination, $this->getLokiMapAdvanced()['A'])){
            $result = true;
        }
        return $result;
    }


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

    private function translateColors($kombination) {
        $colors = [
            'e1e1' => 'e1e1 - Orange',
            'KbKb' => 'KbKb - Schwarz',
            'Kbky' => 'Kbky - Schwarz',
            'kyKb' => 'kyKb - Schwarz',
            'DYDY' => 'DYDY - Orange',
            'DYSY' => 'DYSY - Orange',
            'DYAG' => 'DYAG - Orange',
            'DYBS' => 'DYBS - Orange',
            'DYBB' => 'DYBB - Orange',
            'DYa' => 'DYa - Orange',
            'SYDY' => 'DYSY - Orange',
            'SYSY' => 'SYSY - Orange Sable',
            'SYAG' => 'SYAG - Orange Sable',
            'SYBS' => 'SYBS - Orange Sable',
            'SYBB' => 'SYBB - Orange Sable',
            'SYa' => 'SYa - Orange Sable ',
            'AGDY' => 'DYAG - Orange',
            'AGSY' => 'SYAG - Orange Sable',
            'AGAG' => 'AGAG - Wolfsfarben',
            'AGBS' => 'AGBS - Wolfsfarben',
            'AGBB' => 'AGBB - Wolfsfarben',
            'AGa' => 'AGa - Wolfsfarben',
            'BSDY' => 'DYBS - Orange',
            'BSSY' => 'SYBS - Orange Sable',
            'BSAG' => 'AGBS - Wolfsfarben',
            'BSBS' => 'BSBS - Saddle Tan',
            'BSBB' => 'BSBB - Großflächiges Saddle Tan',
            'BSa' => 'BSa - Großflächiges Saddle Tan',
            'BBDY' => 'DYBB - Orange',
            'BBSY' => 'SYBB - Orange Sable',
            'BBAG' => 'AGBB - Wolfsfarben',
            'BBBS' => 'BSBB - Großflächiges Saddle Tan',
            'BBBB' => 'BBBB - Black&Tan',
            'BBa' => 'BBa - Black&Tan',
            'aDY' => 'DYa - Orange',
            'aSY' => 'SYa - Orange Sable',
            'aAG' => 'AGa - Wolfsfarben',
            'aBS' => 'BSa - Großflächiges Saddle Tan',
            'aBB' => 'BBa - Black&Tan',
            'aa' => 'aa - Schwarz',
        ];

        return $colors[$kombination];
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
            'eLokus_Hund_1_1' => ['none' => '', 'N' => '', 'e1' => ''],
            'eLokus_Hund_1_2' => ['none' => '', 'N' => '', 'e1' => ''],
            'eLokus_Hund_2_1' => ['none' => '', 'N' => '', 'e1' => ''],
            'eLokus_Hund_2_2' => ['none' => '', 'N' => '', 'e1' => ''],
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
        ];

        foreach($formularWerte as $key => $wert){
            $formularArray[$key][$wert] = 'selected="selected"';
        }

        $show_parent_a = '';
        $show_parent_b = '';

        if (!empty($formularWerteAufbereitet)) {
            $show_parent_a = $this->getImageOfParent($formularWerteAufbereitet['A']);
            $show_parent_b = $this->getImageOfParent($formularWerteAufbereitet['B']);
        }

        $formular = '
            <div class="farbgenetik_content_genetikrechner">
                <form action="index_genetikrechner.php" method="post">
                
                    <table>
                        <tr>
                            <th>Lokus</th>
                            <th colspan="2">Hund A</th>
                            <th colspan="2">Hund B</th>
                        </tr>
                        <tr>
                            <td>E Lokus</td>
                            <td>
                                <select name="eLokus_Hund_1_1" id="eLokus_Hund_1_1">
                                    <option value="none" '.$formularArray['eLokus_Hund_1_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['eLokus_Hund_1_1']['N'].'>N(E)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_1_1']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_1_2" id="eLokus_Hund_1_2">
                                    <option value="none" '.$formularArray['eLokus_Hund_1_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['eLokus_Hund_1_2']['N'].'>N(E)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_1_2']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_2_1" id="eLokus_Hund_2_1">
                                    <option value="none" '.$formularArray['eLokus_Hund_2_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['eLokus_Hund_2_1']['N'].'>N(E)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_2_1']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                            <td>
                                <select name="eLokus_Hund_2_2" id="eLokus_Hund_2_2">
                                    <option value="none" '.$formularArray['eLokus_Hund_2_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['eLokus_Hund_2_2']['N'].'>N(E)</option>
                                    <option value="e1" '.$formularArray['eLokus_Hund_2_2']['e1'].'>e1(e)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>K Lokus</td>
                            <td>
                                <select name="kLokus_Hund_1_1" id="kLokus_Hund_1_1">
                                    <option value="none" '.$formularArray['kLokus_Hund_1_1']['none'].'>keine Auswahl</option>
                                    <option value="Kb" '.$formularArray['kLokus_Hund_1_1']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_1_1']['ky'].'>ky</option>
                                </select>
                            </td>
                            <td>
                                <select name="kLokus_Hund_1_2" id="kLokus_Hund_1_2">
                                    <option value="none" '.$formularArray['kLokus_Hund_1_2']['none'].'>keine Auswahl</option>
                                    <option value="Kb" '.$formularArray['kLokus_Hund_1_2']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_1_2']['ky'].'>ky</option>
                                </select>
                            </td>
                            <td>
                                <select name="kLokus_Hund_2_1" id="kLokus_Hund_2_1">
                                    <option value="none" '.$formularArray['kLokus_Hund_2_1']['none'].'>keine Auswahl</option>
                                    <option value="Kb" '.$formularArray['kLokus_Hund_2_1']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_2_1']['ky'].'>ky</option>
                                </select>
                            </td>
                            <td>
                                <select name="kLokus_Hund_2_2" id="kLokus_Hund_2_2">
                                    <option value="none" '.$formularArray['kLokus_Hund_2_2']['none'].'>keine Auswahl</option>
                                    <option value="Kb" '.$formularArray['kLokus_Hund_2_2']['Kb'].'>Kb</option>
                                    <option value="ky" '.$formularArray['kLokus_Hund_2_2']['ky'].'>ky</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>A Lokus</td>
                            <td>
                                <select name="aLokus_Hund_1_1" id="aLokus_Hund_1_1">
                                    <option value="none" '.$formularArray['aLokus_Hund_1_1']['none'].'>keine Auswahl</option>
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
                                    <option value="none" '.$formularArray['aLokus_Hund_1_2']['none'].'>keine Auswahl</option>
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
                                    <option value="none" '.$formularArray['aLokus_Hund_2_1']['none'].'>keine Auswahl</option>
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
                                    <option value="none" '.$formularArray['aLokus_Hund_2_2']['none'].'>keine Auswahl</option>
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
                                    <option value="none" '.$formularArray['bLokus_Hund_1_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['bLokus_Hund_1_1']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_1_1']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_1_1']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_1_1']['bs'].'>bs</option>
                                </select>
                            </td>
                            <td>
                                <select name="bLokus_Hund_1_2" id="bLokus_Hund_1_2">
                                    <option value="none" '.$formularArray['bLokus_Hund_1_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['bLokus_Hund_1_2']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_1_2']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_1_2']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_1_2']['bs'].'>bs</option>
                                </select>
                            </td>
                            <td>
                                <select name="bLokus_Hund_2_1" id="bLokus_Hund_2_1">
                                    <option value="none" '.$formularArray['bLokus_Hund_2_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['bLokus_Hund_2_1']['N'].'>N(B)</option>
                                    <option value="bd" '.$formularArray['bLokus_Hund_2_1']['bd'].'>bd</option>
                                    <option value="bc" '.$formularArray['bLokus_Hund_2_1']['bc'].'>bc</option>
                                    <option value="bs" '.$formularArray['bLokus_Hund_2_1']['bs'].'>bs</option>
                                </select>
                            </td>
                            <td>
                                <select name="bLokus_Hund_2_2" id="bLokus_Hund_2_2">
                                    <option value="none" '.$formularArray['bLokus_Hund_2_2']['none'].'>keine Auswahl</option>
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
                                    <option value="none" '.$formularArray['dLokus_Hund_1_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['dLokus_Hund_1_1']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_1_1']['d1'].'>d1</option>
                                </select>
                            </td>
                            <td>
                                <select name="dLokus_Hund_1_2" id="dLokus_Hund_1_2">
                                    <option value="none" '.$formularArray['dLokus_Hund_1_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['dLokus_Hund_1_2']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_1_2']['d1'].'>d1</option>
                                </select>
                            </td>
                            <td>
                                <select name="dLokus_Hund_2_1" id="dLokus_Hund_2_1">
                                    <option value="none" '.$formularArray['dLokus_Hund_2_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['dLokus_Hund_2_1']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_2_1']['d1'].'>d1</option>
                                </select>
                            </td>
                            <td>
                                <select name="dLokus_Hund_2_2" id="dLokus_Hund_2_2">
                                    <option value="none" '.$formularArray['dLokus_Hund_2_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['dLokus_Hund_2_2']['N'].'>N(D)</option>
                                    <option value="d1" '.$formularArray['dLokus_Hund_2_2']['d1'].'>d1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I Lokus</td>
                            <td>
                                <select name="iLokus_Hund_1_1" id="iLokus_Hund_1_1">
                                    <option value="none" '.$formularArray['iLokus_Hund_1_1']['none'].'>keine Auswahl</option>
                                    <option value="I" '.$formularArray['iLokus_Hund_1_1']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_1_1']['i'].'>i</option>
                                </select>
                            </td>
                            <td>
                                <select name="iLokus_Hund_1_2" id="iLokus_Hund_1_2">
                                    <option value="none" '.$formularArray['iLokus_Hund_1_2']['none'].'>keine Auswahl</option>
                                    <option value="I" '.$formularArray['iLokus_Hund_1_2']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_1_2']['i'].'>i</option>
                                </select>
                            </td>
                            <td>
                                <select name="iLokus_Hund_2_1" id="iLokus_Hund_2_1">
                                    <option value="none" '.$formularArray['iLokus_Hund_2_1']['none'].'>keine Auswahl</option>
                                    <option value="I" '.$formularArray['iLokus_Hund_2_1']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_2_1']['i'].'>i</option>
                                </select>
                            </td>
                            <td>
                                <select name="iLokus_Hund_2_2" id="iLokus_Hund_2_2">
                                    <option value="none" '.$formularArray['iLokus_Hund_2_2']['none'].'>keine Auswahl</option>
                                    <option value="I" '.$formularArray['iLokus_Hund_2_2']['I'].'>I</option>
                                    <option value="i" '.$formularArray['iLokus_Hund_2_2']['i'].'>i</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>S Lokus</td>
                            <td>
                                <select name="sLokus_Hund_1_1" id="sLokus_Hund_1_1">
                                    <option value="none" '.$formularArray['sLokus_Hund_1_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['sLokus_Hund_1_1']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_1_1']['S'].'>S</option>
                                </select>
                            </td>
                            <td>
                                <select name="sLokus_Hund_1_2" id="sLokus_Hund_1_2">
                                    <option value="none" '.$formularArray['sLokus_Hund_1_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['sLokus_Hund_1_2']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_1_2']['S'].'>S</option>
                                </select>
                            </td>
                            <td>
                                <select name="sLokus_Hund_2_1" id="sLokus_Hund_2_1">
                                    <option value="none" '.$formularArray['sLokus_Hund_2_1']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['sLokus_Hund_2_1']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_2_1']['S'].'>S</option>
                                </select>
                            </td>
                            <td>
                                <select name="sLokus_Hund_2_2" id="sLokus_Hund_2_2">
                                    <option value="none" '.$formularArray['sLokus_Hund_2_2']['none'].'>keine Auswahl</option>
                                    <option value="N" '.$formularArray['sLokus_Hund_2_2']['N'].'>N</option>
                                    <option value="S" '.$formularArray['sLokus_Hund_2_2']['S'].'>S</option>
                                </select>
                            </td>
                        </tr>
    
                    </table>
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

    private function showLokiPossibilities($formularWerteAufbereitet)
    {
        $test = [];
        $output = '
            <div class="farbgenetik_content">
            <h4>Kombinationen der Loki</h4>
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
                        <h4>'.$lokus.' - Lokus</h4>
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
                        </table>
                    </div>
                    ';

            }
        }
        $output .= '</div></div>';
        return $output;
    }

    private function showPossibleColorsOfChildren($formularWerteAufbereitet)
    {
        $content = '';
        $combinations = [];

        $content .= '
            <div class="farbgenetik_content">
            <h4>Farbkombinationen der Welpen nach Wahrscheinlichkeit</h4>
        ';

        if(empty($formularWerteAufbereitet)){
            return $content;
        }

        foreach($formularWerteAufbereitet['A'] as $loki=>$wert){
            $combinations[$loki] = [
                $formularWerteAufbereitet['A'][$loki][0].$formularWerteAufbereitet['B'][$loki][0],
                $formularWerteAufbereitet['A'][$loki][0].$formularWerteAufbereitet['B'][$loki][1],
                $formularWerteAufbereitet['A'][$loki][1].$formularWerteAufbereitet['B'][$loki][0],
                $formularWerteAufbereitet['A'][$loki][1].$formularWerteAufbereitet['B'][$loki][1],
            ];
        }

        if(!empty($combinations)){
            $rest = 1;
            $prozentuebergabe = 1;
            if(array_key_exists('E', $combinations)){
                $mengePositiv = 0;
                foreach($combinations['E'] as $kombination){
                    if($this->isELokusShown($kombination)){
                        $mengePositiv++;
                    }
                }

                if($mengePositiv !== 0){
                    $prozentRezessivGelb= (1/count($combinations['E']))*$mengePositiv;
                    $prozentuebergabe = 1-$prozentRezessivGelb;

                    $content .= ($prozentRezessivGelb*100). '% rezzesiv Gelb<br>';
//                    $content .= '<img class="Children" src="images/' . $this->getLokiMapAdvanced()['E']['e1e1']. '.png" style="height:300px;"><hr><br>';
//                    $content .= '<hr>';
                }
            }

            if(array_key_exists('K', $combinations)){
                $mengePositiv = 0;
                foreach($combinations['K'] as $kombination){
                    if($this->isKLokusShown($kombination)){
                        $mengePositiv++;
                    }
                }

                if($mengePositiv !== 0) {
                    $prozentSchwarz= (1/count($combinations['K']))*$mengePositiv;
                    if($prozentuebergabe === 1){
                        $rest = 1-$prozentSchwarz;
                    } else {
                        $rest = $prozentuebergabe-($prozentuebergabe*$prozentSchwarz);
                    }

                    $content .=  ($prozentuebergabe*$prozentSchwarz)*100 . '% dominant Schwarz<br>';
//                    $content .= '<img class="Children" src="images/' . $this->getLokiMapAdvanced()['K']['KbKb'] . '.png" style="height:300px;"><hr><br>';
//                    $content .= '<hr>';
                } else {
                    $rest = $prozentuebergabe;
                }
            }

            if(array_key_exists('A', $combinations)){
                $content .= ($rest*100). '% prägen den A-Lokus Phänotypisch aus. Davon <br><br>';
                $prozentFarbe = 1/count(array_unique($combinations['A']));

                if($rest !== 0.0) {
                    foreach (array_unique($combinations['A']) as $kombination) {
                        $content .= ($rest*$prozentFarbe) * 100 . '% ' . $this->translateColors($kombination) . '<br>';
//                        $content .= '<img class="Children" src="images/' . $this->getLokiMapAdvanced()['A'][$kombination] . '.png" style="height:300px;"><br>';
                    }
                }
            }
        }


        $content .= '
            </div>
        ';

        return $content;
    }

    public function showContent()
    {
        $content = '<div class="content">';

        $formularWerte = $_POST;
        $formularWerteAufbereitet = [];
        if(!empty($formularWerte) && count($formularWerte)>1){
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

        $content .= $this->buildFormular($formularWerte, $formularWerteAufbereitet);
        $content .= '<br>';
        $content .= $this->showPossibleColorsOfChildren($formularWerteAufbereitet);
        $content .= '<br>';
        $content .= $this->showLokiPossibilities($formularWerteAufbereitet);

        $content .= '</div>';

        echo $content;
    }
}