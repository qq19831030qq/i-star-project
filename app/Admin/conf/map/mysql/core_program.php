<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'core_program',
    'field'   => array(
        'id'        => PARAM_UINT,
        'p_c_id'    => PARAM_UINT,
        'p_a_id'    => PARAM_UINT,
        'name'      => PARAM_STRING,
        'logo'      => PARAM_STRING,
        'created'   => PARAM_DATETIME,
        'updated'   => PARAM_DATETIME,
    )
);