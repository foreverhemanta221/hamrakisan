// // read more btn
$('#readallreviews').click(function(){
    $('.reviews').find('.review').css({
        'height':'100%',
        'opacity':'1',
        'visibility':'visible',
    })
    $(this).fadeOut()
})






//     // on mouse over
    let currentIndex = -1
    $('.give-stars span').hover(() => {
    })
    $('.give-stars span').mouseover(function () {
      removeClass(this)
      var upto = $(this).index()
      $(this).parent().children().each(function (index, value) {
        if (index <= upto) {
          $(this).addClass('hoveredYellow')
        } else {
        }
      })
    })

    // on mouse out

    $('.give-stars span').mouseout(function () {
      var upto = $(this).index()
      $(this).parent().children().each(function (index, value) {
        $(this).removeClass('hoveredYellow')
      })
      setColor(this, currentIndex)
    })
    const removeClass = ($this) => {
      $($this).parent().children().each(function () {
        $(this).removeClass('clickedYellow')
      })
    }
    const setColor = ($this, upto) => {
      $($this).parent().children().each(function (index, value) {
        if (index <= upto) {
          $(this).addClass('clickedYellow')
        } else {
        }
      })
    }
    // on mouse click
    $('.give-stars span').click(function () {
      var upto = $(this).index()
      currentIndex = upto
      $('.ratingGiven').text(upto+1 + ' / 5')
      setColor(this, upto)
    })


    // bannners

    var screeningNow = $('#farm-slider').owlCarousel({
      items:1,
      lazyLoad:true,
      autoplay:true,
      loop:true,
      margin:10
  });

  screeningNow.on('changed.owl.carousel', function(event) {
    //console.log(event.item.index-2)
    //$('#thumbs').eq(event.item.index-2).hide()
    $('.farm-slider-nav').children().removeClass('active-thumb')
    $('.farm-slider-nav').children().eq(event.item.index - 3).addClass('active-thumb')
})

$('.farm-slider-nav').children().on('click',function(){
  //console.log("hi i am ",$(this).index())
  $('#farm-slider').trigger('to.owl.carousel', $(this).index())
})

  $('#recommendation-slider').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          nav:false
      },
      460:{
        items:2
      },
      767:{
          items:3,
          nav:true
      },
      1000:{
          items:4,
          nav:true,
          loop:false
      }
  }
})

// increase decrease buttons
$('.qty-inc').click(function(){
 
 var newQty = $(this).prev('span').text();
 newQty++;
 $(this).prev('span').text(newQty)
 
 
})

$('.qty-dec').click(function(){
 
  var newQty = $(this).next('span').text();
  
  if( newQty > 0 ){
    newQty--;
    //console.log(newQty);
    $(this).next('span').text(newQty)
  }

  
  
 })


$('.farm-sidebar > a').click(function(e){
  e.preventDefault()

  $('#farmDetailsModal').modal('show')
  
  
  $('#farmDetailsModal .about').html($('#about-farm').html())
  $('#farmDetailsModal .modal-header h5').html($('.farm-banner .farm-sidebar h3').html())
  
})