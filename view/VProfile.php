<?php

/*public static function profile(string $username) {
        if (!self::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
    
        $view = new VUser();
    
        // Recupera l'utente dal database tramite username
        $profile = FPersistentManager::getInstance()->getUserByUsername($username);
    
        // Se l'utente non esiste, mostra una pagina di errore
        if ($profile === null) {
            $view->error(); // oppure: echo "Profilo non trovato";
            return;
        }
    
        // Mostra il profilo nella view
        $view->showProfile($profile);
    }
    
    


    public static function profile() {
        if (!self::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
    
        $view = new VUser();
    
        // Istanzio un profilo di prova
        $profile = new EProfile(
            'Mario',                    // name
            'Rossi',                    // surname
            new DateTime('1990-05-15'), // birth_date
            'M',                        // gender
            'mario.rossi@email.com',    // email
            password_hash('password123', PASSWORD_DEFAULT), // password (hashed)
            'mariorossi'                // username / nickname
        );
    
        $profile->setNickname('MarioR');
        $profile->setBiography('Sono un appassionato di fitness e cucina sana.');
        $profile->setInfo('Mi piace sperimentare nuove ricette fit.');
        $profile->setVip(true);
        $profile->setIsBanned(false);
    
        $view->showProfile($profile);
    }

public function showProfile(EProfile $profile) {
        $this->smarty->assign('profile', $profile);
        $this->smarty->display('profile.tpl');
    }*/