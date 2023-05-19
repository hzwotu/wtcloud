# wtcloud


## 本地如何调试
1、安装依赖
```php
composer install
```
2、新建`index.php` 测试文件，同时引入依赖包
```php
<?php
require 'vendor/autoload.php';
```
3、编写测试代码。以下是一个国密SM4解密的测试案例
```php
<?php
/**
 * @desc index.php 描述信息
 * @author Tinywan(ShaoBo Wan)
 * @date 2023/5/19 10:34
 */
declare(strict_types=1);

require 'vendor/autoload.php';

$sm4 = new \Wotu\tool\crypto\utils\SM4();
$params = [
    'key' => 'e9d56722cf902909793b3bdcdbe48ce0',
    'data' => 'BGCr_zox9gCJ4cTyh4FjYkxDP58cWdVjndr54JG0kxt...',
];
$decryptBase64 = $sm4->decryptBase64($params);
var_dump($decryptBase64);
```

