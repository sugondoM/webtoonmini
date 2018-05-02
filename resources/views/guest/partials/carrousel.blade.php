<script type="text/javascript">
    jssor_2_slider_init = function() {

        var jssor_2_options = {
          $AutoPlay: 1,
          $AutoPlaySteps: 4,
          $SlideDuration: 160,
          $SlideWidth: 300,
          $SlideHeight: 300,
          $SlideSpacing: 30,
          $FillMode: 5,
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
            $Steps: 4
          },
          $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
          }
        };

        var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_2_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_2_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<style>
    /* jssor slider loading skin spin css */
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }


    .jssorb057 .i {position:absolute;cursor:pointer;}
    .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
    .jssorb057 .i:hover .b {stroke-opacity:.7;}
    .jssorb057 .iav .b {stroke-opacity: 1;}
    .jssorb057 .i.idn {opacity:.3;}

    .jssora073 {display:block;position:absolute;cursor:pointer;}
    .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
    .jssora073:hover {opacity:.8;}
    .jssora073.jssora073dn {opacity:.4;}
    .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
</style>