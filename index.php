<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();
$f3->set('DEBUG', 3);

$f3->route('GET @lista: /lista', '\App\Movimento->Lista');
$f3->route('GET @home: /', '\App\Movimento->Homepage');
$f3->route('GET @nuovo: /nuovo', '\App\Movimento->Nuovo');
$f3->route('GET @nuovo2: /nuovo/@num', '\App\Movimento->Nuovo2');
$f3->route('GET @nuovo3: /nuovo/@cat1/@cat2', '\App\Movimento->Nuovo3');
$f3->route('GET @nuovo4: /nuovo/@cat1/@cat2/@cat3', '\App\Movimento->Nuovo4');
$f3->route('GET @nuovo5: /nuovo/@cat1/@cat2/@cat3/@cat4', '\App\Movimento->Nuovo5');
$f3->route('POST @registra: /registra', '\App\Movimento->Registra');
$f3->route('GET @cancella: /cancella/@id', '\App\Movimento->Cancella');
$f3->route('POST @sopprimi: /sopprimi', '\App\Movimento->Sopprimi');

$f3->run();
