<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */


    'date' => 'A(z) :attribute nem érvényes dátum.',
    'email' => 'A(z) :attribute nem érvényes email formátum.',
    'file' => 'A(z) :attribute fájl kell, hogy legyen!',
    'image' => 'A(z) :attribute képfájl kell, hogy legyen!',

    'max' => [
        'file' => 'A(z) :attribute mérete nem lehet több, mint :max kilobájt.',
        'numeric' => 'A(z) :attribute maximum :max lehet.',
        'string'  => 'A(z) :attribute maximum :max karakter lehet.',
    ],

    'mimes' => 'A(z) :attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'mimetypes' => 'A(z) :attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',

    'min' => [
        'file' => 'A(z) :attribute mérete nem lehet kevesebb, mint :min kilobájt.',
        'numeric' => 'A(z) :attribute minimum :min kell legyen.',
        'string'  => 'A(z) :attribute minimum :min karakter kell legyen.',
    ],

    'required' => 'A(z) :attribute megadása kötelező!',
    'size' => [
        'file' => 'A(z) :attribute mérete :size kilobájt kell, hogy legyen!',
    ],

    'string' => 'A(z) :attribute szöveg kell, hogy legyen.',
    'unique' => 'A(z) :attribute már foglalt.',

    'confirmed' => 'A(z) :attribute nem talál.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'nev' => 'név',
        'name' => 'név',
        'email' => 'email cím',
        'pozicio' => 'pozíció',
        'idopont' => 'időpont',
        'helyszin' => 'helyszín',
        'tipus' => 'típus',
        'leiras' => 'leírás',
        'kepek.*' => 'kép',
        'password' => 'jelszó'
    ],

];
