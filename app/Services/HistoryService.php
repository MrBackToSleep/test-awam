<?php

namespace App\Services;

use App\Models\Devise;
use App\Models\History;
use Carbon\Carbon;

class HistoryService {
    public function formatLog($montant1, Devise $devise1, $montant2, Devise $devise2, $total){
        return $montant1 . ' ' . $devise1->symbole . ' + ' . $montant2 . ' ' . $devise2->symbole . ' = ' . $total;
    }

    public function sendMailRecapitulatif(Carbon $jour = null){
        if(is_null($jour)){ // Par défaut, on récupère les données de la veille
            $jour = Carbon::now()->subDay();
        }
        $lesLogs = History::logsFor($jour);
        $message = '<html><body><h1>Historique des calculs de taux de change :</h1>';
        foreach ($lesLogs as $log){
            $message .= '<div>'. $log->created_at->format('d/m/Y H:i:s') . ' ➝ ' .$log->log.'</div>';
        }
        $message .='</body></html>';
        return mail('arthurderichard33@hotmail.fr',  'Logs « Taux de change »'. $jour->format('d/m/Y'), $message);
    }
}
