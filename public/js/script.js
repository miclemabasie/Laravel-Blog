(function (window, document, $) {
    "use strict";

    $(window).on('load', function () {

    });

    /* On resize */
    $(window).on('resize', function () {
    });

    /* On scroll */
    $(window).on('scroll', function () {
        //Show or Hide back to top button
        if ($(window).scrollTop() >= 180) {
            $('#scroll-top').addClass('scroll-top-shown');
        } else {
            $('#scroll-top').removeClass('scroll-top-shown');
        }
    });

    $(document).ready(function($) {
        $("#menu-bar").sticky();
        $('#menu-bar .menu').slicknav({prependTo: '#menu-mobile', label: 'Menu', allowParentLinks: true});

        //scrolling
        var offset = $('.main-nav').attr('data-offset');
        var anchor_offset = $('#anchor').attr('data-offset');
        if ($('.main-nav').length > 0) $('.main-nav').singlePageNav({ 'offset': offset, 'filter': '.onepage' });
        if ($('#anchor, .anchor').length > 0) $('#anchor, .anchor').singlePageNav({ 'offset': anchor_offset, 'filter': '.onepage' });

        if (($("body, html").scrollTop() == 0) && ($(".main-nav .onepage").length > 0)) {
            $('.main-nav').find('li').children('a').removeClass('current');
            $('.main-nav').children('li').first().children('a').addClass('current');
        }

        //Toggle Accordion
        $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function(e) {
            var $target = $(e.target)
            if (e.type == 'show')
                $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
            if (e.type == 'hide')
                $target.prev('.accordion-heading').find('.accordion-toggle').removeClass('active');
        });

        //fitvids
        if ($('.media').length > 0) $('.media').fitVids();

        //Popup Magnific
        popupContent();

        //blog slick slider
        BlogSlickSlider();


        //scroll to top
        $('body').on('click', '#scroll-top', function() {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        // Masonry
        $('.grid').masonry({
            // options
        });
    });

})(window, document, jQuery);

/*=================================================================
 check screen size
 ===================================================================*/
function popupContent(){
    /**
     * Popup
     */
    $('[data-init="magnificPopup"]').each(function(index, el) {
        var $el = $(this);

        var magnificPopupDefault = {
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function() {
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
            midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        }

        // Merge settings.
        var settings = $.extend(true, magnificPopupDefault, $el.data('options'));

        $el.magnificPopup(settings);
    });

    //Gallery
    if ($(".gallery-item").length > 0) {
        $('.gallery-item').magnificPopup({
            gallery: {
                enabled: true
            }
        });
    }

    if($(".quick-view").length > 0) {
        $('.quick-view').magnificPopup({
            type: 'ajax'
        });
    }

    $('.popup-youtube').magnificPopup({
        type: 'iframe'
    });
}

/*=================================================================
 blog slick slider
 ===================================================================*/

function BlogSlickSlider(){
    if($(".blog-slick-slider").length > 0) {
        $('.blog-slick-slider').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            prevArrow: '<button type="button" class="slick-prev mdi-chevron-left"></button>',
            nextArrow: '<button type="button" class="slick-next mdi-chevron-right"></button>',
            responsive: [
                {
                    breakpoint: 1080,
                    settings: {
                        centerMode: true,
                        centerPadding: '0px',
                        dots: !1,
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: !0
                    }
                },
                {
                    breakpoint: 920,
                    settings: {
                        centerMode: !1,
                        dots: !1,
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: !0
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerMode: true,
                        centerPadding: '0px',
                        dots: !1,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: !0
                    }
                }
            ]
        });
    }

    if($(".media-slider").length > 0) {
        $('.media-slider').slick({
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            prevArrow: '<button type="button" class="slick-prev mdi-chevron-left"></button>',
            nextArrow: '<button type="button" class="slick-next mdi-chevron-right"></button>'
        });
    }
}

/*=================================================================
 owl carousel
 ===================================================================*/


