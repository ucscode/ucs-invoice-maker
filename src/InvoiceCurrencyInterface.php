<?php

interface InvoiceCurrencyInterface {

    public const CURRENCIES = [
        'USD' => [
            'name' => 'United States Dollar',
            'symbol' => '$',
            'entity' => '&#36;', // Corrected entity for USD
        ],
        'EUR' => [
            'name' => 'Euro',
            'symbol' => '€',
            'entity' => '&#8364;', // Corrected entity for EUR
        ],
        'GBP' => [
            'name' => 'British Pound',
            'symbol' => '£',
            'entity' => '&#163;', // Corrected entity for GBP
        ],
        'JPY' => [
            'name' => 'Japanese Yen',
            'symbol' => '¥',
            'entity' => '&#165;', // Corrected entity for JPY
        ],
        'CNY' => [
            'name' => 'Chinese Yuan Renminbi',
            'symbol' => '¥',
            'entity' => '¥', // Entity for CNY seems to be correct
        ],
        'INR' => [
            'name' => 'Indian Rupee',
            'symbol' => '₹',
            'entity' => '&#8377;', // Corrected entity for INR
        ],
        'ZAR' => [
            'name' => 'South African Rand',
            'symbol' => 'R',
            'entity' => 'R', // Entity for ZAR seems to be correct
        ],
        'RUB' => [
            'name' => 'Russian Ruble',
            'symbol' => '₽',
            'entity' => '&#8381;', // Corrected entity for RUB
        ],
        'KRW' => [
            'name' => 'South Korean Won',
            'symbol' => '₩',
            'entity' => '&#8361;', // Corrected entity for KRW
        ],
        'TRY' => [
            'name' => 'Turkish Lira',
            'symbol' => '₺',
            'entity' => '&#8378;', // Corrected entity for TRY
        ],
        'CHF' => [
            'name' => 'Swiss Franc',
            'symbol' => '₣',
            'entity' => '&#8355;', // Corrected entity for CHF
        ],
        'LAK' => [
            'name' => 'Lao Kip',
            'symbol' => '₭',
            'entity' => '&#8365;', // Corrected entity for LAK
        ],
        'NGN' => [
            'name' => 'Nigerian Naira',
            'symbol' => '₦',
            'entity' => '&#8358;', // Corrected entity for NGN
        ],
        'PKR' => [
            'name' => 'Pakistani Rupee',
            'symbol' => '₨',
            'entity' => '&#8360;', // Corrected entity for PKR
        ]
    ];


}