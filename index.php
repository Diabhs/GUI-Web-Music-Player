<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/base_content_sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/base_content.css">
    <script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="assets/scripts/semantic.js"></script>
    <script>
    $(document).ready(function(){
        $(".sub").toggle();
    });
    </script>
</head>

<body>
    <div class="header">
        <ul class="nav">
            <li>Home</li>
            <li id="hassub">Music
                <ul class="sub">
                    <li><a href="#">Genre</a></li>
                    <li><a href="#">Year</a></li>
                    <li><a href="#">Artist</a></li>
                    <li><a href="#">Song</a></li>
                    <li><a href="#">Type</a></li>
                    <li><a href="#">Search</a></li>
                </ul>
            </li>
            <li>About</li>
        </ul>
    </div>
    <div class="content">
    </div>
    <div class="sidebar">
        <div id="displayer"></div>
        <script>			
			$.get('assets/scripts/scanFolders.php', function(data){                
                var musicPath = new Array();               
            
				$('#displayer').html(data);
				$('#displayer > p:nth-child(odd)').css('background-color','#DDD');	
                $('#displayer > p').each(function (e){
                    musicPath.push($(this).text());
                });
                
                $('#displayer > p').click(function (){
                
                    var selectedSong = $(this).text();
                    console.log(selectedSong);
                    $.get("assets/scripts/fileLocations.php", function(data){
                        for (var i = 0; i < data.length; i++) {
                            if (selectedSong == data[i].basename){
                                console.log(data[i].path);

                                var audioElement = document.createElement('audio');
                                audioElement.setAttribute('src', data[i].path);
                                audioElement.setAttribute('autoplay', 'autoplay');
                                audioElement.load()
                                $.get();
                                audioElement.addEventListener("load", function() {
                                audioElement.play();
                                }, true);

                                $('.play').click(function() {
                                audioElement.play();
                                });


                                $('.pause').click(function() {
                                audioElement.pause();
                                });

                            }
                        }
                    });
                });
			});	        
        </script>
    </div>
    <script>
        $("#hassub").click(function(){
            $(".sub").slideToggle("slow");
        });
    </script>
</body>
</html>
