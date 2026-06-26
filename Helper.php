<?php

namespace Ausgabe;

const getGrundfarben = [
    'rezzesiv Gelb' => 'rezessiv_gelb',
    'dominantes Schwarz' => 'Schwarz',
    'rezessives Schwarz' => 'Schwarz',
    'dominantes Gelb' => 'Orange',
    'Orange' => 'Orange',
    'Orange Sable' => 'Orange-Sable',
    'Wildfarben' => 'graugewolkt',
    'Saddle Tan' => 'Saddle-Tan',
    'Black and Tan' => 'Black_and_tan',
];

const aLokusFarben = [
    'dominantes Gelb',
    'Orange',
    'Orange Sable',
    'Wildfarben',
    'Saddle Tan',
    'Black and Tan',
];

const getTranslation = [
    'E' => [
        'Schwarzmasken' => 'maske',
        'Träger rezzesiv Gelb und Schwarzmaske' => 'maske',
        'Träger Schwarzmaske' => 'maske',
    ],
    'B' => [
        'Braun' => 'braun',
        'kein Braun' => '',
        'Braun Träger' => '',
    ],
    'D' => [
        'Dilute' => 'dilute',
        'Dilute Träger' => '',
        'kein Dilute' => '',
    ],
    'I' => [
        'Keine Aufhellung' => 'dunkel',
        'Leichte Aufhellung' => 'mittel',
        'Stärkste Aufhellung' => 'hell',
    ],
    'S' => [
        'Starke Scheckung' => 'SS',
        'kleinere Abzeichen' => 'NS',
        'keine Scheckung' => '',
    ]
];

