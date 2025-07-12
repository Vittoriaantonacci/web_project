<?php

function populateDatabase() {
    $meals = [
        ['Uova strapazzate', 155, 11, 1, 13],
        ['Petto di pollo grigliato', 165, 3, 0, 31],
        ['Riso basmati', 130, 0.3, 28, 2.7],
        ['Salmone al forno', 208, 13, 0, 20],
        ['Pane integrale', 250, 4, 43, 9],
        ['Mela', 52, 0.2, 14, 0.3],
        ['Avocado', 160, 15, 9, 2],
        ['Yogurt greco', 59, 0.4, 3.6, 10],
        ['Mandorle', 579, 50, 22, 21],
        ['Fiocchi d’avena', 389, 7, 66, 17],
        ['Pasta integrale', 350, 1.5, 75, 13],
        ['Tonno al naturale', 116, 1, 0, 25],
        ['Formaggio fresco', 98, 8, 1, 6],
        ['Lenticchie cotte', 116, 0.4, 20, 9],
        ['Zucchine grigliate', 17, 0.3, 3, 1.2],
        ['Fagioli neri', 132, 0.5, 23.7, 8.9],
        ['Carote bollite', 35, 0.2, 8.2, 0.8],
        ['Banana', 89, 0.3, 22.8, 1.1],
        ['Patate lesse', 87, 0.1, 20.1, 1.9],
        ['Fragole', 32, 0.3, 7.7, 0.7],
        ['Mozzarella light', 254, 17, 3, 21],
        ['Ricotta magra', 136, 10, 3.1, 11],
        ['Broccoli cotti', 55, 0.6, 11.2, 3.7],
        ['Tè verde (senza zucchero)', 0, 0, 0, 0],
        ['Fesa di tacchino', 104, 2, 0, 22],
        ['Couscous', 112, 0.2, 23.2, 3.8],
        ['Piselli cotti', 81, 0.4, 14.5, 5],
        ['Melanzane grigliate', 25, 0.2, 5.9, 0.8],
        ['Latte scremato', 34, 0.1, 5, 3.4],
        ['Pere', 57, 0.1, 15.2, 0.4],
    ];

    foreach ($meals as $meal) {
        $serving = new EServing(
            'Per 100 gr',
            $meal[1],
            $meal[2],
            $meal[3],
            $meal[4]
        );
        FPersistentManager::getInstance()->create($serving);

        $mealEntity = new EMeal(
            $meal[0],
            'Generic'
        );
        $mealEntity->setServing($serving);
        FPersistentManager::getInstance()->addMeal($mealEntity);
    }
}

