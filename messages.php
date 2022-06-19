<?php

require_once 'utils/constants.php';
require_once 'init/user-session.php';
require_once 'init/db-connection.php';
require_once 'utils/helpers.php';
require_once 'models/conversation.php';
require_once 'models/user.php';

/**
 * @var array $user_session - сессия пользователя
 * @var mysqli $db_connection - ресурс соединения с базой данных
 */

$basename = basename(__FILE__);

$layout_data = [
    'title' => 'Сообщения',
    'user' => $user_session,
    'page_modifier' => 'messages',
    'basename' => $basename,
];

// todo: handle POST request

$interlocutor_id =
    filter_input(INPUT_GET, USER_ID_QUERY, FILTER_SANITIZE_NUMBER_INT);
$current_conversation_id =
    filter_input(INPUT_GET, CONVERSATION_ID_QUERY, FILTER_SANITIZE_NUMBER_INT);

if ($interlocutor_id) {
    if (!check_user($db_connection, $interlocutor_id)) {
        http_response_code(BAD_REQUEST_STATUS);
        render_message_page(
            ['content' => 'Данные пользователь не существует'],
            'user',
            $layout_data
        );
        exit();
    };

    $current_conversation_id = create_conversation(
        $db_connection,
        $user_session['id'],
        $interlocutor_id
    );

    if (!$current_conversation_id) {
        http_response_code(SERVER_ERROR_STATUS);
        render_message_page(
            ['content' => 'Произошла внутренняя ошикба сервера'],
            'user',
            $layout_data
        );
        exit();
    }

    header("Location: messages.php?conversation-id=$current_conversation_id");
    exit();
}

$conversations = get_conversations($db_connection, $user_session['id']);

if (is_null($conversations)) {
    http_response_code(SERVER_ERROR_STATUS);
    render_message_page(
        ['content' => 'Произошла внутренняя ошикба сервера'],
        'user',
        $layout_data
    );
    exit();
}

if (!count($conversations)) {
    http_response_code(NOT_FOUND_STATUS);
    render_message_page(
        [
            'title' => 'У Вас пока нет сообщений',
            'content' => 'Вы можете подписаться на любого автора и начать с ним разговор'
        ],
        'user',
        $layout_data
    );
    exit();
}

if (!$current_conversation_id) {
    $current_conversation_id = $conversations[0]['id'];
}

// todo: fetch messages for current_conversation_id;

$conversation_cards =
    get_conversation_cards($conversations, $basename, $current_conversation_id);

$page_content = include_template(
    'pages/messages/page.php',
    [
        'user' => $user_session,
        'conversations' => $conversation_cards,
    ]
);

$layout_data['content'] = $page_content;

$layout_content = include_template('layouts/user.php', $layout_data);

print($layout_content);
