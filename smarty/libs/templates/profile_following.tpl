<h1>Profilo di {$profile.nickname|default:$profile.username}</h1>

<p>Nome: {$profile.name} {$profile.surname}</p>
<p>Email: {$profile.email}</p>

<h2>Preferiti</h2>
<ul>
    {foreach from=$favorites item=recipe}
        <li>{$recipe.name}</li>
    {/foreach}
</ul>

<h2>Utenti seguiti</h2>
{if $followedUsers|@count > 0}
    <ul>
        {foreach from=$followedUsers item=user}
            <li>
                {if $user.pro_pic}
                    <img src="{$user.pro_pic.url}" alt="Foto di {$user.username}" width="40" height="40" />
                {else}
                    <img src="/images/default-profile.png" alt="Foto di default" width="40" height="40" />
                {/if}
                <a href="profile.php?id={$user.idUser}">{$user.name} {$user.surname} ({$user.username})</a>
            </li>
        {/foreach}
    </ul>
{else}
    <p>Questo utente non segue nessuno.</p>
{/if}