const getColorCodes = [
    'E' => [
        'NN' => ['name' =>'keine phänotypische Ausprägung von rezzesivem Gelb', 'split' =>['N', 'N']],
        'NEM' => ['name' =>'Träger Schwarzmaske', 'split' =>['N', 'EM']],
        'EMN' => ['name' =>'Träger Schwarzmaske', 'split' =>['EM', 'N']],
        'Ne1' => ['name' =>'Träger rezzesiv Gelb', 'split' =>['N', 'e1']],
        'e1N' => ['name' =>'Träger rezzesiv Gelb', 'split' =>['e1', 'N']],
        'EMEM' => ['name' =>'Schwarzmasken', 'split' =>['EM', 'EM']],
        'EMe1' => ['name' =>'Träger rezzesiv Gelb und Schwarzmaske', 'split' =>['EM', 'e1']],
        'e1EM' => ['name' =>'Träger rezzesiv Gelb und Schwarzmaske', 'split' =>['e1', 'EM']],
        'e1e1' => ['name' =>'rezzesiv Gelb', 'split' =>['e1', 'e1']],
    ],
    'K' => [
        'KbKb' => ['name' =>'dominantes Schwarz', 'split' =>['Kb', 'Kb']],
        'Kbky' => ['name' =>'dominantes Schwarz', 'split' =>['Kb', 'ky']],
        'kyKb' => ['name' =>'dominantes Schwarz', 'split' =>['ky', 'Kb']],
        'kyky' => ['name' =>'keine phänotypische Ausprägung von dominantem Schwarz', 'split' =>['ky', 'ky']]
    ],
    'A' => [
        'DYDY' => ['name' =>'dominantes Gelb', 'split' =>['DY', 'DY']],
        'DYSY' => ['name' =>'dominantes Gelb', 'split' =>['DY', 'SY']],
        'DYAG' => ['name' =>'dominantes Gelb', 'split' =>['DY', 'AG']],
        'DYBS' => ['name' =>'dominantes Gelb', 'split' =>['DY', 'BS']],
        'DYBB' => ['name' =>'dominantes Gelb', 'split' =>['DY', 'BB']],
        'DYa' => ['name' =>'dominantes Gelb', 'split' =>['DY', 'a']],
        'SYDY' => ['name' =>'dominantes Gelb', 'split' =>['SY', 'DY']],
        'SYSY' => ['name' =>'Orange Sable', 'split' =>['SY', 'SY']],
        'SYAG' => ['name' =>'Orange Sable', 'split' =>['SY', 'AG']],
        'SYBS' => ['name' =>'Orange Sable', 'split' =>['SY', 'BS']],
        'SYBB' => ['name' =>'Orange Sable', 'split' =>['SY', 'BB']],
        'SYa' => ['name' =>'Orange Sable', 'split' =>['SY', 'a']],
        'AGDY' => ['name' =>'dominantes Gelb', 'split' =>['AG', 'DY']],
        'AGSY' => ['name' =>'Orange Sable', 'split' =>['AG', 'SY']],
        'AGAG' => ['name' =>'Wildfarben', 'split' =>['AG', 'AG']],
        'AGBS' => ['name' =>'Wildfarben', 'split' =>['AG', 'BS']],
        'AGBB' => ['name' =>'Wildfarben', 'split' =>['AG', 'BB']],
        'AGa' => ['name' =>'Wildfarben', 'split' =>['AG', 'a']],
        'BSDY' => ['name' =>'dominantes Gelb', 'split' =>['BS', 'DY']],
        'BSSY' => ['name' =>'Orange Sable', 'split' =>['BS', 'SY']],
        'BSAG' => ['name' =>'Wildfarben', 'split' =>['BS', 'AG']],
        'BSBS' => ['name' =>'Saddle Tan', 'split' =>['BS', 'BS']],
        'BSBB' => ['name' =>'Saddle Tan', 'split' =>['BS', 'BB']],
        'BSa' => ['name' =>'Saddle Tan', 'split' =>['BS', 'a']],
        'BBDY' => ['name' =>'dominantes Gelb', 'split' =>['BB', 'DY']],
        'BBSY' => ['name' =>'Orange Sable', 'split' =>['BB', 'SY']],
        'BBAG' => ['name' =>'Wildfarben', 'split' =>['BB', 'AG']],
        'BBBS' => ['name' =>'Saddle Tan', 'split' =>['BB', 'BS']],
        'BBBB' => ['name' =>'Black and Tan', 'split' =>['BB', 'BB']],
        'BBa' => ['name' =>'Black and Tan', 'split' =>['BB', 'a']],
        'aDY' => ['name' =>'dominantes Gelb', 'split' =>['a', 'DY']],
        'aSY' => ['name' =>'Orange Sable', 'split' =>['a', 'SY']],
        'aAG' => ['name' =>'Wildfarben', 'split' =>['a', 'AG']],
        'aBS' => ['name' =>'Saddle Tan', 'split' =>['a', 'BS']],
        'aBB' => ['name' =>'Black and Tan', 'split' =>['a', 'BB']],
        'aa' => ['name' =>'rezessives Schwarz', 'split' =>['a', 'a']],
    ],
    'B' => [
        'bdbd' => ['name' =>'Braun', 'split' =>['bd', 'bd']],
        'bdbc' => ['name' =>'Braun', 'split' =>['bd', 'bc']],
        'bdbs' => ['name' =>'Braun', 'split' =>['bd', 'bs']],
        'bdN' => ['name' =>'Braun Träger', 'split' =>['bd', 'N']],
        'Nbd' => ['name' =>'Braun Träger', 'split' =>['N', 'bd']],
        'bcbc' => ['name' =>'Braun', 'split' =>['bc', 'bc']],
        'bcbd' => ['name' =>'Braun', 'split' =>['bc', 'bd']],
        'bcbs' => ['name' =>'Braun', 'split' =>['bc', 'bs']],
        'bcN' => ['name' =>'Braun Träger', 'split' =>['bc', 'N']],
        'Nbc' => ['name' =>'Braun Träger', 'split' =>['N', 'bc']],
        'bsbs' => ['name' =>'Braun', 'split' =>['bs', 'bs']],
        'bsbd' => ['name' =>'Braun', 'split' =>['bs', 'bd']],
        'bsbc' => ['name' =>'Braun', 'split' =>['bs', 'bc']],
        'bsN' => ['name' =>'Braun Träger', 'split' =>['bs', 'N']],
        'Nbs' => ['name' =>'Braun Träger', 'split' =>['N', 'bs']],
        'NN' => ['name' =>'kein Braun', 'split' =>['N', 'N']]
    ],
    'D' => [
        'd1d1' => ['name' =>'Dilute', 'split' =>['d1', 'd1']],
        'd1N' => ['name' =>'Dilute Träger', 'split' =>['d1', 'N']],
        'Nd1' => ['name' =>'Dilute Träger', 'split' =>['N', 'd1']],
        'NN' => ['name' =>'kein Dilute', 'split' =>['N', 'N']]
    ],
    'I' => [
        'II' => ['name' =>'Keine Aufhellung', 'split' =>['I', 'I']],
        'Ii' => ['name' =>'Leichte Aufhellung', 'split' =>['I', 'i']],
        'iI' => ['name' =>'Leichte Aufhellung', 'split' =>['i', 'I']],
        'ii' => ['name' =>'Stärkste Aufhellung', 'split' =>['i', 'i']]
    ],
    'S' => [
        'SS' => ['name' =>'Starke Scheckung', 'split' =>['S', 'S']],
        'SN' => ['name' =>'kleinere Abzeichen', 'split' =>['S', 'N']],
        'NS' => ['name' =>'kleinere Abzeichen', 'split' =>['N', 'S']],
        'NN' => ['name' =>'keine Scheckung', 'split' =>['N', 'N']]
    ]
];

