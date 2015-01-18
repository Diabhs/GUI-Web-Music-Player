<?php

function listFolderFiles($dir){
    $ffs = scandir($dir);
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
			if(!strpos($ff,".jpg") 
            && !strpos($ff,".txt")
            && !strpos($ff,".db") 
            && !strpos($ff,".plist")
            && !strpos($ff,".m4a")){
							
				echo '<p class="musiclistings">'.$ff;
				if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
				echo '</p>';
			}
        }
    }
}

listFolderFiles('path/to/file'); //Path to your selected file
?>
