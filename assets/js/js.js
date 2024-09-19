
document.addEventListener( 'wpcf7submit', function( event ) {
    console.log('asd');
    if ( '123' == event.detail.contactFormId ) {
      alert( "The contact form ID is 123." );
      // do something productive
    }
  }, false );

  /*

var wpcf7Elm = document.querySelector( '.wpcf7-form' );

wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
    console.log('asdad');
    alert( "Fire!" );
}, false );
*/

function makeIys(){
    jQuery.ajax({
        data: {},
        type: "POST", //rest Type
        dataType: 'json', //mispelled
        url: "http://localhost:8080/wp2/wordpress/wp-content/plugins/iys-izin/iys-api.php",
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function (msg) {
            console.log(msg);                
        }
    });
}