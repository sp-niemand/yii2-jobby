yii2-jobby
==========

Basic usage
-----------

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

Now you can use `jobby` Mongo collection to schedule tasks for your project.

Advanced usage
--------------

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
