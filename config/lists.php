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
        'arl' => 'ARL',
        'account_types' => 'Tipos de Cuenta',
        'banks' => 'Bancos',
        'contract_types' => 'Concepto del Contrato',
    ],
    'default' => [
        'titles' => [
            'Médicos',
            'Enfermería',
            'Odontología',
            'Auxiliar odontología',
            'Laboratorio',
            'Especialistas',
            'Administrativo',
            'Orientadores',
            'Auxiliar punto de servicio',
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
        'contract_types' => [
            'Prestación de servicios',
            'Término fijo',
            'Término Indefinido',
        ],
    ],

    'protected' => []
];
