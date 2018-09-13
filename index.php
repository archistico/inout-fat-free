<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();

$f3->route('GET @homepage: /',
    function($f3) {
        $f3->set('titolo','Homepage');
        $f3->set('contenuto','homepage.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @nuovo: /nuovo',
    function($f3) {
        $f3->set('titolo','Nuovo');
        $f3->set('contenuto','nuovo.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @lista: /lista',
    function($f3) {
        $f3->set('titolo','Lista');
        $f3->set('contenuto','lista.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @movimento: /movimento/@id', '\App\Movimento->Mostra');

$f3->route('GET @report: /report',
    function($f3) {
        $f3->set('titolo','Report');
        $f3->set('contenuto','report.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
);


$f3->route('GET /data',
    function($f3) {
        
        $db=new DB\SQL('sqlite:database.sqlite');

        /*
        $db->begin();
        $db->exec('INSERT into users values(null, "nuova")');
        $db->commit();
        */

        $f3->set('categoria1',$db->exec('SELECT * FROM categoria1'));

        $sql = 'SELECT categoria2.id, categoria2.descrizione, categoria1.descrizione AS madre FROM categoria2 JOIN categoria1 ON categoria2.madre = categoria1.id';
        $f3->set('categoria2',$db->exec($sql));
        
        $f3->set('titolo','Data');
        $f3->set('contenuto','data.htm');
        
        echo Template::instance()->render('templates/base.htm');
    }
);

$f3->run();