<?php
echo js('assets/scripts/morphingdevice.js');
echo js('assets/scripts/scripts.js');
?>
<script>
var el = document.querySelector( '.md-slider' ),
settings = {
    autoplay : true,
    interval : 3000,
    devices : [
    { cName : 'md-device-1', canRotate : false, imgsrc : 'images/site1.jpg' },
    { cName : 'md-device-2', canRotate : false, imgsrc : 'images/site2.jpg' },
    { cName : 'md-device-3', canRotate : true, imgsrc : 'images/site3.jpg', rotatedsrc : 'images/site3r.jpg' },
    { cName : 'md-device-4', canRotate : true, imgsrc : 'images/site4.jpg', rotatedsrc : 'images/site4r.jpg' }
    ]
},
devicesTotal = settings.devices.length,
ds = MorphingDevice( el, settings );

// create navigation triggers
var nav = document.createElement( 'nav' );
for( var i = 0; i < devicesTotal; ++i ) {

    var trigger = document.createElement( 'a' );
    trigger.className = i === 0 ? 'md-current' : '';
    trigger.setAttribute( 'href', '#' );
    trigger.setAttribute( 'pos', i );
    trigger.onclick = function( event ) {

        ds.stopSlideshow();
        var pos = Number( event.target.getAttribute( 'pos' ) );
        if( pos === ds.getCurrent() ) {
            return false;
        }
        ds.updateCurrentTrigger( event.target );
        ds.setCurrent( pos );
        ds.changeDevice();
        return false;

    };
    nav.appendChild( trigger );

}
el.appendChild( nav );

if( settings.autoplay ) {
    ds.startSlideshow();
}
</script>
<?php
echo '</body>';
echo '</html>';
?>
