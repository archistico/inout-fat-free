<?php
namespace App;

class Home
{
    // Bisogna essere loggati
    public function beforeroute($f3)
    {
        $auth = \App\Auth::Autentica($f3);
        if (!$auth) {
            $f3->set('logged', false);
            $f3->reroute('/login');
        } else {
            $f3->set('logged', true);
        }
    }

    public function Homepage($f3)
    {
        $db = Database::getInstance();

        $preparedStatement = $db->prepare('SELECT SUM(importo) AS somma FROM movimenti WHERE cat1 = :cat');
        $preparedStatement->execute(array(':cat' => 2));
        $risultato = $preparedStatement->fetchAll();
        $totentrate = $risultato[0]['somma'];

        $preparedStatement = $db->prepare('SELECT SUM(importo) AS somma FROM movimenti WHERE cat1 = :cat');
        $preparedStatement->execute(array(':cat' => 1));
        $risultato = $preparedStatement->fetchAll();
        $totuscite = $risultato[0]['somma'];

        $differenza = $totentrate + $totuscite;

        $sql = 'SELECT categoria1.descrizione AS des1, categoria2.descrizione AS des2, SUM(importo) AS subtotale';
        $sql .= ' FROM movimenti';
        $sql .= ' JOIN categoria1 ON movimenti.cat1 = categoria1.id';
        $sql .= ' JOIN categoria2 ON movimenti.cat2 = categoria2.id';
        $sql .= ' WHERE movimenti.cat1 = 1';
        $sql .= ' GROUP BY categoria2.id';
        $f3->set('listauscite2', $db->exec($sql));

        $sql = 'SELECT categoria1.descrizione AS des1, categoria2.descrizione AS des2, SUM(importo) AS subtotale';
        $sql .= ' FROM movimenti';
        $sql .= ' JOIN categoria1 ON movimenti.cat1 = categoria1.id';
        $sql .= ' JOIN categoria2 ON movimenti.cat2 = categoria2.id';
        $sql .= ' WHERE movimenti.cat1 = 2';
        $sql .= ' GROUP BY categoria2.id';
        $f3->set('listaentrate2', $db->exec($sql));

        $f3->set('totentrate', $totentrate);
        $f3->set('totuscite', $totuscite);
        $f3->set('differenza', $differenza);

        $f3->set('euro', function ($i) {
            if ($i >= 0) {
                return "+" . number_format((float) $i, 2, '.', '') . " €";
            } else {
                return number_format((float) $i, 2, '.', '') . " €";
            }
        }
        );

        $f3->set('titolo', 'Home');
        $f3->set('contenuto', 'homepage.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    
}
