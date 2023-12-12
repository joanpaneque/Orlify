<?php

namespace App\Controllers;

class Reports {
    public function index($request, $response, $container){
        
        $reports = $container->get("\App\Models\Reports");
        
        $reportsData = $reports->getReportsUsers();

        $response->set("reports", $reportsData);
        $response->SetTemplate("reports.php");
        
        return $response;        
        
    }

    public function toggleReports($request, $response, $container){
        $reportId = $request->get(INPUT_POST, 'reportId');
        
        $reports = $container->get("\App\Models\Reports");
        
        if (!$reports->exists($reportId)) {
            $response->set("error", 1);
            $response->set("message", "Aquest report no existeix");
            return $response;
        }

        $reports->toggleReport($reportId);
        $isActivated = $reports->isActivated($reportId);

        $response->set("error", 0);
        $response->set("message", "Report " . ($isActivated ? 'activat' : 'desactivat') . " correctament");
        return $response;
    }
}