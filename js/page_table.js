const myTable = document.getElementById("myTable");
const previous = document.getElementById("previous");
const next = document.getElementById("next");
const page = document.getElementById("page");

let currentPage = 1;
let rowsPerPage = 5; // Change this value to the number of rows you want to show per page

// Function to display rows for the current page
function showRows() {
  const rows = myTable.tBodies[0].rows;
  const totalPages = Math.ceil(rows.length / rowsPerPage);
  
  for (let i = 0; i < rows.length; i++) {
    rows[i].style.display = (i >= (currentPage - 1) * rowsPerPage && i < currentPage * rowsPerPage) ? "" : "none";
  }
  
  page.textContent = `Page ${currentPage} of ${totalPages}`;
  previous.disabled = currentPage === 1;
  next.disabled = currentPage === totalPages;
}

// Event listeners for pagination buttons
previous.addEventListener("click", () => {
  if (currentPage > 1) {
    currentPage--;
    showRows();
  }
});

next.addEventListener("click", () => {
  const totalPages = Math.ceil(myTable.tBodies[0].rows.length / rowsPerPage);
  if (currentPage < totalPages) {
    currentPage++;
    showRows();
  }
});

// Call showRows to display the first page on page load
showRows();