<?php

return [
    "database" => [
        "user" => Emeset\Env::get("DATABASE_USER", "YOUR_USER"),
        "password" => Emeset\Env::get("DATABASE_PASSWORD", "YOUR_PASSWORD"),
        "database" => Emeset\Env::get("DATABASE_DATABASE", "YOUR_DATABASE"),
        "host" => Emeset\Env::get("DATABASE_HOST", "YOUR_HOST")
    ],
    "smtp" => [
        "host" => Emeset\Env::get("SMTP_HOST", "YOUR_HOST"),
        "auth" => Emeset\Env::get("SMPT_AUTH", "YOUR_AUTH"),
        "uesername" => Emeset\Env::get("SMPT_USERNAME", "YOUR_USERNAME"),
        "password" => Emeset\Env::get("SMPT_PASSWORD", "YOUR_PASSWORD"),
        "secure" => Emeset\Env::get("SMPT_SECURE", "YOUR_SECURE"),
        "pory" => Emeset\Env::get("SMPT_PORT", "YOUR_PORT"),
    ]
];