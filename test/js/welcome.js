
window.addEventListener ? window.addEventListener ( "load", so_init, false ) : window.attachEvent ( "onload", so_init );

var d         = document;
var imgs      = new Array ( );
var zInterval = null;
var current   = 0;
var pause     = false;

function so_init ( ) {

  if ( !d.getElementById || !d.createElement || !d.getElementsByTagName ( "head" ) || !d.getElementById ( "rotating-banner" ) ) return;

  css = d.createElement ( "link" );

  css.setAttribute ( "rel",  "stylesheet" );
  css.setAttribute ( "type", "text/css"   );

  d.getElementsByTagName ( "head" ) [ 0 ].appendChild ( css );

  imgs = d.getElementById ( "rotating-banner" ).getElementsByTagName ( "img" );

  for ( i = 1; i < imgs.length; i++ ) imgs [ i ].xOpacity = 0;

  imgs [ 0 ].style.display = "block";
  imgs [ 0 ].xOpacity = .99;

  setTimeout ( so_xfade, 3000 );

}

function so_xfade ( ) {

  nIndex    = imgs [ current + 1 ] ? current + 1 : 0;

  cOpacity  = imgs [ current     ].xOpacity;
  nOpacity  = imgs [ nIndex      ].xOpacity;

  cOpacity -= .05;
  nOpacity += .05;

  imgs [ nIndex  ].style.display = "block";

  imgs [ current ].xOpacity = cOpacity;
  imgs [ nIndex  ].xOpacity = nOpacity;

  setOpacity ( imgs [ current ] );
  setOpacity ( imgs [ nIndex  ] );

  if ( cOpacity <= 0 ) {
    imgs [ current ].style.display = "none";
    current = nIndex;
    setTimeout ( so_xfade, 3000 );
  } else {
    setTimeout ( so_xfade, 42 );
  }

  function setOpacity ( obj ) {

    if ( obj.xOpacity > .99 ) {
    obj.xOpacity = .99;
    return;
    }

    obj.style.opacity    = obj.xOpacity;
    obj.style.MozOpacity = obj.xOpacity;
    obj.style.filter     = "alpha(opacity=" + ( obj.xOpacity * 100 ) + ")";

  }
}
