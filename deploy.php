<?php
namespace Hypernode\DeployConfiguration;

$configuration = new ApplicationTemplate\Magento2(
 // Your GIT repository url
 'git@github.com:rvandebovenkamp/hypernode_deploy.git',
 // Frontend locales
 ['nl_NL'],
 // Backend locales
 ['nl_NL']
);

$stagingStage = $configuration->addStage('staging', 'magento2.testhipex.nl');
$stagingStage->addServer('hntestrolf.hypernode.io');

$configuration->setSharedFiles([
    'app/etc/env.php',
    'pub/errors/local.xml'
]);
$configuration->setSharedFolders([
    'var/log',
    'var/session',
    'var/report',
    'pub/media'
]);

$configuration->addDeployCommand(new Command\Deploy\Magento2\MaintenanceMode());
$configuration->addDeployCommand(new Command\Deploy\Magento2\SetupUpgrade());
$configuration->addDeployCommand(new Command\Deploy\Magento2\CacheFlush());


return $configuration;