<?php

/* Cuando actualice algo desde acá ejecutar:

php artisan config:cache
php artisan db:seed --class=ListsSeeder 

*/

return [
    'lists' => [
        'titles' => 'Cargos',
        'genders' => 'Géneros',
        'municipalities' => 'Municipios',
        'types_of_housing' => 'Tipos de Vivienda',
        'stratums' => 'Estratos',
        'maritals_status' => 'Estados Civiles',
        'health' => 'Salud',
        'pension' => 'Fondo de pensiones',
        'cesantia' => 'Fondo de cesantias',
        'arl' => 'ARL',
        'account_types' => 'Tipos de Cuenta',
        'banks' => 'Bancos',
        'concept_types' => 'Concepto del Contrato',
        'rh' => 'Rh',

    ],
    'default' => [
        'titles' => [
            'Administración',
            'Auxiliar Enfermería',
            'Auxiliar Laboratorio',
            'Auxiliar Odontología',
            'Auxiliar Punto de servicios',
            'Auxiliar Radiología',
            'Bacteriología',
            'Especialistas',
            'Jefe Enfermería',
            'Médicos',
            'Odontología',
            'Orientadores',
            'Practicante',
            'Radiólogo',
            'Servicios Generales',
        ],
        'genders' => [
            'Femenino',
            'Masculino',
        ],
        'municipalities' => [
            'Barbosa',
            'Girardota',
            'Copacabana',
            'Bello',
            'Medellín',
            'Envigado',
            'Itagûi',
            'Sabaneta',
            'La Estrella',
            'Caldas',
        ],
        'types_of_housing' => [
            'Propia',
            'Arrendada',
            'Familiar',
        ],
        'stratums' => [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
        ],
        'maritals_status' => [
            'Soltero',
            'Casado',
            'Unión Libre',
            'Divorciado',
            'Viudo',
        ],
        'health' => [
            'EPS Suramericana',
            'Nueva EPS',
            'Coomeva',
            'Medimas',
        ],
        'pension' => [
            'Protección S.A',
            'Porvernir S.A',
            'Colfondos',
            'Skandia',
            'Fondo Nacional del Ahorro'
        ],
        'cesantia' => [
            'Protección S.A',
            'Porvernir S.A',
            'Colfondos',
            'Skandia',
            'Fondo Nacional del Ahorro'
        ],
        'arl' => [
            'Suramericana',
            'Positiva',
        ],
        'account_types' => [
            'Ahorros',
            'Corriente',
        ],
        'banks' => [
            'Bancolombia',
            'Davivienda',
            'Nequi',
            'Itau',
            'Banco de Bogotá'
        ],
        'concept_types' => [
            'Prestación de servicios',
            'Término fijo',
            'Término Indefinido',
        ],
        'rh' => [
            'A+',
            'O+',
            'B+',
            'AB+',
            'A-',
            'O-',
            'B-',
            'AB-',
        ],

    ],

    'protected' => []
];
