<?php

namespace App\Helpers;

/**
 * Class Passwords
 *
 * This class manages password-related operations such as generation, hashing, and verification.
 */
class Passwords {

    // Properties to define password criteria
    public $minLength,
           $maxLength,
           $minLetters,
           $minNumbers,
           $minSymbols,
           $minUppercase,
           $minLowercase,
           $symbols;

    /**
     * Passwords constructor.
     *
     * @param int    $minLength Minimum password length.
     * @param int    $maxLength Maximum password length.
     * @param int    $minLetters Minimum number of letters.
     * @param int    $minNumbers Minimum number of numbers.
     * @param int    $minSymbols Minimum number of symbols.
     * @param int    $minUppercase Minimum number of uppercase letters.
     * @param int    $minLowercase Minimum number of lowercase letters.
     * @param string $symbols Symbols allowed in passwords.
     */
    public function __construct(
        $minLength = 6,
        $maxLength = 13,
        $minLetters = 1,
        $minNumbers = 1,
        $minSymbols = 1,
        $minUppercase = 1,
        $minLowercase = 1,
        $symbols = "!@#$%^&*()_-=+{}[]"
    ) {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->minLetters = $minLetters;
        $this->minNumbers = $minNumbers;
        $this->minSymbols = $minSymbols;
        $this->minUppercase = $minUppercase;
        $this->minLowercase = $minLowercase;
        $this->symbols = $symbols;
    }

    /**
     * Generate a random password based on specified criteria.
     *
     * @return string The generated password.
     */
    public function generate() {
        // Password character sets
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $symbolsArray = str_split($this->symbols);
        
        // Initialize variables to hold selected characters
        $selectedLetters = $selectedNumbers = $selectedSymbols = $selectedUpperCase = $selectedLowerCase = '';

        // Generate character sets based on criteria
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

        // Shuffle and combine selected characters
        $combinedChars = $selectedLetters . $selectedNumbers . $selectedSymbols . $selectedUpperCase . $selectedLowerCase;
        $generatedPassword = str_shuffle($combinedChars);

        // Truncate the password to a random length within specified bounds
        $generatedPassword = substr($generatedPassword, 0, rand($this->minLength, $this->maxLength));

        return $generatedPassword;
    }
    
    /**
     * Hash a password using PHP's password_hash function.
     *
     * @param string $password The password to be hashed.
     * @return string The hashed password.
     */
    public function hash($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verify if a password matches a given hash using password_verify function.
     *
     * @param string $password The password to be verified.
     * @param string $hash The hashed password to compare against.
     * @return bool Returns true if the password matches the hash, otherwise false.
     */
    public function verify($password, $hash) {
        return password_verify($password, $hash);
    }

    /**
     * Check if a password meets defined directives.
     *
     * @param string $password The password to check.
     * @return array|bool Returns an array with error/message if criteria aren't met, otherwise success message.
     */
    public function meetsDirectives($password) {
        $upperCaseLetters = "ABCDEFGHIJKLMNOQPRSTUVWXYZ";
        $nUpperCaseLetters = 0;

        $lowerCaseLetters = strtolower($upperCaseLetters);
        $nLowerCaseLetters = 0;

        $numbers = "0123456789";
        $nNumbers = 0;

        $symbols = "!@#$%^&*()_-=+{}[]";
        $nSymbols = 0;

        $passwordLength = strlen($password);

        // Check password length
        if ($passwordLength < $this->minLength || $passwordLength > $this->maxLength) {
            return [
                "error" => 1,
                "message" => "Password length must be between " . $this->minLength . " and " . $this->maxLength . " characters."
            ];
        }

        // Iterate through the password characters to count each type
        for ($i = 0; $i < $passwordLength; $i++) {
            $char = $password[$i];

            if (strpos($upperCaseLetters, $char) !== false) {
                $nUpperCaseLetters++;
            } else if (strpos($lowerCaseLetters, $char) !== false) {
                $nLowerCaseLetters++;
            } else if (strpos($numbers, $char) !== false) {
                $nNumbers++;
            } else if (strpos($symbols, $char) !== false) {
                $nSymbols++;
            }
        }

        // Check if the password meets criteria for each character type
        if ($nUpperCaseLetters < $this->minUppercase) {
            return [
                "error" => 1,
                "message" => "La contrasenya ha de contindre almenys " . $this->minUppercase . " lletres majúscules."
            ];
        }

        if ($nLowerCaseLetters < $this->minLowercase) {
            return [
                "error" => 1,
                "message" => "La contrasenya ha de contindre almenys " . $this->minLowercase . " lletres minúscules."
            ];
        }

        if ($nNumbers < $this->minNumbers) {
            return [
                "error" => 1,
                "message" => "La contrasenya ha de contindre almenys " . $this->minNumbers . " numeros."
            ];
        }

        if ($nSymbols < $this->minSymbols) {
            return [
                "error" => 1,
                "message" => "La contrasenya ha de contindre almenys " . $this->minSymbols . " símbols."
            ];
        }
        
        return [
            "error" => 0,
            "message" => "La contrasenya compleix els requisits."
        ];
    }        
}
