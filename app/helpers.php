<?php

use Hidehalo\Nanoid\Client;

if (!function_exists('nanoid')) {
    function nanoid($size = 8): string
    {
        $client = new Client();

        return $client->formattedId('0123456789abcdefg', $size);
    }
}