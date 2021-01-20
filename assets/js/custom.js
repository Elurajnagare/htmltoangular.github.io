/*------------sticy-header-start----------*/
function setHeaderSticky() {

    if ($(window).scrollTop() >= 150) {
        $('header').addClass('sticky');
    } else {
        $('header').removeClass('sticky');
    }
}
var sPath = window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    $(window).scroll(function() {
        setHeaderSticky();
    });

    $(window).on('load', function() {
        setHeaderSticky();
    });
/*------------sticy-header-end----------*/
	
/*--------mobile-menu-start-------------*/
function myFunction(x) {
  x.classList.toggle("change");
        return false;
}
$(document).ready(function() {
    // Menu link active    
    var url = document.location.href.match(/[^\/]+$/);
      $("nav > ul li").each(function() {
        if (url != null) {
          var e = url[0];
            var value = e.concat('.php');
          $("nav > ul li a").removeClass("active");
          $('nav > ul li a[href="' + e + '"]').addClass("active");
          $('nav > ul li a[href="' + e + '"]').parents('.sub_menu').addClass("active");
          $('nav > ul li a[href="' + e + '"]').closest("li.sub-menu").find("a:eq(0)").addClass("active");
        }
      });
    // Menu link active    
    	var url = document.location.href.match(/[^\/]+$/);
      $("footer .menu_wrap .menu_links .menu li").each(function() {
        if (url != null) {
          var e = url[0];
            var value = e.concat('.php');
          $("footer .menu_wrap .menu_links .menu li a").removeClass("active");
          $('footer .menu_wrap .menu_links .menu li a[href="' + e + '"]').addClass("active");
        }
      });
	// footer Menu link active    
    var url = document.location.href.match(/[^\/]+$/);
    $("ul.menu-links li").each(function() {
        if (url != null) {
            var e = url[0];
            var value = e.concat('.php');
            $("ul.menu-links li a").removeClass("active");
            $('ul.menu-links li a[href="' + e + '"]').addClass("active");
        }
    });
	
	
    // Navigation Menu On 1024px Before
    $('header nav .menu li.sub_menu a').click(function(){
        $(this).parent('li.sub_menu').toggleClass('active');
        $(this).parent("li.sub_menu").siblings().removeClass("active");
        $('.menu_overlay').addClass('active');
        // return false;
    });
    $('.menu_overlay').click(function(){
        $('.menu_overlay').removeClass('active');
        $('li.sub_menu').removeClass('active');
    });

    $('.toggle').click(function(){
        $('nav').toggleClass('active');
        $('.menu_overlay').toggleClass('active');
        $('body').toggleClass('active');
        return false;
    });
    $('.menu_overlay').click(function(){
        $('nav').removeClass('active');
        $('.menu_overlay').removeClass('active');
        $('.toggle').removeClass('change');
        $('body').removeClass('active');
    });	
	/*--------mobile-menu-end-------------*/
	/*--------testimonial_slider-start-------------*/
      $('#testimonial_slider').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        stagePadding:10,    
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                margin:20,
            },
            992:{
                items:2,
            },
            1000:{
                items:2
            }
        }
    });
	/*--------testimonial_slider-end-------------*/	
	/*--------scroll-page-start------------*/	
	$(function() {
        var $ele = $('.scrollToTop');
        $(window).scroll(function() {
            $(this).scrollTop() >= 100 ? $ele.show(1).animate({
                right: '10px',
                opacity: '1'
            }, 1) : $ele.animate({
                right: '-50px',
                opacity: '0'
            }, 1)
        });
        $ele.click(function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 600)
        })
    }); 
	/*--------scroll-page-end-------------*/
	
});

