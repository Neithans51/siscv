$(function($) {
    let url = window.location.href;
    //console.log(url);


    $('nav ul li a').each(function() {
        //console.log(this.href);
      if (this.href == 'http://localhost/cvubv/admin/Anf') {
          console.log('holaaa');
          //$('#nav-parent').addClass('nav-expanded'); //#home is the id for root link.
          //$("ul .nav > li:first-child").addClass("nav-expanded");

        $(this).closest('li').addClass('nav-active');
      }
    });




    /*$('nav ul li a').each(function() {
        console.log(this.href);
      if (this.href == 'http://localhost/cvubv/admin/Anf') {
          console.log('holaaa');
        $(this).closest('li').addClass('nav-expanded nav-active');
      }
    });*/



    
  });