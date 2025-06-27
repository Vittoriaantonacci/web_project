<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Profilo di {if $profile->getNickname()}{$profile->getNickname()|escape}{else}vuoto{/if}</title>

    <!-- Bootstrap CSS per uno stile coerente -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .profile-section {
            margin-bottom: 20px;
        }
        .followed-users {
            display: none;
            margin-top: 15px;
        }
        .followed-users.visible {
            display: block;
        }
        button {
            cursor: pointer;
        }
    </style>

    <script>
        function toggleFollowed() {
            const section = document.getElementById('followed-users-section');
            section.classList.toggle('visible');
        }
    </script>
</head>
<body class="container py-4">

    <div class="profile-section">
        <h1>Profilo di {if $profile->getNickname()}{$profile->getNickname()|escape}{else}vuoto{/if}</h1>
        <p><strong>Nome:</strong> {if $profile->getName()}{$profile->getName()|escape}{else}vuoto{/if} {if $profile->getSurname()}{$profile->getSurname()|escape}{else}vuoto{/if}</p>
        <p><strong>Username:</strong> {if $profile->getUsername()}{$profile->getUsername()|escape}{else}vuoto{/if}</p>
        <p><strong>Biografia:</strong> {if $profile->getBiography()}{$profile->getBiography()|escape}{else}vuoto{/if}</p>
        {if $profile->getProPic()}
            <img src="{$profile->getProPic()->getPath()|escape}" alt="Immagine profilo" width="150" class="img-thumbnail" />
        {/if}
    </div>

    <div class="profile-section">
        <h2>Preferiti</h2>
        {if $favorites|@count > 0}
            <ul>
                {foreach from=$favorites item=recipe}
                    <li>{if $recipe->getTitle()}{$recipe->getTitle()|escape}{else}vuoto{/if}</li>
                {/foreach}
            </ul>
        {else}
            <p>Non ci sono preferiti.</p>
        {/if}
    </div>

    <div class="profile-section">
        <button class="btn btn-secondary" onclick="toggleFollowed()">Seguiti</button>

        <div id="followed-users-section" class="followed-users">
            <h2>Utenti Seguiti</h2>
            {if isset($followedUsers) && $followedUsers|@count > 0}
                <ul>
                    {foreach from=$followedUsers item=user}
                        <li>
                            {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                            {if $user->getSurname()}{$user->getSurname()|escape}{else}vuoto{/if}
                            (
                            {if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if}
                            )
                        </li>
                    {/foreach}
                </ul>
            {else}
                <p>Non segui nessun utente.</p>
            {/if}
        </div>
    </div>

    <!-- Sezione pulsante per creare un meal plan -->
    <div class="profile-section">
        <form action="/mealplan/create" method="get">
            <button type="submit" class="btn btn-primary">Crea Meal Plan</button>
        </form>
    </div>

    <!-- Sezione pulsante per visualizzare i meal plan creati -->
    <div class="profile-section">
        <form action="/mealplan/list" method="get">
            <input type="hidden" name="user" value="{$profile->getIdUser()}" />
            <button type="submit" class="btn btn-outline-primary">Visualizza i miei Meal Plan</button>
        </form>
    </div>

</body>
</html>
