<?php

function is_active($segment, $value)
{
    return service('uri')->getSegment($segment) === $value ? 'active' : '';
}

function is_menu_open($segment, $values = [])
{
    $uri = service('uri')->getSegment($segment);
    return in_array($uri, $values) ? 'menu-open' : '';
}