/*=================================================================
                     Menu Sticky
 ===================================================================*/

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
}(function ($) {
    var slice = Array.prototype.slice;
    var splice = Array.prototype.splice;
    var defaults = {
        topSpacing: 0,
        bottomSpacing: 0,
        className: 'is-sticky',
        wrapperClassName: 'sticky-wrapper',
        center: false,
        getWidthFrom: '',
        widthFromWrapper: true,
        responsiveWidth: false
    }, $window = $(window), $document = $(document), sticked = [], windowHeight = $window.height(), scroller = function () {
        var scrollTop = $window.scrollTop(), documentHeight = $document.height(), dwh = documentHeight - windowHeight, extra = (scrollTop > dwh) ? dwh - scrollTop : 0;
        for (var i = 0, l = sticked.length; i < l; i++) {
            var s = sticked[i], elementTop = s.stickyWrapper.offset().top, etse = elementTop - s.topSpacing - extra;
            s.stickyWrapper.css('height', s.stickyElement.outerHeight());
            if (scrollTop <= etse) {
                if (s.currentTop !== null) {
                    s.stickyElement.css({'width': '', 'position': '', 'top': ''});
                    s.stickyElement.parent().removeClass(s.className);
                    s.stickyElement.trigger('sticky-end', [s]);
                    s.currentTop = null;
                }
            }
            else {
                var newTop = documentHeight - s.stickyElement.outerHeight()
                    - s.topSpacing - s.bottomSpacing - scrollTop - extra;
                if (newTop < 0) {
                    newTop = newTop + s.topSpacing;
                } else {
                    newTop = s.topSpacing;
                }
                if (s.currentTop !== newTop) {
                    var newWidth;
                    if (s.getWidthFrom) {
                        newWidth = $(s.getWidthFrom).width() || null;
                    } else if (s.widthFromWrapper) {
                        newWidth = s.stickyWrapper.width();
                    }
                    if (newWidth == null) {
                        newWidth = s.stickyElement.width();
                    }
                    s.stickyElement.css('width', newWidth).css('position', 'fixed').css('top', newTop);
                    s.stickyElement.parent().addClass(s.className);
                    if (s.currentTop === null) {
                        s.stickyElement.trigger('sticky-start', [s]);
                    } else {
                        s.stickyElement.trigger('sticky-update', [s]);
                    }
                    if (s.currentTop === s.topSpacing && s.currentTop > newTop || s.currentTop === null && newTop < s.topSpacing) {
                        s.stickyElement.trigger('sticky-bottom-reached', [s]);
                    } else if (s.currentTop !== null && newTop === s.topSpacing && s.currentTop < newTop) {
                        s.stickyElement.trigger('sticky-bottom-unreached', [s]);
                    }
                    s.currentTop = newTop;
                }
                var stickyWrapperContainer = s.stickyWrapper.parent();
                var unstick = (s.stickyElement.offset().top + s.stickyElement.outerHeight() >= stickyWrapperContainer.offset().top + stickyWrapperContainer.outerHeight()) && (s.stickyElement.offset().top <= s.topSpacing);
                if (unstick) {
                    s.stickyElement.css('position', 'absolute').css('top', '').css('bottom', 0);
                } else {
                    s.stickyElement.css('position', 'fixed').css('top', newTop).css('bottom', '');
                }
            }
        }
    }, resizer = function () {
        windowHeight = $window.height();
        for (var i = 0, l = sticked.length; i < l; i++) {
            var s = sticked[i];
            var newWidth = null;
            if (s.getWidthFrom) {
                if (s.responsiveWidth) {
                    newWidth = $(s.getWidthFrom).width();
                }
            } else if (s.widthFromWrapper) {
                newWidth = s.stickyWrapper.width();
            }
            if (newWidth != null) {
                s.stickyElement.css('width', newWidth);
            }
        }
    }, methods = {
        init: function (options) {
            var o = $.extend({}, defaults, options);
            return this.each(function () {
                var stickyElement = $(this);
                var stickyId = stickyElement.attr('id');
                var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;
                var wrapper = $('<div></div>').attr('id', wrapperId).addClass(o.wrapperClassName);
                stickyElement.wrapAll(wrapper);
                var stickyWrapper = stickyElement.parent();
                if (o.center) {
                    stickyWrapper.css({width: stickyElement.outerWidth(), marginLeft: "auto", marginRight: "auto"});
                }
                if (stickyElement.css("float") === "right") {
                    stickyElement.css({"float": "none"}).parent().css({"float": "right"});
                }
                o.stickyElement = stickyElement;
                o.stickyWrapper = stickyWrapper;
                o.currentTop = null;
                sticked.push(o);
                methods.setWrapperHeight(this);
                methods.setupChangeListeners(this);
            });
        }, setWrapperHeight: function (stickyElement) {
            var element = $(stickyElement);
            var stickyWrapper = element.parent();
            if (stickyWrapper) {
                stickyWrapper.css('height', element.outerHeight());
            }
        }, setupChangeListeners: function (stickyElement) {
            if (window.MutationObserver) {
                var mutationObserver = new window.MutationObserver(function (mutations) {
                    if (mutations[0].addedNodes.length || mutations[0].removedNodes.length) {
                        methods.setWrapperHeight(stickyElement);
                    }
                });
                mutationObserver.observe(stickyElement, {subtree: true, childList: true});
            } else {
                stickyElement.addEventListener('DOMNodeInserted', function () {
                    methods.setWrapperHeight(stickyElement);
                }, false);
                stickyElement.addEventListener('DOMNodeRemoved', function () {
                    methods.setWrapperHeight(stickyElement);
                }, false);
            }
        }, update: scroller, unstick: function (options) {
            return this.each(function () {
                var that = this;
                var unstickyElement = $(that);
                var removeIdx = -1;
                var i = sticked.length;
                while (i-- > 0) {
                    if (sticked[i].stickyElement.get(0) === that) {
                        splice.call(sticked, i, 1);
                        removeIdx = i;
                    }
                }
                if (removeIdx !== -1) {
                    unstickyElement.unwrap();
                    unstickyElement.css({'width': '', 'position': '', 'top': '', 'float': ''});
                }
            });
        }
    };
    if (window.addEventListener) {
        window.addEventListener('scroll', scroller, false);
        window.addEventListener('resize', resizer, false);
    } else if (window.attachEvent) {
        window.attachEvent('onscroll', scroller);
        window.attachEvent('onresize', resizer);
    }
    $.fn.sticky = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.sticky');
        }
    };
    $.fn.unstick = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.unstick.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.sticky');
        }
    };
    $(function () {
        setTimeout(scroller, 0);
    });
}));