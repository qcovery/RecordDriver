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
];

return $config;

