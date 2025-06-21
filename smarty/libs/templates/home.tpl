<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Benvenuto su Recipeek!</h1>

    {foreach from=$posts item=post}
        <div class="post">
            <h2>{$post[0]->getTitle()}</h2>
            <p><strong>Categoria:</strong> {$post[0]->getCategory()}</p>
            <p><strong>Descrizione:</strong> {$post[0]->getDescription()}</p>
            <p><strong>Creato il:</strong> {$post[0]->getCreationTimeStr()}</p>
            <p><strong>Autore (profilo ID):</strong> {$post[0]->getProfile()->getIdUser()}</p>

            <p><a href="/Agora/Post/visit/{$post[0]->getIdPost()}">Vai al post</a></p>
            <hr />
        </div>
    {/foreach}

</body>
</html>