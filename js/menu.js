(function ($) {
  Drupal.behaviors.climate = {
  attach: function(context, settings) {


	  function mainmenu(){
	  $(" #nav ul ").css({display: "none"}); // Opera Fix
	  $(" #nav li").hover(function(){
	  		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(200);
	  		},function(){
	  		$(this).find('ul:first').css({visibility: "hidden"});
	  		});
	  }


	  //mainmenu();



      /* lslee BEGIN */

      setNavBehaviorOnMobile();

      //
      // Windows Resize event
      //
      $(window).resize(function(){
          setNavBehaviorOnMobile();
      });

      function setNavBehaviorOnMobile() {

          if ($('#nav-holder h2.head').css('display') == 'block') { // mobile menu
              $('#nav-holder #nav').hide();
              $('#nav-holder h2.head')
                .unbind('hover')
                .unbind('click')
                .hover(
                    function(event) {
                        $(this).css('cursor', "pointer").addClass('hovered');
                    },
                    function(event) {
                        $(this).css('cursor', "auto").removeClass('hovered');
                    })
                .click(function() {
                    $('#nav-holder #nav').slideToggle(200, function() {
                        $('#nav-holder h2.head').removeClass('active');
                        if ($('#nav-holder #nav').css('display') == 'block') {
                            $('#nav-holder h2.head').addClass('active');
                        }
                    });
                });
          } else {
              $('#nav-holder h2.head')
                .unbind('hover')
                .unbind('click');
              $('#nav-holder #nav').show();
          }
      }



      $('#slider').bxSlider({
        auto: true,
        autoControls: true,
        pause: 5000,
        captions: false
      });

      /* lslee END */


}
};
})(jQuery);
