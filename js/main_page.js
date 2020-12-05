window.onscroll = function() {
var fixedTop = document.getElementById('filter__row');
if (window.pageYOffset > 550) {
fixedTop.classList.add('fixed');
} else {
fixedTop.classList.remove('fixed');
}
};

$('.offers__close').click(function(){
$(this).parent().parent().hide();
});

$('.exit-more,.exit-more-phone').click(function(){
    var dark = $(".offers__dark__elem"); 
    dark.fadeOut("fast");
})
function currency(){
    var currency__popup = $("#currency__element");
    currency__popup.fadeIn("slow");
}
jQuery(function($){
    $(document).mouseup(function (e){ 
      var div = $(".currenсy__item"); 
      var currency__popup = $("#currency__element"); 
      if (!div.is(e.target) 
          && div.has(e.target).length === 0) {
            currency__popup.fadeOut("slow");
        }
    });
  });
  $('.report__item').click(function(){
    $(this).fadeOut("slow");
    var id  = document.getElementById("rassilka__input");
    id.style.borderColor = "gray";
    });
    $(function(){
        var offer = $('.offers__card');
        offer.mouseover(function(){
            $(this).children('.offers__on__hover').hide();
        })
        offer.mouseout(function(){
            $(this).children('.offers__on__hover').show();
        })
    });
    
    $('.offers__card').click(function() {
        $('.offers__info__block').animate({
            scrollTop: 0
        }, 1);
    });

    $('.offers__card').click( function(){
        $(this).children('.offers__dark__elem').show();
    });
    jQuery(function($){
        $(document).mouseup(function (e){ 
            var dark = $(".offers__dark__elem"); 
            var country_popup = $(".offers__info__block"); 
            if (!country_popup.is(e.target) 
                && country_popup.has(e.target).length === 0) {
                    dark.fadeOut("fast");
                }
        });
        });
    function filter_up(){
        var filter_window = document.getElementById("filter-item");
        $(filter_window).slideToggle(500);
    }
    function showCurrency(){
        var currencyBlock = document.getElementById("currency__information");
        $(currencyBlock).slideToggle(500);
    }

function introduction () {
    var getPopup = document.getElementById("introduction");
    if (localStorage.getItem('popState') == 'shown') {
        getPopup.style.display = "none";
    }
    else if(localStorage.getItem('popState') != 'shown'){    
        $(getPopup).delay(2000).fadeIn();
        localStorage.setItem('popState','shown');
    }
}