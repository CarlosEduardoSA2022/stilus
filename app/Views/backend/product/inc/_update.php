<script>
$(()=>{

})

function activeProduct (productCheck, productId) {

const baseUrl = "<?= base_url('backoffice/produto/ativa-inativa/') ?>" + productId;

let _data = { }

const txtMensage = $(productCheck).is(":checked") ? 'Tem certeza que deseja Ativar esse produto?' : 'Tem certeza que deseja Desativar esse produto?';

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

    if($(productCheck).is(":checked")) $(productCheck).prop('checked', false);
        else $(productCheck).prop('checked', true);
  }
});
}

const activeImage = imageCheck => {

    const txtAcao = $(imageCheck).is(":checked") ? 'Imagem ativada com sucesso' : 'Imagem inativada com sucesso';

    const baseUrl = "<?= base_url('backoffice/produto/ativa-inativa-imagem/') ?>" + imageCheck.id;

    let _data = { }

    fetch(baseUrl, {
            method: "POST",
            dataType: 'json',
            body: JSON.stringify(_data),
            headers: {"Content-type": "application/json; charset=UTF-8"},
      })

      .then(response => ()=> {
          response.text();
      })
      .catch(err => console.log(err));

      swal({
            title: 'Sucesso',
            text: txtAcao,
            icon: 'success',
            button: true, 
            imer: 3000
      });
}

</script>