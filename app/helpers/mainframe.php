<?php

use App\Mainframe\Features\Mf;

function modules()
{
    return Mf::modules();
}

/**
 * create uuid
 *
 * @return string
 */
function uuid()
{
    try {
        return Webpatser\Uuid\Uuid::generate(4);
    } catch (Exception $e) {
    }

}