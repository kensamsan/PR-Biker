<!DOCTYPE html>
<html>
    <head>
        <title>{{$name_of_attachment}}</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
                background-color: transparent !important;
            }
            .image-attachment
            {
                display:block;margin:0 auto;
            }
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            @media print
            { 
                @page
                {
                    margin: 0.11in;  
                    size: letter portrait;

                }
                .image-attachment
                {
                    width: 750px;height: 1000px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><img src="{{ $path }}" class="img-responsive image-attachment" style=""></div>
            </div>
        </div>
        <script type="text/javascript">
            window.onload = function() { window.print(); }
        </script>
    </body>
</html>
