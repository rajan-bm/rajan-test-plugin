<?php

/**
 * @package Rajan Test Plugin
 */

namespace Inc\Api;
use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input){
        // return filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
        return (isset($input) ? 1 : 0);
    }
}
