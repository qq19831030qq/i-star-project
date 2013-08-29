<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'sys_admin',
    'field'   => array(
        'id'        => PARAM_UINT,
        'aid'       => PARAM_UINT,
        'name'      => PARAM_STRING,
        'created'   => PARAM_DATETIME,
    )
);