<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'form_elements' => array(
        'invokables' => array(
            'DownForm' => 'Podglad\Form\DownForm',
        ),                         
    ),
    'router' => array(
        'routes' => array(
            'podglad' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/podglad[/:link][/:action]',
                    'constraints' => array(
                        'link' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Podglad\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'pobierz' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pobierz[/:link]',
                    'constraints' => array(
                        'link' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Podglad\Controller\Index',
                        'action'     => 'pobierz',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Podglad\Controller\Index' => 'Podglad\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
                'template_map' => array(
            'layout/rabat'           => __DIR__ . '/../../City/view/layout/rabat.phtml',
            'login/index/index' => __DIR__ . '/../view/login/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
