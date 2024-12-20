﻿//[custom Javascript]
//Project:	Compass - Responsive Bootstrap 4 Template
//Version:  1.0
//Last change:  15/12/2017
//Primary use:	Compass - Responsive Bootstrap 4 Template
//should be included in all pages. It controls some layout
$(function() {
    "use strict";
    initSparkline();
    Jknob();
    initCounters();
});

//======
function initSparkline() {
    $(".sparkline").each(function() {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}
//Widgets count plugin
function initCounters() {
    $('.count-to').countTo();
}
//======
function Jknob() {
    $('.knob').knob({
        draw: function() {
            // "tron" case
            if (this.$.data('skin') == 'tron') {

                var a = this.angle(this.cv) // Angle
                    ,
                    sa = this.startAngle // Previous start angle
                    ,
                    sat = this.startAngle // Start angle
                    ,
                    ea // Previous end angle
                    , eat = sat + a // End angle
                    ,
                    r = true;

                this.g.lineWidth = this.lineWidth;

                this.o.cursor &&
                    (sat = eat - 0.3) &&
                    (eat = eat + 0.3);

                if (this.o.displayPrevious) {
                    ea = this.startAngle + this.angle(this.value);
                    this.o.cursor &&
                        (sa = ea - 0.3) &&
                        (ea = ea + 0.3);
                    this.g.beginPath();
                    this.g.strokeStyle = this.previousColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });
}
//======
$(window).on('scroll',function() {
    $('.card .sparkline').each(function() {
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 400) {
            $(this).addClass("pullUp");
        }
    });
});

//======
$(".dial1").knob();
$({
    animatedVal: 0
}).animate({
    animatedVal: 66
}, {
    duration: 3000,
    easing: "swing",
    step: function() {
        $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial2").knob();
$({
    animatedVal: 0
}).animate({
    animatedVal: 26
}, {
    duration: 3800,
    easing: "swing",
    step: function() {
        $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial3").knob();
$({
    animatedVal: 0
}).animate({
    animatedVal: 76
}, {
    duration: 3200,
    easing: "swing",
    step: function() {
        $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial4").knob();
$({
    animatedVal: 0
}).animate({
    animatedVal: 88
}, {
    duration: 3500,
    easing: "swing",
    step: function() {
        $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});

//======
$(function() {
    $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#999',                
                stroke: 'none',
            },
            hover: {
                fill: '#49cdd0',
                cursor: 'pointer'
            },
            selected: {
                fill: 'yellow'
            },
            selectedHover: {}
        },
        markerStyle: {
            initial: {
                fill: '#49cdd0',
                stroke: '#fff '
            }
        },
        markers: [{
                latLng: [37.09, -95.71],
                name: 'America'
            },
            {
                latLng: [51.16, 10.45],
                name: 'Germany'
            },
            {
                latLng: [-25.27, 133.77],
                name: 'Australia'
            },
            {
                latLng: [56.13, -106.34],
                name: 'Canada'
            },
            {
                latLng: [20.59, 78.96],
                name: 'India'
            },
            {
                latLng: [55.37, -3.43],
                name: 'United Kingdom'
            },
        ]
    });
});
//======
// Customized line Index page
$('#linecustom1').sparkline('html',
{
	height: '35px', width: '100%', lineColor: '#e5d1e4', fillColor: '#f3e8f2',
	minSpotColor: true, maxSpotColor: true, spotColor: '#e2a8df', spotRadius: 1
});

$('#linecustom2').sparkline('html',
{
	height: '35px', width: '100%', lineColor: '#c9e3f4', fillColor: '#dfeefa',
	minSpotColor: true, maxSpotColor: true, spotColor: '#8dbfe0', spotRadius: 1
});

$('#linecustom3').sparkline('html',
{	
	height: '35px', width: '100%', lineColor: '#efded3', fillColor: '#f8f0ea',
	minSpotColor: true, maxSpotColor: true, spotColor: '#e0b89d', spotRadius: 1
});

$('#linecustom4').sparkline('html',
{	
	height: '35px', width: '100%', lineColor: '#c9e3f4', fillColor: '#dfeefa',
	minSpotColor: true, maxSpotColor: true, spotColor: '#e2b8ee', spotRadius: 1
});

$('#linecustom5').sparkline('html',
{	
	height: '35px', width: '100%', lineColor: '#efda33', fillColor: '#f8f0ea',
	minSpotColor: true, maxSpotColor: true, spotColor: '#e0b87c', spotRadius: 1
});

$('#linecustom6').sparkline('html',
{	
	height: '35px', width: '100%', lineColor: '#efda33', fillColor: '#f8f0ea',
	minSpotColor: true, maxSpotColor: true, spotColor: '#e0b87c', spotRadius: 1
});
