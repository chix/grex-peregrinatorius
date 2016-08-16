<?php

// autoload website console commands
\Pimcore::getEventManager()->attach('system.console.init', function (\Zend_EventManager_Event $e) {
	/** @var \Pimcore\Console\Application $application */
	$application = $e->getTarget();
	$application->addAutoloadNamespace('Website\\Tool\\Console\\Command', PIMCORE_WEBSITE_PATH.'/tools/Console/Command');
});
