<?php

Kirby::plugin('zimmer-partners/kirbytext-datespan', [
    'tags' => [
        'datespan' => [
            'html' => function($tag) {
                return '<span data-type="datespan"><time datetime="2014">14</time>-<time datetime="2021">21</time></span>';
            }
        ]
    ]
]);