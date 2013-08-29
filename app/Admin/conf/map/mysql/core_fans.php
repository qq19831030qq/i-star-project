<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'core_fans',
    'field'   => array(
        'uid'       => PARAM_UINT,
        'nickname'  => PARAM_STRING,
        'avatar'    => PARAM_STRING,
        'created'   => PARAM_DATETIME,
        'updated'   => PARAM_DATETIME,
    )
);