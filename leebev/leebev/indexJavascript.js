$(document).ready(function(){
	
	var dispIntro = $('#pageIntro').css('display');

	if (dispIntro === "block") {
		
		var introCheck = localStorage.introCheck;
	
		if (($(window).width()) > 1234 && $(document).scrollTop() === 0 && introCheck != 1)  {

			$('html, body').stop().animate({
				scrollTop: $('#header').offset().top
			}, 10);
			scrollCheck = 0;


			//STOP SCROLL

			var keys = {37: 1, 38: 1, 39: 1, 40: 1};

			function preventDefault(e) {
				e = e || window.event;
				if (e.preventDefault)
					e.preventDefault();
				e.returnValue = false;  
			}

			function preventDefaultForScrollKeys(e) {
				if (keys[e.keyCode]) {
					preventDefault(e);
					return false;
				}
			}

			function disableScroll() {
			  if (window.addEventListener) {
				  window.addEventListener('DOMMouseScroll', preventDefault, false);
				  window.onwheel = preventDefault; // modern standard
				  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
				  window.ontouchmove  = preventDefault; // mobile
				  document.onkeydown  = preventDefaultForScrollKeys;
				}
			}

			function enableScroll() {
				if (window.removeEventListener) {
					window.removeEventListener('DOMMouseScroll', preventDefault, false);
					window.onmousewheel = document.onmousewheel = null; 
					window.onwheel = null; 
					window.ontouchmove = null;  
					document.onkeydown = null;
				}
			}

			disableScroll();


			//PAGE INTRO
			var wW = $(window).width();
			var wWT = (wW * .5) + "px";

			$('#PIbkgd div').css({width: wWT});


			var pageIntroL = $('#pageIntroL');
			var pageIntroE1 = $('#pageIntroE1');
			var pageIntroE2 = $('#pageIntroE2');

				pageIntroL.css({
					'opacity' : '1.0'
					});

			setTimeout(function () {

						pageIntroE1.css({
							'opacity' : '1.0'
						});

				}, 1000);		

			setTimeout(function () {

						pageIntroE2.css({
							'opacity' : '1.0'
						});

				}, 2000);

			setTimeout(function () {

						$('#PIlogo').css({
							'opacity' : '0.15'
						});



				}, 3000);

			setTimeout(function () {

					$('#pageIntroL').css({top: '35vh'});

				}, 3700);

			setTimeout(function () {

					$('#pageIntroL').css({top: '-120vh'});
					$('#pageIntroE2').css({top: '35vh'});

				}, 4000);

			setTimeout(function () {

					$('#pageIntroE2').css({top: '-120vh'});
					$('#pageIntroE1').css({top: '35vh'});

				}, 4300);

			setTimeout(function () {

					$('#pageIntroE1').css({top: '-120vh'});

				}, 4600);

			setTimeout(function () {

					$('#pageIntroL,#pageIntroE1, #pageIntroE2').css({
						'transition' : '0s',
						'font-size' : '10.39vh',
						'left' : '0'
						});

				}, 4900);

			setTimeout(function () {

					$('#PIlogo').css({
							'opacity' : '0'
						});


					$('#pageIntroL,#pageIntroE1, #pageIntroE2').css({
						'transition' : '1s'
						});

				}, 5000);

			setTimeout(function () {
					$('.pageIntroHide1').removeClass('pageIntroHide1');
					$('#pageIntroL,#pageIntroE1, #pageIntroE2').css({top: 0});
					$('#pageIntroL,#pageIntroE1, #pageIntroE2').removeAttr('id');

				}, 5500);

			setTimeout(function () {

					$('.pageIntroHide2').removeClass('pageIntroHide2');
				}, 5800);

			setTimeout(function () {
						$('#PIbkgd2, #PIbkgd2-1').css({
							'background-size' : '0px 100%'
						});

						$('#PILetter').css({
							'opacity' : '0.05'
						});

				}, 6500);

			setTimeout(function () {
						$('#PIbkgd1, #PIbkgd1-1').css({
							'background-size' : '0px 100%'
						});

				}, 6750);

			setTimeout(function () {
						$('#PIbkgd3, #PIbkgd3-1').css({
							'background-size' : '0px 100%'
						});
						$('#pageIntro ul').css({
							'opacity' : '0'
						});

				}, 6900);

			setTimeout(function () {
					var pageIntro = $('#pageIntro');
						pageIntro.css({
							'display' : 'none'
						});

				}, 7900);

			setTimeout(function () {
					enableScroll();
				}, 8000);
				
			localStorage.setItem('introCheck', 1);
			introCheck = localStorage.introCheck;
		}
		else {
			$('#pageIntro').css({display: 'none'});
		}
		
	}
	
	console.log(introCheck);
	
	/*NAV HOVER BOX*/
	
	$('.navItem').hover(function() {
		
		var posLeft = $(this).offset().left;
		var width = $(this).width();
		width = parseInt(width);
		var pL = $(this).css('padding-left');
		var pR = $(this).css('padding-right');
		var padding = pL + pR;
		padding = parseInt(padding, 10) * 2;
		var rWidth = width + padding;
		rWidth = rWidth + "px";

		$('#navHoverBox').css({
			'left' : posLeft,
			'opacity' : '1',
			'width' : rWidth
		});	

	}, function() {
	
		$('#navHoverBox').css({
			'opacity' : '0'
		});
			
	});
	
	/*TOP SCROLL*/
	
	var scrollCheck = 1;
	
	if(($(document).scrollTop()) > 900){
		scrollCheck = 0;
	}
	
	var wH = $(window).height();
	var wW = $(window).width();
	
	$(window).resize(function() {
		
	  wH = $(window).height();
	  console.log(wH);
	  wW = $(window).width();
	  console.log(wW);
	  
		
	  if (wW >= 1275) {
		 $('.navItem').css({
			 'display' : 'inline'
		 });
	  }

		

		
	});

	var orientationCheck;
	

	
	
	window.addEventListener("orientationchange", function() {
		
		// Announce the new orientation number
		
		
		if (wW > wH) {
			orientationCheck = true;
		}
		else if (wH > wW) {
			orientationCheck = false;
		}
		
		
		if (wW > wH && wW > 1280) {
		}
		else {
			if(($(document).scrollTop()) > wH) {
				$('#navContainer1').css({
					'position' : 'fixed',
					'top' : '0',
					'z-index' : '50'
				});

				$('#navFill').css({
					'height' : '50px'
				});
			}
			else {

				$('#navContainer1').css({
					'position' : 'relative',
					'top' : '0',
					'z-index' : '3'
				});

				$('#navFill').css({
					'height' : '0px'
				});	
			}
		}
		
		
	}, false);
	
	$(document).scroll(function() {
		
		var hTwwd = $('#whatWeDoRightCopy p').offset().top,
			hHwwd = $('#whatWeDoRightCopy p').outerHeight(),
			hThh = $('#header').offset().top,
			hHhh = $('#header').outerHeight(),
			hTwn = $('#adContainer #adHeaderContainer #adHeader p').offset().top,
			hHwn = $('#adContainer #adHeaderContainer #adHeader p').outerHeight(),
			hTob = $('#ourBeers #adHeaderContainer #adHeader p').offset().top,
			hHob = $('#ourBeers #adHeaderContainer #adHeader p').outerHeight(),
			hTac = $('#footAdContainer .spanAd1').offset().top,
			hHac = $('#footAdContainer .spanAd1').outerHeight(),
			wW = $(window).width(),
			wH = $(window).height(),
			wS = $(this).scrollTop();
		
		
		if (wW > wH && wW < 1280) {
				$('#navContainer1').css({
					'position' : 'relative',
					'top' : '0',
					'z-index' : '3'
				});

				$('#navFill').css({
					'height' : '0px'
				});
		}
		else {
			if(($(document).scrollTop()) > wH && wW > 1280) {
				$('#navContainer1').css({
					'position' : 'fixed',
					'top' : '0',
					'z-index' : '50'
				});

				$('#navFill').css({
					'height' : '100px'
				});
			}
			else if (($(document).scrollTop()) > wH && wW < 1280) {
				$('#navContainer1').css({
					'position' : 'fixed',
					'top' : '0',
					'z-index' : '50'
				});

				$('#navFill').css({
					'height' : '50px'
				});
			}
			else {

				$('#navContainer1').css({
					'position' : 'relative',
					'top' : '0',
					'z-index' : '3'
				});

				$('#navFill').css({
					'height' : '0px'
				});	
			}
		}
		
		
		
	/*
		
		if (wH < hHhh) {
			
			if((wS < ((hThh+hHhh-wH)+(hHhh * .05))) && (wS > ((hThh+hHhh-wH)-(hHhh * .05))) && (scrollCheck == 1)) {
				
				
					$('html, body').stop().animate({
						scrollTop: $('#navContainer1').offset().top
					}, 500);
					scrollCheck = 0;
				
			}
			else if((wS <= ((hThh+hHhh)+(hHhh * .05))) && (wS > ((hThh+hHhh)-(hHhh * .05))) && (scrollCheck == 1)) {
				
					$('html, body').stop().animate({
						scrollTop: $('#header').offset().top
					}, 500);

					scrollCheck = 0;
					
			}
			else if((wS < 10) && (scrollCheck == 0)) {
				scrollCheck = 1;
			}
			else if((wS > ((hThh+hHhh)+(hHhh * .05))) && (scrollCheck == 0)) {
				scrollCheck = 1;
			}
		}
		else if (wH >= hHhh) {
			if((($(document).scrollTop()) > 10) && (($(document).scrollTop()) < 50) && (scrollCheck == 1)) {
				$('html, body').stop().animate({
					scrollTop: $('#navContainer1').offset().top
				}, 500);
				
				scrollCheck = 0;
			}
			else if((($(document).scrollTop()) > 850) && (($(document).scrollTop()) < 900) && (scrollCheck == 1)) {
				$('html, body').stop().animate({
					scrollTop: $('#header').offset().top
				}, 500);

				scrollCheck = 0;

			}
			else if((($(document).scrollTop()) < 10) && (scrollCheck == 0)) {
				scrollCheck = 1;
			}
			else if((($(document).scrollTop()) > 900) && (scrollCheck == 0)) {
				scrollCheck = 1;
			}
		}
		
		*/
		
		
		if (wW > 1280) {
			if (wS < (hTac) && wS > (hTac+hHac-wH)){
				
				$('#footAdContainer #faLeft #faDLeft .spanAd1').css({left : '0px', opacity: 1, transition: '2s'});
				
				setTimeout(function () {
				
					$('#footAdContainer #faRight #faDRight .spanAd1').css({left : '0px', opacity: 1, transition: '2s'});
					
					}, 600);
				
				setTimeout(function () {

						$('#footAdContainer #faRight #faDRight .spanAd2').css({left : '0px', opacity: 1, transition: '2s'});

					}, 300);
				
				setTimeout(function () {

						$('#footAdContainer #faLeft #faDLeft .spanAd2').css({left : '0px', opacity: 1, transition: '2s'});

					}, 900);
				
			}
			else {
				$('#footAdContainer #faLeft #faDLeft .spanAd1, #footAdContainer #faRight #faDRight .spanAd1, #footAdContainer #faLeft #faDLeft .spanAd2, #footAdContainer #faRight #faDRight .spanAd2').css({
					'opacity' : '0',
					'left' : '100px',
					'transition' : '1s'
				});	
			}
		}
		else {
				$('#footAdContainer #faLeft #faDLeft .spanAd1, #footAdContainer #faRight #faDRight .spanAd1, #footAdContainer #faLeft #faDLeft .spanAd2, #footAdContainer #faRight #faDRight .spanAd2').css({
					'opacity' : '1',
					'left' : '0px'
				});	
		}
		
		
		if (wW > 1280) {
			if (wS < (hTwn) && wS > (hTwn+hHwn-wH)){
				$('#adContainer #adHeaderContainer #adHeader p').css({
					'opacity' : '1.0',
					'left' : '0px',
					'transition' : '2s'
				});	
			}
			else {
				$('#adContainer #adHeaderContainer #adHeader p').css({
					'opacity' : '0',
					'left' : '200px',
					'transition' : '1s'
				});	
			}
		}
		else {
			$('#adContainer #adHeaderContainer #adHeader p').css({
				'opacity' : '1.0',
				'left' : '0px',
				'transition' : '2s'
			});	
		}
		
		if (wW > 1280) {
			if (wS < (hTob) && wS > (hTob+hHob-wH)){
				$('#ourBeers #adHeaderContainer #adHeader p').css({
					'opacity' : '1.0',
					'left' : '0px',
					'transition' : '2s'
				});	
			}
			else {
				$('#ourBeers #adHeaderContainer #adHeader p').css({
					'opacity' : '0',
					'left' : '200px',
					'transition' : '1s'
				});	
			}
		}
		else {
			$('#ourBeers #adHeaderContainer #adHeader p').css({
				'opacity' : '1.0',
				'left' : '0px',
				'transition' : '2s'
			});	
		}
		

		if (wW > 1280) {
			if (wS < (hTwwd) && wS > (hTwwd+hHwwd-wH)){
				$("#whatWeDoRightCopy").css({
					'opacity' : '1.0',
					'transition' : '3s'
				});
				$("#whatWeDoHr").css({
					'margin-bottom' : '0px',
					'height' : '612px',
					'transition' : '5s'
				});
				$("#spanHead3wwd").css({
					'padding-left' : '0px',
					'transition' : 'ease 1s'
				});
			}
			else {
				$("#whatWeDoRightCopy").css({
					'opacity' : '0.0',
					'transition' : '1s'
				});
				$("#whatWeDoHr").css({
					'margin-bottom' : '586px',
					'height' : '26px',
					'transition' : '1s'
				});
				$("#spanHead3wwd").css({
					'padding-left' : '100px',
					'transition' : 'ease 1s'
				});
			}
		}
		else {
			$("#whatWeDoRightCopy").css({
					'opacity' : '1.0',
					'transition' : '3s'
				});
				$("#whatWeDoHr").css({
					'margin-bottom' : '0px',
					'height' : '612px',
					'transition' : '5s'
				});
				$("#spanHead3wwd").css({
					'padding-left' : '0px',
					'transition' : 'ease 1s'
				});
		}
		
	});
	

	
	$('a[href^="#"]').on('click', function(event) {
		var target = $(this.getAttribute('href'));
		if( target.length ) {
			event.preventDefault();
			$('html, body').stop().animate({
				scrollTop: target.offset().top
			}, 1000);
		}
	});
	
	$('#homeScrollBtn').click(function() {
		scrollCheck = 0;
	});
	
	/*SMALL NAV*/
	
	$('.fa-bars').click(function(){
		$('.navItem').toggle();
	});
	

	/*AD SLIDE*/
	
	var slideCount = 2;
	
	function adLoop () {
		setTimeout(function () {
			
			$('.slideSelect').removeClass('slideSelect');
			$('.slideSelectPrev').removeClass('slideSelectPrev');
			$('.slideSelectNext').removeClass('slideSelectNext');
			$('.slideNavSelected').removeClass('slideNavSelected');
			var adSlideLink = '#adSlideLink' + slideCount;
			
			$(adSlideLink).prev().addClass('slideSelectPrev');
			$(adSlideLink).addClass('slideSelect');
			$(adSlideLink).next().addClass('slideSelectNext');
			
			var slideNavBtn = '#slideNav div:nth-child(' + slideCount + ')';
			
			$(slideNavBtn).addClass('slideNavSelected');
			
			slideCount++
			
			if (slideCount > 5) {
				slideCount = 1;
			}
			
			adLoop();
		}, 5000)
	}
	
	adLoop();
	
	$('.slideNavBtn').click(function(event) {
		event.preventDefault();
		
		var slideVal = $(this).attr('value');
		slideCount = slideVal;
		var slideValCount = '#adSlideLink' + slideVal;
		
		$('.slideSelect').removeClass('slideSelect');
		$('.slideSelectPrev').removeClass('slideSelectPrev');
		$('.slideSelectNext').removeClass('slideSelectNext');
		$('.slideNavSelected').removeClass('slideNavSelected');
		
		$(slideValCount).prev().addClass('slideSelectPrev');
		$(slideValCount).addClass('slideSelect');
		$(slideValCount).next().addClass('slideSelectNext');
		
		$(this).addClass('slideNavSelected');
		
	
	});
	
	
	
	/*BEER SLIDE*/
	
		var bottle1 = 1;
		var bottle2 = 2;
		var bottle3 = 3;
		var bottle4 = 4;
		var bottle5 = 5;
	
		var bottleLoop = false;

		function btlLoop () {
			setTimeout(function () {

				if(bottle1 === 6){
					bottle1 = 1;
				}
				if(bottle2 === 6){
					bottle2 = 1;
				}
				if(bottle3 === 6){
					bottle3 = 1;
				}
				if(bottle4 === 6){
					bottle4 = 1;
				}
				if(bottle5 === 6){
					bottle5 = 1;
				}

				var bottleSlide1 = "#bottleSlideHolder div:nth-child(" + bottle1 + ")";
				var bottleSlide2 = "#bottleSlideHolder div:nth-child(" + bottle2 + ")";
				var bottleSlide3 = "#bottleSlideHolder div:nth-child(" + bottle3 + ")";
				var bottleSlide4 = "#bottleSlideHolder div:nth-child(" + bottle4 + ")";
				var bottleSlide5 = "#bottleSlideHolder div:nth-child(" + bottle5 + ")";

				$(bottleSlide1).attr('id', 'slideBottleLink5');
				$(bottleSlide2).attr('id', 'slideBottleLink1');
				$(bottleSlide3).attr('id', 'slideBottleLink2');
				$(bottleSlide4).attr('id', 'slideBottleLink3');
				$(bottleSlide5).attr('id', 'slideBottleLink4');

				bottle1++;
				bottle2++;
				bottle3++;
				bottle4++;
				bottle5++;
				
				bottleLoop = true;

				btlLoop();
			}, 3000);
		}
	
	
		btlLoop();

	
	
});