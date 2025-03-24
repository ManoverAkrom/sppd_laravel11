document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("simple-search");
    const tableRows = document.querySelectorAll("tbody tr");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();
        console.log("Searching for:", searchTerm); // Debugging
        let hasResults = false;

        tableRows.forEach((row) => {
            const cells = row.querySelectorAll("td");
            const rowText = Array.from(cells)
                .map((cell) => cell.textContent.toLowerCase())
                .join(" ");
            console.log("Row text:", rowText); // Debugging

            if (rowText.includes(searchTerm)) {
                row.style.display = ""; // Tampilkan baris
                hasResults = true;
            } else {
                row.style.display = "none"; // Sembunyikan baris
            }
        });

        const feedback = document.getElementById("search-feedback");
        feedback.style.display = hasResults ? "none" : "block";
    });
});

let sortDirection = true; // true for ascending, false for descending
let currentSortColumn = -1; // Menyimpan kolom yang sedang diurutkan

function sortTable(columnIndex) {
    const table = document.querySelector("table");
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));

    // Sort rows based on the column index
    rows.sort((a, b) => {
        const aText = a.children[columnIndex].textContent.trim();
        const bText = b.children[columnIndex].textContent.trim();

        // Handle numeric sorting for Total Biaya
        if (columnIndex === 5) {
            const aValue = parseFloat(aText.replace(/[^0-9.-]+/g, ""));
            const bValue = parseFloat(bText.replace(/[^0-9.-]+/g, ""));
            return sortDirection ? aValue - bValue : bValue - aValue;
        }

        // Handle string sorting
        return sortDirection
            ? aText.localeCompare(bText)
            : bText.localeCompare(aText);
    });

    // Append sorted rows to the tbody
    rows.forEach((row) => tbody.appendChild(row));

    // Toggle sort direction for next click
    if (currentSortColumn === columnIndex) {
        sortDirection = !sortDirection; // Toggle direction
    } else {
        sortDirection = true; // Reset to ascending if a new column is sorted
    }
    currentSortColumn = columnIndex; // Update current sort column

    // Update sort indicators
    updateSortIndicators(columnIndex);
}

function updateSortIndicators(columnIndex) {
    // Reset all indicators
    const indicators = document.querySelectorAll(".sort-indicator");
    indicators.forEach((indicator) => {
        indicator.classList.remove("sort-asc", "sort-desc");
    });

    // Set the current column indicator
    const currentIndicator = document.getElementById(
        `sort-indicator-${columnIndex}`
    );
    if (sortDirection) {
        currentIndicator.classList.add("sort-asc");
    } else {
        currentIndicator.classList.add("sort-desc");
    }
}
