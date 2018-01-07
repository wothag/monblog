<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 02/01/2018
 * Time: 17:52
 */


const DEFAULT_APP = 'Frontend';


if (!isset($_GET['app']) || !file_exists(__DIR__.'/../app/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;


require __DIR__.'/../lib/OCFram/SplClassLoader.php';


$OCFramLoader = new SplClassLoader('OCFram', __DIR__.'/../lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('app', __DIR__.'/..');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();

$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();