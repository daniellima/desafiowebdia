<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Desafio Webedia</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            html {
                background: rgb(240, 240, 240);
            }
            body {
                font-family: sans-serif;
            }
            .header {
                position: relative;
                overflow: hidden;
            }
            header .title {
                margin-left: 80px;
                text-transform: uppercase;
                text-align: right;
            }
            header .menu-button {
                position: absolute;
                top: 0;
                left: 0;
                width: 70px;
                height: 70px;
                border-radius: 50%;
                background: rgb(255, 120, 62);
                cursor: pointer;
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
            .main-container article {
                background-color: white;
                border-radius: 0.5em;
                padding: 1px 0.8em;
            }
            .main-container article header h1 {
                text-transform: uppercase;
                color: orange;
                margin-top: 0.5em;
            }
            .main-container article header p {
                color: grey;
                font-weight: bold;
            }
            .main-container article section h2 {
                color: orange;
                text-align: center;
            }
            .main-container article section h2::before {
                content: ' ';
                display: block;
                background-color: orange;
                width: 40%;
                height: 1px;
                margin: 0.3em auto;
            }
            .main-container article section p {
                color: grey;
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
                color: rgb(255, 120, 62);
            }
            .nav-header {
                position: relative;
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
        </style>
    </head>
    <body>
        <header class="header">
            <h1 class="title">Um site do WEBEDIA group</h1>
            <div class="menu-button">
                <a class="hamburguer" href="javascript:void(0)">
                    <span></span>
                </a>
            </div>
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
                    <article>
                        <header>
                            <h1>article header h1</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
                        </header>
                        <section>
                            <h2>article section h2</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
                        </section>
                    </article>
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