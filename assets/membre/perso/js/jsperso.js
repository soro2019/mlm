var toCopy  = document.getElementById( 'to-copy' ),
    btnCopy = document.getElementById( 'copy' );
   

btnCopy.addEventListener( 'click', function(){
  toCopy.select();
  
  if ( document.execCommand( 'copy' ) ) {
      
    
  } else {
    console.info( 'document.execCommand went wrong…' )
  }
  
  return false;
} );