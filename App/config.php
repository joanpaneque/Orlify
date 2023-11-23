<?php

return [
    "database" => [
        "user" => Emeset\Env::get("DATABASE_USER", "YOUR_USER"),
        "password" => Emeset\Env::get("DATABASE_PASSWORD", "YOUR_PASSWORD"),
        "database" => Emeset\Env::get("DATABASE_DATABASE", "YOUR_DATABASE"),
        "host" => Emeset\Env::get("DATABASE_HOST", "YOUR_HOST")
    ],
    "passwordPolicy" => [
        "minLength" => 6,
        "maxLength" => 13,
        "minLetters" => 1,
        "minNumbers" => 1,
        "minSymbols" => 1,
        "minUppercase" => 1,
        "minLowercase" => 1,
        "symbols" => "!@#$%^&*()_-=+{}[]"
    ]
];