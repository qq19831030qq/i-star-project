<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'core_star',
    'field'   => array(
        'id'        => PARAM_UINT,
        'truename'  => PARAM_STRING,
        'p_id'      => PARAM_UINT,
        'nickname'  => PARAM_STRING,
        'fans_tag'  => PARAM_STRING,
        'avatar'    => PARAM_STRING,
        'created'   => PARAM_DATETIME,
        'updated'   => PARAM_DATETIME,
    )
);