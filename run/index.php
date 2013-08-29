<?php
define('ISTAR_VERSION', '0.1');

xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

include('../lib/core/bootstrap.php');

MONK::run();

$xhprof_data = xhprof_disable();
include(MONK_LIB."xhprof_lib/utils/xhprof_lib.php");
include(MONK_LIB."xhprof_lib/utils/xhprof_runs.php");
$xhprof_runs = new XHProfRuns_Default();
$xhprof_runs->save_run($xhprof_data, "istar");