<!DOCTYPE html>

<html lang="en-us" class="no-js">

	<head>
		<meta charset="utf-8">
		<title>unauthorised</title>
		<meta name="description" content="Flat able 404 Error page design">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Codedthemes">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('assets\errorz\img\favicon.ico')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets\errorz\css\style.css')}}">
	</head>

	<body class="flat">

        <!-- Canvas for particles animation -->
        <div id="particles-js"></div>

        <!-- Your logo on the top left -->
        <a href="#" class="logo-link" title="back home">

            <img src="{{asset('assets\errorz\img\logo.png')}}" class="logo" alt="Company's logo">

        </a>

        <div class="content">

            <div class="content-box">

                <div class="big-content">

                    <!-- Main squares for the content logo in the background -->
                    <div class="list-square">
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                    </div>

                    <!-- Main lines for the content logo in the background -->
                    <div class="list-line">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>

                    <!-- The animated searching tool -->
                    <i class="fa fa-search" aria-hidden="true"></i>

                    <!-- div clearing the float -->
                    <div class="clear"></div>

                </div>

                <!-- Your text -->
                <h1>Oops! You do not have the permissions to view this page.</h1>

                <p>You have tried to view a page that you are not authorised to,
                    please contact the administrator if this is not the case.</p>

            </div>

        </div>
    <footer class="light">
        <ul>
            <li><a href="#">Support</a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </footer>
        <script src="{{asset('assets\errorz\js\jquery.min.js')}}"></script>
        <script src="{{asset('assets\errorz\js\bootstrap.min.js')}}"></script>

        <!-- Particles plugin -->
        <script src="{{asset('assets\errorz\js\particles.js')}}"></script>

    </body>

</html>
