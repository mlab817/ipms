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

/**
 * function first_sentence()
 *
 * @return string first sentence of the string
 */
if (! function_exists('first_sentence')) {
    function first_sentence($content = ''): string
    {
        $content = html_entity_decode(strip_tags($content));

        $pos = strpos($content, '.');

        if($pos === false) {
            return $content;
        }
        else {
            return substr($content, 0, $pos+1);
        }
    }
}

if (! function_exists('format_money')) {
    function format_money($money): string
    {
        $money = (float) $money;

        if ($money >= 10**9) {
            return number_format($money / 10**9, 2) .' B';
        }

        if ($money >= 10**6) {
            return number_format($money / 10**6, 2) .' M';
        }

        if ($money >= 10**3) {
            return number_format($money / 10**3, 2) .' K';
        }

        return number_format($money, 2);
    }
}