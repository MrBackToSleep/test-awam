<?php

namespace App\Services;

use App\Models\Devise;
use App\Models\History;

class HistoryService {
    public function formatLog($montant1, Devise $devise1, $montant2, Devise $devise2, $total){
        return $montant1 . ' ' . $devise1->symbole . ' + ' . $montant2 . ' ' . $devise2->symbole . ' = ' . $total;
    }
}
