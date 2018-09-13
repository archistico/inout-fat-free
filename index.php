<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();

$f3->route('GET /',
    function($f3) {
        $f3->set('titolo','Homepage');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET /nuovo',
    function($f3) {
        $f3->set('titolo','Nuovo');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET /test',
    function($f3) {
        echo \Template::instance()->render('templates/test.htm');
    }
);

/*
$f3->route('GET /template',
    function($f3) {
        $f3->set('content','template.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET /data',
    function($f3) {
        
        $db=new DB\SQL('sqlite:database.sqlite');

        $f3->set('name','Emilie');
        $f3->set('content','db.htm');    
        
        $db->begin();
        $db->exec('INSERT into users values(null, "nuova")');
        $db->commit();
        
        $f3->set('result',$db->exec('SELECT * FROM users'));
        echo Template::instance()->render('templates/base.htm');
    }
);
*/
$f3->run();