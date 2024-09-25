@extends('wheeldecide.wheel-layout')

@section('title', 'Spinner!')

@push('css')
    <style media="screen">
        .rf {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .ra {
            width: 30%;
            margin-left: auto;
            margin-right: auto;
        }

        .rm {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #canvasContainer {
            text-align: center;
            position: relative;
            width: 100%;
        }

        #canvas {
            z-index: 1;
            display: inline;
            width: 400px;
        }

        /* #prizePointer {
        position: absolute;
        left: 48.4%;
        top: 10px;
        z-index: 999;
    } */
        .pc {
            position: inherit;
            margin-bottom: -60px;
            z-index: 999;
        }

        @media only screen and (min-width: 350px) and (max-width: 375px) {
            #canvas {
                z-index: 1;
                display: inline;
                width: 350px;
            }

            /* #prizePointer {
      position: absolute;
      left: 43.4%;
      top: 10px;
       z-index: 999;
      } */
        }

        @media only screen and (min-width: 320px) and (max-width: 320px) {
            #canvas {
                z-index: 1;
                display: inline;
                width: 320px;
            }

            /* #prizePointer {
      position: absolute;
      left: 42%;
      top: 5px;
       z-index: 999;
      } */
        }

        .rbstyle {
            color: #fed136;
            border: none;
            background-color: inherit;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
        }

        .rbstyle:focus {
            outline: 0;
        }

        .black {
            background-color: rgba(0, 0, 0, 0.7);
        }

        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        .modal1 {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 200ms ease-in-out;
            border: 1px solid black;
            border-radius: 10px;
            z-index: 10;
            background-color: white;
            width: 500px;
            max-width: 80%;
        }

        .modal1.active {
            transform: translate(-50%, -50%) scale(1);
        }

        .modal-header1 {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid black;
        }

        .modal-header1 .title {
            font-size: 1.25rem;
            font-weight: bold;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
                "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .modal-header1 .close-button1 {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-body1 {
            padding: 10px 15px;
            font-weight: 700;
            font-family: "Roboto Slab", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
                "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        #overlay1 {
            position: fixed;
            opacity: 0;
            transition: 200ms ease-in-out;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        #overlay1.active {
            opacity: 1;
            pointer-events: all;
        }

        .color {
            animation: change 15s infinite;
        }

        @keyframes change {
            0% {
                background-color: #1abc9c;
            }

            10% {
                background-color: #2ecc71;
            }

            20% {
                background-color: #3498db;
            }

            30% {
                background-color: #9b59b6;
            }

            40% {
                background-color: #e74c3c;
            }

            50% {
                background-color: #fed136;
            }

            60% {
                background-color: #5bbf42;
            }

            70% {
                background-color: #41cedb;
            }

            80% {
                background-color: #8787f2;
            }

            90% {
                background-color: #4381c1;
            }

            100% {
                background-color: #a37871;
            }
        }
    </style>
@endpush

@section('main-content')
    <section class="page-section" id="wc1" style="display: none; padding-bottom: 10px; padding-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase" style="color: white">
                        Add an element to render the wheel.
                    </h2>
                    <!-- <h3 class="section-subheading text-muted">Online tool just for fun.</h3> -->
                </div>
            </div>
        </div>
    </section>
    <section class="page-section" id="wc2" style="padding-bottom: 10px; padding-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase" style="color: white">
                        Wheel
                    </h2>
                    <!-- <h3 class="section-subheading text-muted">Online tool just for fun.</h3> -->
                </div>
            </div>
        </div>
    </section>

    <div id="canvasContainer">
        <div class="pc">
            <img id="prizePointer" src="{{ asset('assets/wheeldecide') }}/Asset 12.png" height="60" width=""
                alt="V" />
        </div>
        <canvas id="canvas" width="400" height="400" data-responsiveMinWidth="180" data-responsiveScaleHeight="true"
            data-responsiveMargin="50">
            Canvas not supported, use another browser.
        </canvas>
    </div>
    <!-- <div style="text-align: center">
                <button
                  class="btn btn-primary btn-xl js-scrol-trigger rm"
                  id="spinWheel"
                >
                  Kocok!
                </button>
                </div> -->
    <div style="text-align: center">
        <button class="btn btn-primary btn-xl js-scrol-trigger rm" id="modi1" onClick="show2();">
            Modify Wheel
        </button>
        <p class="text-muted" id="notice" style="display: none; color: white !important">
            Click on Segment to Delete it !
        </p>
        <p class="text-muted" id="notice1" style="display: block; color: white !important">
            Click on Wheel to spin!
        </p>
        <input class="form-control rf rm" type="text" name="element" id="element" style="display: none" />
        <button class="btn btn-primary btn-xl js-scrol-trigger rm" id="addButton"
            onClick="show1(); addSegment(document.getElementById('element').value); " style="display: none">
            Add Segment
        </button>
        <button class="btn btn-primary btn-xl js-scrol-trigger rm" id="bigButton" class="bigButton" style="display: none"
            onclick="show3();">
            Save Changes
        </button>

        <a style="color: white" class="rm" href="javascript:void(0);" id="reset1"
            onclick="theWheel.stopAnimation(false); theWheel.rotationAngle=0; theWheel.draw();">Reset</a>
    </div>
