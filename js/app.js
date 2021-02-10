var positionElementInPage = $('.navbar').offset().top;
$( window ).resize(function() {
    positionElementInPage = $('.navbar').offset().top;
});
$(window).scroll(
    function() {
        if ($(window).scrollTop() > positionElementInPage) {
            // fixed
            $('.navbar').addClass("fixedTop");
        } else {
            // unfixed
            $('.navbar').removeClass("fixedTop");
        }
    }
 
  );

$(document).ready(function(){
  $.ajaxSetup({ cache: false });
  $('#search').keyup(function(){
   $('#result').html('');
   $('#state').val('');
   var searchField = $('#search').val();
   var expression = new RegExp(searchField, "i");
   $.getJSON('data1.json', function(data) {
    $.each(data, function(key, value){
     if (value.name.search(expression) != -1 || value.abbr.search(expression) != -1)
     {
      $('#result').append('<li class="list-group-item link-class"> <p><b>'+value.name+'</b></p></li>');
     }
    });   
   });
  });
  
  $('#result').on('click', 'li', function() {
   var click_text = $(this).text().split('|');
   $('#search').val($.trim(click_text[0]));
   $("#result").html('');
  });
 });

   $(document).ready(function(){

    $(".menu-toggler").click(function() {
        $(this).toggleClass("active");
        $(".menu").toggleClass("active")
    })
})
   
  
//  function shutdown(){
//         $(".alert").removeClass("hidden")
//         $(".alert").addClass("show")
//         $(".alert").addClass("showAlert")
//         $(".time").addClass("showTime")
//         setTimeout(function() {
//             $(".alert").removeClass("show")
//             $(".alert").addClass("hidden")
//         }, 5000)
//         setTimeout(function() {
//             $(".time").removeClass("showTime")
//         }, 5500)
//         // setTimeout(function(){
//         //     document.location.href="http://localhost/index/maintenance.html";
//         // }, 60000)
//     }
//     shutdown()
//     $(".close-btn").click(function(){
//         $(".alert").removeClass("show")
//         $(".alert").addClass("hidden")
//         $(".time").removeClass("showTime")
//     })


const menu = document.querySelector('#container-menu');
const btn = document.querySelector('.bound');

function add() {
    menu.classList.toggle('show');
}

btn.addEventListener('click', add);

$(document).ready(function(){
    $("#modal-f").click(function(e){
        $(".modal-panel").css("visibility", "visible");
        $(".modal-panel").animate({'opacity': '1'});
        e.preventDefault();
    });

    $("#close-f, .no, .yes").click(function( ){
        $(".modal-panel").animate({opacity: 0}, 500, function(){
            $(".modal-panel").css("visibility", "hidden");
        });
    });
});