"use strict";

$("#tblUser").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [6] }
  ],

  'language': {
    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
},
  
});
