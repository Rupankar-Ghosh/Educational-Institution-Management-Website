<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituition</title>
    <style>
        @font-face {
            font-family: hello;
            src: url(fonts/HvDTrial_Brandon_Grotesque_black-BF64a625c944b08.otf);
        }

        * {
            padding: 0px;
            margin: 0px;
            font-size: large;
            /* font-family: Georgia, 'Times New Roman', Times, serif; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* font-family: "hello" , sans-serif; */
        }

        .nav_ul {
            display: flex;
            justify-content: space-between;
            justify-items: center;
        }

        ul {
            list-style: none;
            background-color: #e5d4ff;

        }

        ul li {
            display: inline-flex;
            padding: 15px;
        }

        ul li:hover {
            background-color: #A594F9;
            color: rgb(255, 255, 255);
        }

        a {
            text-decoration: none;
            color: #000;
        }

        a:hover {
            color: white;
        }

        .n:hover {
            background-color: #F5EFFF;
            color: #000;
        }

        .dropdown {
            display: none;
        }

        ul li:hover .dropdown {
            display: block;
            position: absolute;
            margin-left: -15px;
            margin-top: 39px;
        }

        .dropdown ul li {
            display: block;
            color: #000;
        }

        .dropdown ul {
            margin: 0px;
            padding: 0px;
        }

        #start {
            /* margin-left: 650px; */
        }

        .nav {
            box-shadow: 3px 3px 2px rgba(217, 88, 246, 0.3);

            position: absolute;
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            z-index: 1;
        }

        img {
            height: 500px;
            width: 1000px;
        }

        .second {
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #a594f98c;
        }

        .slider {
            width: 100%;
            height: 500px;
            border-radius: 10px;
            overflow: hidden;

        }

        .slides {
            width: 500%;
            height: 30px;
            display: flex;
        }

        .slides input {
            display: none;
        }

        .slide {
            width: 20%;
            transition: 2s;
        }

        .slide img {
            width: 100%;
            height: 500px;
        }

        .navigation-manual {
            position: absolute;
            width: 100%;
            margin-top: 430px;
            display: flex;
            justify-content: center;
        }

        .manual-btn {
            border: 2px solid rgb(217, 88, 246);
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }

        .manual-btn:not(:last-child) {
            margin-right: 40px;
        }

        .manual-btn:hover {
            background: rgb(246, 88, 88);
        }


        #radio1:checked~.first {
            margin-left: 0;
        }

        #radio2:checked~.first {
            margin-left: -20%;
        }

        #radio3:checked~.first {
            margin-left: -40%;
        }

        #radio4:checked~.first {
            margin-left: -60%;
        }


        #catagory {
            margin-top: 6px;
            background: linear-gradient(45deg, #E5D9F2, #F5EFFF, #dcd3ff, #d8cfff);
            background-size: 300% 300%;

            height: 130px;
            width: 100%;
            display: flex;
            text-align: center;
            justify-content: space-around;
            box-shadow: #fff;
            margin-top: 2px;
        }

        @keyframes color {
            0% {
                background-position: 0 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0 50%;
            }
        }

        .aa {
            margin-top: 5px;
            padding-top: 25px;
            /* border: solid white; */
            height: 100%;
            width: 250px;
            font-size: 22px;
        }

        .bb {
            color: #b700ff;
            font-size: larger;
        }

        .aa:hover {
            transform: scale(1.2);
        }

        h2 {
            padding-top: 20px;
            text-align: center;
            font-size: 50px;
            color: #510e70;
        }

        .about {
            background-color: #ffffff;
            margin-top: 40px;
        }

        #aboutp1 {
            margin-top: -15px;
            padding-left: 120px;
            padding-right: 120px;
        }

        /* .about:hover{
    background-color: #f3ebff8f;
} */
        .aboutparts {
            padding: 10px;
            height: 100px;
            margin-top: 20px;
            margin-left: 120px;
            margin-right: 120px;
            background-color: #f8e9ff;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            border-radius: 50px;
        }

        .part {
            background-color: #f5ddff;
            height: 30px;
            width: 100px;
            text-align: center;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
        }

        .part:hover {
            background-color: #f0caff;
            color: #491263;
            box-shadow: 6px 6px 10px -1px rgba(194, 147, 255, 0.639),
                -6px -6px 10px -1px rgb(255, 255, 255);
        }

        .a1 {
            display: inline;
            font-size: 50px;
            color: #7400aa;
        }

        .course {
            background-color: #ffffff;
            margin-top: 0px;
        }

        .courseItems {
            margin-top: 25px;
            margin-left: 120px;
            margin-right: 120px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            border-radius: 10px;
            padding-bottom: 20px;
        }

        .citems {
            display: inline-flex;
            height: 150px;
            width: 180px;
            background-color: #f9e2ff;
            padding: 10px;
            display: flex;
            justify-content: center;
            border-radius: 40px;
        }

        .its:hover {
            color: #000;
        }

        .its {
            margin-top: 25px;
        }

        .citems:hover {
            box-shadow: 6px 6px 10px -1px rgba(0, 0, 0, 0.317),
                -6px -6px 10px -1px rgba(215, 113, 255, 0.381);
            color: #491263;
        }

        #cc {
            padding-bottom: 10px;
            align-self: center;
            padding-left: 30%;
        }

        .anime {
            display: flex;
        }

        .Social {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .s3 {
            display: inline;
            font-size: 50px;
            color: #811697;
        }

        .socialanime {
            margin-left: 10px;
        }

        .socialicons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3rem;
            padding-bottom: 20px;
        }

        .sicons {
            width: 5.62rem;
            height: 5.62rem;
            background-color: #fcf1ff;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
            border-radius: 45%;
            box-shadow: 6px 6px 10px -1px rgba(0, 0, 0, 0.313),
                -6px -6px 10px -1px rgba(231, 169, 255, 0.418);

        }

        .sicons:hover>i {
            scale: 1.4;

        }

        #ig:hover {
            background: linear-gradient(145deg, #ff7f5f8f, #ff5728a1, #3700ff7a);
        }

        #linkd:hover {
            background: linear-gradient(145deg, #45b4fe88, #69c1fc7b, #5b49fe);
        }

        #yt:hover {
            background: linear-gradient(145deg, #ff000088, #ff000092, #f90f0f49, #fff);
        }

        #twit:hover {
            background: linear-gradient(145deg, #0000002f, #5a5a5a92, #58101049, #fff);
        }

        #gith:hover {
            background: linear-gradient(145deg, #39ca002f, #09b5ff70, #2baa2049, #fff);
        }

        .abouttextanime {
            display: flex;
            justify-content: center;
        }

        .aboutanime {
            margin-top: -45px;
        }

        .abouttextanime h4 {
            color: #590181;
            font-size: 45px;
        }

        .logo {
            height: 40px;
            width: auto;
            margin-left: 30px;
        }

        .nav_left {
            display: flex;
            justify-items: center;
            align-items: center;

        }

        .n_logo {
            padding: 0px;
            margin: 0px;
        }


        /* RG */

        html {
            scroll-behavior: smooth;
        }

        @keyframes appear {
            from {
                opacity: 0;
                scale: 0.4;
            }

            to {
                opacity: 1;
                scale: 1;
            }

        }

        .appear {
            animation: appear 5s linear;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
        }


        @keyframes appearLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }

        }

        .appearLeft {
            animation: appearLeft 5s linear;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
        }


        @keyframes appearRight {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }

        }

        .appearRight {
            animation: appearRight 5s linear;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
        }


        @keyframes slideLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .slideLeft {
            animation: slideLeft 1s ease-out;
        }


        @keyframes slideRight {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .slideRight {
            animation: slideRight 1s ease-out;
        }



        @keyframes slideUp {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        .slideUp {
            animation: slideUp 1s ease-out;
        }

        body {
            overflow-x: hidden;
        }



        /* footer */
        footer {
            width: 100%;
            color: white;
            position: absolute;
            margin-top: 50px;
            margin-bottom: 30px;
            padding: 55px 0 30px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            line-height: 25px;
            background: linear-gradient(90deg, #eba8ff, #8b19c0, #6a0897, #d6029a7b);
            background-size: 300% 300%;
            animation: color 12s ease-in-out infinite;
        }

        .col {
            flex-basis: 30%;
            padding: 20px;
        }

        #wee {
            color: #ffffff;
            font-size: 25px;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.479);
        }

        .row {
            width: 85%;
            margin: auto;
            display: flex;
            /* flex-wrap: wrap; */
            align-items: flex-start;
            justify-content: space-between;
        }

        .lol {
            color: white;
        }

        h3 {
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.479);
        }

        #mainb {
            padding-left: 170px;
        }

        hr {
            width: 90%;
            /* align-items: center; */
            margin: 20px auto;
        }

        .copyright {
            text-align: center;
        }

        #ho {
            margin-top: -15px;
        }



        /* footer */

        footer {
            width: 100%;
            color: white;
            position: absolute;
            margin-top: 50px;
            margin-bottom: 30px;
            padding: 55px 0 30px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            line-height: 25px;
            background: linear-gradient(90deg, #8001a7, #be31ff, #6c009e, #d6029a7b);
            background-size: 300% 300%;
            animation: color 12s ease-in-out infinite;
        }

        .col {
            flex-basis: 30%;
            padding: 20px;
        }

        #wee {
            color: #ffffff;
            font-size: 25px;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.479);
        }

        .row {
            width: 85%;
            margin: auto;
            display: flex;
            /* flex-wrap: wrap; */
            align-items: flex-start;
            justify-content: space-between;
        }

        .lol {
            color: white;
        }

        h3 {
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.479);
        }

        #mainb {
            padding-left: 150px;
        }

        hr {
            width: 90%;
            /* align-items: center; */
            margin: 20px auto;
        }

        .copyright {
            text-align: center;
        }

        #ho {
            margin-top: -15px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="nav slideUp">
        <ul class="nav_ul">
            <div class="nav_left slideUp">
                <li class="n_logo"><img class="logo" src="img/logo.png"></li>
                <li class="n"><b>ABC Institution</b></li>
            </div>
            <div class="nav_right slideUp">
                <li id="start"><a href="index.html"><b>Home</b></a></li>
                <li><a href="#course"><b>Courses</b></a></li>
                <li><a href="#aboutredirect"><b>About us</b></a></li>
                <li><a href="#contact"><b>Contact us</b></a></li>
                <li><b>Log in</b>
                    <div class="dropdown">
                        <ul>
                            <li><a href="student_login.php"><b>Student</b></a></li>
                            <li><a href="teacher_login.php"><b>Teacher</b></a></li>
                            <li><a href="admin_login.php"><b>Admin</b></a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="admission.php"><b>Admissions open</b></a></li>
        </ul>
    </div>



    <div class="second slideUp">
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <div class="slide first">
                    <img src="img/s1.jpg" alt="" usemap="#img">
                    <map name="#img">
                        <area shape="rect" coords="197, 598, 585, 686" href="#" alt="">
                    </map>

                </div>
                <div class="slide">
                    <img src="img/slide1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img/slide3.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img/s2.jpg" alt="">
                </div>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>

            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
    </div>

    <div id="catagory" class="slideLeft">
        <div class="aa">
            <i class="fa-solid fa-building-columns fa-lg" style="color: #a700e9;"></i><br>
            <a href="faq.html"><b class="bb">FAQ</b></a><br><br>
        </div>
        <div class="aa ">
            <i class="fa-solid fa-chalkboard" style="color: #a700e9;"></i><br>
            <a href="notices.php"><b class="bb">Notices</b></a><br><br>
        </div>
        <div class="aa">
            <i class="fa-solid fa-briefcase" style="color: #a700e9;"></i><br>
            <a href="events.html"><b class="bb">Events</b></a><br><br>
        </div>
        <div class="aa">
            <i class="fa-solid fa-user" style="color: #a700e9;"></i><br>
            <a href="photo.html"><b class="bb">Photo Gallery </b></a><br><br>
        </div>
    </div>

    <br>

    <div class="course">

        <div class="abouttextanime slideRight" id="course">
            <h4>
                <div class="a1">Our</div> Courses..
            </h4>
            <div class="aboutanime">
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                    type="module"></script>

                <dotlottie-player src="https://lottie.host/7a3d3336-5a1b-4225-a089-eaa2312269af/Y7lkWUJVMv.json"
                    background="transparent" speed="1" style="width: 200px; height: 200px;" loop
                    autoplay></dotlottie-player>
            </div>
        </div>


        <div id="courses" class="courseItems appearRight">
            <div class="citems"><a href="course.html" class="its"><b>BCA <br><br> Course details</b></a></div>
            <div class="citems"><a href="course.html" class="its"><b>BBA <br><br> Course details</b></a></div>
            <div class="citems"><a href="course.html" class="its"><b>MCA <br><br> Course details</b></a></div>
            <div class="citems"><a href="course.html" class="its"><b>MBA <br><br> Course details</b></a></div>
        </div>
    </div>


    <div class="about " id="aboutredirect">
        <div class="text">

            <div class="anime appearLeft">
                <h2 id="cc">
                    <div class="a1">About our</div> Instituition..
                </h2>

                <div class="animated">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs"
                        type="module"></script>

                    <dotlottie-player src="https://lottie.host/d7519007-6529-4e1a-a48e-beb0f3c72eef/XUlIp9aJ3N.json"
                        background="transparent" speed="1" style="width: 250px; height: 250px;" loop
                        autoplay></dotlottie-player>
                </div>
            </div>

            <p id="aboutp1" class="appear" align="""justify">
                ABC Institution is a premier educational institute dedicated to nurturing future leaders in technology,
                business, and management. Offering a diverse range of programs such as Bachelor of Computer Applications
                (BCA), Bachelor of Business Administration (BBA), Master of Computer Applications (MCA), and Master of
                Business Administration (MBA), the institution strives to provide students with a robust academic
                foundation combined with real-world exposure.<br>

                At ABC Institution, we emphasize a holistic learning experience, blending theoretical knowledge with
                practical applications to ensure our students are industry-ready. Our state-of-the-art infrastructure,
                experienced faculty, and innovative teaching methods create an environment that fosters academic
                excellence and personal growth.<br>

                We believe in empowering students with the skills and confidence needed to excel in a competitive world.
                Whether it’s through advanced laboratories, interactive workshops, or internships with leading
                organizations, ABC Institution is committed to shaping well-rounded professionals prepared to meet the
                challenges of the modern workforce.
            </p><br><br>
            <div class="aboutparts appear">
                <div class="part"><b>Students <br> 10000+</b></div>
                <div class="part"><b>Teacters <br> 100+</b></div>
                <div class="part"><b>Centers <br> 10</b></div>
            </div>
        </div>
    </div>


    <div class="Social appearRight">
        <h2 id="s2">
            <div class="s3">Our Social</div> Medeia Handels..
        </h2>
        <div class="socialanime">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                type="module"></script>

            <dotlottie-player src="https://lottie.host/9469e842-d3e8-472a-987f-10b0150c7f3b/PRJikELluQ.json"
                background="transparent" speed="1" style="width: 220px; height: 220px;" loop
                autoplay></dotlottie-player>
        </div>
    </div>
    <div class="socialicons " id="contact">
        <a href="#" class="sicons" id="ig"><i class="fa-brands fa-instagram fa-2xl" style="color: #c60ed3;"></i></a>
        <a href="#" class="sicons" id="linkd"><i class="fa-brands fa-linkedin fa-2xl" style="color: #c60ed3;"></i></a>
        <a href="#" class="sicons" id="yt"><i class="fa-brands fa-youtube fa-2xl" style="color: #c60ed3;"></i></a>
        <a href="#" class="sicons" id="twit"><i class="fa-brands fa-x-twitter fa-2xl" style="color: #c60ed3;"></i></a>
        <a href="#" class="sicons" id="gith"><i class="fa-brands fa-github fa-2xl" style="color: #c60ed3;"></i></a>
    </div>



    <footer>
        <div class="row">
            <div class="col">
                <h3 id="wee">ABCD Instituition</h3><br>
                <p id="ho">
                    ABC Institution is a premier educational institute dedicated to nurturing future leaders in
                    technology,
                    business, and management.
                </p>
            </div>
            <div class="col" id="mainb">
                <h3>Main Branch</h3>
                <p>Kolkata road</p>
                <p>Park Street, Kolkata</p>
                <p>PIN 700009 , India</p>
                <p class="email-id">Institution@gmail.com</p>
                <h3>+91-9333628752</h3>
            </div>
            <div class="col" id="mainb">
                <h3>Links</h3>
                <a href="#" class="lol">Events</a><br>
                <a href="#" class="lol">coueses</a>
            </div>
            <div class="col" id="mainb">
                <h3>location</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2325.4981886426767!2d88.54229486363296!3d22.95738171106833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8bf5871a9e0d7%3A0x3cbdf3b9f157e355!2sMaulana%20Abul%20Kalam%20Azad%20University%20of%20Technology!5e1!3m2!1sen!2sin!4v1734851550802!5m2!1sen!2sin"
                    width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <hr>
        <p class="copyright">Institution website © - All Rights Reserved</p>
    </footer>




    <script>
        let currentSlide = 1;

        setInterval(() => {
            currentSlide++;
            if (currentSlide > 4) currentSlide = 1;
            document.getElementById(`radio${currentSlide}`).checked = true;
        }, 5000); 
    </script>


</body>

</html>