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

        $this["\App\Models\Users"] = function($container) {
            return new \App\Models\Users($container["\App\Models\Database"]->getConnection());
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