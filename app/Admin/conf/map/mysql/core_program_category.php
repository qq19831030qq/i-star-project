<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'core_program_category',
    'field'   => array(
        'id'        => PARAM_UINT,
        'name'      => PARAM_STRING,
    )
);