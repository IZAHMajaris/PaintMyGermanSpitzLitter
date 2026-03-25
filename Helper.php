<?php

namespace Ausgabe;

const getColorCodes = [
    'E' => [
        'NN' => 'keine phänotypische Ausprägung von rezzesivem Gelb',
        'NEM' => 'Träger Schwarzmaske',
        'EMN' => 'Träger Schwarzmaske',
        'Ne1' => 'Träger rezzesiv Gelb',
        'e1N' => 'Träger rezzesiv Gelb',
        'EMEM' => 'Schwarzmasken',
        'EMe1' => 'Träger rezzesiv Gelb und Schwarzmaske',
        'e1EM' => 'Träger rezzesiv Gelb und Schwarzmaske',
        'e1e1' => 'rezzesiv Gelb',
    ],
    'K' => [
        'KbKb' => 'dominantes Schwarz',
        'Kbky' => 'dominantes Schwarz',
        'kyKb' => 'dominantes Schwarz',
        'kyky' => 'keine phänotypische Ausprägung von dominantem Schwarz'
    ],
    'A' => [
        'DYDY' => 'dominantes Gelb',
        'DYSY' => 'dominantes Gelb',
        'DYAG' => 'dominantes Gelb',
        'DYBS' => 'dominantes Gelb',
        'DYBB' => 'dominantes Gelb',
        'DYa' => 'dominantes Gelb',
        'SYDY' => 'dominantes Gelb',
        'SYSY' => 'Orange Sable',
        'SYAG' => 'Orange Sable',
        'SYBS' => 'Orange Sable',
        'SYBB' => 'Orange Sable',
        'SYa' => 'Orange Sable',
        'AGDY' => 'dominantes Gelb',
        'AGSY' => 'Orange Sable',
        'AGAG' => 'Wildfarben',
        'AGBS' => 'Wildfarben',
        'AGBB' => 'Wildfarben',
        'AGa' => 'Wildfarben',
        'BSDY' => 'dominantes Gelb',
        'BSSY' => 'Orange Sable',
        'BSAG' => 'Wildfarben',
        'BSBS' => 'Saddle Tan',
        'BSBB' => 'Saddle Tan',
        'BSa' => 'Saddle Tan',
        'BBDY' => 'dominantes Gelb',
        'BBSY' => 'Orange Sable',
        'BBAG' => 'Wildfarben',
        'BBBS' => 'Saddle Tan',
        'BBBB' => 'Black and Tan',
        'BBa' => 'Black and Tan',
        'aDY' => 'dominantes Gelb',
        'aSY' => 'Orange Sable',
        'aAG' => 'Wildfarben',
        'ABS' => 'Saddle Tan',
        'aBB' => 'Black and Tan',
        'aa' => 'rezessives Schwarz',
    ],
    'B' => [
        'bdbd' => 'Braun',
        'bdbc' => 'Braun',
        'bdbs' => 'Braun',
        'bdN' => 'Braun Träger',
        'Nbd' => 'Braun Träger',
        'bcbc' => 'Braun',
        'bcbd' => 'Braun',
        'bcbs' => 'Braun',
        'bcN' => 'Braun Träger',
        'Nbc' => 'Braun Träger',
        'bsbs' => 'Braun',
        'bsbd' => 'Braun',
        'bsbc' => 'Braun',
        'bsN' => 'Braun Träger',
        'Nbs' => 'Braun Träger',
        'NN' => 'kein Braun'
    ],
    'D' => [
        'd1d1' => 'Dilute',
        'd1N' => 'Dilute Träger',
        'Nd1' => 'Dilute Träger',
        'NN' => 'kein Dilute'
    ],
    'I' => [
        'II' => 'Keine Aufhellung',
        'Ii' => 'Leichte Aufhellung',
        'iI' => 'Leichte Aufhellung',
        'ii' => 'Stärkste Aufhellung'
    ],
    'S' => [
        'SS' => 'Starke Scheckung',
        'SN' => 'kleinere Abzeichen',
        'NS' => 'kleinere Abzeichen',
        'NN' => 'keine Scheckung'
    ]
];

class Helper
{
    public function transform($name, $lokus){
        $result = [];
        foreach($lokus as $l){
            $result[] = getColorCodes[$name][$l];
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

                    if (array_key_exists('Stärkste Aufhellung', $possibilitiesILokus)) {
                        $addon .= ' (' . $possibilitiesILokus['Stärkste Aufhellung'] . '% Chance auf Weiße Fellfarbe)';
                    }

                    $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                    $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';
                } else {
                    $content .= '<td style="width: ' . $prozent . '%; background-color:lightyellow"><b>' . $prozent . '% ' . $wert . '</b><br>' . '</td>';
                }

            }
            $content .= '</table><br>';

            if (array_key_exists('keine phänotypische Ausprägung von rezzesivem Gelb', $this->possibilitiesLokus('E', $combinationsParents['E'])) ||
                array_key_exists('Träger rezzesiv Gelb', $this->possibilitiesLokus('E', $combinationsParents['E']))
            ) {
                $content .= '<b>K-Lokus</b><table style="width: 100%;">';

                foreach ($this->possibilitiesLokus('K', $combinationsParents['K']) as $wert => $prozent) {

                    if ($wert === 'dominantes Schwarz') {
                        $addon = '';

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

                        $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';

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

                        if ($wert === 'dominantes Gelb') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';
                        } else if ($wert === 'Orange Sable') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';

                        } else if ($wert === 'Wildfarben') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';
                        } else if ($wert === 'Saddle Tan') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';
                        } else if ($wert === 'Black and Tan') {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            if (array_key_exists('Braun', $possibilitiesBLokus)) {
                                $addon .= ' (' . $possibilitiesBLokus['Braun'] . '% Chance auf Brown and Tan)';
                            }

                            if (array_key_exists('Stärkste Aufhellung', $possibilitiesILokus)) {
                                $addon .= ' (' . $possibilitiesILokus['Stärkste Aufhellung'] . '% Chance auf Black and Silver)';
                            }

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';
                        } else {
                            $addon .= $this->ausgabeSLokus($possibilitiesSLokus);

                            $content .= '<td style="width: ' . $prozent . '%;"><b>' . $prozent . '% ' . $wert . '</b><br>' . $addon . '</td>';
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