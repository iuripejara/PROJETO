var search = document.getElementById('search');
search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        searchData();
    }
});

document.getElementById('searchData').addEventListener("click", function() {
    searchData();
});

function searchData() {
    window.location = 'index.php?search=' + encodeURIComponent(search.value);
}
