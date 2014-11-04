<?php
/** Classe Date
 * Initialisation et formattage de la date courante
 *
 * @author sebastien
 * 
 */
class Date {
    
    var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    var $months = array('Janvier', 'Février,', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    
    
    
    function getAll($year){
        $r = array();
        
       
        $date = new DateTime($year.'-01-01');
        While($date->format('Y') <= $year){
            $y = $date->format('Y');
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0','7',$date->format('w'));
            $r[$y][$m][$d] = $w;
            $date->add(new DateInterval('P1D'));
        }
        return $r;
    }
}
