<?php

$GLOBALS["hosts"] = array();

function pingHost(string $host): void {
    exec("/usr/bin/ping -n -c 1 -W 1 $host", $outcome, $status);
    $status = $status === 0 ? "up" : "down";
    if(!array_key_exists($host, $GLOBALS["hosts"])) {
        $GLOBALS["hosts"][$host] = $status;
        echo "The IP address $host is $status\n";
    }
    if($GLOBALS["hosts"][$host] !== $status) {
        $GLOBALS["hosts"][$host] = $status;
        echo "Status changed: $host is now $status\n";
    }
}

function pingHosts(): void {
    for($i = 0; $i < 500; $i++) {
        $hosts = file_get_contents("hosts.txt");
        foreach (explode("\n", $hosts) as $host) {
            pingHost($host);
        }
    }
}


pingHosts();
