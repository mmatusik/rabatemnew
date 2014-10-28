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
            'AddForm' => 'Offer\Form\AddForm',
            'CompanyForm' => 'Offer\Form\CompanyForm',
            'PhotoForm' => 'Offer\Form\PhotoForm',
            'CityForm' => 'Offer\Form\CityForm',
            'CompanyaddForm' => 'Offer\Form\CompanyaddForm',
            'EditForm' => 'Offer\Form\EditForm',
        ),                         
    ),
    'router' => array(
        'routes' => array(
            'offer' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/offer[/:action][/:link][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Offer\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'editoffer' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/editoffer[/:action][/:link][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Offer\Controller\Edit',
                        'action'     => 'index',
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
    'translator' => array(
        'locale' => 'pl_PL',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../../Application/language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Offer\Controller\Index' => 'Offer\Controller\IndexController',
            'Offer\Controller\Edit' => 'Offer\Controller\EditController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../../Dashboard/view/layout/layout.phtml',
            'offer/index/index' => __DIR__ . '/../view/offer/index/index.phtml',
            'offer/index/add_1' => __DIR__ . '/../view/offer/index/add_1.phtml',
            'offer/index/add_2' => __DIR__ . '/../view/offer/index/add_2.phtml',
            'error/404'               => __DIR__ . '/../../Application/view/error/404.phtml',
            'error/index'             => __DIR__ . '/../../Application/view/error/index.phtml',
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
