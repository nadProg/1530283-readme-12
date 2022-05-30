<?php

require_once 'utils/constants.php';
require_once 'utils/helpers.php';
require_once 'utils/functions.php';
require_once 'models/post.php';
require_once 'init/user-session.php';
require_once 'init/db-connection.php';

/**
 * @var array $user_session - сессия пользователя
 * @var mysqli $db_connection - ресурс соединения с базой данных
 */

$query = filter_input(INPUT_GET, SEARCH_QUERY, FILTER_SANITIZE_STRING);

$layout_data = [
    'title' => "Вы искали: $query",
    'user' => $user_session,
    'page_modifier' => 'search-results',
    'query' => $query,
];

$query_content = include_template(
    'pages/search/query.php',
    [
        'query' => $query,
    ]
);

// todo: check search mode - usual / hash

$posts = get_posts_by_query($db_connection, $query);

// todo: check if $posts is null // array;

$page_content = count($posts)
    ? include_template(
        'pages/search/page.php',
        [
            'query_content' => $query_content,
            'post_cards' => $posts
        ]
    )
    : include_template(
        'pages/search/page-empty.php',
        [
            'query_content' => $query_content,
            'back_url' => $_SERVER['HTTP_REFERER'],
        ]
    );

$layout_data['content'] = $page_content;

$layout_content = include_template('layouts/user.php', $layout_data);

print($layout_content);
