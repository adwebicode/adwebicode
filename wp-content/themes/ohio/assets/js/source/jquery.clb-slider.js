(function($){
'use strict';


    var methods = {
        init : function( options ) { 
            return this.each(function(){

                var slider              = $(this),
                    slideCount          = slider.children().length,
                    isScroll            = $('.clb-slider-scroll-top').length,
					navDots             = '',
                    navPagination       = '';

				var numberOfSlides 		= slider.hasClass('clb-slider') ? slider.find('.clb-slider-item:not(.cloned)').length : slider.children().length;
                const isRtl             = $('body').hasClass('rtl');

                var slideNow                = 1,
                    currentSlide            = 1,
                    navBtnId                = 0,
                    translateValue          = 0,
                    scrolled                = false,
                    curentSlideItemHeight   = 0,
                    defaultSettings         = {
                        items               : 1,
                        navBtn              : true,
						dots                : false,
                        pagination          : false,
                        autoplay            : false,
                        autoplayTimeout     : 3000,
                        autoplayHoverPause  : true,
                        loop                : false,
                        responsive          : false,
                        mousewheel          : false,
                        drag                : false,
                        gap                 : 0,
                        scrollToSlider      : false,
                        verticalScroll      : false,
                        navBtnClasses       : '',
                        startSlide          : false,
                        autoHeight          : false,
                        slidesCount         : false
                    };

                var sliderData = slider.data({
                    'slideNow': slideNow
                });

                var settings = initSettings();
                createHtmlMarkup(settings);
                var sliderStage = slider.find(' > .clb-slider-outer-stage > .clb-slider-stage');
                var sliderItems = sliderStage.find(' > .clb-slider-item');

                init();

                function init() {
                    if (settings.loop) {
                        if (!sliderStage.find(' > .cloned').length) {
                            $(sliderItems).clone().addClass('cloned').appendTo(sliderStage);
                            $(sliderItems).clone().addClass('cloned').prependTo(sliderStage);
                        }

                        sliderItems = sliderStage.find(' > .clb-slider-item');

                        slideNow = numberOfSlides;

                        slideCount = sliderItems.length;
                        sliderItems.slice(slideNow, slideNow + settings.items).addClass('active');

                        if (settings.verticalScroll) {
                            translateValue = -slider.height() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                        } else {
                            translateValue = -slider.width() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                        }
                        
                        calcStagePosition();

                        $(sliderItems[slideNow - 1]).addClass('prev-slide');
                        $(sliderItems[slideNow + settings.items]).addClass('next-slide');
                    }
                    
                    if (settings.mousewheel === true) {
                        mousewheelScroll(slider, settings, sliderStage, sliderItems);
                    }

                    if (settings.drag === true) {
                        dragScroll(slider, settings, sliderStage, sliderItems);
                    }

                    if (settings.autoplay === true) {
                        autoSlide(slider, settings, sliderStage, sliderItems);
                    }

					if (settings.dots === true) {
                        var dots = slider.find('.clb-slider-dot, .clb-slider-page');
                        paginationScroll(slider, settings, dots);
                    }

                    if (settings.pagination === true) {
                        var page = slider.find('.clb-slider-dot, .clb-slider-page');
                        paginationScroll(slider, settings, page);
                    }

                    if (settings.verticalScroll) {
                        slider.addClass('clb-slider-vertical')
                    }

                    if (settings.navBtn === true) {
                        slider.find('> .clb-slider-nav-btn .next-btn').on('click', function() {
                            slider.trigger('clb-slider.navBtnClick');
                            nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                        });

                        slider.find('> .clb-slider-nav-btn .prev-btn').on('click', function() {
                            slider.trigger('clb-slider.navBtnClick');
                            prevSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                        });
                    }

                    if (settings.startSlide !== false) {

                        slideNow = +settings.startSlide;

                        sliderItems.removeClass('active');

                        sliderItems.slice(slideNow, +slideNow + settings.items).addClass('active');
                        if (settings.verticalScroll) {
                            translateValue = -slider.height() / settings.items * (slideNow) - (settings.gap / slideCount) - (settings.gap / 2);
                        } else {
                            translateValue = -slider.width() / settings.items * (slideNow) - (settings.gap / slideCount) - (settings.gap / 2);
                        }

                        calcStagePosition();
                        slideNow++
                    }

                    $(window).on('keydown', function (e) {
                        var key = e.which || e.keyCode;

                        if (key == 37) {
                            prevSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                        }
                        if (key == 39) {
                            nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                        }
                    });

                    if (settings.autoHeight === true) {
                        slider.on('clb-slider.init clb-slider.changed', function(){
                            autoHeight(slider);
                        });
                    }

                    if (isScroll) {
                        portfolioScrollBar();
                    }

                    slider.on('to-slide', function(e, slideNum){
                        slideNow = slideNum;
                        nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                    });

                    slider.on('next-slide', function(e){
                        nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);;
                    });

                    slider.on('prev-slide', function(e){
                        prevSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                    });

                    setTimeout(function(){
                        slider.trigger('clb-slider.init');
                    }, 10);

                    slider.on('executeAutoHeight', function(){
                        autoHeight(slider);
                    });
                }

                function initSettings() {
                    var settings = $.extend( defaultSettings, options);

                    //Responsive settings functional
                    if (defaultSettings.responsive) {
                        $(defaultSettings.responsive).each(function(i){
                            //Get all responsive value (for example 768, 1180 etc.)
                            for ( var property in $(this)[i]) {
                                if ( $(window).width() <= property ) {
                                    //Create new settings for each resolution
                                    settings = $.extend(defaultSettings, options.responsive[property]);
                                    return settings;
                                }
                            }
                        });
                    }
                   
                    return settings;
                }  

                function createHtmlMarkup(settings) {
                    if ( !slider.hasClass('clb-slider') ) {
                        slider.addClass('clb-slider');
                        var sliderStructure = $('<div class="clb-slider-outer-stage"><div class="clb-slider-stage"></div><div>'),
                            sliderItems = slider.children().addClass('clb-slider-item');
                        //If navBtn = true create navigation buttons
                        if (settings.navBtn) {
                            var createNavBtn = '<div class="clb-slider-nav-btn"><div class="prev-btn icon-button ' + settings.navBtnClasses + '" tabindex="0"><i class="icon"><svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"/></svg><svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg></i></div><div class="next-btn icon-button ' + settings.navBtnClasses + '" tabindex="0"><i class="icon"><svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"/></svg><svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg></i></div></div>';
                            slider.append($(createNavBtn));
                        }
                        if ( settings.verticalScroll ) {
                            var itemsHeight = maxHeight(sliderItems)
                        }

						//If dots = true create navigation buttons
						if (settings.dots) {
							var createDots = $('<div class="clb-slider-nav-dots"></div>');
							var dot = $('<div class="clb-slider-dot"><svg width="22px" height="22px" viewBox="0 0 22 22"><g stroke="#17161A" stroke-width="2" fill="none" transform="translate(11, 11)"><circle cx="0" cy="0" r="10"></circle></g></svg></div>');

							for (var i = slideCount; i != 0; i--) {
								dot.clone().appendTo(createDots);
							}

							createDots.find('.clb-slider-dot:first-child').addClass('active');

							slider.append(createDots);

							navDots = slider.find('> .clb-slider-nav-dots > .clb-slider-dot');
						}

                        if (settings.pagination) {
                            var createPagination = $('<div class="clb-slider-pagination"></div>');
                            var page = $('<div class="clb-slider-page"></div>');
              
                            for (var i = 1; i <= slideCount; i++) {
                                if ( i < 10 ) {
                                    page.clone().append('<span class="clb-slider-pagination-index"> 0'+ i +'</span>').appendTo(createPagination);
                                } else {
                                    page.clone().append('<span class="clb-slider-pagination-index">'+ i +'</span>').appendTo(createPagination);
                                }
                                
                            }

                            createPagination.find('.clb-slider-page:first-child').addClass('active');

                            slider.append(createPagination);

                            navPagination = slider.find('> .clb-slider-pagination > .clb-slider-page');

                        }

                        if (settings.slidesCount) {
                            var createSlidesCount = $('<div class="clb-slider-count"><div class="clb-slider-count-current"></div><div class="clb-slider-count-total">'+slideCount+'</div></div>');
                            var counts = $('<div class="clb-slider-count-number"></div>');
                            slider.append(createSlidesCount);

                            var currentNumber = slider.find('.clb-slider-count-current');

                            for (var i = 1; i <= slideCount; i++) {
                                counts.clone().append('<span class="clb-slider-pagination-index">'+ i +'</span>').appendTo(currentNumber);
                            }
                            counts.clone().append('<span class="clb-slider-pagination-index">'+slideCount+'</span>').prependTo(currentNumber);
                            counts.clone().append('<span class="clb-slider-pagination-index">1</span>').appendTo(currentNumber);

                            curentSlideItemHeight = slider.find('.clb-slider-count-number').height();

                            var curentSlideStage = slider.find('.clb-slider-count-current');

                            curentSlideStage.css({
                                    'transform': 'translate(0, -' + curentSlideItemHeight + 'px)',
                                    '-webkit-transform': 'translate(0, -' + curentSlideItemHeight  + 'px)',
                                    '-ms-transform': 'translate(0, -' + curentSlideItemHeight + 'px)',
                            });
                        }

                        //Wrap slider items in clb-slider-stage
                        sliderItems.wrapAll(sliderStructure);
                    } else {
                        var sliderItems = slider.find('> .clb-slider-outer-stage > .clb-slider-stage > .clb-slider-item');
                    }

                    if ( !settings.loop ) {
                        sliderItems.slice(0, settings.items).addClass('active');
                        $(sliderItems[0 + settings.items]).addClass('next-slide');
						slider.addClass('first-slide');
                    }

                    if ( settings.verticalScroll ) {
                        //Stage width for height right calculate
                        var sliderWidth = slider.width();

                        var stageWidth = sliderWidth * slideCount / settings.items + ((settings.gap / settings.items) * slideCount);
                        slider.find('> .clb-slider-outer-stage > .clb-slider-stage').css({
                            'min-width': sliderWidth + 'px'
                        });

                        //Stage height
                        
                        var sliderHeight = slider.height();
                        var stageHeight = sliderHeight * slideCount / settings.items + ((settings.gap / settings.items) * slideCount);

                        //Items height
                        sliderItems.css('height', itemsHeight + 'px');
                        
						if ( isRtl ) {
							sliderItems.css('margin-left', settings.gap + 'px');
						} else {
							sliderItems.css('margin-right', settings.gap + 'px');
						}
                        slider.css('height', itemsHeight)
                        var sliderHeight = sliderItems.height();

                        slider.find('> .clb-slider-stage').css({
                            'height': stageHeight + 'px',
                            'width': 'auto'
                        });
                    } else {
                        //Stage width
                        var sliderWidth = slider.width();

                        var itemWidth = sliderWidth / settings.items - settings.gap + (settings.gap / settings.items);
                        //Items width
                        sliderItems.css('min-width', itemWidth + 'px');

						if ( isRtl ) {
							sliderItems.css('margin-left', settings.gap + 'px');
						} else {
							sliderItems.css('margin-right', settings.gap + 'px');
						}

                        var sliderHeight = sliderItems.height();
                        
                        slider.find('> .clb-slider-outer-stage').css('max-width', itemWidth * settings.items + 'px');
                    }
                }

                function nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination) {
                    /* Events */
                    slider.trigger('clb-slider.change').trigger('clb-slider.next-change');
                    /* end of events */
                    
                    // If current slide more or less than slide count then

                    if ((settings.loop && slideNow != slideCount - numberOfSlides) || slideNow < numberOfSlides) {
                        sliderItems.removeClass('active prev-slide next-slide');
                        sliderStage.css({
                            'transition': '1s'
                        });

						slider.removeClass('first-slide');

                        if (settings.loop) {
                            slideNow++;
                            currentSlide = slideNow;
                        }

                        if (settings.loop) {
                            if (settings.dots || settings.pagination) {
                                activeNavigationClass(slideNow - numberOfSlides);
                            }
                        } else { 
                            if (settings.dots || settings.pagination) {
                                activeNavigationClass(slideNow);
                            }
                        }

                        sliderItems.slice(slideNow, slideNow + settings.items).addClass('active');
                        $(sliderItems[slideNow - 1]).addClass('prev-slide');
                        $(sliderItems[slideNow + settings.items]).addClass('next-slide');

                        if (settings.verticalScroll) {
                            translateValue = -slider.height() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                        } else {
                            translateValue = -slider.width() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                        }
                        
                        calcStagePosition();

                        if (!settings.loop) {
                            slideNow++;

							if ( slideNow == numberOfSlides) {
								slider.addClass('last-slide');
							}
                        }
						
                        
                        if (settings.loop) {
                            currentSlide = slideNow - settings.items;
                        }
                        
                        //If loop slider
                        if (slideNow == slideCount - numberOfSlides && settings.loop) {
                            sliderItems.slice(numberOfSlides, numberOfSlides + settings.items).addClass('active');

                            currentSlide = 1;
                            setTimeout(function(){
                                slider.find('> .clb-slider-outer-stage > .clb-slider-stage > .cloned').removeClass('active');
                                slideNow = numberOfSlides;
                                $(sliderItems[slideNow]).addClass('active');


                                if (settings.verticalScroll) {
                                    translateValue = -slider.height() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                                } else {
                                    translateValue = -slider.width() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                                }

                                calcStagePosition();

                                if (settings.dots || settings.pagination) {
                                    activeNavigationClass(slideNow - numberOfSlides);
                                }

                                sliderStage.css({
                                    'transition': 'none',
                                });
                                if (isScroll) {
                                    portfolioScrollBar();
                                }
                            }, 1000);

                        }
                    }
                    if (isScroll) {
                        portfolioScrollBar();
                    }
                    
                    slidesCount(slideNow);

                    /* Events */
                    setTimeout(function(){
                        slider.trigger('clb-slider.changed');
                    }, 1000);  
                    /* end of events */
                }

                function prevSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination) {
                    /* Events */
                    slider.trigger('clb-slider.change').trigger('clb-slider.prev-change');
                    /* end of events */
                    if ((settings.loop && slideNow != numberOfSlides - settings.items) || slideNow > 1) {

                        sliderStage.css({
                            'transition': '1s'
                        });

						slider.removeClass('last-slide');

                        if (!settings.loop) {
                            slideNow--;
                            currentSlide = slideNow - 1;

							if ( slideNow == 1) {
								slider.addClass('first-slide');
							}
                        }

                        if (settings.verticalScroll) {
                            translateValue = -slider.height() / settings.items * (slideNow - 1) - ((settings.gap / settings.items) * slideNow) + (+settings.gap / settings.items );
                        } else {
                            translateValue = -slider.width() / settings.items * (slideNow - 1) - ((settings.gap / settings.items) * slideNow) + (+settings.gap / settings.items);
                        }

                        calcStagePosition();

                        if (settings.loop) {
                            slideNow--;
                            currentSlide = slideNow - 1;
                        }

                        if (settings.loop) {
                            if (settings.dots || settings.pagination) {
                                //active class for pagination
                                if (slideNow - numberOfSlides < 0 ) {
                                    activeNavigationClass(slideNow);
                                } else {
                                    activeNavigationClass(slideNow - numberOfSlides);
                                }
                            }
                            sliderItems.removeClass('active prev-slide next-slide');
                            sliderItems.slice(slideNow, slideNow + (settings.items)).addClass('active');
                            $(sliderItems[slideNow - 2]).addClass('prev-slide');
                            $(sliderItems[slideNow + settings.items]).addClass('next-slide');
                        } else { 
                            if (settings.dots || settings.pagination) {
                                activeNavigationClass(slideNow - 1);
                            }
                            sliderItems.removeClass('active prev-slide next-slide');
                            sliderItems.slice(slideNow - 1, slideNow + settings.items - 1).addClass('active');
                            $(sliderItems[slideNow - 2]).addClass('prev-slide');
                            $(sliderItems[slideNow + settings.items - 1]).addClass('next-slide');
                        }

                        if (slideNow == numberOfSlides - settings.items && settings.loop) {
                            sliderItems.slice(((numberOfSlides * 2) - settings.items), ((numberOfSlides * 2) - settings.items)  + settings.items).addClass('active');
                            currentSlide = slideCount - settings.items - 1;
                            setTimeout(function(){
                                slider.find('> .clb-slider-outer-stage > .clb-slider-stage > .cloned').removeClass('active');
                                slideNow = (numberOfSlides * 2) - settings.items;
                                $(sliderItems[slideNow]).addClass('active');
                                
                                if (settings.verticalScroll) {
                                    translateValue = -slider.height() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                                } else {
                                    translateValue = -slider.width() / settings.items * (slideNow) - ((settings.gap / settings.items) * slideNow);
                                }

                                sliderStage.css({
                                    'transition': 'none'
                                });

                                calcStagePosition();
                                if (settings.pagination) {
                                    activeNavigationClass(slideNow - numberOfSlides);
                                }

                                if (isScroll) {
                                    portfolioScrollBar();
                                }
                            }, 1000);
                        }
                    } 

                    if (isScroll) {
                        portfolioScrollBar();
                    }

                    slidesCount(slideNow);

                    /* Events */
                    setTimeout(function(){
                        slider.trigger('clb-slider.changed');
                    }, 1000);
                    /* end of events */
                }

                function paginationScroll(slider, settings, pagination) {
                    pagination.on('click', function() {

                        sliderStage.css({
                            'transition': '1s'
                        });

                        navBtnId = $(this).index();

                        if ( settings.loop ) {
                            navBtnId = navBtnId + numberOfSlides - 1;
                        }
                        //navBtnId + 1 because navBtnId start from 0 and slideNow start from 1
                        if (navBtnId + 1 != slideNow) {
                            if ( navBtnId + 1 > slideCount - settings.items ) {
                                navBtnId = navBtnId - settings.items + 1;
                            }

                            slideNow = navBtnId;
                            nextSlide(slider, settings, sliderStage, sliderItems, navDots,  navPagination);
                        }
                    });
                }

                function autoSlide(slider, settings, sliderStage, sliderItems) {
                    var autoSlideInterval = setInterval(function(){
                        if (!slider.hasClass('stop-slide')){
                            nextSlide(slider, settings, sliderStage, sliderItems, navDots,  navPagination);
                        }
                    }, settings.autoplayTimeout);

                    if ( settings.autoplayHoverPause == true ) {
                        slider.hover(function() {

                            $(this).addClass('stop-slide');
                        }, function() {
                            $(this).removeClass('stop-slide');
                        });
                    }
                    
                    $(window).on('resize', function(){
                        clearInterval(autoSlideInterval);

                        autoSlideInterval = setInterval(function(){
                            if (!slider.hasClass('stop-slide')){
                                nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                            }
                        }, settings.autoplayTimeout);
                    });
                }

                function mousewheelScroll(slider, settings, sliderStage, sliderItems) {
                    var top = slider.offset().top - ( $(window).height() - slider.outerHeight() ) / 2;
                    var wheel = true;
                    var delay = false;

                    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                        var timeoutDelay = 1300;
                    } else {
                        var timeoutDelay = 1000;
                    }

                    slider.on('wheel mousewheel', function(e){
                        var y = e.originalEvent.deltaY;

                        if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                            var timeoutDelay = 1300;
                        } else {
                            var timeoutDelay = 1000;
                        }

                        if (settings.scrollToSlider == true && (slideNow == 1 && y > 0) || (slideNow == slideCount && y < 0)) {
                            $("html, body").animate({ scrollTop: slider.offset().top + 'px' });
                            e.preventDefault();
                        }

                        if (wheel) {
                            if( y > 0 && slideNow < slideCount) {
                                nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                                wheel = false;
                                e.preventDefault();

                            } else if (y < 0 && slideNow > 1) {
                                prevSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                                wheel = false;
                                e.preventDefault();
                            } 
                        } else {
                            return false;
                        }

                        setTimeout(function(){
                            wheel = true;
                        }, timeoutDelay);

                    });
                }

                function dragScroll(slider, settings, sliderStage, sliderItems) {
                    var drag = true;
                    var interval = 100;
                    slider.find(' > .clb-slider-outer-stage ').on('mousedown touchstart', function(e){
                        var cursorPosition = e.clientX;
                        
                        if (e.type == 'touchstart') {
                            cursorPosition = e.originalEvent.touches[0].pageX;
                            var cursorPositionY = e.originalEvent.touches[0].pageY;
                        }
                        
                        slider.find(' > .clb-slider-outer-stage ').on('mousemove touchmove', function(e){
                            
                            if (drag == true) {
                                var position = e.pageX;
                                
                                if (e.type == 'touchmove') {
                                    if (e.originalEvent.touches[0].pageY > cursorPositionY + 40 || e.originalEvent.touches[0].pageY < cursorPositionY - 40) {
                                        return;
                                    }
                                    position = e.originalEvent.touches[0].pageX;
                                    interval = 50;
                                }
                                if ( position + interval < cursorPosition ) {
                                    nextSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                                    cursorPosition = e.clientX;
                                    drag = false;
                                } else if (position - interval > cursorPosition) {
                                    prevSlide(slider, settings, sliderStage, sliderItems, navDots, navPagination);
                                    cursorPosition = e.clientX;
                                    drag = false;
                                }
                            }  
                        });

                        setTimeout(function(){
                            drag = true;
                        }, 1000);
                        slider.find(' > .clb-slider-outer-stage ')[0].ondragstart = function() {
                          return false;
                        };
                    });

                    slider.find(' > .clb-slider-outer-stage ').on('mouseup touchend', function(e){
                        slider.find(' > .clb-slider-outer-stage ').off('mousemove touchmove');
                    });
                }
                
                function autoHeight(slider) {
                    var outerStage = slider.find('> .clb-slider-outer-stage');

                    outerStage[0].style.height = '';

                    var height = maxHeight(outerStage.find('> .clb-slider-stage > .clb-slider-item.active'));
                    outerStage.height(height);
                }

                function slidesCount(slideNow) {
                    var curentSlideStage = slider.find('.clb-slider-count-current');
                    var curentSlideItem = curentSlideStage.find('.clb-slider-count-number');
                    var currentCountSlide = 0;
                    var curentSlideItemHeight = slider.find('.clb-slider-count-number').height();

                    curentSlideStage.css({'transition': '.3s'});

                    if (settings.loop) {
                        currentCountSlide = slideNow - numberOfSlides + 1;         

                        if (currentCountSlide == curentSlideItem.length) {
                            currentCountSlide= 0;
                        } else if (currentCountSlide< 0) {
                            currentCountSlide = numberOfSlides + curentSlideItem;
                        } else if (currentCountSlide> numberOfSlides) {
                            setTimeout(function(){
                                currentCountSlide= 1;
                                curentSlideStage.css({'transition': 'none'});
                                translateCounts();
                            }, 300);
                        } else if(currentCountSlide== 0) {
                            setTimeout(function(){
                                currentCountSlide= numberOfSlides;
                                curentSlideStage.css({'transition': 'none'});
                                translateCounts();
                            }, 300);
                        }
                    } else {
                        currentCountSlide = slideNow;
                    }

                    translateCounts();

                    function translateCounts() {
                        curentSlideStage.css({
                            'transform': 'translate(0, -' + curentSlideItemHeight * currentCountSlide + 'px)',
                            '-webkit-transform': 'translate(0, -' + curentSlideItemHeight * currentCountSlide  + 'px)',
                            '-ms-transform': 'translate(0, -' + curentSlideItemHeight * currentCountSlide + 'px)',
                        });
                    }
                }

                function portfolioScrollBar() {
                    if (slider.hasClass('clb-slider-scroll-bar')) {
                        let currentScrollItem = settings.loop ? slideNow - numberOfSlides + 1 : slideNow;
                        let percentage = (100 / numberOfSlides ) * currentScrollItem;

                        if (percentage > 100) percentage = 100;

                        $('.scroll-track').css( 'width', percentage + '%');
                    }
                }

                //Support functions

                function activeNavigationClass(index) {
					if (navDots) {
                        navDots.removeClass('active');
                        $(navDots[index]).addClass('active');  
                    }

                    if (navPagination) {
                        navPagination.removeClass('active')
                        $(navPagination[index]).addClass('active'); 
                    }
                }

                function calcStagePosition(){

					translateValue = Math.round(translateValue);

                    if (isRtl && !settings.verticalScroll) {
                        translateValue *= -1;
                    }

                    if (settings.verticalScroll) {
                        sliderStage.css({
                            'transform': 'translate(0, ' + translateValue + 'px)',
                            '-webkit-transform': 'translate(0, ' + translateValue + 'px)',
                            '-ms-transform': 'translate(0, ' + translateValue + 'px)',
                        });
                    } else {
                        sliderStage.css({
                            'transform': 'translate(' + translateValue + 'px, 0)',
                            '-webkit-transform': 'translate(' + translateValue + 'px, 0)',
                            '-ms-transform': 'translate(' + translateValue + 'px, 0)',
                        }); 
                    }
                }

                function refresh() {
                    sliderStage.css({
                        'transition': 'none'
                    });

                    var resizeSettings = initSettings();

                    if ( resizeSettings.verticalScroll ) {
                        //Stage width for height right calculate
                        var sliderWidth = slider.width();
                        var stageWidth = sliderWidth * slideCount / resizeSettings.items + ((resizeSettings.gap / resizeSettings.items) * slideCount);
                        slider.find('> .clb-slider-stage').css({
                            'width': stageWidth + 'px'
                        });

                        //Stage height
                        var sliderHeight = slider.height();
                        var itemheight = sliderHeight / resizeSettings.items - resizeSettings.gap + (resizeSettings.gap / resizeSettings.items);
                        var stageHeight = sliderHeight * slideCount / resizeSettings.items + ((resizeSettings.gap / resizeSettings.items) * slideCount);

                        //Items height
                        sliderItems.css('height', itemheight + 'px');
						if ( isRtl ) {
							sliderItems.css('margin-left', resizeSettings.gap + 'px');
						} else {
							sliderItems.css('margin-right', resizeSettings.gap + 'px');
						}
                        
                        slider.css('height', itemheight)
                        var sliderHeight = sliderItems.height();
                        slider.find('> .clb-slider-stage').css({
                            'height': stageHeight + 'px',
                            'width': 'auto'
                        });
                    } else {
                        //Stage width
                        var sliderWidth = slider.width();
                        var itemWidth = sliderWidth / resizeSettings.items - resizeSettings.gap + (resizeSettings.gap / resizeSettings.items);
                        var stageWidth = sliderWidth * slideCount / resizeSettings.items + ((resizeSettings.gap / resizeSettings.items) * slideCount);
                        //Items width
                        sliderItems.css('min-width', itemWidth + 'px');
						if ( isRtl ) {
							sliderItems.css('margin-left', resizeSettings.gap + 'px');
						} else {
							sliderItems.css('margin-right', resizeSettings.gap + 'px');
						}

                        var sliderHeight = sliderItems.height();
                        slider.find('> .clb-slider-stage').css({
                            'width': stageWidth + 'px'
                        });  
                    }
					
					if (resizeSettings.verticalScroll) {
                        translateValue = -slider.height() / resizeSettings.items * (slideNow) - ((resizeSettings.gap / resizeSettings.items) * slideNow);
                    } else {
                        translateValue = -slider.width() / resizeSettings.items * (slideNow) - ((resizeSettings.gap / resizeSettings.items) * slideNow);
                    }
					
                    calcStagePosition();

                    if (resizeSettings.autoHeight) {
                        autoHeight(slider);
                    }
                }

                function maxHeight(items) {
                    var height = 0;

                    items.each(function(){
                        var itemHeight = $(this).outerHeight();
                        if (itemHeight > height) {
                            height = $(this).outerHeight();
                        }
                    });

                    return height;
                }

                //Resize
                var rtime;
                var timeout = false;
                var delta = 200;
                //For disebling resize trigger on mobile scroll
                var mobileResizeWidth = $(window).width();

                $(window).on('resize', function(){
                    if ($(window).width() != mobileResizeWidth) {
                        rtime = new Date();
                        if (timeout === false) {
                            timeout = true;
                            setTimeout(function(){
                                if (new Date() - rtime < delta) { 
                                    setTimeout(function(){
                                        timeout = false;
                                        refresh();
                                    }, delta);
                                } else {
                                    timeout = false;
                                    refresh();
                                }    
                            }, delta);
                        }
                    }
                });  
          
            });
        },

        destroy: function() {
            return this.each(function(){
                var slider = $(this);
                var sliderItems = slider.find('.clb-slider-item');
                slider.removeClass('clb-slider');
                sliderItems.unwrap();
                sliderItems.removeAttr('style').removeClass('clb-slider-item active');

            });
        }
    };

    jQuery.fn.clbSlider = function(method){
    //Return 'this' for 'chaining method'
        if ( methods[method] ) {
          return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {

          return methods.init.apply( this, arguments );
        } else {
          $.error( "Method with name " +  method + " doesn't exist" );
        }    
    };
})(jQuery);