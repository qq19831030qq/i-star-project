<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'sys_log',
    'field'   => array(
        'id'        => PARAM_UINT,
        'created'   => PARAM_DATETIME,
        'content'   => PARAM_TEXT,
    )
);