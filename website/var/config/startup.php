<?php
/**
 * This file is called directly after the pimcore startup (/pimcore/config/startup.php)
 * Here you can do some modifications before the dispatch process begins, this includes some Zend Framework plugins
 * or some other things which should be done before the initialization of pimcore is completed, below are some examples.
 * IMPORTANT: Please rename this file to startup.php to use it!
 */

/*
// register a custom ZF controller plugin
$front = \Zend_Controller_Front::getInstance();
$front->registerPlugin(new \Website\Controller\Plugin\Custom(), 700);
*/

/*
// register a custom ZF route
$router = $front->getRouter();
$routeCustom = new \Zend_Controller_Router_Route(
    'custom/:controller/:action/*',
    array(
        'module' => 'custom',
        "controller" => "index",
        "action" => "index"
    )
);
$router->addRoute('custom', $routeCustom);
$front->setRouter($router);
*/
//add action helpers
\Zend_Controller_Action_HelperBroker::addPath(PIMCORE_WEBSITE_PATH.'/lib/Website/Controller/Action/Helper', '\\Website\\Controller\\Action\\Helper');

//autoload Elasticserach client
if (file_exists(PIMCORE_WEBSITE_PATH.'/lib/Elasticsearch/vendor/autoload.php')) {
	require_once PIMCORE_WEBSITE_PATH.'/lib/Elasticsearch/vendor/autoload.php';
}
