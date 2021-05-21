<?php

namespace App\Services;

use App\Models\Devise;

class DeviseService
{
    /**
     * @param float|int $montant1
     * @param Devise $devise1 Devise du montant 1
     * @param float|int $montant2
     * @param Devise $devise2 Devise du montant 2 mais aussi devise de destination
     * @return string Le total dans la devise 2 (celle de destination)
     */
    public function calcul($montant1, Devise $devise1, $montant2, Devise $devise2){

        // Vérification des données en entrée
        $montant1 = str_replace(',', '.', $montant1);
        $montant2 = str_replace(',', '.', $montant2);

        if(!is_numeric($montant1) || !is_numeric($montant2)){
            return 'isNaN';
        }

        // Si les 2 devises sont pareilles, pas la peine de s'embêter à faire des conversions
        if($devise1 == $devise2){
            return $this->arrondirAuCentime(($montant1 + $montant2)).' '.$devise2->symbole;
        }

        // Conversion et total des devises en USD
        $montantUSD1 = $this->conversionDeviseToUSD($montant1, $devise1);
        $montantUSD2 = $this->conversionDeviseToUSD($montant2, $devise2);
        $total = $montantUSD1 + $montantUSD2;

        // Résultat de la conversion arrondi au centime près
        return $this->arrondirAuCentime($this->conversionUSDToDevise($total, $devise2)) .' '. $devise2->symbole;
    }

    /**
     * Conversion d'une devise passée en paramètre en son équivalent en USD
     *
     * @param float|int $montant Montant dans la devise de départ
     * @param Devise $devise Devise de départ
     * @return float|int Montant en USD
     */
    public function conversionDeviseToUSD($montant, Devise $devise){
        return $montant * $devise->equivalent_USD;
    }

    /**
     * Conversion de l'USD vers une devise passée en paramètre
     *
     * @param float|int $montant Montant en USD
     * @param Devise $devise Devise de destination
     * @return float|int Montant dans la devise de destination
     */
    public function conversionUSDToDevise($montant, Devise $devise){
        return $montant * (1/$devise->equivalent_USD);
    }

    public function arrondirAuCentime($montant){
        return round($montant, 2);
    }

}
