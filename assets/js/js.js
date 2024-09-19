


 jQuery('.wpcf7-form').on('submit', function(e){
     //e.preventDefault();
     
        console.log( jQuery('.wpcf7-email').val() );
        

    jQuery.ajax({
        type: "POST", //rest Type
        dataType: 'json', //mispelled
        url: "http://localhost:8080/wp2/wordpress/wp-content/plugins/iys-izin/iys-api.php",
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function (msg) {
            console.log(msg);                
        }
    });

        

   });
