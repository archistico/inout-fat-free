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

$f3->route('GET @nuovo4: /nuovo/@cat1/@cat2/@cat3',
    function($f3, $params) {
        $cat1 = $params['cat1'];
        $cat2 = $params['cat2'];
        $cat3 = $params['cat3'];

        $db=new DB\SQL('sqlite:database.sqlite');
        $sql = 'SELECT categoria4.id, categoria4.descrizione AS cat4, categoria3.descrizione AS cat3, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2';
        $sql.= ' FROM categoria4 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id JOIN categoria3 ON categoria4.madre = categoria3.id';
        $sql.= ' WHERE categoria4.madre = '.$cat3;
        $sql.= ' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC, categoria4.descrizione ASC';
        $f3->set('categoria4',$db->exec($sql));

        $f3->set('titolo','Nuovo');
        $f3->set('contenuto','nuovo4.htm');
        $f3->set('cat1', $cat1);
        $f3->set('cat2', $cat2);
        $f3->set('cat3', $cat3);

        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @nuovo5: /nuovo/@cat1/@cat2/@cat3/@cat4',
    function($f3, $params) {
        $cat1 = $params['cat1'];
        $cat2 = $params['cat2'];
        $cat3 = $params['cat3'];
        $cat4 = $params['cat4'];

        $f3->set('titolo','Nuovo');
        $f3->set('contenuto','nuovo5.htm');
        $f3->set('cat1', $cat1);
        $f3->set('cat2', $cat2);
        $f3->set('cat3', $cat3);
        $f3->set('cat4', $cat4);

        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('POST @registra: /registra',
    function($f3, $params) {
        $f3->set('titolo','Registra');
        $f3->set('contenuto','registra.htm');

        $importo = $f3->get('POST.importo');
        $data = $f3->get('POST.data');
        $note = $f3->get('POST.note');
        $cat1 = $f3->get('POST.cat1');
        $cat2 = $f3->get('POST.cat2');
        $cat3 = $f3->get('POST.cat3');
        $cat4 = $f3->get('POST.cat4');
        $categoria = "";

        $db=new DB\SQL('sqlite:database.sqlite');
        
        $rcat1 = $db->exec("SELECT * FROM categoria1 WHERE id = $cat1");
        $categoria.=$rcat1[0]['descrizione'];
        $rcat2 = $db->exec("SELECT * FROM categoria2 WHERE id = $cat2");
        $categoria.= " / ".$rcat2[0]['descrizione'];
        $rcat3 = $db->exec("SELECT * FROM categoria3 WHERE id = $cat3");
        $categoria.= " / ".$rcat3[0]['descrizione'];
        $rcat4 = $db->exec("SELECT * FROM categoria4 WHERE id = $cat4");
        $categoria.= " / ".$rcat4[0]['descrizione'];

        $f3->set('categoria', $categoria);
        $f3->set('importo', $importo);
        $f3->set('data', $data);
        $f3->set('note', $note);

        // 2018-09-13
        $data_array = explode("-", $data);
        $jd=juliantojd($data_array[1],$data_array[2],$data_array[0]);
        
        $db->begin();
        $sql = "INSERT into movimenti values(null, $jd, $importo, '$note', $cat1, $cat2, $cat3, $cat4)";
        $db->exec($sql);
        $db->commit();

        echo \Template::instance()->render('templates/base.htm');
    }
);

$f3->route('GET @lista: /lista',
    function($f3) {
        $db=new DB\SQL('sqlite:database.sqlite');
        $f3->set('lista',$db->exec('SELECT * FROM movimenti ORDER BY giorno ASC'));

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