elementProperty.addEventInElement('#choose-image','onchange',function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("preview-image").setAttribute('src', e.target.result);
            imageOne = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    }
})

elementProperty.addEventInElement('.delete-carousel','onclick',function () {
    let id = this.getAttribute('id');
    SwalCustom.dialogConfirm('Deseja deletar essa imagem?','Essa ação é irreversivel',status => {
        if(!status)
            return false;

        CarouselController.delete(id).then(response => {
            if(!response)
                return swal('Erro ao excluir imagem','Contate o suporte','error')
            swal('Imagem excluida com sucesso','','success')
            return elementProperty.getElement('.image'+id,img => {
                img.style.display = 'none';
            })
        })
    })

})
