<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'abc',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'imap' => [
           'class' => 'unyii2\imap\Imap',
           'connection' => [
               'imapPath' => '{imap.gmail.com:993/imap/ssl}INBOX',
               'imapLogin' => 'ahsanarshad1993@gmail.com',
               'imapPassword' => 'Smartboy1993',
               'serverEncoding'=>'encoding', // utf-8 default.
               'attachmentsDir'=>'/'
           ],
        ],
        'ldap' => [
            'class'=>'Edvlerblog\Ldap',
            'options'=> [
                    'ad_port'      => 389,
                    'domain_controllers'    => array('AdServerName1','AdServerName2'),
                    'account_suffix' =>  '@myengro.com',
                    'base_dn' => "DC=test,DC=lan",
                    // for basic functionality this could be a standard, non privileged domain user (required)
                    'admin_username' => 'ActiveDirectoryUser',
                    'admin_password' => 'StrongPassword'
                ],
                //Connect on Adldap instance creation (default). If you don't want to set password via main.php you can
                //set autoConnect => false and set the admin_username and admin_password with
            //\Yii::$app->ldap->connect('admin_username', 'admin_password');
            //See function connect() in https://github.com/Adldap2/Adldap2/blob/v5.2/src/Adldap.php

            'autoConnect' => true
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
