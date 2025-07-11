{extends file='layout.tpl'}

{block name="title"}Crea Nuovo Post{/block}

{block name="body"}
<div class="container mt-4">
    <div class="styled-card">
        <h2 class="mb-4">Crea un nuovo post</h2>
        <form method="post" action="/recipeek/Post/onCreate" enctype="multipart/form-data">
            <!-- Titolo -->
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo del post" required />
            </div>

            <!-- Descrizione -->
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Scrivi una descrizione..." required></textarea>
            </div>

            <!-- Categoria -->
            <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" disabled selected>Seleziona una categoria</option>
                    <option value="antipasto">Antipasto</option>
                    <option value="primo">Primo</option>
                    <option value="secondo">Secondo</option>
                    <option value="dolce">Dolce</option>
                    <option value="bevanda">Bevanda</option>
                    {if $isVip}
                        <option value="antipasto #Fit">Antipasto #Fit</option>
                        <option value="primo #Fit">Primo #Fit</option>
                        <option value="secondo #Fit">Secondo #Fit</option>
                        <option value="dolce #Fit">Dolce #Fit</option>
                        <option value="bevanda #Fit">Bevanda #Fit</option>
                        <option value="contorno #Fit">Contorno #Fit</option>
                        <option value="salsa #Fit">Salsa #Fit</option>
                        <option value="snack #Fit">Snack #Fit</option>
                        <option value="colazione #Fit">Colazione #Fit</option>
                    {/if}
                </select>
            </div>

            <!-- Immagini -->
            <div class="mb-3">
                <label for="images" class="form-label">Immagini</label>
                <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple required />
                <small class="form-text mb-1">Puoi caricare fino a 5 immagini.</small>
            </div>

            <!-- Bottone invio -->
            <button type="submit" class="btn btn-primary">➕ Crea</button>
        </form>
    </div>
</div>
{/block}