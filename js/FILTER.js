function toggleFilter(filterId) {
    var filter = document.getElementById(filterId);
    if (filter.style.display === "block") {
        filter.style.display = "none";
    } else {
        filter.style.display = "block";
    }
}
