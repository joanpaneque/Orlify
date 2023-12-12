<?php

namespace App\Controllers;

/**
 * Class Reports
 *
 * This class manages operations related to reports.
 */
class Reports {
    /**
     * Display the reports index page.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container){
        // Access the Reports model
        $reports = $container->get("\App\Models\Reports");
        
        // Retrieve report data
        $reportsData = $reports->getReportsUsers();

        // Set data for the response and define the template
        $response->set("reports", $reportsData);
        $response->SetTemplate("reports.php");
        
        return $response;        
    }

    /**
     * Toggle reports based on the provided report ID.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function toggleReports($request, $response, $container){
        // Get report ID from the POST request
        $reportId = $request->get(INPUT_POST, 'reportId');
        
        // Access the Reports model
        $reports = $container->get("\App\Models\Reports");
        
        // Check if the report exists
        if (!$reports->exists($reportId)) {
            $response->set("error", 1);
            $response->set("message", "Aquest report no existeix");
            return $response;
        }

        // Toggle the report status and check its activation
        $reports->toggleReport($reportId);
        $isActivated = $reports->isActivated($reportId);

        // Set response messages based on the report activation status
        $response->set("error", 0);
        $response->set("message", "Report " . ($isActivated ? 'activat' : 'desactivat') . " correctament");
        return $response;
    }
}
