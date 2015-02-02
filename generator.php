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

$data = 'PHP group\'s frequently asked questions are located on <a href="http://wwphp-fb.github.io/faq/">GitHub</a> for better code readability and better versioning capabilities.<br><br>';

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
                'link' => 'http://wwphp-fb.github.io' . $yaml['permalink']
            );
        }
    }

    ksort($faqs);

    foreach ($faqs as $faq) {
        $data .= '<li>' . $faq['title'] . '<a href="' . $faq['link'] . '"> &#x1f517;</a></li>';
    }

    $data .= '</ul>';
}

$data .= '<strong>About PHP FAQ</strong><br>Over the years in PHP community we have noticed that many users meet similar issues and ask questions about PHP and web development on their PHP journey. We have prepared a set of PHP related FAQ - frequently asked questions of the international PHP group on Facebook.
There are many FAQ content for PHP on the web but for the purposes of this group\'s specifics this content should give you some less confusion with your PHP journey as well.

<strong>Contributing and License</strong><br>Contributing to open source projects is just awesome. We are always looking forward to see your contribution to this list of questions as well.
If you feel that there is a question missing here and should be pointed out or you have just found a typo, don\'t hesitate to open a <a href="http://wwphp-fb.github.io/contribute.html">pull request</a> or start a topic in the group.
This work is licensed under a Creative Commons Attribution 4.0 International License.
';

file_put_contents('./faq.html', $data, LOCK_EX);
