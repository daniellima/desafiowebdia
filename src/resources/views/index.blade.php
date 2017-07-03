<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Desafio Webedia</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato:300,400');
        
            html {
                background: #f1eff1;
            }
            body {
                font-family: "Lato",sans-serif;
            }
            .header {
                overflow: hidden;
                margin-bottom: 0.5em;
                font-size: 1.1em;
            }
            header .title {
                text-transform: uppercase;
                text-align: right;
                font-weight: 400;
                font-size: 1em;
            }
            header .title .company-name {
                position: relative;
                font-size: 2em;
                text-transform: lowercase;
                display: inline-block;
            }
            header .title .company-name .start {
                font-weight: bold;
            }
            header .title .company-name .tm {
                font-size: 0.3em;
                text-transform: uppercase;
                vertical-align: super;
            }
            header .menu-button {
                width: 70px;
                height: 70px;
                border-radius: 50%;
                background-color: #fc7545;
                cursor: pointer;
                float: left;
            }
            .content-wrapper {
                overflow: hidden;
            }
            .column-wrapper {
                width: 200%;
                overflow: hidden;
                position: relative;
                top: 0;
                left: -100%;
                transition: left 0.7s;
            }
            .menu-open .column-wrapper {
                left: 0%;
            }
            .column {
                width: 50%;
                float: left;
            }
            .main-container article .content {
                background-color: white;
                border-radius: 0.5em;
                padding: 1px 0; /* stop margin collapse from h1 at top and p at bottom */
                margin-bottom: 1em;
            }
            .main-container article header, .main-container article section {
                margin: 0.5em 0.8em 1.6em 0.8em;
            }
            .main-container article header h1 {
                text-transform: uppercase;
                color: #ff9c6f;
                margin-top: 0.5em;
                font-weight: initial;
                margin: 0;
            }
            .main-container article header p {
                color: #7e7c7e;
                font-weight: bold;
                margin: 0;
            }
            .main-container article section h2 {
                color: #ff9c6f;
                text-align: center;
                font-weight: initial;
            }
            .main-container article section h2::before {
                content: ' ';
                display: block;
                background-color: #e08860;
                width: 40%;
                height: 1px;
                margin: 0.3em auto;
            }
            .main-container article section p {
                color: #7e7c7e;
                margin-bottom: 0.7em;
            }
            nav ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                font-size: 1.5em;
            }
            nav li {
                text-align: center;
                padding: 0.5em;
            }
            nav a {
                text-transform: uppercase;
                text-decoration: none;
                color: #fc7545;
            }
            .nav-header {
                text-align: center;
                font-size: 2em;
                padding: 0.5em;
                margin: 0;
            }
            .hamburguer {
                width: 30px;
                height: 30px;
                display: block;
                position: relative;
                background: none;
                top: 21px;
                left: 21px;
            }
            .hamburguer:after, .hamburguer:before, .hamburguer span {
              content: ' ';
              display: block;
              width: 100%;
              height: 6px;
              background: #fff;
              left: 0;
              position: absolute;
              transition: all 300ms ease-in-out;
            }
            .hamburguer:before {
              top: 0;
            }
            .hamburguer:after {
              bottom: 0;
            }
            .hamburguer span {
              top: 12px; /* 6px * 2 */
            }
            .menu-open .hamburguer:before, .menu-open .hamburguer:after {
              top: 15px;
              margin-top: -10%;
            }
            .menu-open .hamburguer:before {
              transform: rotate(-45deg);
            }
            .menu-open .hamburguer:after {
              transform: rotate(45deg);
            }
            .menu-open .hamburguer span {
              opacity: 0;
            }
            @media (min-width: 768px) {
                header .title {
                    font-size: 1.8em;
                    margin: 0;
                }
                header .title .company-name {
                    vertical-align: middle;
                    position: relative;
                    top: -0.2em;
                    left: 0;
                }
                nav.column {
                    width: 25%;
                    margin-left: 25%;
                }
                .menu-open .column-wrapper {
                    left: -50%;
                }
            }
            @media (min-width: 992px) {
                body {
                    margin-left: 0;
                    margin-right: 0;
                }
                header .title {
                    text-align: center;
                    font-size: 0.8em;
                }
                .menu-button {
                    display: none;
                }
                .column-wrapper {
                    transition: none;
                    left: 0;
                    width: 100%;
                }
                .column {
                    width: 100%;
                    float: none;
                }
                nav.column {
                    width: 100%;
                    margin: 0 0 1.5em 0;
                    background-color: #fff;
                    padding: 1em 0;
                    box-shadow: 0px 2px 5px 0px #dad7d7;
                }
                .nav-header {
                    display: none;
                }
                nav ul {
                    text-align: center;
                    font-size: 1em;
                }
                nav li {
                    display: inline-block;
                    font-size: 0.8em;
                }
                nav a {
                    color: #828282;
                }
                .main-container {
                    margin: 0 auto;
                    width: 960px;
                }
                .secondary-article {
                    width: 50%;
                    float: left;
                    box-sizing: border-box;
                }
                .secondary-article:nth-of-type(odd) {
                    padding-left: 0.5em;
                }
                .secondary-article:nth-of-type(even) {
                    padding-right: 0.5em;
                }
                .secondary-article .content {
                    padding: 0.8em !important;
                }
                .secondary-article header p, .secondary-article section {
                    display: none;
                }
                .secondary-article header {
                    margin: 0 0 0.8em 0 !important;
                }
                .secondary-article header h1 {
                    margin-top: 0 !important;
                }
            }
        </style>
    </head>
    <body>
        <header class="header">
            <div class="menu-button">
                <a class="hamburguer" href="javascript:void(0)">
                    <span></span>
                </a>
            </div>
            <h1 class="title">
                Um site do 
                <span class="company-name">
                    <span class="start">WEB</span>EDIA<span class="tm">tm</span>
                </span>
                 group
            </h1>
        </header>
        
        <div class="content-wrapper">
            <div class="column-wrapper">
                <nav class="column">
                    <p class="nav-header">
                        MENU
                    </p>
                    <ul>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                    </ul>
                </nav>
        
                <div class="main-container column">
                    
                    @foreach($posts as $post)
                        <article class="{{ $loop->index > 0 ? 'secondary-article' : ''}}">
                            <div class="content">
                                <header>
                                    <h1>{{ $post->getTitle() }}</h1>
                                    <p>{{ $post->getSubtitle() }}</p>
                                </header>
                                <picture>
                                    <source srcset="https://unsplash.it/320/160" media="(max-width: 400px)">
                                    <source srcset="https://unsplash.it/640/320" media="(max-width: 800px)">
                                    <source srcset="https://unsplash.it/1024/512">
                                    <img width="100%" src="https://unsplash.it/1024/512">
                                </picture>
                                <section>
                                    <h2>{{ $post->getSecondTitle() }}</h2>
                                    {{ $post->getContent() }}
                                </section>
                            </div>
                        </article>
                        
                        @if($loop->index > 0 && $loop->index % 2 == 0)
                            <div style="clear:both"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            var menuButton = document.querySelector(".menu-button");
            var wrapper = document.querySelector(".wrapper");
            menuButton.addEventListener('click', function() {
                document.body.classList.toggle('menu-open');
            })
        </script>
    </body>
</html>