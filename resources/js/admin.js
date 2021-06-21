require('./bootstrap');

//confirmation request for every single post
const delForm = document.querySelectorAll('delete-post-form');
//console.log('Form'); array so Foreach!

delForm.forEach( form=>{
    form.addEventListener('submit', function(event) {
        const resp = confirm('Do you really want to delete this post?');
        
        //console.log('resp');

        if(!resp) {
            event.preventDefault();
        }
    });
});