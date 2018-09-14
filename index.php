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
        $db=new DB\SQL('sqlite:database.sqlite');
        $f3->set('categoria1',$db->exec('SELECT * FROM categoria1 ORDER BY categoria1.descrizione ASC'));

        $f3->set('titolo','Nuovo');
        $f3->set('contenuto','nuovo.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @nuovo2: /nuovo/@num',
    function($f3, $params) {
        $cat1 = $params['num'];

        $db=new DB\SQL('sqlite:database.sqlite');
        $sql = 'SELECT categoria2.id, categoria2.descrizione AS cat2, categoria1.descrizione AS cat1 FROM categoria2 JOIN categoria1 ON categoria2.madre = categoria1.id WHERE categoria2.madre='.$cat1.' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC';
        $f3->set('categoria2',$db->exec($sql));

        $f3->set('titolo','Nuovo');
        $f3->set('contenuto','nuovo2.htm');
        $f3->set('cat1', $cat1);
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @nuovo3: /nuovo/@cat1/@cat2',
    function($f3, $params) {
        $cat1 = $params['cat1'];
        $cat2 = $params['cat2'];

        $db=new DB\SQL('sqlite:database.sqlite');
        $sql = 'SELECT categoria3.id, categoria3.descrizione AS cat3, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2';
        $sql.= ' FROM categoria3 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id';
        $sql.= ' WHERE categoria3.madre = '.$cat2;
        $sql.= ' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC';
        $f3->set('categoria3',$db->exec($sql));

        $f3->set('titolo','Nuovo');
        $f3->set('contenuto','nuovo3.htm');
        $f3->set('cat1', $cat1);
        $f3->set('cat2', $cat2);
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


$f3->route('GET @data: /data',
    function($f3) {
        
        $db=new DB\SQL('sqlite:database.sqlite');

        /*
        $db->begin();
        $db->exec('INSERT into users values(null, "nuova")');
        $db->commit();
        */

        $f3->set('categoria1',$db->exec('SELECT * FROM categoria1 ORDER BY categoria1.descrizione ASC'));

        $sql = 'SELECT categoria2.id, categoria2.descrizione, categoria1.descrizione AS madre FROM categoria2 JOIN categoria1 ON categoria2.madre = categoria1.id ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC';
        $f3->set('categoria2',$db->exec($sql));
        
        $sql = 'SELECT categoria3.id, categoria3.descrizione, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2 FROM categoria3 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC';
        $f3->set('categoria3',$db->exec($sql));

        $sql = 'SELECT categoria4.id, categoria4.descrizione AS cat4, categoria3.descrizione AS cat3, categoria2.descrizione AS cat2, categoria1.descrizione AS cat1 FROM categoria4 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id JOIN categoria3 ON categoria4.madre = categoria3.id ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC, categoria4.descrizione ASC';
        $f3->set('categoria4',$db->exec($sql));

        $f3->set('titolo','Data');
        $f3->set('contenuto','data.htm');
        
        echo Template::instance()->render('templates/base.htm');
    }
);

$f3->run();