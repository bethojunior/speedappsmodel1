elementProperty.addEventInElement('#choose-image-blog','onchange',function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("preview-image-blog").setAttribute('src', e.target.result);
            imageOne = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    }
})


elementProperty.addEventInElement('#search-blog','oninput',function () {
    let keys = this.value.toUpperCase();
    elementProperty.getElement('.through-blogs',blogs => {
        let blog = blogs.getAttribute('value').toUpperCase();
        if(!blog.includes(keys))
            return blogs.style.display = 'none';

        return blogs.style.display = '';

    });
});


elementProperty.addEventInElement('.delete-specialty','onclick',function () {
    let id = this.getAttribute('id');
    id = id.trim();
    SwalCustom.dialogConfirm('Deseja deletar esse especialidade?','Essa ação é irreversivel',status => {
        if(!status)
            return false;

        SpecialtyController.delete(id).then(response => {
            if(!response)
                return swal('Erro ao excluir especialidade','Contate o suporte','error')
            swal('Especialidade excluido com sucesso','','success')
            return elementProperty.getElement(`.specialty${id}`,that => {
                that.style.display = 'none';
            })
        })
    })
})
