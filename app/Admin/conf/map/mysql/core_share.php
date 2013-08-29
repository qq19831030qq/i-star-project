<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'core_share',
    'field'   => array(
        'id'        => PARAM_UINT,
        'uid'       => PARAM_UINT,
        'stid'      => PARAM_UINT,
        's_c_id'    => PARAM_UINT,
        'desc'      => PARAM_STRING,
        'img_group' => PARAM_TEXT,
        'created'   => PARAM_DATETIME,
        'updated'   => PARAM_DATETIME,
    )
);