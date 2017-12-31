<?php
/**
 * @package       swnaehrwerte
 * @category      module
 * @author        Steffen Winde
 * @link          http://winde-ganzig.de/
 * @licenses      GNU GENERAL PUBLIC LICENSE. More info can be found in LICENSE file.
 * @copyright (C] OXID e-Sales, 2003-2017
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = [
    'id'           => 'swinde/swnaehrwerte',
    'title'        => 'Nährwertetabelle',
    'description'  => [
        'de' => 'Nährwertetabelle. (V6]',
        'en' => 'Nährwertetabelle. (V6]',
    ],
    'version'      => '1.0.0',
    'author'       => 'Steffen Winde',
    'url'          => 'http://winde-ganzig.de/',
    'email'        => '',
    'extend'      => [
        \OxidEsales\Eshop\Application\Controller\Admin\ArticleMain::class => \Swinde\SwNaehrwerte\Controller\SwNaehrwerte::class,
    ],
    'controllers' => [
        'swnaehrwerte'    => \Swinde\SwNaehrwerte\Controller\Admin\SwNaehrwerte::class,
    ],
    'templates'   => [
        'swnaehrwerte.tpl'    => 'swinde/swnaehrwerte/views/admin/tpl/swnaehrwerte.tpl',
    ],

    'events'       => [],
    'blocks' => [],

    'settings'     => []
];
