<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notify Theme
    |--------------------------------------------------------------------------
    |
    | You can change the theme of notifications by specifying the desired theme.
    | By default the theme light is activated, but you can change it by
    | specifying the dark mode. To change theme, update the global variable to `dark`
    |
    */

    'theme' => env('NOTIFY_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Notification timeout
    |--------------------------------------------------------------------------
    |
    | Defines the number of seconds during which the notification will be visible.
    |
    */

    'timeout' => 5000,

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    | Available model: connect, drake, emotify, smiley, toast
    |
    */

    'preset-messages' => [
        // An example preset 'user updated' Connectify notification.
        'institution-created' => [
            'message' => 'Instituição criada com sucesso.',
            'type' => 'success',
            'model' => 'connect',
            'title' => 'Informação!',
        ],
        'institution-updated' => [
            'message' => 'Instituição atualizada com sucesso.',
            'type' => 'success',
            'model' => 'connect',
            'title' => 'Informação!',
        ],
        'institution-deleted' => [
            'message' => 'Instituição deletada com sucesso.',
            'type' => 'success',
            'model' => 'connect',
            'title' => 'Informação!',
        ],
    ],

];
