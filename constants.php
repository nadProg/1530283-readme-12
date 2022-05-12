<?php

const CONTENT_FILTER_QUERY = 'content_type_id';

const SORT_TYPE_QUERY = 'sort_type';

const SORT_ORDER_REVERSED = "sort_order_reversed";

const SERVER_ERROR_STATUS = 500;

const BAD_REQUEST_STATUS = 400;

const NOT_FOUND_STATUS = 404;

const SORT_TYPE_OPTIONS
= [
    [
        'label' => 'Популярность',
        'value' => 'views_count',
    ],
    [
        'label' => 'Лайки',
        'value' => 'likes_count',
    ],
    [
        'label' => 'Дата',
        'value' => 'created_at',
    ],
];

const TEXT_SEPARATOR = ' ';

const MAX_POST_CARD_TEXT_CONTENT_LENGTH = 300;

const DAYS_IN_WEEK = 7;

const DAYS_IN_MONTH = 30;

const RELATIVE_TIME_UNITS
= [
    'minute' => [
        'one'  => 'минуту',
        'two'  => 'минуты',
        'many' => 'минут',
    ],
    'hour'   => [
        'one'  => 'час',
        'two'  => 'часа',
        'many' => 'часов',
    ],
    'day'    => [
        'one'  => 'день',
        'two'  => 'дня',
        'many' => 'дней',
    ],
    'week'   => [
        'one'  => 'неделю',
        'two'  => 'недели',
        'many' => 'недель',
    ],
    'month'  => [
        'one'  => 'месяц',
        'two'  => 'месяца',
        'many' => 'месяцев',
    ],
];

const POST_CARD_CONTENT_DECORATORS
= [
    'quote' => 'decorate_post_card_quote_content',
    'text'  => 'decorate_post_card_text_content',
    'photo' => 'decorate_post_card_photo_content',
    'link'  => 'decorate_post_card_link_content',
];

const POST_DETAILS_CONTENT_DECORATORS = [
    'quote' => 'decorate_post_details_quote_content',
    'text'  => 'decorate_post_details_text_content',
    'photo' => 'decorate_post_details_photo_content',
    'link'  => 'decorate_post_details_link_content',
];
