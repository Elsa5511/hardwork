<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit668756a56d747be27ee4ad810af660b7
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\' => 5,
            'ZendXml\\' => 8,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'G' => 
        array (
            'Gedmo\\' => 6,
        ),
        'D' => 
        array (
            'Doctrine\\Instantiator\\' => 22,
            'Doctrine\\Common\\Cache\\' => 22,
            'Doctrine\\Common\\Annotations\\' => 28,
            'Doctrine\\Common\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zendframework/library/Zend',
        ),
        'ZendXml\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zendxml/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Gedmo\\' => 
        array (
            0 => __DIR__ . '/..' . '/gedmo/doctrine-extensions/lib/Gedmo',
        ),
        'Doctrine\\Instantiator\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/instantiator/src/Doctrine/Instantiator',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'Doctrine\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/common/lib/Doctrine/Common',
        ),
    );

    public static $prefixesPsr0 = array (
        'f' => 
        array (
            'fpdf' => 
            array (
                0 => __DIR__ . '/..' . '/itbz/fpdf/src',
            ),
        ),
        'Z' => 
        array (
            'ZfcUserDoctrineORM' => 
            array (
                0 => __DIR__ . '/..' . '/zf-commons/zfc-user-doctrine-orm/src',
            ),
            'ZfcUser' => 
            array (
                0 => __DIR__ . '/..' . '/zf-commons/zfc-user/src',
            ),
            'ZfcBase' => 
            array (
                0 => __DIR__ . '/..' . '/zf-commons/zfc-base/src',
            ),
        ),
        'S' => 
        array (
            'Sysco\\Aurora\\' => 
            array (
                0 => __DIR__ . '/..' . '/sysco/aurora/src',
            ),
        ),
        'P' => 
        array (
            'PHPWord' => 
            array (
                0 => __DIR__ . '/..' . '/phpword/phpword/Library',
            ),
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
        'I' => 
        array (
            'Imagine' => 
            array (
                0 => __DIR__ . '/..' . '/imagine/imagine/lib',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\ORM\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/orm/lib',
            ),
            'Doctrine\\DBAL\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/dbal/lib',
            ),
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
            'Doctrine\\Common\\Collections\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/collections/lib',
            ),
            'DoctrineORMModule\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/doctrine-orm-module/src',
            ),
            'DoctrineModule\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/doctrine-module/src',
            ),
        ),
        'B' => 
        array (
            'BjyAuthorize\\' => 
            array (
                0 => __DIR__ . '/..' . '/bjyoungblood/bjy-authorize/src',
            ),
            'Behat\\Transliterator' => 
            array (
                0 => __DIR__ . '/..' . '/behat/transliterator/src',
            ),
        ),
    );

    public static $classMap = array (
        'Sysco\\Aurora\\Module' => __DIR__ . '/..' . '/sysco/aurora/Module.php',
        'ZfcBase\\Module' => __DIR__ . '/..' . '/zf-commons/zfc-base/Module.php',
        'ZfcUserDoctrineORM\\Entity\\User' => __DIR__ . '/..' . '/zf-commons/zfc-user-doctrine-orm/src/ZfcUserDoctrineORM/Entity/User.php',
        'ZfcUserDoctrineORM\\Mapper\\User' => __DIR__ . '/..' . '/zf-commons/zfc-user-doctrine-orm/src/ZfcUserDoctrineORM/Mapper/User.php',
        'ZfcUserDoctrineORM\\Module' => __DIR__ . '/..' . '/zf-commons/zfc-user-doctrine-orm/Module.php',
        'ZfcUserDoctrineORM\\Options\\ModuleOptions' => __DIR__ . '/..' . '/zf-commons/zfc-user-doctrine-orm/src/ZfcUserDoctrineORM/Options/ModuleOptions.php',
        'ZfcUser\\Module' => __DIR__ . '/..' . '/zf-commons/zfc-user/Module.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit668756a56d747be27ee4ad810af660b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit668756a56d747be27ee4ad810af660b7::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit668756a56d747be27ee4ad810af660b7::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit668756a56d747be27ee4ad810af660b7::$classMap;

        }, null, ClassLoader::class);
    }
}
