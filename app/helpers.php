<?php

use Hidehalo\Nanoid\Client;

/**
 * Function to generate nanoid with length 8 by default
 *
 * @params int $size
 * @returns string $nanoid
 */
if (!function_exists('nanoid')) {
    function nanoid($size = 8): string
    {
        $client = new Client();

        return $client->formattedId('0123456789abcdefg', $size);
    }
}

/**
 * Function to generate username given user email
 *
 * @params string $email
 * @returns string $username
 */
if (! function_exists('generate_username')) {
    function generate_username($email) {
        // find position of '@'
        $position = strpos($email, '@');
        // return text before '@'
        return substr($email, 0, $position);
    }
}