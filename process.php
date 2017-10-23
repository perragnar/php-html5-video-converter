<?php 
$uploads_dir = 'original/';
$file_name = basename($_FILES['file']['name']);
$output_name = explode('.', $file_name)[0];
$uploaded_file = $uploads_dir . $file_name;

if(isset($_POST['submit'])) {
  if(move_uploaded_file($_FILES['file']['tmp_name'], $uploaded_file)) {
    // Make sure to get the correct path to ffmpeg
    // Run $ where ffmpeg to get the path
    $ffmpeg = '/usr/local/bin/ffmpeg';
    
    // MP4
    $video_mp4 = $output_name . '.mp4';
    exec($ffmpeg . ' -i "' . $uploaded_file . '" -c:v libx264 "./converted/' . $video_mp4 . '" -y 2>&1', $output, $convert);

    // Debug
    // echo '<pre>' . print_r($output, 1) . ' </pre>';
    
    echo '<div>';
    echo ($convert != 0) ? 'MP4: Fail' : 'MP4: Success';
    echo '</div>';

    // WebM
    $video_webm = $output_name . '.webm';
    exec($ffmpeg . ' -i "' . $uploaded_file . '" -c:v libvpx -c:a libvorbis "./converted/' . $video_webm . '" -y 2>&1', $output, $convert);

    // Debug
    // echo '<pre>' . print_r($output, 1) . ' </pre>';
    
    echo '<div>';
    echo ($convert != 0) ? 'WebM: Fail' : 'WebM: Success';
    echo '</div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      padding: 0;
      margin: 0;
    }
    .hero {
      height: 75vh;
      overflow: hidden;
      position: relative;
    }

    .hero video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-height: 100%;
      min-width: 100%;
      z-index: -1;
      transform: translateY(-50%) translateX(-50%);
    }

    .hero h1 {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 60px;
      color: #ffffff;
      text-shadow: 3px 3px 0 rgba(0,0,0,.5);
      z-index: 1;
      transform: translateY(-50%) translateX(-50%);
    }
  </style>
</head>
<body>
  <div class="hero">
    <h1>Hero Video Demo</h1>
    <video autoplay loop muted poster="http://via.placeholder.com/250x300">
      <source src="./converted/<?= $video_mp4; ?>" type="video/mp4">;   
      <source src="./converted/<?= $video_webm; ?>" type="video/webm">
    </video>
  </div>
</body>
</html>
