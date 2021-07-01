<?php

Kirby::plugin('zimmer-partners/kirbytext-datespan', [
  'tags' => [
    'datespan' => [
    'attr' => [
      'from',
      'to',
      'from-value',
      'to-value',
      'in',
      'in-value',
    ],
    'html' => function($tag) {
      if (isset($tag->{'in-value'}) || isset($tag->in)) {
        if (isset($tag->{'in-value'})) {
          return '<span data-type="datespan">' . (isset($tag->value) ? ($tag->value . ' ') : '') . '<time datetime="' . $tag->{'in-value'} . '">' . $tag->in . '</time></span>';
        } else if (strlen($tag->in) < 4) {
          return '<span data-type="datespan">' . (isset($tag->value) ? ($tag->value . ' ') : '') . '<time datetime="' . (intval($tag->in) + 2000) . '">' . $tag->in . '</time></span>';
        } else {
          return '<span data-type="datespan">' . (isset($tag->value) ? ($tag->value . ' ') : '') . '<time datetime="' . ($tag->in) . '">' . $tag->in . '</time></span>';
        }
      } else {
        if (isset($tag->from) && isset($tag->to)) {
          if (!isset($tag->{'from-value'})) {
            if (strlen($tag->from) < 4){
              $tag->{'from-value'} = intval($tag->from) + 2000;
            } else {
              $tag->{'from-value'} = $tag->from;
            }
          }
          if (!isset($tag->{'to-value'})) {
            if (strlen($tag->to) < 4) {
              $tag->{'to-value'} = intval($tag->to) + 2000;
            } else {
              $tag->{'to-value'} = $tag->to;
            }
          }
          return '<span data-type="datespan">' . (isset($tag->value) ? ($tag->value . ' ') : '') . '<time datetime="' . $tag->{'from-value'} . '">' . $tag->from . '</time>-<time datetime="' . $tag->{'to-value'} . '">' . $tag->to . '</time></span>';
        } else {
          return '<span data-type="datespan">Missing tag attributes \'in\' or \'from\' and \'to\'.</span>';
        }
      }
    }
  ]
]
]);