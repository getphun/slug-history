<?php
/**
 * slug-history config file
 * @package slug-history
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'slug-history',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/slug-history',
    '__files' => [
        'modules/slug-history' => ['install','remove','update']
    ],
    '__dependencies' => [
        'db-mysql'
    ],
    '_services' => [
        'slug' => 'SlugHistory\\Service\\Slug'
    ],
    '_autoload' => [
        'classes' => [
            'SlugHistory\\Service\\Slug' => 'modules/slug-history/service/Slug.php',
            'SlugHistory\\Model\\SlugHistory' => 'modules/slug-history/model/SlugHistory.php'
        ],
        'files' => []
    ]
];