<script>

$(()=>{

    $("#tblRegister").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [5] }
        ],

        'order': [[0, 'desc']],

        'language': {
            url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
        },
    
    });

})
</script>