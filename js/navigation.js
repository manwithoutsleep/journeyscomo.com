async function loadPartial(placeholderId, url) {
    const response = await fetch(url);
    const text = await response.text();
    document.getElementById(placeholderId).innerHTML = text;
}

document.addEventListener('DOMContentLoaded', () => {
    loadPartial('header-placeholder', 'partials/_header.html');
    loadPartial('navigation-placeholder', 'partials/_navigation.html');
});