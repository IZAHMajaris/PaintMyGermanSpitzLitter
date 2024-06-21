<!DOCTYPE html>
<html lang="de">
<head>
    <title>Paint My German Spitz Litter</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="stylesheet" href="styles.css">
    <script>
            // document.addEventListener('contextmenu',function(e){e.preventDefault();e.stopPropagation();});
            // document.addEventListener('copy',function(e){e.preventDefault();e.stopPropagation();});
            // document.addEventListener('cut',function(e){e.preventDefault();e.stopPropagation();});
    </script>
</head>
<body>
<div class="content">
    <?php
        $formularWerte = $_POST;

        $noneVisible_helper = [
            'B' => ['NN', 'Nbs', 'Nbd', 'Nbc', 'bdN', 'bcN', 'bsN', 'N', 0, 'Nnone', 'noneN', 'bsnone', 'nonebs', 'bdnone', 'nonebd', 'bcnone', 'nonebc', 'nonenone'],
            'D' => ['NN', 'Nd1', 'd1N', 'N', 0, 'Nnone', 'noneN', 'd1none', 'noned1', 'nonenone'],
            'I' => ['N', 'Nnone', 'noneN', 'I', 'Inone', 'noneI', 0, 'nonenone'],
            'S' => ['NN', 'N', 0, 'Snone', 'noneS', 'Nnone', 'noneN', 'nonenone'],
        ];


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

        function getImageOfParent($lokiParent) {

            global $noneVisible_helper;

            $aLokiMapAdvanced = [
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

            $noneVisible = [
                'E' => ['NN', 'Ne1', 'e1N', 'N', 0, 'nonenone'],
                'K' => ['kyky', 'N', 'k', 0, 'nonenone'],
                'A' => ['NN', 'N', 0, 'nonenone'],
            ];

            $result = "keine Verwertbaren Loki hinterlegt";

            foreach ($lokiParent as $key => $loki) {
                $combination = $loki[0].$loki[1];

                if (!in_array($combination, $noneVisible[$key], true)) {

                    if ($key === 'E' && !in_array($lokiParent['I'][0].$lokiParent['I'][1], $noneVisible_helper['I'], true)) {
                        if (!in_array($lokiParent['S'][0] . $lokiParent['S'][1], $noneVisible_helper['S'], true)) {
                            $result = $key.' Loki mit S Lokus sichtbar';
                            break;
                        }
                        $type = getILokusFaktor($lokiParent['I'][0].$lokiParent['I'][1], $key);
                        $result = '<img src="images/' . $aLokiMapAdvanced[$key][$combination].$type . '.png" alt="' . $key . '-Lokus" style="height:300px;">';
                        break;
                    }

                    if (
                        $key === 'K' &&
                        !in_array($lokiParent['B'][0].$lokiParent['B'][1], $noneVisible_helper['B'], true) &&
                        !in_array($lokiParent['D'][0].$lokiParent['D'][1], $noneVisible_helper['D'], true))
                    {
                        if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $noneVisible_helper['S'], true)) {
                            $result = $key.' Loki mit B, D und S Lokus sichtbar';
                            break;
                        }
                        $result = '<img src="images/Isabella.png" alt="' . $key . '-Lokus" style="height:300px;">';
                        break;
                    }

                    if ($key === 'K' && !in_array($lokiParent['B'][0].$lokiParent['B'][1], $noneVisible_helper['B'], true)) {
                        if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $noneVisible_helper['S'], true)) {
                            $result = $key.' Loki mit B und S Lokus sichtbar';
                            break;
                        }
                        $result = '<img src="images/Brown.png" alt="' . $key . '-Lokus" style="height:300px;">';
                        break;
                    }

                    if ($key === 'K' && !in_array($lokiParent['D'][0].$lokiParent['D'][1], $noneVisible_helper['D'], true)) {
                        if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $noneVisible_helper['S'], true)) {
                            $result = $key.' Loki mit D und S Lokus sichtbar';
                            break;
                        }

                        $result = '<img src="images/Blue.png" alt="' . $key . '-Lokus" style="height:300px;">';
                        break;
                    }

                    if (!in_array($lokiParent['S'][0].$lokiParent['S'][1], $noneVisible_helper['S'], true)) {
                        $result = $key.' Loki mit S Lokus sichtbar';
                        break;
                    }

                    $type = getILokusFaktor($lokiParent['I'][0].$lokiParent['I'][1], $key);
                    $result = '<img src="images/' . $aLokiMapAdvanced[$key][$combination].$type . '.png" alt="' . $key . '-Lokus" style="height:300px;">';
                    break;
                }
            }

            return $result;
        }

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
            $show_parent_a = getImageOfParent($formularWerteAufbereitet['A']);
            $show_parent_b = getImageOfParent($formularWerteAufbereitet['B']);
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

            echo $formular;

            $content_eltern = '';
                if (!empty($formularWerteAufbereitet)) {

                    $show_parent_a = getImageOfParent($formularWerteAufbereitet['A']);
                    $show_parent_b = getImageOfParent($formularWerteAufbereitet['B']);

                    $content_eltern .= '
                    <div class="farbgenetik_verpaarung_content">
                        
                    
                    
                    ';
                }

            echo $content_eltern;


        ?>
    </div>
<br>
    <div class="farbgenetik_content">
        <h4>Kombinationen der Loki und mögliche Farben der Nachkommen</h4>
        <?php
        $test = [];
        foreach ($formularWerteAufbereitet['A'] as $lokus => $parentA){
            $test[$lokus] = [
                $parentA[0].$formularWerteAufbereitet['B'][$lokus][0],
                $parentA[0].$formularWerteAufbereitet['B'][$lokus][1],
                $parentA[1].$formularWerteAufbereitet['B'][$lokus][0],
                $parentA[1].$formularWerteAufbereitet['B'][$lokus][1],
            ];
        }

        foreach ($test as $lokus => $combination) {
            echo '
                <h4>'.$lokus.' - Lokus</h4>
                <table>
                    <th>
                        <td>'.$formularWerteAufbereitet['A'][$lokus][0].'</td>
                        <td>'.$formularWerteAufbereitet['A'][$lokus][1].'</td>
                    </th>
                    <tr>
                        <td>'.$formularWerteAufbereitet['B'][$lokus][0].'</td>
                        <td>'.$combination[0].'</td>
                        <td>'.$combination[2].'</td>
                    </tr>
                    <tr>
                        <td>'.$formularWerteAufbereitet['B'][$lokus][1].'</td>
                        <td>'.$combination[1].'</td>
                        <td>'.$combination[3].'</td>
                    </tr>
                </table><br>
            ';

        }

        ?>
    </div>
</div>
<hr>
<br>
<div class="ImpresssumButton"><button onclick="showImpressum()">Impressum</button><button onclick="showDatenschutz()">Datenschutz</button></div>
<script>
    function showImpressum() {
        alert("Content Erstellung & Pflege: M.Sc. Dorit Wittig, Wenzel-Verner-Str. 71, 09120 Chemnitz, info@mittelspitz-chemnitz.de");
    }
    function showDatenschutz() {
        alert("© Copyright 2024 - Dorit Wittig,  Alle Inhalte diese Webseite, insbesondere Texte, Fotografien und Grafiken, sind urheberrechtlich geschützt. Das Urheberrecht liegt, soweit nicht ausdrücklich anders gekennzeichnet, bei Dorit Wittig. Bitte fragen Sie Mich, falls Sie die Inhalte dieses Internetangebotes verwenden möchten.");
    }
</script>
</body>
</html>
