// @codekit-prepend lib/modernizr-2.6.1.min.js
// @codekit-prepend lib/respond.js
// @codekit-prepend lib/highlight.min.js
// @codekit-prepend lib/jquery-1.9.0.js
// @codekit-prepend lib/jquery.jpanelmenu.min.js
// @codekit-prepend lib/plugins.js

var jPanelMenu = {};
jQuery(function() {

	jPanelMenu = jQuery.jPanelMenu({
		menu: '#menu',
		animated: false,
    afterClose: function() { jQuery('#wpadminbar').show(); jQuery('html').attr('style', ''); jQuery('body.menu-position-top .jPanelMenu-panel').css({top: 0}); },
    beforeOpen: function() { jQuery('#wpadminbar').hide(); jQuery('html').attr('style', 'margin-top: 0 !important'); },
    afterOpen: function() {
        var t = jQuery('#jPanelMenu-menu .menu').height(),
            div = jQuery('body.menu-position-top .jPanelMenu-panel');
        if(div[0]) {
            div[0].style.cssText += 'top: ' + t + 'px !important';
        }
      jQuery('#jPanelMenu-menu').css({overflow: 'hidden'});
    }
	});
	jPanelMenu.on();

	jQuery(document).on('click',jPanelMenu.menu + ' li a',function(e){
		if ( jPanelMenu.isOpen() && jQuery(e.target).attr('href').substring(0,1) == '#' ) { jPanelMenu.close(); }
	});

  jQuery(document).on('click','#trigger-off',function(e){
		jPanelMenu.off();
        jQuery('#wpadminbar').show();
		jQuery('html').css('padding-top','40px');
		jQuery('#trigger-on').remove();
		jQuery('body').append('<a href="" title="Re-Enable jPanelMenu" id="trigger-on">Re-Enable jPanelMenu</a>');
		e.preventDefault();
	});

	jQuery(document).on('click','#trigger-on',function(e){
        jQuery('#wpadminbar').hide();
		jPanelMenu.on();
		jQuery('html').css('padding-top',0);
		jQuery('#trigger-on').remove();
		e.preventDefault();
	});
    jQuery(document).on('click','#jPanelMenu-menu a.close-button', function(e) {
        e.preventDefault();
        jPanelMenu.close();
    });
});