class Helper
{
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

    public function ausgabePossibilities($name, $ArrayLokus){
        $output = '<p><ul>';
        $verteilung = $this->possibilitiesLokus($name, $ArrayLokus);

        foreach ($verteilung as $wert => $prozent) {
            $output .= '<li>'.round($prozent, 2).'% '.$wert. '</li>';
        }

        $output .= '</ul></p>';
        return $output;
    }

    public function ausgabeSLokus($possibilitiesSLokus) {
        $addon = '';
        if(array_key_exists('Starke Scheckung', $possibilitiesSLokus) || array_key_exists('kleinere Abzeichen', $possibilitiesSLokus)){
            $addon .=' (';
            if(array_key_exists('Starke Scheckung', $possibilitiesSLokus)){
                $addon .= $possibilitiesSLokus['Starke Scheckung'].'% Chance auf Starke Scheckung';
            }
            if(array_key_exists('Starke Scheckung', $possibilitiesSLokus) && array_key_exists('kleinere Abzeichen', $possibilitiesSLokus)){
                $addon .= ', ';
            }
            if(array_key_exists('kleinere Abzeichen', $possibilitiesSLokus)){
                $addon .= $possibilitiesSLokus['kleinere Abzeichen'].'% Chance auf kleinere Abzeichen';
            }
            $addon .=')';
        }

        return $addon;
    }

