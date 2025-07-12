window.addEventListener('load', () => {
    // Controllo se i cookie sono abilitati
    if (!navigator.cookieEnabled) {
        alert("I cookie sono disabilitati nel tuo browser. Per usare questa applicazione, attivali dalle impostazioni del browser.");
        window.location.href = "/recipeek/User/login";
        return;
    }

    // Scommenta per vedere il messaggio di avviso sui cookie
    //alert("I cookie sono disabilitati nel tuo browser. Per usare questa applicazione, attivali dalle impostazioni del browser.");
    //window.location.href = "/recipeek/User/login"; 
    //return;

    // This code checks if the user has already accepted or rejected cookies
    // If they have, it does not show the modal again
    // The user must accept cookies only if the app uses them for specific types of functionality

    const hasAccepted = localStorage.getItem("cookiesAccepted");
    if (hasAccepted === "true" || hasAccepted === "false") {
        // L'utente ha già fatto una scelta, non mostrare di nuovo
        return;
    }

    const modalElement = document.getElementById("cookieConsentModal");
    const cookieModal = new bootstrap.Modal(modalElement);
    cookieModal.show();

    document.getElementById("cookieAccept").addEventListener("click", () => {
        localStorage.setItem("cookiesAccepted", "true");
        cookieModal.hide();
    });

    document.getElementById("cookieReject").addEventListener("click", () => {
        localStorage.setItem("cookiesAccepted", "false");
        window.location.href = "/recipeek/User/login";
        cookieModal.hide();
    });
});





