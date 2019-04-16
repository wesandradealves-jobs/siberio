function mobileNavigation(e) {
	$(e).toggleClass('is-active');
    $('.mobile.navigation').toggleClass('toggle');
}
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function soLetras(v){
    return v.replace(/\d/g,"") //Remove tudo o que não é Letra
}
function sticky(string){
    var string = $(string);
    string.before(string.clone(true).addClass("sticky"));
    $(window).scroll(function(t) {
        var a = $(window).scrollTop();
        if(a>$('header').outerHeight())
            $('.sticky').addClass("stuck")
        else 
            $('.sticky').removeClass("stuck")
    })	
}
function closeMenu() {
    $('.toggle').removeClass('toggle'),
    $('.is-active').removeClass('is-active');
}
$(window).on("resize",function(o){
    closeMenu();
});
$(document).mouseup(function (e)
{
    var menu = $('.navigation').children();

    if (!menu.is(e.target) && menu.has(e.target).length === 0) {
        closeMenu();
    }
});  
function sendWPP(e){   
    var e = $(e);
    var telefone = "5521999885520";
    var saudacao = "Olá!";
    // var name = document.getElementById("user_nome").value;
    // var msg = document.getElementById("user_msg").value;        
    var saudacaoencode = encodeURI(saudacao);       
    var url_base = "https://api.whatsapp.com/send?phone=" + telefone + "&text=" + saudacaoencode + "%20";
    e.attr("href", url_base);    
}
$(document).ready(function () {
    $('.telefone').mask('(00) 00000-0000');
    $('.webdoor').slick({
        arrows: false,
        dots: true
    });
    sticky('header');
    if($('.tabs').length){
        $('.tabs, .tabs-content').children().first().addClass('active');
        $('.tabs').children().click(function() {
            console.log($(this).index()),
            $(this).closest('.tabs').children().first().removeClass('active'),
            $(this).closest('.tabs').find('.active').not($(this)).removeClass('active'),
            $(this).addClass('active');

            if ($(window).width() > 1180) {
                $(this).closest('.tabs').next().children().first().removeClass('active'),
                $(this).closest('.tabs').next().find('.active').not().eq($(this).index()).removeClass('active'),
                $(this).closest('.tabs').next().children().eq($(this).index()).addClass('active'),
                $(this).closest('.tabs').next().children().hide(),
                $(this).closest('.tabs').next().children().eq($(this).index()).show();                
            } else {
                $(this).closest('.tabs').find('.mobile').removeClass('toggle'),
                $(this).children('.mobile').addClass('toggle')
            } 
        });  
        if ($(window).width() <= 1180) {
            $('.tabs').children().first().find('.mobile').addClass('toggle')       
        }                
    }
    $(window).scroll(function(event){
        var st = $(this).scrollTop();

        $( '.pg-home main section' ).each(function() {
            if($(this).offset().top > (st + $('header').outerHeight() + 80)){
                $(this).removeClass('animated');
            } else {
                $(this).addClass('animated');
            }
        });
    });      
});
      
      