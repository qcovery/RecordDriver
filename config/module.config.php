<?php
namespace RecordDriver\Module\Config;

$config = [
    'service_manager' => [
        'allow_override' => true,
        'aliases' => [
            'solrmarc' => 'RecordDriver\RecordDriver\SolrMarc'
        ],
        'delegators' => [
            'RecordDriver\RecordDriver\SolrMarc' => 'VuFind\RecordDriver\IlsAwareDelegatorFactory'
        ],
        'factories' => [
            'RecordDriver\RecordDriver\SolrMarc' => 'RecordDriver\RecordDriver\SolrDefaultFactory'
        ],
    ],
    'vufind' => [
        'plugin_managers' => [
            'recorddriver' => [
                'factories' => [
                        'RecordDriver\RecordDriver\SolrMarc' => 'RecordDriver\RecordDriver\SolrDefaultFactory',
                    ],
                'aliases' => [
                        'VuFind\RecordDriver\SolrMarc' => 'RecordDriver\RecordDriver\SolrMarc',
                    ],
                'delegators' => [
                    'RecordDriver\RecordDriver\SolrMarc' => [
                        0 => 'VuFind\RecordDriver\IlsAwareDelegatorFactory',
                    ],
                ],
            ],
        ],
    ],
];

return $config;

