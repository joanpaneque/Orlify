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
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $symbolsArray = str_split($this->symbols);
    
        $selectedLetters = $selectedNumbers = $selectedSymbols = $selectedUpperCase = $selectedLowerCase = '';
    
        for ($i = 0; $i < $this->minLetters; $i++) {
            $selectedLetters .= $letters[rand(0, strlen($letters) - 1)];
        }
    
        for ($i = 0; $i < $this->minNumbers; $i++) {
            $selectedNumbers .= $numbers[rand(0, strlen($numbers) - 1)];
        }
    
        for ($i = 0; $i < $this->minSymbols; $i++) {
            $selectedSymbols .= $this->symbols[rand(0, count($symbolsArray) - 1)];
        }
    
        for ($i = 0; $i < $this->minUppercase; $i++) {
            $selectedUpperCase .= $upperCase[rand(0, strlen($upperCase) - 1)];
        }
    
        for ($i = 0; $i < $this->minLowercase; $i++) {
            $selectedLowerCase .= $lowerCase[rand(0, strlen($lowerCase) - 1)];
        }
    
        $combinedChars = $selectedLetters . $selectedNumbers . $selectedSymbols . $selectedUpperCase . $selectedLowerCase;
        $generatedPassword = str_shuffle($combinedChars);
    
        $generatedPassword = substr($generatedPassword, 0, rand($this->minLength, $this->maxLength));
    
        return $generatedPassword;
    }
    

    public function hash($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verify($password, $hash) {
        return password_verify($password, $hash);
    }
}