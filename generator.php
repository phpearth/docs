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

$data = 'PHP Facebook group\'s frequently asked questions is a community driven project with answers to some frequently asked questions that are located on <a href="http://wwphp-fb.github.io/faq/">GitHub</a> for better code readability and better versioning capabilities. Please read these before asking questions here.<br><br>';
$index  = '{"entries":[';

foreach ($groups as $group) {
    $data .= '<strong>' . $group['title'] . '</strong>';
    $data .= '<ul>';

    $path = realpath('./faq/' . $group['slug']);

    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
    $faqs = array();
    
    foreach ($objects as $name => $object) {
        $document = $parser->parse(file_get_contents($name));

        if ($object->isFile()) {
            $yaml = $document->getYAML();

            $faqs[$name] = array(
                'title' => $yaml['title'],
                'link' => 'http://wwphp-fb.github.io' . $yaml['permalink'],
                'updated' => '',
                'body' => $document->getContent()
            );
        }
    }

    ksort($faqs);

    foreach ($faqs as $faq) {
        $data .= '<li><a href="' . $faq['link'] . '">' . $faq['title'] . '</a></li>';
        
        $index .= '{"title": "' . $faq['title'] . '",
            "url": "' . $faq['link'] . '",
            "date": "' . $faq['updated'] . '",
            "body": "' . $faq['title'] . '",
            "categories": []},';
    }

    $data .= '</ul>';
}

$data .= '<strong>Want to get involved?</strong><br>We are always looking forward to see your contribution to this list of questions as well. How to contribute is mentioned in the <a href="http://wwphp-fb.github.io/contribute.html">contributing section</a> together with great people making this possible.<br>
This work is licensed under a Creative Commons Attribution 4.0 International License.';

file_put_contents('./faq.html', $data, LOCK_EX);


$index = rtrim($index, ',');
$index .= ']}';

file_put_contents('./indexdata.json', $index, LOCK_EX);