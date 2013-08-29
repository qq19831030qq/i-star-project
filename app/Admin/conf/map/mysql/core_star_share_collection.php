<?php
if (!defined('ISTAR_VERSION')) exit('Access is no allowed.');

return array(
    'table' => 'core_star_share_collection',
    'field'   => array(
        'id'        => PARAM_UINT,
        'uid'       => PARAM_UINT,
        'created'   => PARAM_DATETIME,
        'updated'   => PARAM_DATETIME,
    )
);