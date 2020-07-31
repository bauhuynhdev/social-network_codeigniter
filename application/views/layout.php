<?php

view('partials/header', !isset($style) ?: array('style' => $style));
view($page);
view('partials/footer', !isset($script) ?: array('script' => $script));
