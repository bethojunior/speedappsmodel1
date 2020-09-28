
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
