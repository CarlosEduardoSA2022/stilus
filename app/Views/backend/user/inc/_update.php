<script>
$(()=>{

})


function activeUser (userCheck, userId) {

    const baseUrl = "<?= base_url('usuario/ativa-inativa/') ?>" + userId;

    let _data = { }

    const txtMensage = $(userCheck).is(":checked") ? 'Tem certeza que deseja Ativar esse usuário?' : 'Tem certeza que deseja Desativar esse usuário?';

    swal({
      title: 'Atenção',
      text: txtMensage,
      icon: 'warning',
      buttons: true,
      dangerMode: true,
      buttons: ["Não, cancelar.", "Sim, confirmar."],
    })
    .then((willDelete) => {
      if (willDelete) {

        fetch(baseUrl, {
            method: "POST",
            dataType: 'json',
            body: JSON.stringify(_data),
            headers: {"Content-type": "application/json; charset=UTF-8"},
        })

        .then(response => response.text())

        .catch(err => console.log(err));

      swal('Operação realizada com sucesso!', {
        icon: 'success',
      });
      } else {

        if($(userCheck).is(":checked")) $(userCheck).prop('checked', false);
            else $(userCheck).prop('checked', true);
      }
    });
}

</script>