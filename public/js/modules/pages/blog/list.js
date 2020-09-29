elementProperty.addEventInElement('#search-blogs','oninput',function () {
    let keys = this.value.toUpperCase();
    elementProperty.getElement('.through-blogs',blogs => {
        let blog = blogs.getAttribute('value').toUpperCase();
        if(!blog.includes(keys))
            return blogs.style.display = 'none';

        return blogs.style.display = '';

    });
});
