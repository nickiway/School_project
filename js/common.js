window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
    document.body.classList.add('loaded');
    document.body.classList.remove('loaded_hiding');
    }, 500);
    var currentId = localStorage.getItem('lasttab');
    var  tabscontent = document.getElementsByClassName('tabscontent');
    for (let i = 0; i < tabscontent.length; i++) {
        tabscontent[i].style.display = "none";
    }
    document.getElementById(currentId).style.display = "flex";  
    }
     var amountScrolled = 200;

    $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });
    $('a.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });
    
    function more_info(){
        document.getElementById("menu__more__info").classList.toggle('active');
    }

    jQuery(function($){
        $(document).mouseup(function (e){ 
            var dark = $(".order__send-form"); 
            var country_popup = $(".order__call-form"); 
            if (!country_popup.is(e.target) 
                && country_popup.has(e.target).length === 0) {
                    dark.fadeOut("fast");
                }
        });
    });
    function sendTour(id) {
        var orderPopup = document.getElementById(id);
        $(orderPopup).fadeIn("slow");

    }