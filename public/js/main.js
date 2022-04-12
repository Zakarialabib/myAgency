"use strict"

$(window).on("load", function() {
    // Animation using ScrollReveal
    // Selecting objects to be animated
    var animatedList1 = '.extra-lg-text, .extra-lg-text span, .lg-text, .lg-text span, .boxy .title, .post-box .title, .post-header .title, .boxy .slg-text';

    var animatedList2 = '.boxy .text li, .boxy .bottom-text .link, .boxy .bottom-text .text';

    var animatedList3 = '.normal-text p, .normal-lg-text p, .clients-logos .logo-holder, .text-box .title, .text-box p, .team-photos, .post-box, .post-header, .post-content';

    var animatedList4 = '.clients-logos .logo-holder, .cr-btn, .footer .contact-info-holder, .few-contact .contact-info-holder, .job-box .title, .job-box .subtitle, .people-box .title, .people-box .subtitle, .post-box .text, .post-header .text, .post-content h1, .post-content p, .social-row .social-link-holder, .project-info h2, .project-imgs .img-holder';

    // Every list will have different animation
    ScrollReveal().reveal(animatedList1,{ duration: 800, distance: '50px', interval: 100});
    ScrollReveal().reveal(animatedList2,{ duration: 800, scale: 0.8, distance: '50px', interval: 50 });
    ScrollReveal().reveal(animatedList3,{ duration: 1000, interval: 100 });
    ScrollReveal().reveal(animatedList4,{ duration: 800, interval: 50 });
    
    // Selecting object to apply classes while scrolling
    var socialMedia = $('.social-media', '.cnav');
    var mouseScroll = $('.mouse-scroll', '.header');
    var header = $('.header');
    var cnav = $('.cnav');

    // After the page loaded check if the window scroll is over 180px and add 'hide' class
    if(window.scrollY>180){
        socialMedia.addClass('hide');
    }else{
        socialMedia.removeClass('hide');
    }

    // After the page loaded check if the window scroll is over 50px and add 'hide' class
    if(window.scrollY>50){
        mouseScroll.addClass('hide');
    }

    // After the page loaded check if the window scroll is over the 'header' height and add 'blend' class
    if(window.scrollY>(header.outerHeight()-cnav.outerHeight())){
        cnav.addClass('blend');
    }else{
        cnav.removeClass('blend');
    }

    // Check and add classes while scrolling for the same last three object
    $(window).on("scroll", function(){
        if(window.scrollY>180){
            socialMedia.addClass('hide');
        }else{
            socialMedia.removeClass('hide');
        }
        if(window.scrollY>50){
            mouseScroll.addClass('hide');
        }
        if(window.scrollY>(header.outerHeight()-cnav.outerHeight())){
            cnav.addClass('blend');
        }else{
            cnav.removeClass('blend');
        }
    });

    // Menu Toggle and animate the link using AnimeJS
    $('.menu-toggle').on('click',function(e){
        $('body').toggleClass('menu-open');
        $('.main-menu').toggleClass('opened');
        $(this).toggleClass('open');
        if($(this).hasClass('open')){
            anime({
                targets: '.main-menu .menu-links ul li a',
                translateY: ['470px', '0'],
                rotate: ['20deg', '0deg'],
                easing: 'cubicBezier(1.000, -0.020, 0.250, 0.750)',
                duration: 300,
                delay: anime.stagger(50)
            });
        }
    });

    // FOLLOW US
    $('.follow-us').on('click', function (e) {
        if ($(".social-media").hasClass("active")) {
        $("body").toggleClass("overflow");
        $(".social-media").removeClass("active");
        $(".social-media").css("transition-delay", "0.5s");
        $(".social-media .layer").css("transition-delay", "0.3s");
        $(".social-media .inner").css("transition-delay", "0s");
        } else {
        $(".social-media").addClass('active');
        $("body").toggleClass("overflow");
        $(".social-media.active").css("transition-delay", "0s");
        $(".social-media.active .layer").css("transition-delay", "0.2s");
        $(".social-media.active .inner").css("transition-delay", "0.7s");
        }

    });

    // Animate the team photos using AnimeJS
    var photosList = $('.team-photos-holder .photo-holder', '.team-photos');
    photosList.clone().appendTo('.team-photos .team-photos-holder');

    var itemNum = $('.team-photos-holder .photo-holder').length;
    var teamPhotosWidth = $('.team-photos-holder .photo-holder').outerWidth(true) * itemNum;

    anime({
        targets: '.team-photos-holder',
        translateX: ['0', '-'+(teamPhotosWidth/2)-18+'px'],
        duration: 50000,
        easing: 'linear',
        loop: true
    });


     //--------------------------------------------------
    // Cursor
    //--------------------------------------------------

    var isMobile = false;
    if (/Android|webOS|iPhone|iPod|iPad|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('html').addClass('touch');
        isMobile = true;
    } else {
        $('html').addClass('no-touch');
        isMobile = false;
    }

    var isMacLike = /(Mac)/i.test(navigator.platform);

    var cursor = {
        delay: 8,
        _x: 0,
        _y: 0,
        endX: (window.innerWidth / 2),
        endY: (window.innerHeight / 2),
        cursorVisible: true,
        cursorEnlarged: false,
        $cursor: document.querySelector('.cursor'),
        $cursor1: document.querySelector('.cursor1'),

        init: function () {
            $('body').css('cursor', 'none');

            // Set up element sizes
            this.cursorSize = this.$cursor.offsetWidth;
            this.cursor1Size = this.$cursor1.offsetWidth;

            this.setupEventListeners();
            this.animateDotOutline();
            this.cursorDrag();
            this.cursorExplore();
            this.cursorZoom();
            this.cursorNext();
            this.cursorPrev();
        },

        setupEventListeners: function () {
            var self = this;

            // Anchor hovering
            Array.prototype.slice.call(document.querySelectorAll('  .zoom-cursor, .hover-target')).forEach(function (el) {
                el.addEventListener('mouseover', function () {
                    self.cursorEnlarged = true;
                    self.toggleCursorSize();
                });
                el.addEventListener('mouseout', function () {
                    self.cursorEnlarged = false;
                    self.toggleCursorSize();
                });
            });

            document.addEventListener('mousemove', function (e) {
                // Show the cursor
                self.cursorVisible = true;
                self.toggleCursorVisibility();

                // Position the dot
                self.endX = e.clientX;
                self.endY = e.clientY;
                self.$cursor.style.top = self.endY + 'px';
                self.$cursor.style.left = self.endX + 'px';
            });

            // Hide/show cursor
            document.addEventListener('mouseenter', function (e) {
                self.cursorVisible = true;
                self.toggleCursorVisibility();
                self.$cursor.style.opacity = 1;
                self.$cursor1.style.opacity = 1;
            });

            document.addEventListener('mouseleave', function (e) {
                self.cursorVisible = true;
                self.toggleCursorVisibility();
                self.$cursor.style.opacity = 0;
                self.$cursor1.style.opacity = 0;
            });
        },

        animateDotOutline: function () {
            var self = this;

            self._x += (self.endX - self._x) / self.delay;
            self._y += (self.endY - self._y) / self.delay;
            self.$cursor1.style.top = self._y + 'px';
            self.$cursor1.style.left = self._x + 'px';

            requestAnimationFrame(this.animateDotOutline.bind(self));
        },

        toggleCursorSize: function () {
            var self = this;

            if (self.cursorEnlarged) {
                self.$cursor1.classList.add('expand');
            } else {
                self.$cursor1.classList.remove('expand');
            }
        },

        toggleCursorVisibility: function () {
            var self = this;

            if (self.cursorVisible) {
                self.$cursor.style.opacity = 1;
                self.$cursor1.style.opacity = 1;
            } else {
                self.$cursor.style.opacity = 0;
                self.$cursor1.style.opacity = 0;
            }
        },

        cursorDrag: function () {
            var self = this;
            $('.cursorDrag').on('mouseenter', function () {
                self.$cursor1.classList.add('drag', 'expand');
            });
            $('.cursorDrag').on('mouseleave', function () {
                self.$cursor1.classList.remove('drag', 'expand');
            });
        },

        cursorExplore: function () {
            var self = this;
            $('.cursorExplore').on('mouseenter', function () {
                self.$cursor1.classList.add('explore');
            });
            $('.cursorExplore').on('mouseleave', function () {
                self.$cursor1.classList.remove('explore');
            });
        },

        cursorZoom: function () {
            var self = this;
            $('.cursorZoom').on('mouseenter', function () {
                self.$cursor1.classList.add('zoom');
            });
            $('.cursorZoom').on('mouseleave', function () {
                self.$cursor1.classList.remove('zoom');
            });
        },

        cursorNext: function () {
            var self = this;
            $('.cursorNext').on('mouseenter', function () {
                self.$cursor1.classList.add('next');
            });
            $('.cursorNext').on('mouseleave', function () {
                self.$cursor1.classList.remove('next');
            });
        },

        cursorPrev: function () {
            var self = this;
            $('.cursorPrev').on('mouseenter', function () {
                self.$cursor1.classList.add('prev');
            });
            $('.cursorPrev').on('mouseleave', function () {
                self.$cursor1.classList.remove('prev');
            });
        }
    }

    if (!isMobile) {
        cursor.init(); //Init custom cursor
    }

});


