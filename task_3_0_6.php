<?php

if(count($argv) < 3) {
    die("Usage: php $argv[0] input.txt output.html\nOR     php $argv[0] input.html output.txt\n");
}

$in_file = $argv[1];
$out_file = $argv[2];

function txt2html(String $in_file, String $out_file) {
    file_put_contents($out_file, "<html>\n<head>\n    <title>$in_file</title>\n</head><body>\n");

    $fp = fopen($in_file, "r");
    while (($line = fgets($fp)) !== false) {
        $line = trim($line);
        file_put_contents($out_file, "    <p>$line</p>\n", FILE_APPEND);
    }

    file_put_contents($out_file, "</body>", FILE_APPEND);
}

function html2txt(String $in_file, String $out_file) {
    $data = file_get_contents($in_file);
    //<p>(.{0,})</p>
    preg_match_all("~<p(\s.*?)?>(.*?)</p>~", $data, $out, PREG_SET_ORDER);
    //var_dump($out);
    file_put_contents($out_file, "");
    foreach($out as $matches) {
        $match = trim($matches[2]);
        file_put_contents($out_file, "$match\n", FILE_APPEND);
    }
}

if(str_ends_with($in_file, ".html")) {
    html2txt($in_file, $out_file);
} else {
    txt2html($in_file, $out_file);
}