$(document).ready(function() {
    $('#category_select').change(function(){
        var val = $(this).val();
        $.ajax({
            url :   '/admin/ajax.php',
            data : {
                cat_id : val
            },
            dataType : 'json',
            type : 'POST',
            success : function ( data ){
//                console.log(data);
                $('.imageSelectBox').html('');
                var innerHTML = '';
                $.each(data, function(index, itemData) {                    
                    innerHTML += "<div class='imageBox'>";
                    innerHTML += "<img src='../images/upload/mini_"+itemData['path']+"' alt='"+itemData['alt_text']+"'>";
                    innerHTML += "<input type='checkbox' name='image_id' value='"+itemData['id']+"'>";
                    innerHTML += "</div>";
                    $('.imageSelectBox').html(innerHTML);
                });
            },
            error : function(r){
            alert('FEJL FEJL');
            }
        });
    });
});

