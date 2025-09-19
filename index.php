<?php
// Deze function pakt de files en folders van de dir die zich in bevindt.
function get_files_and_folders($dir) {
    $files_and_folders = array();
    $current_dir = opendir($dir);
    while (($file_or_folder = readdir($current_dir))!== false) {
        if ($file_or_folder!= '.' && $file_or_folder!= '..') {
            $files_and_folders[] = $file_or_folder;
        }
    }
    closedir($current_dir);
    sort($files_and_folders);
    return $files_and_folders;
}

// Schrijft naar de bestand
function write_to_file($file, $content) {
    $fp = fopen($file, 'w');
    fwrite($fp, $content);
    fclose($fp);
}

// Pakt de dir die zich in bevindt.
$current_dir = '.';
if (isset($_GET['dir'])) {
    $current_dir = $_GET['dir'];
}

// slaat de veranderingen die gemaakt zijn in de web op naar de file.
if (isset($_POST['content'])) {
    $file = $_POST['file'];
    $content = $_POST['content'];
    write_to_file($file, $content);
}

// pakt de files en folders van de dir die zich in bevindt.
$files_and_folders = get_files_and_folders($current_dir);
// maakt een sidebar aan die de bestanden en folders toont
$sidebar = '';
foreach ($files_and_folders as $file_or_folder) {
    $file_or_folder_info = pathinfo($file_or_folder);
    $icon = ''; // Zorgt ervoor dat de juiste icon bij de juiste file komt.
    if (isset($file_or_folder_info['extension'])) {
        switch ($file_or_folder_info['extension']) {
            case 'php':
                $icon = 'res/php.png';
                break;
            case 'html':
                $icon = 'res/html.png';
                break;
            case 'css':
                $icon = 'res/css.png';
                break;
            case 'js':
                $icon = 'res/js.png';
                break;
            case 'txt':
                $icon = 'res/txt.png';
                break;
            case 'doc':
            case 'docx':
                $icon = 'res/doc.png';
                break;
            case 'pdf':
                $icon = 'res/pdf.png';
                break;
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'bmp':
            case 'png':
            case 'svg':
                $icon = 'res/image.png';
                break;
            default:
                $icon = 'res/unknown.png';
                break;
        }
    } else {
        $icon = 'res/folder.png';
    }
    if (is_dir($current_dir.'/'.$file_or_folder)) {
        $sidebar .= '<li><img alt="" src="'. $icon. '"> <a href="?dir='. $current_dir.'/'.$file_or_folder. '">'. $file_or_folder. '</a></li>';
    } else {
        $sidebar .= '<li><img alt="" src="'. $icon. '"> <a href="?dir='. urlencode($current_dir) .'&file='. urlencode($file_or_folder) .'">'. $file_or_folder. '</a></li>';
    }
}

