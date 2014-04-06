<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class StatisticsHelper {

    public function ran_uniform($minimum = 0, $maximum = 1){
        return mt_rand($minimum, $maximum);
    }
}
