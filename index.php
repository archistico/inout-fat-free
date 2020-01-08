<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();
$f3->set('CACHE', true);
$f3->set('DEBUG', 3);

$f3->route('GET @home: /', '\App\Home->Homepage');

// Todo
$f3->route('GET @todocancella: /todo/cancella/@id', '\App\Todo->Cancella');
$f3->route('POST @todoaggiungi: /todo/aggiungi', '\App\Todo->Aggiungi');

// Entrate/Uscite
$f3->route('GET @movimentolista: /movimento/lista', '\App\Movimento->Lista');
$f3->route('GET @movimentonuovo: /movimento/nuovo', '\App\Movimento->Nuovo');
$f3->route('GET @movimentonuovo2: /movimento/nuovo/@num', '\App\Movimento->Nuovo2');
$f3->route('GET @movimentonuovo3: /movimento/nuovo/@cat1/@cat2', '\App\Movimento->Nuovo3');
$f3->route('GET @movimentonuovo4: /movimento/nuovo/@cat1/@cat2/@cat3', '\App\Movimento->Nuovo4');
$f3->route('GET @movimentonuovo5: /movimento/nuovo/@cat1/@cat2/@cat3/@cat4', '\App\Movimento->Nuovo5');
$f3->route('POST @movimentoregistra: /movimento/registra', '\App\Movimento->Registra');
$f3->route('GET @movimentocancella: /movimento/cancella/@id', '\App\Movimento->Cancella');
$f3->route('POST @movimentosopprimi: /movimento/sopprimi', '\App\Movimento->Sopprimi');

// Categorie
$f3->route('GET @categorialista: /categoria/lista', '\App\Categoria->Lista');
$f3->route('GET @categorianuovo1: /categoria/1/nuovo', '\App\Categoria->Nuovo1');
$f3->route('GET @categorianuovo2: /categoria/2/nuovo', '\App\Categoria->Nuovo2');
$f3->route('GET @categorianuovo3: /categoria/3/nuovo', '\App\Categoria->Nuovo3');
$f3->route('GET @categorianuovo4: /categoria/4/nuovo', '\App\Categoria->Nuovo4');
$f3->route('POST @categoriaregistra: /categoria/registra', '\App\Categoria->Registra');
$f3->route('GET @categoriacancella1: /categoria/cancella1/@id', '\App\Categoria->Cancella1');
$f3->route('GET @categoriacancella2: /categoria/cancella2/@id', '\App\Categoria->Cancella2');
$f3->route('GET @categoriacancella3: /categoria/cancella3/@id', '\App\Categoria->Cancella3');
$f3->route('GET @categoriacancella4: /categoria/cancella4/@id', '\App\Categoria->Cancella4');

// Autenticazione
$f3->route('GET @login: /login', '\App\Auth->Login');
$f3->route('POST @loginCheck: /loginCheck', '\App\Auth->LoginCheck');
$f3->route('GET @logout: /logout', '\App\Auth->Logout');
$f3->route('GET @autentica: /autentica', '\App\Auth->Autentica');
$f3->route('GET @utente: /utente', '\App\Admin->UtenteLista');
$f3->route('GET @utentenuovo: /utente/nuovo', '\App\Admin->UtenteNuovo');
$f3->route('GET @utentecancella: /utente/cancella/@user_id', '\App\Admin->UtenteCancella');
$f3->route('POST @utenteregistra: /utente/registra', '\App\Admin->UtenteRegistra');

// Se errori
/*
$f3->set('ONERROR',function($f3){
    $f3->reroute('/login');
    // $f3->error(403, "Rifare il login");
});
*/

$f3->run();
