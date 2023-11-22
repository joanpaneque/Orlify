<?php

return [
    "database" => [
        "user" => Emeset\Env::get("DATABASE_USER", "YOUR_USER"),
        "password" => Emeset\Env::get("DATABASE_PASSWORD", "YOUR_PASSWORD"),
        "database" => Emeset\Env::get("DATABASE_DATABASE", "YOUR_DATABASE"),
        "host" => Emeset\Env::get("DATABASE_HOST", "YOUR_HOST")
    ]
];