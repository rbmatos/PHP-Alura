$('#bs-example-navbar-collapse-1').on('show.bs.collapse', function(){
    $('.header').css('transform', 'translate(-50%, 22%)');
});


$('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function(){
    $('.header').css('transform', 'translate(-50%, -50%)');
});