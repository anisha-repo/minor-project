// Search Functionality to filter customers by name
const searchBar = document.getElementById('searchBar');
const customerTableBody = document.getElementById('customerTableBody');
const rows = customerTableBody.getElementsByTagName('tr');

searchBar.addEventListener('input', () => {
  const filter = searchBar.value.toLowerCase();

  Array.from(rows).forEach(row => {
    const name = row.querySelector('td[data-name]').dataset.name.toLowerCase();
    if (name.includes(filter)) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});
