<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Create Post | Admin | Desafio Webedia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/admin.css') }}">
    </head>
    <body>
        <nav>
            <div>
                <div>
                    <a href="#">Blog Admin</a>
                </div>
            </div>
        </nav>
        <header>
            <h1>
                Create a new Post
            </h1>
        </header>
        
        <form method="post" action="#" enctype='multipart/form-data'>
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
            
            <div>
                <label for="subtitle">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle">
            </div>
            
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
            </div>
            
            <div>
                <label for="second-title">Second Title</label>
                <input type="text" id="second-title" name="second-title">
            </div>
            
            <div>
                <label for="content">Content</label>
                <textarea id="content" name="content"></textarea>
            </div>
            
            <button type="submit">Create</button>
        </form>
        
    </body>
</html>