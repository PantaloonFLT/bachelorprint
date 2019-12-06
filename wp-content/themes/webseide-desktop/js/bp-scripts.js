	function Sandbox() {
		var args = Array.prototype.slice.call(arguments),
		callback = args.pop(),
		modules = (args[0] && typeof args[0] == 'string') ? args : args[0],
		i;
		if ( !(this instanceof Sandbox) ) {
		  return new Sandbox(modules, callback);
		}
		this.productName = 'Isolated Namesppac Sample',
		this.version = '1.0.0.0';
		this.timeoutId = undefined;
		this.windowScroll = true;
		window.$ = jQuery.noConflict();
		if ( !modules || modules === '*' ) {
		  modules = [];
			for (i in Sandbox.modules) {
			    if ( Sandbox.modules.hasOwnProperty(i) ) {
				  modules.push(i);
				}
			}
		}
		for ( i = 0; i < modules.length; i++ ) {
			Sandbox.modules[modules[i]](this);
	    }

		callback(this)
	}
	Sandbox.modules = {};

	Sandbox.modules.events = function(box){
		box.eventScroll = function(callback){
			$(window).scroll(function(){
				var scrollVal = $(document).scrollTop();
				callback(scrollVal);
			});
		};

		box.eventResize = function(callback){
			var rtime;
			var timeout = false;
			var delta = 200;
			jQuery(window).resize(function() {
			    rtime = new Date();
			    if (timeout === false) {
			        timeout = true;
			        setTimeout(resizeend, delta);
			    }
			});

			function resizeend() {
			    if (new Date() - rtime < delta) {
			        setTimeout(resizeend, delta);
			    } else {
			        timeout = false;
			        callback();
			    }
			}
		};

		box.eventReady = function(callback){
			jQuery(document).ready(function($){
				callback();
			});
		};

		box.eventLoad = function(callback){
			jQuery(window).load(function(){
				callback();
			});
		};

	};

	Sandbox.modules.dom = function(box){

		box.elemHeader = jQuery("#bp-header");
		box.mobNav = jQuery("#bp-mobile-nav");
		box.mainMenu = jQuery("#menu-mainmenu");

		box.is_custom_header = function(){
			if(box.elemHeader.length){
				return true;
			}else{
				return false;
			}
		};

		box.get_window_width = function(){
			var windowWidth = jQuery(window).innerWidth();
			return windowWidth;
		};

		box.get_document_scroll_top = function(){
			var scrollTop = $(document).scrollTop();
			return scrollTop;
		};

	};

	new Sandbox('events', 'dom', function(box){
		//stop scroll
		box.styckyHeader = false;
		var blockMainMenu = jQuery(".bp-main-menu"),
			buttonOpenSearch = jQuery(".bp-search-button"),
			buttonCloseSearch = jQuery(".bp-button-close"),
			toggleScroll = function(){
				if(box.windowScroll === true){
					var scrollPosition = [
						self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
						self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
					];
					var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
					html.data('scroll-position', scrollPosition);
					html.data('previous-overflow', html.css('overflow'));
					html.css('overflow', 'hidden');
					window.scrollTo(scrollPosition[0], scrollPosition[1]);
					box.windowScroll = false;
				}else{
					var html = jQuery('html');
					var scrollPosition = html.data('scroll-position');
					html.css('overflow', html.data('previous-overflow'));
					window.scrollTo(scrollPosition[0], scrollPosition[1])
					box.windowScroll = true;
				}
			},
			//add logo
			addLogo = function(){
				var intervalID = setInterval(function(){
					var elemTlsMenu = jQuery(".tls-menu");
					if(elemTlsMenu.length){
						var htmlLogo = jQuery(".bp-logo-header .bp-logo").html(),
							elemLogo = "<div class='bp-logo-mobile'>"+htmlLogo+"</div>",
							buttonHamburger = "<div class='bp-hamburger-button'><div id='bp-nav-icon3'><span></span><span></span><span></span><span></span></div></div>";
						elemTlsMenu.append(buttonHamburger+elemLogo);
						$('#bp-nav-icon3').click(function(){
							$(this).toggleClass('open');
							$("#bp-mobile-nav").toggleClass("bp-mobile-nav-active");
							$(".bp-bg-mob-menu").toggleClass("bp-bg-active");
							toggleScroll();
						});
						clearInterval(intervalID);
					}else{
						if(!$("#shop-time-elem").length){
							var htmlLogo = jQuery(".bp-logo-header .bp-logo").html(),
								elemLogo = "<div class='bp-logo-mobile bp-logo-without-shop'>"+htmlLogo+"</div>",
								buttonHamburger = "<div class='bp-hamburger-button'><div id='bp-nav-icon3'><span></span><span></span><span></span><span></span></div></div>";
							$(".bp-logo-header .bp-logo").append(buttonHamburger+elemLogo);
							$('#bp-nav-icon3').click(function(){
								$(this).toggleClass('open');
								$("#bp-mobile-nav").toggleClass("bp-mobile-nav-active");
								$(".bp-bg-mob-menu").toggleClass("bp-bg-active");
								toggleScroll();
							});
							clearInterval(intervalID);
						}
					}
				}, 300);
			};

		//add elements shop
		box.eventReady(function(){
      if (bpLocalize && bpLocalize.configurator && bpLocalize.configurator['config_' + bpLocalize.langCode]) {
        window.tlsShopUrl = bpLocalize.configurator['config_' + bpLocalize.langCode].tlsShopUrl;
        window.tlsSubShopUrl = bpLocalize.configurator['config_' + bpLocalize.langCode].tlsSubShopUrl;
        window.tlsConfiguratorUrl = bpLocalize.configurator['config_' + bpLocalize.langCode].tlsConfiguratorUrl;
      }


      window.tlsHeaderElSelector = '#shop-time-elem';
			window.tlsMenuElSelector = '#shop-main-panel';
			window.tlsHeaderWidgetUrl = '/custom/plugins/ZinitBachelorprint/Resources/views/frontend/_public/src/js/header_inject.js?v=1.0.11';
			$.getScript(tlsShopUrl + tlsHeaderWidgetUrl, function() {
			//$.getScript(bpLocalize.configurator['config_' + bpLocalize.langCode].headerInjectJS, function() {
				if (window.tlsHeaderApp) {
					var iframe = document.createElement('iframe');
					iframe.id = 'tlsServiceFrame';
					iframe.frameborder = '0';
					iframe.width = '0';
					iframe.height = '0';
					iframe.onload = function () {
						window.tlsHeaderApp.init();
					};
					iframe.src = tlsShopUrl + '/custom/plugins/ZinitBachelorprint/Resources/views/frontend/_public/src/header_service.html';
					document.getElementsByTagName('body')[0].appendChild(iframe);
					//addLogo();
				}
			});

		});

		//window resize
		box.eventResize(function(){
			box.windowWidth = box.get_window_width();
			positionMobSearchMainmenu();
			//box.topMainMenu = box.get_top_nav_menu();
		});

		//box.topMainMenu = box.get_top_nav_menu();
		box.windowWidth = box.get_window_width();

		//menu scroll
		box.eventScroll(function(scrollVal){
			if(box.windowWidth > 767){
				if(scrollVal > jQuery('#headstrip').height() && !box.styckyHeader){ /*Delucks CS: changed from 135 to headstrip height */
					box.elemHeader.addClass("bp-sticky");

					/*Delucks CS disable effect: start */
					/*
					box.elemHeader.css("top", "-110px");
					box.elemHeader.animate({
						top: 0
					},{
						duration: 500,
						complete: function(){}
					});
					*/
					/*Delucks CS disable effect: end */
					box.styckyHeader = true;
				}
				if(scrollVal < 70 && box.styckyHeader){
					box.elemHeader.removeClass("bp-sticky");
					box.styckyHeader = false;
				}
			}else{
				if(scrollVal > 0 && !box.styckyHeader){
					box.elemHeader.addClass("bp-sticky");
					box.mobNav.addClass("bp-sticky");
					box.styckyHeader = true;
				}
				if(scrollVal < 1 && box.styckyHeader){
					box.elemHeader.removeClass("bp-sticky");
					box.mobNav.removeClass("bp-sticky");
					box.styckyHeader = false;
				}
			}

		});

		//activate search
		buttonOpenSearch.click(function(){
			blockMainMenu.addClass("bp-search-active");
		});

		//deactivate search
		buttonCloseSearch.click(function(){
			blockMainMenu.removeClass("bp-search-active");
		});

		//activate & deactivate mega menu

		jQuery(".bp-main-nav .bp-primary-nav > li.menu-item-has-children").hover(function(){
			var eElem = jQuery(this);
			box.timeoutId = setTimeout(function(){
				eElem.addClass("bp-menu-active").children("ul").slideDown(300);
			}, 200);
		}, function(){
			clearTimeout(box.timeoutId);
			jQuery(this).removeClass("bp-menu-active").children("ul").slideUp(150);
			jQuery(".bp-thumbnail").attr("src", "");
			jQuery(".bp-thumbnail-link").attr("href", "");
		});

		//activate & deactivate submenu
		jQuery(".bp-button-chevron").click(function(){
			var button = jQuery(this);
			if(button.hasClass("lnr-chevron-down")){
				button.removeClass("lnr-chevron-down").addClass("lnr-chevron-up");
				button.parent().next('ul').slideDown();
			}else{
				button.addClass("lnr-chevron-down").removeClass("lnr-chevron-up");
				button.parent().next('ul').slideUp();
			}
			return false;
		});

		//mobile navigation
		box.leftMobMenu = 0;
		box.step = 320;
		box.heightMenu = box.mainMenu.innerHeight();
		box.eventResize(function(){
			box.mobMenuHeight = box.mobNav.innerHeight();
		});
		box.mobMenuHeight = box.mobNav.innerHeight();
		box.mobMenuDept = 1;
		jQuery(".bp-mobile-nav li.menu-item-has-children > a").click(function(event){
			jQuery(".bp-searchform-mobile > input[type=text]").blur();
			var elemParent = jQuery(this).parent();
			elemParent.addClass("bp-active-submenu");

			positionMobSearchSubmenu(elemParent);

			jQuery(".bp-mobile-nav .bp-mobile-menu").animate({
				left: box.leftMobMenu - box.step
			}, {
				duration: 300,
				complete: function(){
					box.leftMobMenu = box.leftMobMenu - box.step;
					box.mobMenuDept++;
					box.mainMenu.css("top", 0);
					box.heightMenu = elemParent.children("div").children("ul").innerHeight();
					box.heightMenu += 80;
					if(box.heightMenu > box.mobMenuHeight){
						jQuery(".bp-mobile-menu").css("height", box.heightMenu);
					}else{
						jQuery(".bp-mobile-menu").css("height", "auto");
					}
				}
			});
			return false;
		});
		//mobile navigation
		jQuery(".bp-button-back").click(function(event){
			jQuery(".bp-searchform-mobile > input[type=text]").blur();
			var elemSubmenu = jQuery(this).parent().parent();
			jQuery(".bp-mobile-nav .bp-mobile-menu").animate({
				left: box.leftMobMenu + box.step
			}, {
				duration: 300,
				complete: function(){
					box.leftMobMenu = box.leftMobMenu + box.step;
					elemSubmenu.removeClass("bp-active-submenu");
					box.mobMenuDept--;
					if(box.mobMenuDept === 1){
						jQuery(".bp-mobile-menu").css("height", "auto");
						box.heightMenu = jQuery(".bp-mobile-menu").innerHeight();
						return
					}
					box.mainMenu.css("top", 0);
					box.heightMenu = elemSubmenu.parent().innerHeight();
					box.heightMenu += 80;
					if(box.heightMenu > box.mobMenuHeight){
						jQuery(".bp-mobile-menu").css("height", box.heightMenu);
					}else{
						jQuery(".bp-mobile-menu").css("height", "auto");
					}
				}
			});
		});

		//margin-top mobile search
		var positionMobSearchSubmenu = function(elem){
				var elemUl = elem.children("div").children("ul"),
					heightUl = elemUl.innerHeight();
				if(box.mobMenuHeight > (heightUl + 115)){
					var marginTopSearch = (box.mobMenuHeight - heightUl) - 70;
					elemUl.children(".bp-mob-search").css("padding-top", marginTopSearch+"px");
				}
			},
			positionMobSearchMainmenu = function(){
				var heightUl = box.mainMenu.innerHeight();
				if(box.mobMenuHeight > heightUl){
					var marginTopSearch = (box.mobMenuHeight - heightUl) + 10;
					box.mainMenu.children(".bp-mob-search").css("padding-top", marginTopSearch+"px");
				}else{
					box.mainMenu.children(".bp-mob-search").css("padding-top", "40px");
				}
			};
		positionMobSearchMainmenu();

		//open & close mobile language
		jQuery(".bp-toggle-lang").click(function(){
			var button = jQuery(this);
			if(button.hasClass("lnr-chevron-down")){
				button.removeClass("lnr-chevron-down").addClass("lnr-chevron-up");
				button.parent().addClass("bp-language-open");
			}else{
				button.addClass("lnr-chevron-down").removeClass("lnr-chevron-up");
				button.parent().removeClass("bp-language-open");
			}
		});

		//thumbnail mega menu
		jQuery(".menu-item-thumbnail a, a.dropdown-toggle").hover(function(){
			var srcThumbnail = jQuery(this).attr("srcthumbnail"),
				hrefThumbnail = jQuery(this).attr("hrefthumbnail");
			if(!srcThumbnail){
				var srcThumbnail = jQuery(".bp-menu-active > a").attr("srcthumbnail"),
					hrefThumbnail = jQuery(".bp-menu-active > a").attr("hrefthumbnail");
				jQuery(".bp-thumbnail").attr("src", srcThumbnail);
				jQuery(".bp-thumbnail-link").attr("href", hrefThumbnail);
			}else{
				jQuery(".bp-thumbnail").attr("src", srcThumbnail);
				jQuery(".bp-thumbnail-link").attr("href", hrefThumbnail);
			}
		}, function(){
			//jQuery(".bp-thumbnail").attr("src", "");
		});

		//mouse move mobile menu
		(function($){
			$.fn.touchanddrag=function(){
				// wrap content in div, that will drag
				//this.wrapInner('<div>');
				var box=this,
					data=this.children();
				// hide scrollbar and other preps
				box.css({overflow:'hidden'});
				data.css({position:'absolute',cursor:'default'});
				// touch and drag content
				data.mousedown(function(e){
					e.preventDefault();
					e.stopPropagation();
					var hgtBox=box.height(),
						hgtData=data.height();
					if (hgtData>hgtBox) {
						var posTap=e.pageY,
							posData=data.position().top,
							posShift,
							mouseMove=function(e){
								e.preventDefault();
								e.stopPropagation();
								if (e.which==1){
									posShift=e.pageY-posTap;
									if (data.position().top>0){
										data.css({top:(posData+posShift)/5});
									} else if ((data.position().top+hgtData)<hgtBox){
										data.css({top:(hgtBox-hgtData)+(posShift/5)});
									} else {
										data.css({top:posData+posShift});
									}
								} else {
									mouseUp();
								}
							},
							mouseUp=function(){
								$(document).off('mousemove',mouseMove).off('mouseup',mouseUp);
								$(document).off('mousedown',selection);
								data.css({cursor:'default'});
								if (data.position().top>0){
									data.animate({top:0},250);
								} else if ((data.position().top+hgtData)<hgtBox) {
									data.animate({top:hgtBox-hgtData},250);
								}
							},
							selection=function(){
								if (window.getSelection){window.getSelection().removeAllRanges()}
								else {document.selection.empty()}
								return false;
							};
						data.css({cursor:'move'});
						$(document).on('mousedown',selection).on('mousemove',mouseMove);
						$(document).on('mouseup',mouseUp).on('contextmenu',mouseUp);
						$(window).on('blur',mouseUp);
					}
				});
				return this;
			};
		})(jQuery);
		jQuery(document).ready(function(){
			$('#bp-mobile-nav').touchanddrag();
		});

		//touchmove mobile menu
		/*
		var obj = document.getElementsByClassName('bp-mobile-menu')[0];
		//touchstart
		obj.addEventListener('touchstart', function(event) {
			if (event.targetTouches.length == 1) {
				var touch=event.targetTouches[0];
				box.touchOffsetY = touch.pageY;
				box.topElem = parseInt(obj.style.top, 10);
				if(isNaN(box.topElem)){
					box.topElem = 0;
				}
			}
		}, false);
		//touchmove
		box.eventTouchEnd = false;
		obj.addEventListener('touchmove', function(event) {
			event.preventDefault();
			event.stopPropagation();
			if (event.targetTouches.length == 1) {
				var touch = event.targetTouches[0];
				obj.style.top = (box.topElem+(touch.pageY-box.touchOffsetY)) + 'px';
				if(box.eventTouchEnd === false){
					obj.addEventListener('touchend', eTouchEnd, false);
					box.eventTouchEnd = true;
				}
			}
		}, false);
		//function TouchEnd
		var eTouchEnd = function(){
			jQuery(".bp-searchform-mobile > input[type=text]").blur();
			box.topElem = parseInt(obj.style.top, 10);
			if(isNaN(box.topElem)){
				box.topElem = 0;
			}
			if(box.topElem > 0){
				jQuery("#menu-mainmenu").animate({top:0},250);
			}else if((box.topElem+box.heightMenu) < box.mobMenuHeight){
				if(box.heightMenu < box.mobMenuHeight){
					jQuery("#menu-mainmenu").animate({top:0},250);
				}else{
					jQuery("#menu-mainmenu").animate({top:box.mobMenuHeight-box.heightMenu},250);
				}
			}
			obj.removeEventListener('touchend', eTouchEnd, false);
			box.eventTouchEnd = false;
		};
		*/

		//focus in search mobile menu
		jQuery(".bp-searchform-mobile > input[type=text]").click(function(){
			jQuery(this).focus();
		});

		(function(){
			var $page = jQuery('html, body'),
				defaultHeader = jQuery(".cd-logo-header"),
				customHeader = jQuery("#bp-header");
	            windowWidth = jQuery(window).width(),
	            headerHeight = function(){
	            	if(customHeader.length){
		                var heightStickyHeader = customHeader.height();
		            }else{
	                	var heightStickyHeader = defaultHeader.height();
	                }
	                if(box.styckyHeader === false && box.get_window_width() > 480){
	            		heightStickyHeader = (heightStickyHeader * 2);
	            	}
	                return heightStickyHeader;
	            },
	            getDelay = function(){
	            	if(box.get_window_width() > 767){
	            		var delay = 400;
	            	}else{
	            		var delay = 600;
	            	}
	            	return delay;
	            },
	            elemAnchorLink = jQuery('a[href*="#"]');

	        for(var i=elemAnchorLink.length; i--;){
	        	var attrHref = elemAnchorLink.eq(i).attr("href"),
	        		attrAccordeon = elemAnchorLink.eq(i).attr("data-vc-container");
	        	if(attrHref.indexOf("#vc_") === -1 && attrHref !== "#" && attrAccordeon !== '.vc_tta-container' && attrAccordeon !== '.vc_tta'){
	        		(function(elAnLin){
		        		elAnLin.click(function(){
				            var elemScroll = jQuery.attr(this, 'href'),
				                elemLazy = jQuery("img.lazy");
				            if(elemScroll !== '#'){
				                for(var i=elemLazy.length; i--;){
				                    var dataLazySrc = elemLazy.eq(i).attr("data-lazy-src");
				                    elemLazy.eq(i).attr("src", dataLazySrc);
				                }
				                setTimeout(function(){
				                    $page.animate({
				                    	scrollTop: jQuery(elemScroll).offset().top - headerHeight()
				                    }, 700);
				                }, getDelay());
				            }
				            return false;
				        });
		        	}(elemAnchorLink.eq(i)));
	        	}
	        }

	        var elemScroll = jQuery('.text_icl-2.gtec-accordion'),
	            elemLazy = jQuery("img.lazy"),
	            elemAccordion = elemScroll.find(".bold");
	        jQuery('#bp-bestpreisgarantie').click(function(event){
	            event.preventDefault();
	            if(elemScroll !== '#'){
	                for(var i=elemLazy.length; i--;){
	                    var dataLazySrc = elemLazy.eq(i).attr("data-lazy-src");
	                    elemLazy.eq(i).attr("src", dataLazySrc);
	                }
	                setTimeout(function(){
	                    $page.animate({
	                        scrollTop: jQuery(elemScroll).offset().top - headerHeight()
	                    }, {
	                        duration: 1000,
	                        complete: function(){
	                            if(elemAccordion.hasClass("collapsed")){
	                                elemAccordion.click();
	                            }
	                        }
	                    });
	                }, getDelay());
	            }
	            return false;
	        });
		}());

		box.eventLoad(function(){
			setTimeout(function(){
				box.revSlider = jQuery(".tp-revslider-slidesli");
				var countRevSlider = box.revSlider.length;
				if(countRevSlider){
					for(var i=countRevSlider; i--;){
						var dataThumb = box.revSlider.eq(i).attr("data-thumb");
						if(dataThumb){
							var elemBg = box.revSlider.eq(i).children(".slotholder").children("div");
							elemBg.css("background-image", "url("+dataThumb+")").attr("src", dataThumb);
						}
					}
				}
			}, 100);
		});

		//tablepress
		box.eventReady(function(){
			var tabless = jQuery(".bp-tablepress-container > table")
				minWidthCol = 170;
			for(var i=tabless.length; i--;){
				var countCol = tabless.eq(i).find("tbody > tr:first-child td").length;
				tabless.eq(i).css("min-width", (minWidthCol*countCol)+"px");
			}
		});

	});