(function($) {
    'use strict';

    function getVideoId(url) {
        if ('false' === url) return false;
        var result = /(?:\?v=|\/embed\/|\.be\/)([-a-z0-9_]+)/i.exec(url) || /^([-a-z0-9_]+)$/i.exec(url);

        return result ? result[1] : false;
    }

    function onPlayerReady(event) {
        if ($(event.target).closest('.mbr-slider').hasClass('in')) {
            event.target.playVideo();
        }
    }

    var isBuilder = $('html').hasClass('is-builder');

    /* get youtube id */
    if (!isBuilder) {
        /* google iframe */
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        //firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var players = [];

        $('.carousel-item.video-container img').css('display','none');

        /* google iframe api init function */
        window.onYouTubeIframeAPIReady = function() {
            var ytp = ytp || {};
            ytp.YTAPIReady || (ytp.YTAPIReady = !0,
                jQuery(document).trigger("YTAPIReady"));

            $('.video-slide').each(function(i) {
                $('.video-container').eq(i).append('<div id ="mbr-video-' + i + '" class="mbr-background-video" data-video-num="' + i + '"></div>')
                    .append('<div class="item-overlay"></div>');
                $(this).attr('data-video-num', i);

                if ($(this).attr('data-video-url').indexOf('vimeo.com') !== -1) {
                    var options = {
                        id: $(this).attr('data-video-url'),
                        width: '100%',
                        height: '100%',
                        loop: true
                    };

                    var player = new Vimeo.Player('mbr-video-' + i, options);

                    player.playVideo = Vimeo.play;
                } else {
                    var player = new YT.Player('mbr-video-' + i, {
                        height: '100%',
                        width: '100%',
                        videoId: getVideoId($(this).attr('data-video-url')),
                        events: {
                            'onReady': onPlayerReady
                        },
                        playerVars: {
                            rel: 0
                        }
                    });
                }

                players.push(player);
            });
        };
    }

    function updateMasonry(event){
        var $section = $(event.target);
        if (typeof $.fn.masonry !== 'undefined') {
            $section.outerFind('.mbr-gallery').each(function() {
                var $msnr = $(this).find('.mbr-gallery-row').masonry({
                    itemSelector: '.mbr-gallery-item:not(.mbr-gallery-item__hided)',
                    percentPosition: true,
                    horizontalOrder: true
                });
                // reload masonry (need for adding new or re-sort items)
                $msnr.masonry('reloadItems');
                $msnr.on('filter', function() {
                    $msnr.masonry('reloadItems');
                    $msnr.masonry('layout');
                    // update parallax backgrounds
                    $(window).trigger('update.parallax');
                }.bind(this, $msnr));
                // layout Masonry after each image loads
                $msnr.imagesLoaded().progress(function() {
                    $msnr.masonry('layout');
                });
            });
        }
    };

    /* Masonry Grid */
    $(document).on('add.cards', function(event) {
        var $section = $(event.target),
            allItem = $section.find('.mbr-gallery-filter-all');
        var filterList = [];
        $section.on('click', '.mbr-gallery-filter li > .btn', function(e) {
            e.preventDefault();
            var $li = $(this).closest('li');

            $li.parent().find('li').removeClass('active');
            $li.addClass('active');

            var $mas = $li.closest('section').find('.mbr-gallery-row');
            var filter = $(this).html().trim();

            $section.find('.mbr-gallery-item').each(function(i, el) {
                var $elem = $(this);
                var tagsAttr = $elem.attr('data-tags');
                var tags = tagsAttr.split(',');

                var tagsTrimmed = tags.map(function(el) {
                    return el.trim();
                });

                if ($.inArray(filter, tagsTrimmed) === -1 && !$li.hasClass('mbr-gallery-filter-all')) {
                    $elem.addClass('mbr-gallery-item__hided');

                    $elem.css('left', '300px');
                } else {
                    $elem.removeClass('mbr-gallery-item__hided');
                }
            });

            $mas.closest('.mbr-gallery-row').trigger('filter');
        });
    })
    $(document).on('add.cards changeParameter.cards', function(event) {
        var $section = $(event.target),
            allItem = $section.find('.mbr-gallery-filter-all');
        var filterList = [];
        $section.find('.mbr-gallery-item').each(function(el) {
            var tagsAttr = ($(this).attr('data-tags') || "").trim();
            var tagsList = tagsAttr.split(',');

            tagsList.map(function(el) {
                var tag = el.trim();

                if ($.inArray(tag, filterList) === -1)
                    filterList.push(tag);
            });
        });

        if ($section.find('.mbr-gallery-filter').length > 0 && $(event.target).find('.mbr-gallery-filter').hasClass('gallery-filter-active')) {
            var filterHtml = '';

            $section.find('.mbr-gallery-filter ul li:not(li:eq(0))').remove();

            filterList.map(function(el) {
                filterHtml += '<li><a class="btn btn-md btn-primary-outline" href>' + el + '</a></li>';
            });
            $section.find('.mbr-gallery-filter ul').append(allItem).append(filterHtml);

        } else {
            $section.find('.mbr-gallery-item__hided').removeClass('mbr-gallery-item__hided');
            $section.find('.mbr-gallery-row').trigger('filter');
        }

        updateMasonry(event);
    });

    $(document).on('change.cards', function(event) {
        updateMasonry(event);
    });

    $('.mbr-gallery-item').on('click', 'a', function(e) {
        e.stopPropagation();
    });

    var timeout2, timeout, flagShowLightBox=false;

    /* Lightbox Fit */
    function styleVideo($carouselItem, wndH, windowPadding, bottomPadding){
        $carouselItem.css({
            'top': windowPadding,
            'height': wndH - 2 * windowPadding - 2 * bottomPadding
        })
    }

    function styleImg($carouselItem, wndH, wndW, windowPadding, bottomPadding){
        var $currentImg = $carouselItem.find('img');

        var setWidth, setTop;
        var lbW = $currentImg[0].naturalWidth;
        var lbH = $currentImg[0].naturalHeight;

         // height change
        if (wndW / wndH > lbW / lbH) {
            var needH = wndH - bottomPadding * 2;
            setWidth = needH * lbW / lbH;
        } else { // width change
            setWidth = wndW - bottomPadding * 2;
        }
        // check for maw width
        setWidth = setWidth >= lbW ? lbW : setWidth;

        // set top to vertical center
        setTop = (wndH - setWidth * lbH / lbW) / 2;

        $currentImg.css({
            width: parseInt(setWidth),
            height: setWidth * lbH / lbW
        });
        $carouselItem.css('top', setTop + windowPadding);
    }

    function timeOutCarousel($lightBox, wndW, wndH, windowPadding, bottomPadding, flagResize){
        var $carouselItems = $lightBox.find('.modal-dialog .carousel-item');

        $carouselItems.each(function() {
            if ((!flagResize && !$(this)[0].classList.contains('carousel-item-next') && !$(this)[0].classList.contains('carousel-item-prev')) || (flagResize && !$(this)[0].classList.contains('active'))){
                if ($(this)[0].classList.contains('video-container')){
                    styleVideo($(this), wndH, windowPadding, bottomPadding);
                }
                else{
                    styleImg($(this), wndH, wndW, windowPadding, bottomPadding);
                }
            }
        });
    }

    function fitLightbox() {
        var windowPadding = 0;
        var bottomPadding = 10;
        var wndW = $(window).width() - windowPadding * 2;
        var wndH = $(window).height() - windowPadding * 2;

        var $lightbox = $('.mbr-gallery .modal');
        if (!$lightbox.length || !flagShowLightBox) {
            return;
        }
        $lightbox.each(function() {
            var $carouselItemActive, flagResize = false;
            if ($(this).find('.modal-dialog .carousel-item.carousel-item-next, .modal-dialog .carousel-item.carousel-item-prev').length){
                $carouselItemActive = $(this).find('.modal-dialog .carousel-item.carousel-item-next, .modal-dialog .carousel-item.carousel-item-prev');
            }
            else{
                $carouselItemActive = $(this).find('.modal-dialog .carousel-item.active');
                flagResize = true;
            }

            if($carouselItemActive[0].classList.contains('video-container')){
                styleVideo($carouselItemActive, wndH, windowPadding, bottomPadding);
            }
            else{
                styleImg($carouselItemActive, wndH, wndW, windowPadding, bottomPadding);
            }

            clearTimeout(timeout);

            timeout = setTimeout( timeOutCarousel, 200, $(this), wndW, wndH, windowPadding, bottomPadding, flagResize);
        });

    }

    /* pause/start video on different events and fit lightbox */
    var $window = $(document).find('.mbr-gallery');

    $window.on('show.bs.modal', function(e) {
        clearTimeout(timeout2);

        timeout2 = setTimeout(function() {
            var index = $(e.relatedTarget).parent().index();
            var slide = $(e.target).find('.carousel-item').eq(index).find('.mbr-background-video');
            $(e.target).find('.carousel-item .mbr-background-video');
            if (slide.length > 0) {
                var player = players[+slide.attr('data-video-num')];
                player.playVideo ? player.playVideo() : player.play();
            }
        }, 500);

        flagShowLightBox = true;

        fitLightbox();

    });

    $window.on('slide.bs.carousel', function(e) {
        var ytv = $(e.target).find('.carousel-item.active .mbr-background-video');
        if (ytv.length > 0) {
            var player = players[+ytv.attr('data-video-num')];
            player.pauseVideo ? player.pauseVideo() : player.pause();
        }
    });

    $(window).on('resize load', fitLightbox);

    $window.on('slid.bs.carousel', function(e) {
        var ytv = $(e.target).find('.carousel-item.active .mbr-background-video');

        if (ytv.length > 0) {
            var player = players[+ytv.attr('data-video-num')];
            player.playVideo ? player.playVideo() : player.play();
        }
        
    });

    $window.on('hide.bs.modal', function(e) {
        players.map(function(player, i) {
            player.pauseVideo ? player.pauseVideo() : player.pause();
        });

        flagShowLightBox = false;
    });
}(jQuery));