    public function ausgabeBild($grundfarbe, $addons){
        $content = '';
        $imageName = getGrundfarben[$grundfarbe];
        $braun = [];
        $dilute = [];
        $isabella = [];
        $endfarben = [];

        //Intensität
        if(array_key_exists('I', $addons)){
            foreach($addons['I'] as $key => $intensitaet){
                $endfarben[$imageName .'_'. getTranslation['I'][$key]] = $imageName .'_'. getTranslation['I'][$key];
            }
        } else {
            $endfarben[$imageName] = $imageName;
        }

        if(array_key_exists('B', $addons) && array_key_exists('Braun', $addons['B'])){
            foreach($endfarben as $farbe){

                if(in_array($grundfarbe, aLokusFarben, true)){
                    if($grundfarbe === 'Orange'){
                        if(array_key_exists('Maske', $addons)){
                            $braun[] = $farbe.'_braun';
                        }
                    } else {
                        $braun[] = $farbe.'_braun';
                    }
                }else{
                    foreach($addons['B'] as $key => $scheckung){
                        if($key === 'Braun') {
                            $braun['Braun'] = 'Braun';
                        }
                    }
                }

            }
        }

        if(array_key_exists('D', $addons) && array_key_exists('Dilute', $addons['D'])){
            foreach($endfarben as $farbe){
                foreach($addons['D'] as $key => $scheckung){
                    if($key === 'Dilute') {
                        $dilute['Silver'] = 'Silver';
                    }
                }
            }
        }

        if(array_key_exists('B', $addons) && array_key_exists('D', $addons) && array_key_exists('Braun', $addons['B']) && array_key_exists('Dilute', $addons['D'])){
            foreach($endfarben as $farbe){
                if(strpos($farbe, 'rezessiv_gelb') === false){
                    $isabella['Isabella'] = 'Isabella';
                }
            }
        }

        if(array_key_exists('B', $addons) && $grundfarbe === 'dominantes Schwarz' && array_key_exists('Braun', $addons['B']) && $addons['B']['Braun'] === 100){
            //Schwarz aus endfarben entfernen
            unset($endfarben['Schwarz']);
        }

        if(array_key_exists('D', $addons) && $grundfarbe === 'dominantes Schwarz' && array_key_exists('Dilute', $addons['D']) && $addons['D']['Dilute'] === 100){
            //Schwarz aus endfarben entfernen
            unset($endfarben['Schwarz']);
        }

        foreach($braun as $b){
            $endfarben[$b] = $b;

        }
        foreach($dilute as $d){
            $endfarben[$d] = $d;
        }
        foreach($isabella as $i){
            $endfarben[$i] = $i;
        }

        if($grundfarbe === 'dominantes Schwarz' && array_key_exists('Braun', $addons['B']) && $addons['B']['Braun'] === 100
            && array_key_exists('Dilute', $addons['D']) && $addons['D']['Dilute'] === 100){
            //Schwarz, Braun und Dilute aus endfarben entfernen
            unset($endfarben['Schwarz'], $endfarben['Braun'], $endfarben['Silver']);
        }

        if(array_key_exists('E', $addons)){
            foreach($endfarben as $farbe){
                foreach($addons['E'] as $key => $scheckung){
                    if($key === 'Schwarzmasken' || $key === 'Träger rezzesiv Gelb und Schwarzmaske' || $key === 'Träger Schwarzmaske'){
                        $endfarben[$farbe.'_'.getTranslation['E'][$key]] = $farbe.'_'.getTranslation['E'][$key];
                    }
                }
            }
        }

        if(array_key_exists('S', $addons)){
            foreach($endfarben as $farbe){
                foreach($addons['S'] as $key => $scheckung){
                    if($key !== 'keine Scheckung'){
                        $endfarben[$farbe.'_'.getTranslation['S'][$key]] = $farbe.'_'.getTranslation['S'][$key];
                    }
                }
            }
        }

        foreach($endfarben as $endfarbe){
            $content .= '
                    <img class="simpleDogImages" src="/images/'.$endfarbe.'.jpg"/>
            ';
        }

        return $content;
    }

