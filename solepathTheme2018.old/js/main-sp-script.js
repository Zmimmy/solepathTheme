!function ($) {
    "use strict";
    $(document).ready(function () {


        var mX,
            redrawing = false,
            $intuitive = $('.intuitive-white'),
            $compassionate = $('.compassionate-black'),
            $charismatic = $('.charismatic-red'),
            $intellectual = $('.intellectual-purple'),
            $spiritual = $('.spiritual-blue'),
            $inspirational = $('.inspirational-green'),
            lastMove = 0;


        var headerElem = document.getElementById('masthead');
        //headerElem.addEventListener('mousemove', findOurDistances, {passive: true});

        function findOurDistances(event) {
            if (Date.now() - lastMove > 15) {
                // if (redrawing) {
                //     return;
                // }
                // redrawing = true;
                mX = event.pageX;
                var distances = {};

                distances.intuitive = calculateXDistance($intuitive, mX);
                distances.compassionate = calculateXDistance($compassionate, mX);
                distances.charismatic = calculateXDistance($charismatic, mX);
                distances.intellectual = calculateXDistance($intellectual, mX);
                distances.spiritual = calculateXDistance($spiritual, mX);
                distances.inspirational = calculateXDistance($inspirational, mX);

                // hide and redraw
                $('#solepath-rainbow').hide();
                updateWidth($intuitive, getWidthAdjust(distances.intuitive));
                updateWidth($compassionate, getWidthAdjust(distances.compassionate));
                updateWidth($charismatic, getWidthAdjust(distances.charismatic));
                updateWidth($intellectual, getWidthAdjust(distances.intellectual));
                updateWidth($spiritual, getWidthAdjust(distances.spiritual));
                updateWidth($inspirational, getWidthAdjust(distances.inspirational));
                $('#solepath-rainbow').show();
                // redrawing = false;
            }
            lastMove = Date.now();
        }

    });


    function updateWidth(elem, widthAdjust) {
        var newWidth = 10 + widthAdjust;
        elem.width(newWidth);
        if (newWidth > 30) {
            elem.find('h1').show();
        } else {
            elem.find('h1').hide();
        }
    }

    function getWidthAdjust(distance) {
        var widthAdjust = 0;
        if (distance <= 50) {
            if (distance > 0) {
                widthAdjust = 51 - distance;
            } else {
                widthAdjust = 51 + distance;
                if (widthAdjust < 0) {
                    widthAdjust = 0;
                }
            }
        }
        return widthAdjust;
    }

    function calculateXDistance(elem, mouseX) {
        return elem.offset().left - mouseX;
    }

}(jQuery);