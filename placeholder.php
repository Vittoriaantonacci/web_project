<?php

function populateDatabase() {
        $user = new EProfile(
            'giovanni',
            'abc234',
            new DateTime('2023-10-01'),
            'M',
            'giovanni@gmai.com',
            hash('sha256', 'password123'),
            'Giovanni',
        );
        $user2 = new EProfile(
            'mario',
            'abcd1234',
            new DateTime('2023-10-01'),
            'M',
            'franc@sjido.com',
            hash('sha256', 'paerwererd123'),
            'Mario',
        );
        $user3 = new EProfile(
            'luigi',
            'abcd134jiji',
            new DateTime('2023-10-01'),
            'M',
            'jfidosò@sjido.com',
            hash('sha256', 'pasifififif23'),
            'Luigi',
        );

        $post = new EPost(
            'Titolo del post di prova',
            'Descrizione del post di prova',
            'Categoria di prova',
        );

        $commento1 = new EComment(
            'Questo è un commento di prova'      
        );

        $commento2 = new EComment(
            'Questo è un altro commento di prova'
        );

        $like = new ELike();

        $user->addPost($post);
        $user->addComment($commento1);
        $user2->addComment($commento2);
        $user3->addLike($like);
        $post->setProfile($user);
        $post->addComment($commento1);
        $post->addComment($commento2);
        $post->addLike($like);

        FPersistentManager::getInstance()->create($user);
        FPersistentManager::getInstance()->create($user2);
        FPersistentManager::getInstance()->create($user3);
        FPersistentManager::getInstance()->create($post);
    }