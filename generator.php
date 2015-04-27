<?php
<<<CONFIG
packages:
    - "mnapoli/front-yaml: *"
    - "symfony/yaml: ~2.6"
CONFIG;

use Symfony\Component\Yaml\Yaml;
use Mni\FronYAML\Parser;

$parser = new Mni\FrontYAML\Parser();

// parse groups.yml file
$groups = Yaml::parse(file_get_contents('./groups.yml'));

$data = 'PHP Facebook group\'s frequently asked questions is a community driven project with answers to some frequently asked questions that are located on <a href="https://github.com/wwphp-fb/php-resources">GitHub</a> for better code readability and better versioning capabilities. Please read these if you have PHP issue. You can also use <a href="http://wwphp-fb.github.io/search.html">searching content</a>.<br><br>';

$index = [];

foreach ($groups as $group) {
    $data .= '<strong>' . $group['title'] . '</strong>';
    $data .= '<ul>';

    $path = realpath('./faq/' . $group['slug']);

    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
    $faqs = [];
    
    foreach ($objects as $name => $object) {
        $document = $parser->parse(file_get_contents($name));

        if ($object->isFile()) {
            $yaml = $document->getYAML();

            $faqs[$name] = [
                'title' => $yaml['title'],
                'link' => 'http://wwphp-fb.github.io' . $yaml['permalink'],
                'updated' => '',
                'body' => $document->getContent()
            ];
        }
    }

    ksort($faqs);

    foreach ($faqs as $faq) {
        $data .= '<li><a href="' . $faq['link'] . '">' . $faq['title'] . '</a></li>';
        
        $index[] = [
            "title" => $faq['title'],
            "url" => $faq['link'],
            "date" => $faq['updated'],
            "body" => $faq['body'],
            "categories" => []
        ];
    }

    $data .= '</ul>';
}

$data .= '<strong>Want to get involved?</strong><br>We are always looking forward to see your contribution to this list of questions as well. How to contribute is mentioned in the <a href="http://wwphp-fb.github.io/contribute.html">contributing section</a> together with great people making this possible.<br>
This work is licensed under a Creative Commons Attribution 4.0 International License.';

$indexData = ["entries" => $index];

file_put_contents('./faq.html', $data, LOCK_EX);
file_put_contents('./indexdata.json', json_encode($indexData), LOCK_EX);