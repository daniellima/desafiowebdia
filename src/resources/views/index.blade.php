<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Desafio Webedia</title>
        <meta name="description" content="Esse site foi criado para o desafio Webdia, parte do processo seletivo da webdia.">
        <meta name="keywords" content="webdia, desafio, processoseletivo"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ secure_asset(mix('css/index.css')) }}" type="text/css" />
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
                                    <source srcset="{{ secure_asset('storage') }}/{{ $post->getMobileImagePath() }}" media="(max-width: 400px)">
                                    <source srcset="{{ secure_asset('storage') }}/{{ $post->getTabletImagePath() }}" media="(max-width: 800px)">
                                    <source srcset="{{ secure_asset('storage') }}/{{ $post->getDesktopImagePath() }}">
                                    <img width="100%" src="{{ secure_asset('storage') }}/{{ $post->getDesktopImagePath() }}">
                                </picture>
                                <section>
                                    <h2>{{ $post->getSecondTitle() }}</h2>
                                    <p>{{ $post->getContent() }}</p>
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