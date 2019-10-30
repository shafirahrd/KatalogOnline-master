        $("#navi").css('background-color','transparent');
        $("#navi").css('border','none');;
        $(".dropdown-toggle").css('background-color','transparent');
        $(window).scroll(function() {
            var x = $(window).scrollTop();
            if (x == 0) {
              $("#navi").css('background-color','transparent');
              $("#navi").css('border','none');;
              $(".dropdown-toggle").css('background-color','transparent');
            } else {
              $("#navi").css('background-color','white');
              $("#navi").css('border','');
              $(".dropdown-toggle").css('color','');
              $(".dropdown-toggle").css('background-color','');
              $(".nav-logo").attr('src','assets/img/logo.png');
            }
        });