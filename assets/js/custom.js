jQuery(function($){


	$("#listarPreguntas").on("submit", function(){
        var radio = $("input[type='radio']:checked").length;
        var totalRadios = $(".cadaPregunta").length;
        var candidato = $("#candidato").val();
        var emailCandidato = $("#emailCandidato").val();

        var names = [];

        if(radio < totalRadios) {
          $(".error").addClass("alert alert-danger");
          $(".error").fadeIn("slow").text("Por favor contesta todas las preguntas marcada en rojo. Te faltan: " + (totalRadios - radio));

          $("input:radio").each(function () {
              var rname = $(this).attr("name");
              if ($.inArray(rname, names) == -1) names.push(rname);
          });

          $.each(names, function (i, name) {
              if ($('input[name="' + name + '"]:checked').length == 0) {
                  var temp_id = name.split("_");
                  $(".mirow_" + temp_id[1]).addClass("error-faltantes");
              }else{
                var temp_id = name.split("_");
                $(".mirow_" + temp_id[1]).removeClass("error-faltantes");
              }
          });

          return false;

        } else {
          var names2 =[];
          $("input:radio").each(function () {
              var rname = $(this).attr("name");
              if ($.inArray(rname, names2) == -1) names2.push(rname);
          });

          $.each(names2, function (i, name) {
              if ($('input[name="' + name + '"]:checked').length != 0) {
                  var temp_id = name.split("_");
                 $(".mirow_" + temp_id[1]).removeClass("error-faltantes");
              }
          });
          $(".error").removeClass("alert alert-danger");
          $(".error").fadeOut("slow");

          return true;
        }
			});
	/* ----------------------------------------------------------- */
	/*  11. SCROLL TOP BUTTON
	/* ----------------------------------------------------------- */

	//Check to see if the window is top if not then display button

	$(window).scroll(function(){
	    if ($(this).scrollTop() > 300) {
	      $('.scrollToTop').fadeIn();
	    } else {
	      $('.scrollToTop').fadeOut();
	    }
	});

	//Click event to scroll to top

	$('.scrollToTop').click(function(){
	    $('html, body').animate({scrollTop : 0},800);
	    return false;
	});


	/* ----------------------------------------------------------- */
	/*  13. WOW ANIMATION
	/* ----------------------------------------------------------- */

	wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        live:         true,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
	
});
