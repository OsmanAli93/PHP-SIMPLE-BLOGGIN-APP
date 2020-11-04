

$('#search-popup').on('click', function(event){

    event.preventDefault();

    $('#search-modal').fadeIn(300);
})

$('button#close-btn').on('click', function(){

    $('#search-modal').fadeOut(300);
})

$('.post-header').each(function(i, v){

    let random = Math.floor(Math.random() * 10);
    
    $(this).css({
        "background": 'url(img/header-' + random + '.jpg)',
        "background-size": "cover"
    });


    console.log(random);
})

