# yii2-jobby

This is a package for [Yii2 framework](https://github.com/yiisoft/yii2 "Yii2 repository").
Store tasks for [Jobby](https://github.com/hellogerard/jobby "Jobby repository") in your database (key-value storage, whatever).

## Basic usage

Add jobby module to your configuration file:


    'modules' => [

        ...

        'jobby' => [
            'class' => '\jobbyDb\JobbyModule',
        ],

        ...

    ]


Add `<projectPath>/yii jobby` to your scheduler configuration. For example, _cron_:

        * * * * * /var/www/project/yii jobby

Now you can use `jobby` SQL table in MySQL or something similar to configure and schedule tasks.

## Advanced usage

It is possible to inject your own model class into the module.
Your model must implement `\jobbyDb\model\JobbyModelInterface`

        'modules' => [

            ...

            'jobby' => [
                'class' => '\jobbyDb\JobbyModule',
                'modelClass' => '\rootNamespace\RedisJobbyModel',
            ],

            ...

        ]
