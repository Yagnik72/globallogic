window.mobilecheck = function() {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};
window.mobileAndTabletcheck = function() {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};
var isMobile = mobilecheck();


/* Russian C++, c++ search only */
jQuery("#by_keyword").blur(function () {
    // On blur event
    var by_keyword = document.getElementById("by_keyword").value.replace(/\s/g); //read input value, and remove "space" by replace \s 
    russianCppSearch(by_keyword);
});
jQuery('#by_keyword').keypress(function (event) {
    // On keypress event ENTER key
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode === 13) {
        var by_keyword = document.getElementById("by_keyword").value.replace(/\s/g); //read input value, and remove "space" by replace \s 
        // Prevent search form submission
        event.preventDefault();
        russianCppSearch(by_keyword);
        // Manually submit the search form
        jQuery(this).parent().parent().parent().submit();
    }
});

function russianCppSearch(by_keyword) {
    var langdic = {
        "Russian": /[\u0400-\u04FF]/
    };
    const keys = Object.entries(langdic);
    var upperCaseCheckRegex = /\p{Lu}/u;
    console.log(by_keyword);
    Object.entries(langdic).forEach(([key, value]) => {  // loop to read all the dictionary items if not true
        if (by_keyword.includes("++") && by_keyword.length === 3 && value.test(by_keyword) === true && key === 'Russian') {   //Check Unicode to see which one is true
            console.log('if');
            console.log(key);
            if (upperCaseCheckRegex.test(by_keyword)) {
                document.getElementById("by_keyword").value = 'C++'; //print language name if unicode true
            } else {
                document.getElementById("by_keyword").value = 'c++'; //print language name if unicode true
            }
        } else {
            console.log('else');
    }
    });
}
/* Russian C++, c++ search only */
jQuery(".toggle-navi").click(function () {
    jQuery("#masthead").toggleClass("open");
});
jQuery(".menu-item-has-children").click(function () {
    jQuery(this).toggleClass("open-submenu");
    // jQuery(".menu-item-has-children").removeClass("open-submenu");
});


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
//    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        document.getElementById("gotoTopBtn").style.display = "block";
    } else {
        document.getElementById("gotoTopBtn").style.display = "none";
    }
    var window_top = $(window).scrollTop();
    var top = $('.footer').offset().top;
    top = top - 500;
    if (window_top > top) {
        $(".top").addClass("addedrelative");
    } else {
        $(".top").removeClass("addedrelative");
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
jQuery(document).on('click', '#gotoTopBtn', function (e) {
    topFunction();
});

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function goSection() {
    try {
        if (document.getElementById('go-section')) {
            $('html, body').animate({
                scrollTop: $('#go-section').offset().top - 50
            }, 'slow');
        }
    } catch (e) {
        console.log("Error: ", e);
    }
}



jQuery(document).ready(function () {

    getInTouch();
    goSection();

    // Mobile Menu - Hamburger Icon event
    if(isMobile){
        // Menu mobile view
        jQuery(".dropdown-toggle").on("click", function (e) {
            if (jQuery(this).parent().hasClass("orange")) {
            jQuery(this).parent().removeClass("orange");
            } else {
            jQuery(".add_my_customize>li").removeClass("orange");
            jQuery(this).parent().addClass("orange");
            }
        });
        jQuery(".toggle-navi").click(function () {
            jQuery(".navbar").toggleClass("open");
            jQuery("header").toggleClass("header-open");
        });
        jQuery(".angle_down_arrow").click(function () {
            if (jQuery(this).parent().hasClass("orange")) {
            jQuery(this).parent().removeClass("orange");
            } else {
            jQuery(".add_my_customize>li").removeClass("orange");
            jQuery(this).parent().addClass("orange");
            jQuery(".nav-country-selector-options").removeClass("show");
            }
        });
        jQuery(".loactionmenu>a").click(function () {
            if (jQuery(window).width() < 991.98) {
            if (jQuery(".nav-country-selector-options").hasClass("show")) {
                jQuery(".nav-country-selector-options").removeClass("show");
                jQuery(".nav-top.fixed-top .add_my_customize > li").removeClass("orange");
            } else {
                jQuery(".nav-country-selector-options").addClass("show");
                jQuery(".nav-top.fixed-top .add_my_customize > li").removeClass("orange");
            }
            }
        });
        if (jQuery(window).width() <= 991) {
            jQuery(".menu-item-has-children a").attr("id", "mobile-nav-list");
            jQuery("ul.dropdown-menu a").removeAttr("id");
            jQuery("a#mobile-nav-list").each(function () {
            jQuery("a#mobile-nav-list")
                .data("href", $(this).attr("href"))
                .removeAttr("href");
            });
        }
    }  
    // Mobile Menu - Hamburger Icon event
    
    // clients_section - common landing page
    if ($('.customer-logos')) {
        $('.customer-logos').slick({
            rows: 2,
            slidesToShow: 5,
            slidesToScroll: 5,
            autoplay: false,
            autoplaySpeed: 1500,
            arrows: true,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
        });
    }

    jQuery(".inner .video-play-icon").click(function () {
        jQuery(".dropdown-menu").removeClass("show");
        jQuery(".dropdown-toggles").removeClass("open");
    });

    if ($('.esg-customer-logos')) {
        $('.esg-customer-logos').slick({
            rows: 1,
            slidesToShow: 4,
            slidesToScroll: 4,
            autoplay: false,
            autoplaySpeed: 1500,
            arrows: true,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
        });
    }




    if ($('.carousel-inner')) {
        $('.carousel-inner').slick({
            rows: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 7000,
            arrows: true,
            dots: true,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }]
        });
    }

    if ($('.carousel-inner-bottom')) {
        var q = $('.carousel-inner-bottom');
        q.slick({
            rows: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 7000,
            arrows: false,
            dots: isMobile ? true : false,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }]
        });
        $('.carousel-bottom .carousel-nav.bottom .prev').click(function () {
            q.slick('slickPrev');
        })

        $('.carousel-bottom .carousel-nav.bottom .next').click(function () {
            q.slick('slickNext');
        });
    }
});




