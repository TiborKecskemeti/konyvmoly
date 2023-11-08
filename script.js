// JavaScript kód a könyv részletek oldalhoz
document.addEventListener("DOMContentLoaded", function() {
    // Az értékelési űrlap kezelése
    const ratingForm = document.getElementById("rating-form");
    if (ratingForm) {
        ratingForm.addEventListener("submit", function(event) {
            event.preventDefault();
            const bookId = /* Könyv azonosítója */;
            const userName = /* Felhasználó neve */;
            const rating = parseFloat(document.getElementById("rating").value);
            const comment = /* Hozzászólás */;
            
            // AJAX kérés az értékelés hozzáadásához
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "review.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                    // Frissítsd az oldalt vagy végezz további műveleteket
                }
            };
            xhr.send(`book_id=${bookId}&user_name=${userName}&rating=${rating}&comment=${comment}`);
        });
    }

    // Az értékelések lekérdezése és megjelenítése
    const bookId = /* Könyv azonosítója */;
    // AJAX kérés az értékelések lekérdezéséhez
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `review.php?book_id=${bookId}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const reviews = JSON.parse(xhr.responseText);
            const ratingsSection = document.getElementById("ratings");
            if (ratingsSection && reviews.length > 0) {
                const ul = document.createElement("ul");
                reviews.forEach(function(review) {
                    const li = document.createElement("li");
                    li.textContent = `${review.user_name}: ${review.rating}`;
                    ul.appendChild(li);
                });
                ratingsSection.appendChild(ul);
            }
        }
    };
    xhr.send();
});
