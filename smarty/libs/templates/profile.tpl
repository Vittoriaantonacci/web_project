<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo di {$profile.username}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 2rem;
        }
        .profile-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            margin-top: 0;
        }
        .info {
            margin-top: 1rem;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Profilo di {$profile.username}</h1>
    <p><strong>Nome:</strong> {$profile.name}</p>
    <p><strong>Cognome:</strong> {$profile.surname}</p>
    <p><strong>Nickname:</strong> {$profile.nickname}</p>
    <p><strong>Data di nascita:</strong> {$profile.birthDate|date_format:"%d/%m/%Y"}</p>
    <p><strong>Sesso:</strong> {$profile.gender}</p>
    <p><strong>Email:</strong> {$profile.email}</p>
    <p><strong>VIP:</strong> {if $profile.vip}Sì{else}No{/if}</p>
    <p><strong>Biografia:</strong> {$profile.biography}</p>
    <p><strong>Informazioni aggiuntive:</strong> {$profile.info}</p>
</div>

</body>
</html>