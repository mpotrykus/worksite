$(document).ready(function(){
	
	$('.spanEvent2').css({left : '0px', opacity: 1});
	
	$('#mapHead h3 .spanAd1').css({left : '0px', opacity: 1});
	setTimeout(function () {

			$('#mapHead h4 .spanAd2').css({left : '0px', opacity: 1});
		
		}, 400);
	
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
	
	/*SMALL NAV*/
	
	var navHeight = $('#navContainer').height();
	
	$('.fa-bars').click(function(){
		$('.navItem').toggle();
	});
	
	$('#navContainer1').css({
				'position' : 'absolute',
				'top' : '0',
				'z-index' : '50'
			});
	
	$('#navPlacement').css({
				'position' : 'absolute',
				'top' : navHeight,
				'z-index' : '49'
			});
	
	$(window).resize(function() {
		
		if ($(window).width() < 1280) {
		
			$('#navPlacement').css({
					'top' : 50
				});
		}
		else {
					 
			$('#navPlacement').css({
					'top' : 100
				});		 
		}
		
	});
	
	$('body>div').css({
				'opacity' : '1'
			});
	
	$("#phoneArea").focusin(function(){
    	
		$("#phoneArea").focus(function() { $(this).select(); } );

	});
	
	$("#phoneArea").keyup(function(){
    	
		var areaPhone = $("#phoneArea").val();
		
		if ((areaPhone.length) === 3) {
			$("#phone1").focus();
			$("#phone1").focus(function() { $(this).select(); } );
		}

	});
	
	$("#phone1").keyup(function(){
    	
		var phone1 = $("#phone1").val();
		
		if ((phone1.length) === 3) {
			$("#phone2").focus();
			$("#phone2").focus(function() { $(this).select(); } );
		}

	});
	
	/*ABOUT US PAGE*/
	
		$("#whatWeDoRightCopy1").css({
			'opacity' : '1.0'
		});
		$("#whatWeDoHr").css({
			'margin-bottom' : '0px',
			'height' : '612px'
		});
		$("#spanHead3wwd").css({
			'padding-left' : '0px'
		});
	
	/*
	
	$(".taken").hover(function(event) {
		
		var county = $(this).attr('id');
		county = county.replace(/\_/g, " ");
		$("#mapHoverDiv").css({top: event.clientY+575, left: event.clientX+50, opacity: 1});
		$("#hTitle").html(county);
		
	}, function() {
		
		$("#mapHoverDiv").css({ opacity: 0});
		
	});
	
	*/
	if ($("#footAdContainer .spanAd1" ).length ) {
		$(document).scroll(function() {

				var hTac = $('#footAdContainer .spanAd1').offset().top,
					hHac = $('#footAdContainer .spanAd1').outerHeight(),
					wW = $(window).width(),
					wH = $(window).height(),
					wS = $(this).scrollTop();

				if (wW > 1280) {
					if (wS < (hTac) && wS > (hTac+hHac-wH)){

						$('#footAdContainer #faDLeft .spanAd1').css({left : '0px', opacity: 1, transition: '2s'});

						setTimeout(function () {

							$('#footAdContainer #faDRight .spanAd1').css({left : '0px', opacity: 1, transition: '2s'});

							}, 600);

						setTimeout(function () {

								$('#footAdContainer #faDRight .spanAd2').css({left : '0px', opacity: 1, transition: '2s'});

							}, 300);

						setTimeout(function () {

								$('#footAdContainer #faDLeft .spanAd2').css({left : '0px', opacity: 1, transition: '2s'});

							}, 900);

					}
					else {
						$('#footAdContainer #faDLeft .spanAd1, #footAdContainer #faDRight .spanAd1, #footAdContainer #faDLeft .spanAd2, #footAdContainer #faDRight .spanAd2').css({
							'opacity' : '0',
							'left' : '100px',
							'transition' : '1s'
						});	
					}
				}
				else {
						$('#footAdContainer #faDLeft .spanAd1, #footAdContainer #faDRight .spanAd1, #footAdContainer #faDLeft .spanAd2, #footAdContainer #faDRight .spanAd2').css({
							'opacity' : '1',
							'left' : '0px'
						});	
				}

			});
	}
	
	
	var svgSwitch = true;
	
	$('.taken').click(function(){
		
		if (svgSwitch === true){
			$('.taken').css({display: 'block'});
			
			var $this = $(this);
			var toffset = $this.offset();
			var moffset = $('#mapHoldHolder').offset();
			var width = $this.width();
			var height = $this.height();
			var svgWidth = $('svg').width();
			svgWidth = svgWidth / 2;
			var svgHeight = $('svg').height();
			svgHeight = svgHeight / 2;
			var mWidth = $('#mapHoldHolder').width();
			mWidth = mWidth / 2;
			var mHeight = $('#mapHoldHolder').height();
			mHeight = mHeight / 2;
			
			var centerX1 = toffset.left + width / 2;
			var centerY1 = toffset.top + height / 2;
			
			var centerX = (centerX1 - moffset.left) * -1 ;
			var centerY = (centerY1 - moffset.top) * -1;
			
			var centerXh = svgWidth + mWidth;
			centerXh = parseInt(centerXh);
			var centerYh = svgHeight + mHeight;
			centerYh = parseInt(centerYh);
			
			centerX = (centerX * 6) + mWidth;
			centerY = (centerY * 6) + mHeight;
			
			var svgID = $(this).attr('id');

			svgID = svgID.replace(/_/g, ' ');
			svgID = svgID.toLowerCase();
			
			var targetID = $("#mapList div div:contains('" + svgID + "')");
				
			$(targetID).nextUntil('.listCountyExpand', '.listBrandExpand').addClass('autoHeight');

			var topPos = $(targetID).offset();
			topPos = topPos.top;
			console.log(topPos);
			$('#mapList').scrollTop(topPos);
			
			//var svgTranslate = 'translate(' + centerX + 'px, ' + centerY + 'px) scale(5)';
			$('#mapHolder').css({left: centerX, top: centerY, transform: 'scale(6)'});
			$(this).addClass('takenFill');
			$(targetID).find('.arrow-right').css({transform: 'rotate(90deg)'});
			
			svgSwitch = false;
			
		}
		else if (svgSwitch === false) {
			
			var svgID = $(this).attr('id');

			svgID = svgID.replace(/_/g, ' ');
			svgID = svgID.toLowerCase();
			
			var targetID = $("#mapList div div:contains('" + svgID + "')");
			
			$('.listBrandExpand').removeClass('autoHeight');
			
			$('.taken').css({display: 'block'});
			$('.taken').removeClass('takenFill');
			$('#mapHolder').css({left: 0, top: 0, transform: 'none'});
			$(targetID).find('.arrow-right').css({transform: 'rotate(0deg)'});
			
			svgSwitch = true;
			
		}
		
	});
	
	$(".taken").hover(
		function() {
			var svgID = $(this).attr('id');
			svgID = svgID.replace(/_/g, ' ');
			svgID = svgID.toLowerCase();
			var targetID = "#mapList div div:contains('" + svgID + "')";
			
			console.log(targetID);
			
			$(targetID).addClass('takenRevFill');
			
	  	}, function() {
			var svgID = $(this).attr('id');
			svgID = svgID.replace(/_/g, ' ');
			svgID = svgID.toLowerCase();
			var targetID = "#mapList div div:contains('" + svgID + "')";
			
			console.log(targetID);
			
			$(targetID).removeClass('takenRevFill');
		}
	);
	
	$(".listCountyExpand").hover(
		function() {
			var countyID = $(this).find('p').html();
			countyID = "#" + countyID.replace(/ /g, '_');
			$(countyID).addClass('takenFill1');
	  	}, function() {
			var countyID = $(this).find('p').html();
			countyID = "#" + countyID.replace(/ /g, '_');
		  $(countyID).removeClass('takenFill1');
		}
	);
	
	$(".listCountyExpand").click(function(){
			$(this).nextUntil('.listCountyExpand', '.listBrandExpand').toggleClass('autoHeight');
		
			var countyID = $(this).find('p').html();
			countyID = "#" + countyID.replace(/ /g, '_');
			console.log(countyID);
		
			if (svgSwitch === true){
				$('.taken').css({display: 'block'});

				var $this = $(countyID);
				var toffset = $this.offset();
				var moffset = $('#mapHoldHolder').offset();
				var width = $this.width();
				var height = $this.height();
				var svgWidth = $('svg').width();
				svgWidth = svgWidth / 2;
				var svgHeight = $('svg').height();
				svgHeight = svgHeight / 2;
				var mWidth = $('#mapHoldHolder').width();
				mWidth = mWidth / 2;
				var mHeight = $('#mapHoldHolder').height();
				mHeight = mHeight / 2;

				var centerX1 = toffset.left + width / 2;
				var centerY1 = toffset.top + height / 2;

				var centerX = (centerX1 - moffset.left) * -1 ;
				var centerY = (centerY1 - moffset.top) * -1;

				var centerXh = svgWidth + mWidth;
				centerXh = parseInt(centerXh);
				var centerYh = svgHeight + mHeight;
				centerYh = parseInt(centerYh);

				centerX = (centerX * 6) + mWidth;
				centerY = (centerY * 6) + mHeight;

				//var svgTranslate = 'translate(' + centerX + 'px, ' + centerY + 'px) scale(5)';
				$('#mapHolder').css({left: centerX, top: centerY, transform: 'scale(6)'});
				$(countyID).addClass('takenFill');
				$(this).find('.arrow-right').css({transform: 'rotate(90deg)'});

				svgSwitch = false;

			}
			else if (svgSwitch === false) {
			
				$('.listBrandExpand').removeClass('autoHeight');

				$('.taken').css({display: 'block'});
				$('.taken').removeClass('takenFill');
				$('#mapHolder').css({left: 0, top: 0, transform: 'none'});
				$(this).children('.arrow-right').css({transform: 'rotate(0deg)'});

				svgSwitch = true;
			
			}
		
	});
	
	$(".listBrandExpand").click(function(){
			$(this).children('.arrow-right').toggleClass('arrow-rotate');
			$(this).children('.listProductExpand').toggleClass('autoHeight');
	});
	
	
	/*HISTORY*/
	
	var scrollPos = 0;
	var lastScroll = 0;
	var t = 0;
	
	$(document).scroll(function() {
		
		if ($(window).scrollTop() > 174) {
			
			scrollPos++;	
		}		
	});
	
	$(document).scroll(function() {
		
		if ($(window).scrollTop() > 174) {
			
			scrollPos++;
			
			if (scrollPos > lastScroll) {
				t++;
			}
			else {
				t--;
				scrollPos-2;
			}
		}
	});
	
	$(document).scroll(function() {
		
		var wST = $(window).scrollTop();
		var dH = $(document).height() - $(window).height();
		
		if ($(window).scrollTop() > 174) {
			
			lastScroll++;
			
		}
		
		
		var tlNavSvgTop = (((wST/dH)*100)-.2) + "%";
		
		$("#tlNav svg").css({top : tlNavSvgTop});
		
	});
	
	var currentPage = $('#cp').text();
	
	$(currentPage).css({
		'background-color' : "#fff",
		'color' : "#ae9c4a"
	});
	
	/*HISTORY PARALLAX*/
	
	$('.timelineLayer1').each(function() {
		
		var tTop = $(this).css('top');
		$(this).data('top', tTop);
		
	});
	
	
	$(document).scroll(function() {
		
		var current = parseInt($(window).scrollTop());
		var now = current - last;

		$('.timelineLayer1').each(function() {
			var dataSpeed = $(this).data('speed');
			var dataNow = dataSpeed * now;
			var offset = parseFloat($(this).position().top);
			var top = parseFloat(offset + dataNow);
			
			$(this).css('top', top);
		});
		
		last = parseInt($(window).scrollTop());
		
	});
	
	$('.he').each(function() {
		
			$(this).css({opacity: 0});
		
		});
	
	$(document).scroll(function() {
		
		$('.he').each(function() {
			var hTac = $(this).offset().top,
				hHac = $(this).outerHeight(),
				wH = $(window).height(),
				wS = $(window).scrollTop();
			
			var leftOr = parseInt($(this).css('left'));

			if (wS < (hTac) && wS > (hTac+hHac-wH)){

				$(this).css({'margin-left' : '0px', opacity: '1', transition: '2s'});

			}
			else {
							
				$(this).css({'margin-left' : '20px', opacity: '0', transition: '1s'});

			}
		});
		
		$('.heTlHold').each(function() {
			var hTac = $(this).offset().top,
				hHac = $(this).outerHeight(),
				wH = $(window).height(),
				wS = $(window).scrollTop();
			
			var leftOr = parseInt($(this).css('left'));

			if (wS < (hTac) && wS > (hTac+hHac-wH)){

				$(this).css({width: '422px', transition: '2s'});
				setTimeout(function () {
					$('.heTlHold').css({height: '22px', 'margin-bottom': '0px'});
				}, 2000);

			}
			else {
							
				$(this).css({width: '0px', transition: '1s', height: '6px', 'margin-bottom': '16px'});

			}
		});
		
	});
	
	/*SEARCH BOX*/
	
	$.fn.wrapInTag = function(opts) {

		var tag = opts.tag || 'strong'
			, words = opts.words || []
			, regex = RegExp(words.join('|'), 'gi') // case insensitive
			, replacement = '<'+ tag +'>$&</'+ tag +'>';

		return this.html(function() {
			return $(this).text().replace(regex, replacement);
			});
	};
	
	function searchSelect() {
		$('.result .productsHolder:first-child div a:first-child p').addClass("searchSelected");
	}

    $('.searchBox input[type="text"]').keyup(function(e){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("includes/backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				if(e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40 && e.keyCode != 13){
					resultDropdown.html(data);
					$('.result .productsHolder div a p').wrapInTag({
						tag: 'mark',
						words: [inputVal]
					});
					searchSelect();
				}
				else if(e.keyCode == 40){
					var nextSearch = $('.searchSelected').parents('a').next('a');
					if(typeof nextSearch[0] == "undefined"){
						var nextSearchAll = $('.searchSelected').parents('.productsHolder').next('.productsHolder').find('div a:first-child p');
						if(typeof nextSearchAll[0] != 'undefined'){
							nextSearchAll.addClass('holdSelected');
							$('.searchSelected').removeClass('searchSelected');
							$('.holdSelected').addClass('searchSelected');
							$('.holdSelected').removeClass('holdSelected');
						}
					}
					else {
						nextSearch.find('p').addClass('holdSelected');
						$('.searchSelected').removeClass('searchSelected');
						$('.holdSelected').addClass('searchSelected');
						$('.holdSelected').removeClass('holdSelected');
					}
				}
				else if(e.keyCode == 38){
					var prevSearch = $('.searchSelected').parents('a').prev('a');
					if(typeof prevSearch[0] == "undefined"){
						var prevSearchAll = $('.searchSelected').parents('.productsHolder').prev('.productsHolder').find('div a:last-child p');
						if(typeof prevSearchAll[0] != 'undefined'){
							prevSearchAll.addClass('holdSelected');
							$('.searchSelected').removeClass('searchSelected');
							$('.holdSelected').addClass('searchSelected');
							$('.holdSelected').removeClass('holdSelected');
						}
					}
					else {
						$('.searchSelected').parents('a').prev('a').find('p').addClass('holdSelected');
						$('.searchSelected').removeClass('searchSelected');
						$('.holdSelected').addClass('searchSelected');
						$('.holdSelected').removeClass('holdSelected');
					}
				}
				else if(e.keyCode == 13){
					var dropdownClick = $('.searchSelected').parents('a');
					dropdownClick[0].click();	
				}
				
            });
			
        } else{
            resultDropdown.empty();
        }

    });
    
    // Set search input value on click of result item
    $(".result p").click(function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
	
	var last;
	
	/*PRODUCT BOX EXPAND*/
		
			var pBH = $('#productList a');
			
			function productLoad() {
				$('#productFrameShow').html($("#productFrame").contents().find('#productDescriptionHolder'));
				$(".spanEvent2").css("left","100px");
				$(".spanEvent2").css("opacity","0");
				$('#productFrameHolder').css("opacity", "1");
				$('#productDescriptionImg').css("overflow", "hidden");
				$('#productDescriptionImg img').css("position", "relative");
				$('#productDescriptionImg img').css("transition", ".5s");
				$('#productDescriptionImg img').css("left", "300px");
				$('#productDescription div a').remove();
			}
			
			function productStyle() {
				$(".spanEvent2").css("left","0px");
				$(".spanEvent2").css("opacity","1");
				$('#productBack').css("opacity", ".5");
				$('#productDescriptionImg img').css("left", "0px");
			}
			
			pBH.on("click", function(){
				
				if ($(window).width() > 1280) {
				
					$('.productClicked').removeClass("productClicked");
					$('#productFrameHolder').css("display", "inline");
					$('#productFrameClose').css("display", "inline");
					$('#productFrameNext').css("display", "inline");
					$('#productFramePrevious').css("display", "inline");
					$('#productBack').css("display", "inline");
					$('#productDescriptionImg img').css("left", "-300px");
					$('.result').empty();
					
					$(this).addClass("productClicked");
					
					setTimeout(productLoad, 250);
					setTimeout(productStyle, 500);
				}
				else {
					var thisClick = $(this).attr('href');
					window.location.replace(thisClick);
				}
			});
			
			$(document).on('click', '#productFrameNext', function(event) {
				
				var nextProduct = $('.productClicked').next(pBH);
				
				if (typeof nextProduct[0] == 'undefined') {
					var typett = $('.productClicked').parents('.productsHolder').next('.productsHolder').find(pBH);
					typett[0].click();
				}
				else {
					nextProduct[0].click();
				}
			
			});
			
			$(document).on('click', '#productFramePrevious', function(event) {
				
				var nextProduct = $('.productClicked').prev(pBH);
				
				if (typeof nextProduct[0] == 'undefined') {
					var typett = $('.productClicked').parents('.productsHolder').prev('.productsHolder').find(pBH).last();
					typett[0].click();
				}
				else {
					nextProduct[0].click();
				}
			
			});
			
			function productClose() {
				$('#productFrameHolder').css("display", "none");
				$('#productFrameHolder').css("opacity", "0");
				$('#productFrameClose').css("display", "none");
				$('#productBack').css("display", "none");
				$('#productBack').css("opacity", "0");
				$('#productDescriptionImg img').css("left", "-250px");
			}
			
			$('#productFrameClose').click(function(){
				productClose();
			});
			
			$('#productBack').click(function(){
				productClose();
			});
			
			$(document).keyup(function(e) {
			  if (e.keyCode === 27) {
				productClose();
			  }
			  else if (e.keyCode === 39) {
					var nextProduct = $('.productClicked').next(pBH);
					
					if (typeof nextProduct[0] == 'undefined') {
						var typett = $('.productClicked').parents('.productsHolder').next('.productsHolder').find(pBH);
						typett[0].click();
					}
					else {
						nextProduct[0].click();
					}
					
					
					console.log('right');
			  }
			  else if (e.keyCode === 37) {
					var nextProduct = $('.productClicked').prev(pBH);
					
					if (typeof nextProduct[0] == 'undefined') {
						var typett = $('.productClicked').parents('.productsHolder').prev('.productsHolder').find(pBH).last();
						typett[0].click();
					}
					else {
						nextProduct[0].click();
					}
					
					console.log('left');
			  }
			  
			});
		
	
});
