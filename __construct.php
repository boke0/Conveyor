<?php

namespace Boke0\Mechanism\Plugins\Conveyor;
use \Boke0\Mechanism\Api\Plugin;

$plugin=new Plugin();

$plugin->endpoint(AssetsEndpoint::class);
$plugin->endpoint(ImagesEndpoint::class);
$plugin->endpoint(UploadEndpoint::class);
$plugin->endpoint(DeleteEndpoint::class);

return $plugin;
