<?php

namespace App\Helpers;

class Passwords {

    public $minLength,
           $maxLength,
           $minLetters,
           $minNumbers,
           $minSymbols,
           $minUppercase,
           $minLowercase,
           $symbols;

    public function __construct($minLength = 6, $maxLength = 13, $minLetters = 1, $minNumbers = 1, $minSymbols = 1, $minUppercase = 1, $minLowercase = 1, $symbols = "!@#$%^&*()_-=+{}[]") {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->minLetters = $minLetters;
        $this->minNumbers = $minNumbers;
        $this->minSymbols = $minSymbols;
        $this->minUppercase = $minUppercase;
        $this->minLowercase = $minLowercase;
        $this->symbols = $symbols;
    }

    public function generate() {
        $password = "";
        $length = rand($this->minLength, $this->maxLength);
        $letters = "abcdefghijklmnopqrstuvwxyz";
        $numbers = "0123456789";
        $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowercase = "abcdefghijklmnopqrstuvwxyz";
        $symbols = str_split($this->symbols);
    
        $password .= substr(str_shuffle($letters), 0, $this->minLetters);
        $password .= substr(str_shuffle($numbers), 0, $this->minNumbers);
        $password .= substr(str_shuffle($symbols), 0, $this->minSymbols);
        $password .= substr(str_shuffle($uppercase), 0, $this->minUppercase);
        $password .= substr(str_shuffle($lowercase), 0, $this->minLowercase);
    
        $password = str_shuffle($password);
    
        if (strlen($password) < $length) {
            $password .= substr(str_shuffle($letters), 0, $length - strlen($password));
        }
    
        return str_shuffle($password);
    }

    public function hash($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verify($password, $hash) {
        return password_verify($password, $hash);
    }
}