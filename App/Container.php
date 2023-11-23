<?php

namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {
    public function __construct($config) {
        parent::__construct($config);
        
        $this["\App\Models\Portraits"] = function($container) {
            return new \App\Models\Portraits($container["\App\Models\Database"]->getConnection());
        };

        $this["\App\Models\Groups"] = function($container) {
            return new \App\Models\Groups($container["\App\Models\Database"]->getConnection());
        };

        $this["\App\Models\Recoveries"] = function($container) {
            return new \App\Models\Recoveries($container["\App\Models\Database"]->getConnection());
        };

        $this["\App\Models\Users"] = function($container) {
            return new \App\Models\Users($container["\App\Models\Database"]->getConnection());
        };

        $this["\App\Helpers\Passwords"] = function($container) {
            return new \App\Helpers\Passwords(
                $container["config"]["passwordPolicy"]["minLength"],
                $container["config"]["passwordPolicy"]["maxLength"],
                $container["config"]["passwordPolicy"]["minLetters"],
                $container["config"]["passwordPolicy"]["minNumbers"],
                $container["config"]["passwordPolicy"]["minSymbols"],
                $container["config"]["passwordPolicy"]["minUppercase"],
                $container["config"]["passwordPolicy"]["minLowercase"],
                $container["config"]["passwordPolicy"]["symbols"]
            );
        };

        $this["\App\Models\Database"] = function($container) {
            return new \App\Models\Database(
                $container["config"]["database"]["user"],
                $container["config"]["database"]["password"],
                $container["config"]["database"]["database"],
                $container["config"]["database"]["host"]
            );
        };
    }
}