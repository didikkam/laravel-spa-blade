<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <base href="{{ url('/') }}/">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        var base_url = document.getElementsByTagName('base')[0].getAttribute('href');
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    {{-- content --}}
    <section class="container" id="appcontent">
    </section>

    <section class="navbar navbar-expand-lg navbar-light bg-light mt-5">
        Footer
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link type="text/css" rel="stylesheet" href="https://www.cahayaagro.com/vendor/nprogress-0.2.0/nprogress.css">
    <script type="text/javascript" src="https://www.cahayaagro.com/vendor/nprogress-0.2.0//nprogress.js"></script>
    <script>
        $(document).on('click', 'a.target-link', function(e) {
            e.preventDefault();
            var item = $(this);
            var target_url = item.attr('href').replace('#', '');
            location.hash = target_url;
            // loadURI(target_url);
        });

        // User's mouse is inside the page.
        document.onmouseover = function() {
            window.innerDocClick = true;
        }

        // User's mouse has left the page.
        document.onmouseleave = function() {
            window.innerDocClick = false;
        }

        window.onhashchange = function() {
            // if (window.innerDocClick) {
            //Your own in-page mechanism triggered the hash change
            // } else {
            //Browser back button was clicked
            var original_title = location.hash;
            var target_url = original_title.replace('#', '');
            if (target_url == '' || target_url == '/' || target_url == 'undefined') {
                loadURI('home');
            } else {
                loadURI(target_url);
            }
            // }
        }

        function hideBack() {
            $('.navbar-menu').show();
            $('.navbar-back').hide();
        }

        function back(target_url) {
            $('.navbar-menu').hide();
            $('.navbar-back').show();
            $('.navbar-back').attr('href', target_url);
        }

        function loadingContent(content) {
            if ($('#apploader').is(':visible')) {

                $('#appcontent').show();
                $('#apploader').hide();
            } else {

                $('#appcontent').hide();
                $('#apploader').show();
            }

        }

        function ajaxPostRequest(target_url, success_function, data) {
            data = typeof data !== 'undefined' ? data : null;
            $.ajax({
                type: 'POST',
                url: base_url + target_url,
                async: false,
                data: data,
                success: success_function
            });
        }

        function isEmptyHtml(el) {
            return !$.trim(el.html())
        }

        function loadURI(target_url, content, history) {
            content = typeof content !== 'undefined' ? content : 'appcontent';
            history = typeof history !== 'undefined' ? history : target_url;
            // loadingContent(content);
            NProgress.start();
            $.ajax({
                type: 'GET',
                url: base_url + target_url,
                contentType: false,
                success: function(data) {
                    location.hash = history;
                    $("#" + content).html(data);
                    NProgress.done();
                    // loadingContent(content);
                },
                error: function(xhr, status, error) {
                    // alert(xhr.responseText);
                }
            });
        }
    </script>
</body>

</html>
