<?php
namespace App;

class Categoria
{
    function beforeroute($f3) {
        $auth = \App\Auth::Autentica($f3);
        if(!$auth) {
            $f3->set('logged', false);
            $f3->reroute('/login');
        } else {
            $f3->set('logged', true);
        }
    }

    public function Lista($f3)
    {
        $db = Database::getInstance();

        $sql = 'SELECT categoria1.id, categoria1.descrizione FROM categoria1 ORDER BY categoria1.descrizione ASC';
        $cat1 = $db->exec($sql);
        $f3->set('categoria1', $cat1);

        $sql = 'SELECT categoria2.id, categoria2.descrizione AS cat2, categoria1.descrizione AS cat1 FROM categoria2 JOIN categoria1 ON categoria2.madre = categoria1.id ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC';
        $cat2 = $db->exec($sql);
        $f3->set('categoria2', $cat2);

        $sql = 'SELECT categoria3.id, categoria3.descrizione AS cat3, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2';
        $sql .= ' FROM categoria3 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id';
        $sql .= ' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC';
        $cat3 = $db->exec($sql);
        $f3->set('categoria3', $cat3);

        $sql = 'SELECT categoria4.id, categoria4.descrizione AS cat4, categoria3.descrizione AS cat3, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2';
        $sql .= ' FROM categoria4 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id JOIN categoria3 ON categoria4.madre = categoria3.id';
        $sql .= ' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC, categoria4.descrizione ASC';
        $cat4 = $db->exec($sql);
        $f3->set('categoria4', $cat4);


        $f3->set('titolo', 'Categorie');
        $f3->set('contenuto', 'categoria/lista.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    public function Nuovo1($f3)
    {

    }

    public function Nuovo2($f3, $params)
    {

    }

    public function Nuovo3($f3, $params)
    {

    }

    public function Nuovo4($f3)
    {
        $db = Database::getInstance();

        $sql = 'SELECT categoria1.id, categoria1.descrizione FROM categoria1 ORDER BY categoria1.descrizione ASC';
        $cat1 = $db->exec($sql);
        $f3->set('categoria1', $cat1);

        $sql = 'SELECT categoria2.id, categoria2.descrizione AS cat2, categoria1.descrizione AS cat1 FROM categoria2 JOIN categoria1 ON categoria2.madre = categoria1.id ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC';
        $cat2 = $db->exec($sql);
        $f3->set('categoria2', $cat2);

        $sql = 'SELECT categoria3.id, categoria3.descrizione AS cat3, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2';
        $sql .= ' FROM categoria3 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id';
        $sql .= ' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC';
        $cat3 = $db->exec($sql);
        $f3->set('categoria3', $cat3);

        $sql = 'SELECT categoria4.id, categoria4.descrizione AS cat4, categoria3.descrizione AS cat3, categoria1.descrizione AS cat1, categoria2.descrizione AS cat2';
        $sql .= ' FROM categoria4 JOIN categoria1 ON categoria2.madre = categoria1.id JOIN categoria2 ON categoria3.madre = categoria2.id JOIN categoria3 ON categoria4.madre = categoria3.id';
        $sql .= ' ORDER BY categoria1.descrizione ASC, categoria2.descrizione ASC, categoria3.descrizione ASC, categoria4.descrizione ASC';
        $cat4 = $db->exec($sql);
        $f3->set('categoria4', $cat4);

        $f3->set('titolo', 'Categorie');
        $f3->set('contenuto', 'categoria/nuovo4.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    public function Registra($f3, $params)
    {
        $note = $f3->get('POST.note');
        $cat1 = $f3->get('POST.cat1');
        $cat2 = $f3->get('POST.cat2');
        $cat3 = $f3->get('POST.cat3');
        $cat4 = $f3->get('POST.cat4');

        $f3->reroute('@categorialista');
    }

    public function Cancella($f3, $params)
    {
        /*
        $f3->set('titolo', 'Homepage');
        $f3->set('contenuto', 'movimento/cancella.htm');
        $f3->set('id', $params['id']);
        echo \Template::instance()->render('templates/base.htm');
        */
    }

    public function Sopprimi($f3, $params)
    {
        /*
        $id = $f3->get('POST.id');
        $db = Database::getInstance();
        $db->begin();
        $sql = "DELETE FROM movimenti WHERE movimenti.id = $id";
        $db->exec($sql);
        $db->commit();

        $f3->reroute('/movimento/lista');
        */
    }
}
