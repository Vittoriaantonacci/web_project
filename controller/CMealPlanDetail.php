<?php
require_once 'bootstrap.php'; // entityManager + smarty
require_once 'VMealPlan.php'; // the view class

class CMealPlanDetail {
    private $entityManager;
    private $view;

    public function __construct($entityManager, $smarty) {
        $this->entityManager = $entityManager;
        $this->view = new VMealPlan();
    }

    // Show the details of a meal plan
    public function showDetail(): void {
        // Get the meal plan ID from the query parameters
        $id = $_GET['id'] ?? null;

        // Check if ID is provided
        if (!$id) {
            $this->view->error("Meal plan ID is missing.");
            return;
        }

        // Find the meal plan entity by ID
        $mealPlan = $this->entityManager->getRepository(EMealPlan::class)->find($id);

        // If the meal plan is not found, show an error message
        if (!$mealPlan) {
            $this->view->error("Meal plan with ID $id not found.");
            return;
        }

        // Pass the meal plan entity to the view for rendering
        $this->view->detail($mealPlan);
    }
}

// Instantiate and use the controller
$controller = new CMealPlanDetail($entityManager, $smarty);
$controller->showDetail();