var careerSlick = $('#careerSlick');
if (careerSlick) {
    careerSlick.slick({
        rows: 1,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: isMobile ? true : false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
    });

    $('.careerSlick-box .carousel-nav.bottom .prev').click(function () {
        careerSlick.slick('slickPrev');
    })

    $('.careerSlick-box .carousel-nav.bottom .next').click(function () {
        careerSlick.slick('slickNext');
    });



}

function getInTouch() {
    $(".hero-image a[href^='#'],.img_form_scroll[href^='#']").click(function (e) {
        e.preventDefault();
        var h = 0;
        if ($('header nav').length) {
            h = $('header nav')[0].offsetHeight
        }
        ;
        var position = $('#footer_contact_form').offset().top - h;
        $("body, html").animate({
            scrollTop: position
        }, 0);
    });

}

if (document.getElementById('plfile-placeholder')) {
    var input = document.getElementById('plfile-placeholder');
    var infoArea = document.getElementById('file-upload-filename');
    input.addEventListener('change', showFileName);
}
function showFileName(event) {
    // the change event gives us the input it occurred in 
    var input = event.srcElement;
    if (input.files.length >= 1) {
        var fileName = input.files[0].name;
        infoArea.innerHTML = '<span type="reset" id="plpseudoCancel"><i class="fa fa-close"></i></span>' + fileName;
    } else {
        console.log(input.files.length);
        infoArea.innerHTML = '';
    }
    setTimeout(function () {
        clearFiles()
    }, 1000);
}
function clearFiles() {
    var cancelButton = document.getElementById("plpseudoCancel");
    cancelButton.onclick = function (event) {
        console.log("Pseudo Cancel button clicked.");
        // console.log(input.files);
        //infoArea.textContent = '';
        //input.files[0].name = 'nullfsd';
        $("#file-upload").val(null);
    }
}
