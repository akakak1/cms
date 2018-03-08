$(document).ready(function(){
    
    // CKEDITOR //////////
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    });
    
    
    
    $('#selectAllBoxes').click(function(event){
        if(this.checked) {
            $('.checkBox').each(function(){
                this.checked = true;
            })
        } else {
            $('.checkBox').each(function(){
                this.checked = false;
            })
        }
    })
    
    
})


