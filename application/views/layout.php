<?php

$data_header = array();
if (isset($style)) {
    $data_header['style'] = $style;
}

if (isset($title)) {
    $data_header['title'] = $title;
}

view('partials/header', $data_header);
view($page);
view('partials/footer', ! isset($script) ?: array('script' => $script));
