# Sysco\Aurora

Sysco ZF2 Module for using in ZF2 projects.

## What does it include?

Include base classes with common functionality and base classes to be extended in Zend Framework 2 projects. Also it includes helpers based on Bootstrap 2 and Bootstrap 3 Framework.

## Requirements

* PHP 5.3+
* PHP Intl
* [Zend Framework 2](https://github.com/zendframework/zf2)

## Install

### Composer

The suggested installation method is via [composer](http://getcomposer.org/):

```sh
php composer.phar require sysco/aurora:dev-master
```

### Git Submodule

 Add this as Submodule in `./vendor/Sysco/Aurora` directory

```sh
git add submodule https://bitbucket.org/sysco/syscoaurora.git ./vendor/Sysco/Aurora
```

## Configuration

Copy the `aurora.global.php.dist` into your config/autoload folder removing the '.dist' extension.