<?php

use App\Models\CanteenGroupModel;
use App\Models\CanteenModel;

if (!function_exists('canteen_setup_check')) {
    function canteen_setup_check()
    {
        return model(CanteenModel::class)->getCanteenID(user_id()) === null ? true : false;
    }
}

if (!function_exists('get_canteen_id')) {
    function get_canteen_id()
    {
        return model(CanteenGroupModel::class)->getCanteenID(user_id());
    }
}
