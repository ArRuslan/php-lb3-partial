<?php

if(count($argv) < 2) {
    die("Usage: php $argv[0] /directory/with/html/files");
}

function join_paths(): string {
    $paths = array();

    foreach (func_get_args() as $arg) {
        if ($arg !== '') { $paths[] = $arg; }
    }

    return preg_replace('#/+#','/',join('/', $paths));
}

function extract_links(string $filename): void {
    global $argv;
    $content = file_get_contents(join_paths($argv[1], $filename));
    preg_match_all("~https?://([\w\d]\.?){1,}[\w\d]{2,10}(:\d{1,6})?/?(/?[\w\d_%+.-]{0,}){0,}(\?(&?[\w\d_-]{1,}=[\w\d_-]{1,}){0,})?~", $content, $out, PREG_SET_ORDER);
    foreach($out as $matches) {
        echo "$matches[0]\n";
    }
}

foreach (scandir($argv[1]) as $file) {
    if(!str_ends_with($file, ".html"))
        continue;
    echo "Links from $file:\n";
    extract_links($file);
    echo "\n";
}