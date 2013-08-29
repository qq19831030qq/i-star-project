<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'sys_account',
    'field'   => array(
        'aid'       => PARAM_UINT,
        'aname'     => PARAM_STRING,
        'apwd'      => PARAM_STRING,
        'atype'     => PARAM_UINT,
        'created'   => PARAM_DATETIME,
        'updated'   => PARAM_DATETIME,
    )
);