    public function giveColorPossibilities(array $formularWerteAufbereitet)
    {
        $content = '';
        $combinations = [];

        $content .= '
            <div class="farbgenetik_content">
            <h4>Farbkombinationen der Nachkommen nach Wahrscheinlichkeit</h4>
        ';

        $combinationsParents = $this->getCombinationsOfParents($formularWerteAufbereitet);

        if(count($combinationsParents) !== 0) {
            //E-Lokus
            //Einfluss E-Lokus
            $possibilitiesELokus = $this->possibilitiesLokus('E', $combinationsParents['E']);
            //Einfluss S-Lokus
            $possibilitiesSLokus = $this->possibilitiesLokus('S', $combinationsParents['S']);
            //Einfluss B-Lokus
            $possibilitiesBLokus = $this->possibilitiesLokus('B', $combinationsParents['B']);
            //Einfluss D-Lokus
            $possibilitiesDLokus = $this->possibilitiesLokus('D', $combinationsParents['D']);
            //Einfluss I-Lokus
            $possibilitiesILokus = $this->possibilitiesLokus('I', $combinationsParents['I']);

            $content .= '<b>E-Lokus</b><table style="width: 100%;">';

            foreach ($this->possibilitiesLokus('E', $combinationsParents['E']) as $wert => $prozent) {

                if ($wert === 'rezzesiv Gelb') {
                    $addon = '';
                    $possibilitiesRezzOrange = [];
                    $possibilitiesRezzOrange['I'] = $possibilitiesILokus;
                    $possibilitiesRezzOrange['S'] = $possibilitiesSLokus;

                    if (array_key_exists('Stärkste Aufhellung', $possibilitiesILokus)) {
                        $addon .= ' (' . $possibilitiesILokus['Stärkste Aufhellung'] . '% Chance auf Weiße Fellfarbe)';
                    }

                    if (array_key_exists('Braun', $possibilitiesBLokus)) {
                        $addon .= ' ('.$possibilitiesBLokus['Braun'] . '% Chance auf Braune Nasen)';
                    }

                    $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                    $content .= '<td style="width: ' . $prozent . '%;">
                                    <b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('rezzesiv Gelb', $possibilitiesRezzOrange).'
                                </td>';
                    //Bild ausgeben

                } else {
                    $content .= '<td style="width: ' . $prozent . '%; background-color:lightyellow"><b>' . $prozent . '% ' . $wert . '</b><br>' . '</td>';
                }

            }
            $content .= '</table><br>';

            if (array_key_exists('keine phänotypische Ausprägung von rezzesivem Gelb', $this->possibilitiesLokus('E', $combinationsParents['E'])) ||
                array_key_exists('Träger rezzesiv Gelb', $this->possibilitiesLokus('E', $combinationsParents['E'])) ||
                array_key_exists('Schwarzmasken', $this->possibilitiesLokus('E', $combinationsParents['E'])) ||
                array_key_exists('Träger Schwarzmaske', $this->possibilitiesLokus('E', $combinationsParents['E'])) ||
                array_key_exists('Träger rezzesiv Gelb und Schwarzmaske', $this->possibilitiesLokus('E', $combinationsParents['E']))
            ) {
                $content .= '<b>K-Lokus</b><table style="width: 100%;">';

                foreach ($this->possibilitiesLokus('K', $combinationsParents['K']) as $wert => $prozent) {

                    if ($wert === 'dominantes Schwarz') {
                        $addon = '';
                        $possibilitiesdomSchwarz = [];
                        $possibilitiesdomSchwarz['B'] = $possibilitiesBLokus;
                        $possibilitiesdomSchwarz['D'] = $possibilitiesDLokus;
                        $possibilitiesdomSchwarz['S'] = $possibilitiesSLokus;

                        if (array_key_exists('Braun', $possibilitiesBLokus) || array_key_exists('Dilute', $possibilitiesDLokus)) {
                            $addon .= ' (';
                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= $possibilitiesBLokus['Braun'] . '% Chance auf Braune Fellfarbe';
                            }
                            if (array_key_exists('Braun', $possibilitiesBLokus) && array_key_exists('Dilute', $possibilitiesDLokus)) {
                                $addon .= ', ';
                            }
                            if (array_key_exists('Dilute', $possibilitiesDLokus)) {
                                $addon .= $possibilitiesDLokus['Dilute'] . '% Chance auf Silberne Fellfarbe';
                            }
                            $addon .= ')';
                        }

                        $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                        $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('dominantes Schwarz', $possibilitiesdomSchwarz).'</td>';
                        //Bild ausgeben

                    } else {
                        $content .= '<td style="width: ' . $prozent . '%; background-color:lightyellow""><b>' . $prozent . '% ' . $wert . '</b><br>' . '</td>';
                    }

                }
                $content .= '</table><br>';

                if (array_key_exists('keine phänotypische Ausprägung von dominantem Schwarz', $this->possibilitiesLokus('K', $combinationsParents['K']))
                ) {
                    $content .= '<b>A-Lokus</b><table style="width: 100%;">';

                    foreach ($this->possibilitiesLokus('A', $combinationsParents['A']) as $wert => $prozent) {
                        $addon = '';

                        $possibilitiesColor = [];
                        $possibilitiesColor['E'] = $possibilitiesELokus;
                        $possibilitiesColor['I'] = $possibilitiesILokus;
                        $possibilitiesColor['B'] = $possibilitiesBLokus;
                        $possibilitiesColor['D'] = $possibilitiesDLokus;
                        $possibilitiesColor['S'] = $possibilitiesSLokus;

                        if ($wert === 'dominantes Gelb') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            if (array_key_exists('Schwarzmasken', $possibilitiesELokus)) {
                                $addon .= ' (' . $possibilitiesELokus['Schwarzmasken'] . '% Schwarzmasken)';
                            }

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('Orange', $possibilitiesColor).'</td>';
                        } else if ($wert === 'Orange Sable') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            if (array_key_exists('Schwarzmasken', $possibilitiesELokus)) {
                                $addon .= ' (' . $possibilitiesELokus['Schwarzmasken'] . '% Schwarzmasken)';
                            }

                            //Einfluss braun auf Schwarzen Bereich -> Braun Sable
                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= ' (' . $possibilitiesBLokus['Braun'] . '% Chance auf Braune Sable)';
                            }


                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('Orange Sable', $possibilitiesColor).'</td>';

                        } else if ($wert === 'Wildfarben') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            if (array_key_exists('Schwarzmasken', $possibilitiesELokus)) {
                                $addon .= ' (' . $possibilitiesELokus['Schwarzmasken'] . '% Schwarzmasken)';
                            }

                            //Einfluss braun auf Schwarzen Bereich -> Wolfsable
                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= ' (' . $possibilitiesBLokus['Braun'] . '% Chance auf Braune Fellfarbe)';
                            }

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('Wildfarben', $possibilitiesColor).'</td>';
                        } else if ($wert === 'Saddle Tan') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            if (array_key_exists('Schwarzmasken', $possibilitiesELokus)) {
                                $addon .= ' (' . $possibilitiesELokus['Schwarzmasken'] . '% Schwarzmasken)';
                            }

                            //Einfluss braun auf Schwarzen Bereich -> Brown & Tan Saddle Tan
                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= ' (' . $possibilitiesBLokus['Braun'] . '% Chance auf Braune Fellfarbe)';
                            }

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('Saddle Tan', $possibilitiesColor).'</td>';
                        } else if ($wert === 'Black and Tan') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            if (array_key_exists('Schwarzmasken', $possibilitiesELokus)) {
                                $addon .= ' (' . $possibilitiesELokus['Schwarzmasken'] . '% Schwarzmasken)';
                            }

                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= ' (' . $possibilitiesBLokus['Braun'] . '% Chance auf Brown and Tan)';
                            }

                            if (array_key_exists('Stärkste Aufhellung', $possibilitiesILokus)) {
                                $addon .= ' (' . $possibilitiesILokus['Stärkste Aufhellung'] . '% Chance auf Black and Silver)';
                            }

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('Black and Tan', $possibilitiesColor).'</td>';
                        } else {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);
                            $possibilitiesdomSchwarz = [];
                            $possibilitiesdomSchwarz['B'] = $possibilitiesBLokus;
                            $possibilitiesdomSchwarz['D'] = $possibilitiesDLokus;
                            $possibilitiesdomSchwarz['S'] = $possibilitiesSLokus;

                            //Einfluss braun auf Schwarzen Bereich -> Brown
                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= ' (' . $possibilitiesBLokus['Braun'] . '% Chance auf Braune Fellfarbe)';
                            }

                            //Einfluss dilute auf Schwarzen Bereich -> Silver
                            if (array_key_exists('Dilute', $possibilitiesDLokus)) {
                                $addon .= ' (' . $possibilitiesDLokus['Dilute'] . '% Chance auf Silberne Fellfarbe)';
                            }

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '<br>
                                    '.$this->ausgabeBild('dominantes Schwarz', $possibilitiesdomSchwarz).'</td>';
                        }
                    }
                    $content .= '</table>';
                }


            }
        }

        $content .= '
            </ul></div>
        ';

        return $content;
    }

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
}