// Dit is de inhoud gedeelte, waarin alle infomratie zich bevindt.
$content = '';
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $file_info = pathinfo($current_dir . '/' . $file); // Bestand naam
    $file_size = '-'; // Bestand grootte
    $file_modified = '-'; // Laatst aangepast
    if (file_exists($current_dir . '/' . $file)) { // Zorgt voor de bestand grootte.
        $file_size = filesize($current_dir . '/' . $file);
        $file_size_units = array('B','KB', 'MB', 'GB', 'TB');
        $file_size_unit = 0;
        while ($file_size > 1024 && $file_size_unit < count($file_size_units) - 1) {
            $file_size /= 1024;
            $file_size_unit++;
        }
        $file_size = round($file_size, 2). ' '. $file_size_units[$file_size_unit];
        $file_modified = date('d-m-Y H:i:s', filemtime($current_dir . '/' . $file)); // Kijkt wanneer de bestand voor het laatst is aangepast.
    }
    $file_readable = is_readable($current_dir . '/' . $file)? 'Ja' : 'Nee'; // Is de bestand schrijfbaar?

    if (isset($file_info['extension'])) { // "text" bestanden zoals php en docx.
        if (in_array($file_info['extension'], array('php', 'html', 'css', 'js', 'txt', 'doc', 'docx', 'pdf', 'xml', 'js', 'htm'))) {
            $content .= '<h2>'. $file. '</h2>';
            $content .= '<p>Grootte: '. $file_size. '</p>';
            $content .= '<p>Laatst aangepast: '. $file_modified. '</p>';
            $content .= '<p>Schrijfbaar: '. $file_readable. '</p>';
            $content .= '<form method="post">';
            $content .= '<input type="hidden" name="file" value="'.$current_dir.'/'.$file.'">';
            $content .= '<textarea name="content" style="width: 98%; height: 330px; resize: none;">';
            $content .= htmlspecialchars(file_get_contents($current_dir . '/' . $file)); // Toon de bestanden in een textarea zonder ze te uitvoeren.
            $content .= '</textarea>';
            $content .= '<button class="bookmarkBtn">
  <span class="IconContainer">
    <svg viewBox="0 0 384 512" height="0.9em" class="icon">
      <path
        d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
      ></path>
    </svg>
  </span>
  <p class="text">Opslaan</p>
</button>';
            $content .= '</form>';
        } elseif (in_array($file_info['extension'], array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'))) {
            $content .= '<h2>'. $file. '</h2>';
            $content .= '<p>Grootte: '. $file_size. '</p>';
            $content .= '<p>Laatst aangepast: '.$file_modified. '</p>';
            $content .= '<p>Schrijfbaar: '. $file_readable. '</p>';
            $content .= '<img src="'. $current_dir . '/' . $file. '" style="max-width: 100%; height: 500px">';
        } else {
            $content .= '<h2>'. $file. '</h2>';
            $content .= '<p>Grootte: '. $file_size. '</p>';
            $content .= '<p>Laatst aangepast: '. $file_modified. '</p>';
            $content .= '<p>Schrijfbaar: '. $file_readable. '</p>';
            $content .= '<p>Unknown file type</p>';
        }
    } else {
        $content .= '<h2>'. $file. '</h2>';
        $content.= '<p>Grootte: '. $file_size. '</p>';
        $content .= '<p>Laatst aangepast: '. $file_modified. '</p>';
        $content .= '<p>Schrijfbaar: '. $file_readable. '</p>';
        $content .= '<p>Unknown file type</p>';
    }
} elseif (isset($_GET['dir'])) {
    $directory = $_GET['dir'];
    $content .= '<h2>'. basename($directory, '/'). '</h2>';
    $content .= '<p>Open directory: '. $directory. '</p>';
}

function breadcrumbs($dir, $file = null) { // Maakt de breadcrumbs aan.
    $breadcrumbs = '<a href="?">Home</a>';
    $path = '';
    $directories = explode('/', $dir);
    foreach ($directories as $directory) {
        if (!empty($directory) && $directory != '.') {
            $path .= '/' . $directory;
            $breadcrumbs .= ' / <a href="?dir=' . ltrim($path, '/') . '" onclick="history.back(); return false;">' . ($directory == '.' ? '' : $directory) . '</a>';
        }
    }
    if ($file) {
        $breadcrumbs .= ' / ' . $file;
    }
    return $breadcrumbs;
}

// Pakt de naam van de dir en bestand/folder.
$current_dir_or_file = isset($_GET['dir']) ? $_GET['dir'] : '.';
$current_dir_basename = ($current_dir_or_file == '.') ? 'Home' : basename($current_dir_or_file);
$current_file = isset($_GET['file']) ? $_GET['file'] : null;
$breadcrumbs = breadcrumbs($current_dir_or_file, $current_file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorer</title>
    <!-- Links -->
    <link rel="icon" href="res/folder_purp.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="topbar">
    <ul class="breadcrumb">
        <img src="res/folder_purp.png" alt="#" height="25px" style="padding-right: 10px">
        <?php echo $breadcrumbs; ?>
    </ul>
</div>
<div id="topbarafter">
</div>
<div id="sidebar">
    <h1 style="text-align: center">Explorer</h1>
    <hr>
    <ul>
        <?php echo $sidebar;?>
    </ul>
</div>
<div id="sidebarbg"><p></p></div>
<div id="content">
    <h1>Inhoud</h1>
    <?php echo $content;?>
</div>
</body>
</html>
