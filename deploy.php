<?php

namespace Hypernode\DeployConfiguration;

$configuration = new ApplicationTemplate\Magento2(['en_US']);

$productionStage = $configuration->addStage('staging', 'magento2.testhipex.nl');
$productionStage->addServer('hntestrolf.hypernode.io');

return $configuration;