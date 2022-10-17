<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDO\MySQL\Driver::class,
                'params' => [
                    'host'     => '127.0.0.1',
                    'port'     => '3306',
                    'user'     => 'website',
                    'password' => '',
                    'dbname'   => 'website',
                    'charset'  => 'utf8'
                ]
            ],

            'orm_xyllela' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDO\MySQL\Driver::class,
                'params' => [
                    'host'     => '127.0.0.1',
                    'port'     => '3306',
                    'user'     => 'website',
                    'password' => '',
                    'dbname'   => 'testes',
                    'charset'  => 'utf8',
                    'engine'   => 'InnoDB'
                ]
            ],
        ],
        'entitymanager' => array(
            'orm_default' => array(
                'connection'    => 'orm_default',
                'configuration' => 'orm_default',
            ),
            'orm_xyllela' => array(
                'connection'    => 'orm_xyllela',
                'configuration' => 'orm_xyllela',
            ),
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'hydration_cache' => 'array',
                'generate_proxies' => true
            ),
            'orm_xyllela' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'hydration_cache' => 'array',
                'generate_proxies' => true,
            ),
        ),
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => 'data/Migrations',
                'name'      => 'Doctrine Database Migrations',
                'namespace' => 'Migrations',
                'table'     => 'migrations',
            ],
        ],
    ],
    'api'=>'AIzaSyCnXDlJRDL2w8ql2SOgNy59qosPQ4pRg44',
    'gfidoc'=>['url'=>'http://172.16.0.195/api/gfi.apiwcf/apiservices?wsdl',
        'location'=>'http://172.16.0.195/api/gfi.apiwcf/apiservices'],
    'caches' => array(
        'memcached' => array( //can be called directly via SM in the name of 'memcached'
            'adapter' => array(
                'name'     =>'memcache',
                'options'  => array(
                    'ttl' => 60*60*12,
                    //'cache_dir' => __DIR__.'/cache',
                    'servers'   => array(
                        0=> array(
                            '127.0.0.1',11211
                        ),
                    ),
                    'compression'=>true,
                    'namespace'  => 'MYMEMCACHEDNAMESPACE',
                    /*
                    'liboptions' => array (
                        'COMPRESSION' => true,
                        'binary_protocol' => true,
                        'no_block' => true,
                        'connect_timeout' => 100
                    )*/
                )
            ),
            'plugins' => array(
                'exception_handler' => array(
                    'throw_exceptions' => false
                ),
            ),
        ),
        'FilesystemCache' => [
            'adapter' => [
                'name'    => Laminas\Cache\Storage\Adapter\Filesystem::class,
                'options' => [
                    // Store cached data in this directory.
                    'cache_dir' => './data/cache',
                    // Store cached data for 1 hour.
                    'ttl' => 60*60*12
                ],
            ],
            'plugins' => [
                [
                    'name' => 'serializer',
                    'options' => [
                    ],
                ],
            ],
        ],
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Laminas\Cache\Service\StorageCacheAbstractServiceFactory',
        )
    ),
    'session_config' => [
        // Session cookie will expire in 1 hour.
        'cookie_lifetime' => 60*60*12,
        // Session data will be stored on server maximum for 30 days.
        'gc_maxlifetime'     => 60*60*24*30,
    ],
    // Session manager configuration.
    'session_manager' => [
        // Session validators (used for security).
        'validators' => [
            \Laminas\Session\Validator\RemoteAddr::class,
            \Laminas\Session\Validator\HttpUserAgent::class,
        ]
    ],
    // Session storage configuration.
    'session_storage' => [
        'type' => \Laminas\Session\Storage\SessionArrayStorage::class
    ],
];
