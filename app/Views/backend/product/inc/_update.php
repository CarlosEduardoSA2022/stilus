<script>
$(()=>{

})


const activeImage = imageCheck => {

    const txtAcao = $(imageCheck).is(":checked") ? 'Imagem ativada com sucesso' : 'Imagem inativada com sucesso';

    const baseUrl = "<?= base_url('produto/ativa-inativa/') ?>" + imageCheck.id;

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