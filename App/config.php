<?php

return [
    "host" => "http://localhost:8080",
    "database" => [
        "user" => Emeset\Env::get("DATABASE_USER", "YOUR_USER"),
        "password" => Emeset\Env::get("DATABASE_PASSWORD", "YOUR_PASSWORD"),
        "database" => Emeset\Env::get("DATABASE_DATABASE", "YOUR_DATABASE"),
        "host" => Emeset\Env::get("DATABASE_HOST", "YOUR_HOST")
    ],
    "passwordPolicy" => [
        "minLength" => Emeset\Env::get("PASSWORD_MIN_LENGTH", 6),
        "maxLength" => Emeset\Env::get("PASSWORD_MAX_LENGTH", 13),
        "minLetters" => Emeset\Env::get("PASSWORD_MIN_LETTERS", 1),
        "minNumbers" => Emeset\Env::get("PASSWORD_MIN_NUMBERS", 1),
        "minSymbols" => Emeset\Env::get("PASSWORD_MIN_SYMBOLS", 1),
        "minUppercase" => Emeset\Env::get("PASSWORD_MIN_UPPERCASE", 1),
        "minLowercase" => Emeset\Env::get("PASSWORD_MIN_LOWERCASE", 1),
        "symbols" => Emeset\Env::get("PASSWORD_SYMBOLS", "!@#$%^&*()_-=+{}[]")
    ],
    "smtp" => [
        "host" => Emeset\Env::get("SMTP_HOST", "YOUR_HOST"),
        "port" => Emeset\Env::get("SMTP_PORT", "YOUR_PORT"),
        "auth" => Emeset\Env::get("SMTP_AUTH", "YOUR_AUTH"),
        "username" => Emeset\Env::get("SMTP_USERNAME", "YOUR_USERNAME"),
        "password" => Emeset\Env::get("SMTP_PASSWORD", "YOUR_PASSWORD"),
        "secure" => Emeset\Env::get("SMTP_SECURE", "YOUR_SECURE"),
    ]
];