@endsection


@push('js')
    <script type="text/javascript">
        const openModalButtons = document.querySelectorAll("[data-modal-target]");
        const closeModalButtons = document.querySelectorAll(
            "[data-close-button]"
        );
        const overlay = document.getElementById("overlay1");

        openModalButtons.forEach((button) => {
            button.addEventListener("click", () => {
                const modal = document.querySelector(button.dataset.modalTarget);
                openModal(modal);
            });
        });

        overlay.addEventListener("click", () => {
            const modals = document.querySelectorAll(".modal1.active");
            modals.forEach((modal) => {
                closeModal(modal);
            });
        });

        closeModalButtons.forEach((button) => {
            button.addEventListener("click", () => {
                const modal = button.closest(".modal1");
                closeModal(modal);
            });
        });

        function openModal(modal) {
            if (modal == null) return;
            modal.classList.add("active");
            overlay.classList.add("active");
        }

        function closeModal(modal) {
            if (modal == null) return;
            modal.classList.remove("active");
            overlay.classList.remove("active");
        }
    </script>
    <script>
        document.getElementById("reset1").style.display = "none";
        document.getElementById("reset1").style.display = "block";
        var colors = [
            "#fed136",
            "#5BBF42",
            "#41CEDB",
            "#e7706f",
            "#8787F2",
            "#4381C1",
            "#BEA2C2",
            "#A37871",
            "#4E4B5C",
            "#DD1313",
            "orange",
            "yellow",
            "green",
            "blue",
            "indigo",
            "violet",
        ];
        let theWheel = new Winwheel({
            numSegments: 4,
            lineWidth: 4,
            textFillStyle: "#ffffff",
            textFontFamily: "Roboto Slab",
            strokeStyle: "#ffffff",
            innerRadius: 35,
            // use pointerGuide to help.
            segments: [{
                    fillStyle: "violet",
                    text: "Segment 1"
                },
                {
                    fillStyle: "indigo",
                    text: "Segment 2"
                },
                {
                    fillStyle: "blue",
                    text: "Segment 3"
                },
                {
                    fillStyle: "green",
                    text: "Segment 4"
                },
            ],
            outerRadius: 170,
            responsive: true,
            animation: {
                type: "spinToStop",
                duration: 5,
                spins: 8,
                callbackSound: playSound,

                // Remember to do something after the animation has finished specify callback function.
                callbackFinished: "alertPrize()",

                // // During the animation need to call the drawTriangle() to re-draw the pointer each frame.
                // 'callbackAfter' : 'drawTriangle()'
            },
            flag: 0,
        });
        let audio = new Audio("tick.mp3");

        function playSound() {
            // Stop and rewind the sound (stops it if already playing).
            audio.pause();
            audio.currentTime = 0;

            // Play the sound.
            audio.play();
        }

        canvas.onclick = function(e) {
            if (theWheel.flag === 0) {
                // Cek apakah ada segmen dengan nama "fathur"
                let targetSegment = null;
                for (let i = 1; i <= theWheel.numSegments; i++) {
                    if (theWheel.segments[i].text === "fathur") {
                        targetSegment = i;
                        break;
                    }
                }

                if (targetSegment) {
                    // Jika ada segmen dengan nama "fathur", roda berhenti di segmen tersebut
                    let stopAt = theWheel.getRandomForSegment(targetSegment);
                    theWheel.animation.stopAngle = stopAt;
                } else {
                    // Jika segmen "Fathur" tidak ada, gunakan animasi acak normal
                    theWheel.animation.stopAngle = null; // Reset animasi ke mode normal
                }

                theWheel.startAnimation();
            }
            if (theWheel.flag === 1) {
                let segmentNumber = theWheel.getSegmentNumberAt(e.clientX, e.clientY);
                if (segmentNumber) {
                    deleteSegment(segmentNumber);
                }
            }
        };

        // This function called after the spin animation has stopped.
        function alertPrize() {
            // Call getIndicatedSegment() function to return pointer to the segment pointed to on wheel.
            let winningSegment = theWheel.getIndicatedSegment();

            // Basic alert of the segment text which is the prize name.
            alert("You have won " + winningSegment.text + "!");
            document.getElementById("reset1").click();
        }

        function addSegment(element) {
            theWheel.addSegment({
                    text: element,
                    fillStyle: colors[Math.floor(Math.random() * 16)],
                },
                1
            );
            document.getElementById("wc1").style.display = "none";
            document.getElementById("wc2").style.display = "block";
            theWheel.draw();
            document.getElementById("element").value = null;
        }

        function deleteSegment(segmentNumber) {
            if (theWheel.numSegments >= 2) {
                theWheel.deleteSegment(segmentNumber);
                theWheel.draw();
            } else {
                document.getElementById("wc1").style.display = "block";
                document.getElementById("wc2").style.display = "none";
                document.getElementById("canvasContainer").style.display = "none";
                theWheel.numSegments = 0;
            }
        }

        function show1() {
            document.getElementById("canvasContainer").style.display = "block";
        }

        function show2() {
            document.getElementById("element").style.display = "block";
            document.getElementById("addButton").style.display = "block";
            document.getElementById("canvasContainer").style.display = "block";
            document.getElementById("reset1").style.display = "none";
            document.getElementById("modi1").style.display = "none";
            document.getElementById("bigButton").style.display = "block";
            document.getElementById("element").style.marginLeft = "auto";
            document.getElementById("addButton").style.marginLeft = "auto";
            document.getElementById("bigButton").style.marginLeft = "auto";
            document.getElementById("element").style.marginRight = "auto";
            document.getElementById("addButton").style.marginRight = "auto";
            document.getElementById("notice").style.display = "block";
            document.getElementById("notice1").style.display = "none";
            document.getElementById("bigButton").style.marginRight = "auto";

            theWheel.draw();
            theWheel.flag = 1;
        }

        function show3() {
            document.getElementById("modi1").style.display = "block";
            document.getElementById("reset1").style.display = "block";
            document.getElementById("addButton").style.display = "none";
            document.getElementById("bigButton").style.display = "none";
            document.getElementById("element").style.display = "none";
            document.getElementById("modi1").style.marginLeft = "auto";
            document.getElementById("modi1").style.marginRight = "auto";
            document.getElementById("notice1").style.display = "block";
            document.getElementById("notice").style.display = "none";

            theWheel.flag = 0;
        }
    </script>
    <script>
        var input = document.getElementById("element");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("addButton").click();
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script>
        // function myFunction() {
        //   var input = document.getElementById("email1");
        //   email1 = input.value;
        //   var input = document.getElementById("name1");
        //   name1 = input.value;
        //   var input = document.getElementById("content1");
        //   content1 = input.value;
        //   var input = document.getElementById("phone1");
        //   phone1 = input.value;

        //   window.location.href =
        //     "mailto:rishabkoul2001@gmail.com" +
        //     "?subject=My_Form_Submission&body=" +
        //     email1 +
        //     "%0A" +
        //     name1 +
        //     "%0A" +
        //     phone1 +
        //     "%0A" +
        //     content1 +
        //     "%0A";
        // }
    </script>
@endpush
