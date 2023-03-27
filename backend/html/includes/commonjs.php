<script type="text/javascript" src="<?= $baseurl ?>js/commonJs.js"></script>
<script type="text/javascript" src="<?= $baseurl ?>js/lightslider.min.js"></script>
<!-- <script type="text/javascript" src="<?= $baseurl ?>js/typed.js"></script> -->
<script type="text/javascript" src="<?= $baseurl ?>js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?= $baseurl ?>js/lightgallery-all.min.js"></script>
<script type="text/javascript" src="<?= $baseurl ?>js/isotope.pkgd.min.js"></script>
<script>
  var $grid;
    $(window).on('load', function() {
        // var masonary = setInterval(function() {
        //     $grid = $('.iso_container').isotope({
        //         percentPosition: true,
        //         itemSelector: '.col'
        //     });
        //      clearInterval(masonary);
        // }, 500);
    });
  
  $(document).ready(function() {
        $('.imgGallery').lightGallery({
            thumbnail: true
        });
    });
</script>
<script>
   
    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };

</script>

<!-- Progress Bar Js -->
<script type="text/javascript" src="<?= $baseurl ?>js/circle-progress.js"></script>
<script type="text/javascript">
    $(function() {
        function animateElements() {
            $('.progressbar').each(function() {
                var elementPos = $(this).offset().top;
                var topOfWindow = $(window).scrollTop();
                var percent = $(this).find('.circle').attr('data-percent');
                var percentage = parseInt(percent, 10) / parseInt(100, 10);
                var animate = $(this).data('animate');
                if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                    $(this).data('animate', true);
                    $(this).find('.circle').circleProgress({
                        startAngle: -Math.PI / 2,
                        value: percent / 100,
                        thickness: 10,
                        size: 200,
                        fill: {
                            color: '#016ecf'
                        }
                    }).on('circle-animation-progress', function(event, progress, stepValue) {
                        $(this).find('div').text((stepValue * 100).toFixed(1) + "%");
                    }).stop();
                }
            });
        }
        // Show animated elements
        animateElements();
        $(window).scroll(animateElements);
    });
    function ucfirst(str, force) {
        str = force ? str.toLowerCase() : str;
        return str.replace(/(\b)([a-zA-Z])/,
            function(firstLetter) {
                return firstLetter.toUpperCase();
            });
    }
</script>

<script type="text/javascript" src="<?= $baseurl ?>js/main.js?v=0.1"></script>