//form validation -start
	function checkPhoneKey( key ) {
		return ( key >= '0' && key <= '9' ) || key == 'ArrowLeft' || key == 'ArrowRight' || key == 'Delete' || key == 'Backspace' || key == 'Tab';
	}

	$.validator.addMethod("nameval", function(value, element) { 
		return /^([a-zA-Z ]{3,30})$/.test(value); 
	}, "Please enter valid name.");

	$.validator.addMethod("emailval", function(value, element) { 
		return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value); 
	}, "Please enter a valid email address.");

    $.validator.addMethod("mobileval", function(value, element) { 
		return /^[0-9\()\- ]\d{9,10}$/.test(value); 
	}, "Please enter valid phone number!");

	$.validator.addMethod("addressValidationMethod", function(value, element) { 
		return this.optional(element) || /^[a-zA-Z0-9][a-zA-Z0-9\s\[\]\(\)\.\,\-'"]*$/.test(value); 
	}, 'Please enter valid details!');

	$.validator.addMethod("messageValidationMethod", function(value, element) { 
		return this.optional(element) || /^[a-zA-Z0-9][a-zA-Z0-9\s\[\]\.\-#'"\@]*$/.test(value); 
	}, 'Please enter valid details!');

	$(document).ready(function(){
		$('#quoteForm').validate({
			highlight: function(element) {
				$(element).parent().addClass("errorElement");
			},
			rules: {
				strName: {
					required: true,
					nameval: true
				},				
				intPhone: {
					required: true,
					maxlength: 11,
					minlength: 10,
					mobileval: true
				},
				strEmail: {
					required: true,
					emailval: true
				},				
				strMessage: {
					required: false,
					minlength: 10,
					messageValidationMethod: true
				},
			},
			messages: {
				strName: {
					required: 'This is required.',
				},				
				intPhone: {
					required: 'This is required.',
				},
				strEmail: {
					required: 'This is required.',
				},
				strMessage: {
					required: 'This is required.',
				}
			},
			submitHandler: function(){
				var formData = $('#quoteForm').serialize();
				console.log(formData);
				$("#btnSubmit").prop('disabled', true);
				$("#btnSubmit").attr('value', 'SENDING..');
				$.ajax({
					method: 'POST',
					url: "includes/send-mail.php",
					data: formData,
					success: function(data){
					if(data.indexOf('mailsuccess') != -1){
						window.location.href = "thank-you.php";;
				        // alert("success");
					}else{
						$('#capchaErr').html("Invalid reCAPTCHA.");
						$("#btnSubmit").prop('disabled', false);
						$("#btnSubmit").attr('value', 'SEND');
						}
					}
				});
			}
		});
	});

	$(document).ready(function(){
		$('#quoteFormPopup').validate({
			highlight: function(element) {
				$(element).parent().addClass("errorElement");
			},
			rules: {
				strName: {
					required: true,
					nameval: true
				},
				strSurname: {
					required: true,
					nameval: true
				},
				intPhone: {
					required: true,
					maxlength:11,
					minlength: 10,
					mobileval: true
				},
				strEmail: {
					required: true,
					emailval: true
				},
				strAddress: {
					required: false,
					maxlength: 100,
					addressValidationMethod: true
				},
				strMessage: {
					required: false,
					minlength: 10,
					messageValidationMethod: true
				},
			},
			messages: {
				strName: {
					required: 'This is required.',
				},
				strSurname: {
					required: 'This is required.',
				},
				intPhone: {
					required: 'This is required.',
				},
				strEmail: {
					required: 'This is required.',
				},
			},
		   submitHandler: function(){
				var formData = $('#quoteFormPopup').serialize();
				console.log(formData);
				$("#btnSubmit1").prop('disabled', true);
				$("#btnSubmit1").attr('value', 'SENDING..');
				$.ajax({
					method: 'POST',
					url: "includes/send-mail.php",
					data: formData,
					success: function(data){
					if(data.indexOf('mailsuccess') != -1){
					window.location.href = "thank-you.php";
					}else{
						$('#capchaErr1').html("Invalid reCAPTCHA.");
						$("#btnSubmit1").prop('disabled', false);
						$("#btnSubmit1").attr('value', 'SEND');
						}
					}
				});
			}
		});
	});
//form validation -end