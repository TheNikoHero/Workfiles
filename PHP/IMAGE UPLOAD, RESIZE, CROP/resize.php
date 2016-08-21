<?php

// alle punkter med kommentar indeholdene   *_*  er god at google


function resize(Array $image_info, $max_height, $max_width, $thumb_prefix = 'thumb_') {
    //mappen hvor det originale billede er blevet gemt
    $save_folder = $image_info['dir'];

    //navnet på filen
    $filename = $image_info['filename'];

    //'mimetypen *_* ' for billedet
    $type = $image_info['type'];


    // getimagesize returnerer et array med højde, brede, højde som attribut, bredde som attribute, antal bits, antal kanaler, mime_typen, 
    // men vi bruger kun de 2 første i array'et. Lav en print_r på array, for at se hele array'et.
    // print_r(getimagesize($save_folder.$filename)); die();
    
    // Højde og bredde på original-billedet
    list($width, $height) = getimagesize($save_folder . $filename);

    
    // Laver den største side af billedet til maks tilladte størrelse og holde proportionerne for den anden side.
    // Hvis billedet er bredere end det er højt.
    
 //hvis bredde er større end højde
    if ($width > $height) {
        
        //variable ratio er lige med, højde divideret med bredde
        $ratio = $height / $width;
        
        //new_width er nu max_width
        $new_width = $max_width;
        
        //new_width bliver ganget med ratio, og round får den til et heltal
        $new_height = round($new_width * $ratio);
        
        //hvis højde er større end bredde
    } elseif ($height > $width) {
        $ratio = $width / $height;
        $new_height = $max_height;
        $new_width = round($new_height * $ratio);
    } else {
        $new_height = $max_height;
        $new_width = $max_width;
    }
    
    
//_______HVIS FILEN IKKE ER NOGLE AF DISSE, SÅ KAN BRUGEREN IKKE UPLOADE FILEN______

    
    
    // Vi skal have fat i originalbilledet og oprette det i Memory
    // Hvis det ønskede billede er et jpg
    if($type == "image/jpeg" || $type == "image/pjpeg"){ 
        // sæt sourcen til at være et jpg billede
        $source = imagecreatefromjpeg($save_folder.$filename); 
    }
    
        // Hvis det uploadede billede er et gif
    elseif($type == "image/gif"){ 
        // sætæ sourcen til at være et gif billede
        $source = imagecreatefromgif($save_folder.$filename); 
    }
    
    // Hvis det uploadede billede er et png
    elseif($type == "image/png"){
        // sæt sourcen til at være et png billede
        $source = imagecreatefrompng($save_folder.$filename); 
    }
    
    // Hvis det uploadede billede er et windows bitmap
    elseif($type == "image/bmp"){ 
        // sæt sourcen til at være et bmp billede
        $source = imagecreatefromwbmp($save_folder.$filename); 
    }
    
    else{
            die("Filen understøttes ikke");
    }
    
    // og man kan forsætte med "elseif type == '.../...'

    // Opretter det nye billede med størrelsen fra $new_width og $new_height men dog er det blankt
    
    //Man kan også bruge funktionen imagecreatetruecolor(), da den giver den højste
    //billed kvalitet som overhoved muligt. 
    $destination = imagecreatetruecolor($new_width, $new_height);
    
    // Giver det nye png-billede en gennemsigtig baggrund (0,0,0 = sort 127 = 100% transparent)
    if($type == "image/png"){
//        $color = imagecolorallocatealpha($destination, 255, 0, 0, 127);
//        imagefill($destination, 0, 0, $color);
    }
    
    imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    if($type == "image/jpeg" || $type == "image/pjpeg"){  // Hvis det uploadede billede er et jpg
            $success = imagejpeg($destination, $save_folder.$thumb_prefix.$filename); // Vi gemmer billedet som jpg
    }
    elseif($type == "image/gif"){ // Hvis det uploadede billede er et gif
            $success = imagegif($destination, $save_folder.$thumb_prefix.$filename); // Vi gemmer billedet som gif
    }
    elseif($type == "image/png"){ // Hvis det uploadede billede er et png
            $success = imagepng($destination, $save_folder.$thumb_prefix.$filename); // Vi gemmer billedet som png
    }
    elseif($type == "image/bmp"){ // Hvis det uploadede billede er et windows bitmap
            $success = image2wbmp($destination, $save_folder.$thumb_prefix.$filename); // Vi gemmer billedet som bmp
    }

    return $success;
}

