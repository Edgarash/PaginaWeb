window.addEventListener('load', function(){
    var
        nav = this.document.getElementById('NAV'),
        falso = this.document.getElementById('Falso');
    $('#NAV').css('position', 'fixed');
    $('#NAV').css('overflow', 'auto');
    $('#NAV').css('z-index', '99');
    $('#NAV').css('background', '#FFFFFF');
    $('#NAV').css('width', '100%');
    $('#NAV').css('border-bottom', '1px solid gray');
    $('#Falso').css('height', nav.offsetHeight+'px');
    $('#Falso').css('width', '100%');
    $('.js-colorlib-nav-toggle.colorlib-nav-toggle.colorlib-nav-white').css('position', 'fixed');
},false);