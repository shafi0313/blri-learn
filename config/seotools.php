<?php
/**
 * @see https://github.com/artesaos/seotools
 */

$description = "Elevate your expertise in livestock management and agriculture with the Bangladesh Livestock Research Institute E-Learning Platform. Explore specialized courses, led by industry experts, offering interactive and flexible learning paths. Dive into a wealth of multimedia resources, engage in a supportive community, and earn certifications to enhance your professional profile. Stay ahead in the evolving field of livestock research – enroll today for a dynamic and enriching educational experience.";
$keyword = "livestock management, agriculture education, sustainable farming, animal nutrition, livestock health, agricultural research, e-learning courses, BLRI certifications, livestock innovation, farming practices";
return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Bangladesh Livestock Research Institute E-Learning Platform", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => $description, // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [$keyword], // set false to total remove
            'canonical'    => 'full', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => $description, // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'WebPage',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => $description, // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
