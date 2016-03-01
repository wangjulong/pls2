<?php
return [
    'components' => [
        // qlcy.16mb.com 的数据库配置
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql.hostinger.com.hk;dbname=u496312245_pls',
            'username' => 'u496312245_root',
            'password' => 'abc123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
        ],
    ],
];
