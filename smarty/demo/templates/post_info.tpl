<h1>{$post.getTitle()}</h1>

<p><strong>Categoria:</strong> {$post.getCategory()}</p>

<p><strong>Autore:</strong> {$post.getProfile().getUsername()}</p>

<p><strong>Descrizione:</strong> {$post.getDescription()}</p>

<p><strong>Creato il:</strong> {$post.getCreationTimeStr()}</p>

<hr>

<h2>Commenti</h2>

{if $comments|@count > 0}
    <ul>
        {foreach from=$comments item=comment}
            <li>
                <strong>{$comment.getUser().getUsername()}</strong>: 
                {$comment.getBody()}
            </li>
        {/foreach}
    </ul>
{else}
    <p>Nessun commento disponibile.</p>
{/if}
