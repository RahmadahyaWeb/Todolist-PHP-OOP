<?php

namespace Helper {
    class InputHelper
    {
        static function input(string $info)
        {
            echo "$info";
            $result = fgets(STDIN);
            return trim($result);
        }
    }
}
