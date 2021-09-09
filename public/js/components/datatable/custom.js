// DataTables Customization on initiation

const customSettings = datatable => {
  $("#tableCategory_previous .page-link").html(`
    <i class="fas fa-angle-left"></i>
    <span class="sr-only">Previous</span>
  `);

  $("#tableCategory_next .page-link").html(`
    <i class="fas fa-angle-right"></i>
    <span class="sr-only">Next</span>
  `);

  $("#tableCategory_paginate .pagination .paginate_button").removeClass('paginate_button');

  $("#tableCategory_filter").remove();

  $("#navbar-search-main").on('submit', (e) => {
    e.preventDefault();
    datatable.search($("#searchBar").val()).draw();
  });
}