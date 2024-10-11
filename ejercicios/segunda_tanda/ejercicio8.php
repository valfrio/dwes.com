<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejericico 8', ['/styles/general.css']);

$notas = [

    'Jorge' => [
        'Primer Trimestre'   => [
            'Primer examen' => random_int(1, 10),
            'Segundo examen' => random_int(1, 10)
        ],

        'Segundo Trimestre'  => [
            'Primer examen' => random_int(1, 10),
            'Segundo examen' => random_int(1, 10)
        ],

        'Tercer Trimestre'   => [
            'Primer examen' => random_int(1, 10),
            'Segundo examen' => random_int(1, 10)
        ]

        ],

    'Manolitros' => [
        'Primer Trimestre'   => [
            'Primer examen' => random_int(1, 10),
            'Segundo examen' => random_int(1, 10)
        ],

        'Segundo Trimestre'  => [
            'Primer examen' => random_int(1, 10),
            'Segundo examen' => random_int(1, 10)
        ],

        'Tercer Trimestre'   => [
            'Primer examen' => random_int(1, 10),
            'Segundo examen' => random_int(1, 10)
        ]

        ],

        'Paco' => [
            'Primer Trimestre'   => [
                'Primer examen' => random_int(1, 10),
                'Segundo examen' => random_int(1, 10)
            ],
    
            'Segundo Trimestre'  => [
                'Primer examen' => random_int(1, 10),
                'Segundo examen' => random_int(1, 10)
            ],
    
            'Tercer Trimestre'   => [
                'Primer examen' => random_int(1, 10),
                'Segundo examen' => random_int(1, 10)
            ]
            ]
    ];

    $trimestres = ['Primer Trimestre', 'Segundo Trimestre', 'Tercer Trimestre'];
    $personas = ['Jorge', 'Manolitros', 'Paco'];
    $examenes = ['Primer examen', 'Segundo examen'];

    function nota_media($notas, $persona, $trimestre, $examenes){
        /*
        $acumulador = 0;
        foreach( $examenes as $examen){
           
            $acumulador += $notas[$persona][$trimestre][$examen];

        }
        */
        $acumulador = array_sum($notas[$persona][$trimestre]);
        $num_examenes = count($notas[$persona][$trimestre]);
        $nota_media = round( $acumulador / $num_examenes, 2);

        return$nota_media;
    }

    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>Nombre</td>";

    foreach($trimestres as $trimestre){
        echo "<td>Nota $trimestre</td>";
    }

    echo "</tr>";

    foreach($personas as $persona){
        echo "<tr>";
            echo "<td>$persona</td>";

            foreach($trimestres as $trimestre){
                echo "<td>";
                echo "<ul>";
                foreach($examenes as $examen){
                    echo "<li>{$notas[$persona][$trimestre][$examen]}</li>";
                }
                
                
                echo "<li>Nota media: " . nota_media($notas, $persona, $trimestre, $examenes) . "</li>";
                echo "</ul>";
                echo "</td>";
            }

            
            
            
        echo "</tr>";
    }

    echo "</table>";


fin_html();

?>