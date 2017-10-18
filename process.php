<?php 
$uploads_dir = "original/";
$file_name = basename($_FILES["file"]["name"]);
$output_name = explode('.', $file_name)[0];
$uploaded_file = $uploads_dir . $file_name;

if(isset($_POST["submit"])) {
  if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploaded_file)) {
    // Make sure to get the correct path to ffmpeg
    // Run $ where ffmpeg to get the path
    $ffmpeg = "/usr/local/bin/ffmpeg";
    
    // MP4
    exec($ffmpeg . ' -i "' . $uploaded_file . '" -r 25 -c:v libx264 "./converted/' . $output_name . '.mp4" -y 2>&1', $output, $convert);

    // Debug
    // echo '<pre>' . print_r($output, 1) . ' </pre>';
    
    echo '<div>';
    echo ($convert != 0) ? 'MP4: Fail' : 'MP4: Success';
    echo '</div>';

    // WebM
    exec($ffmpeg . ' -i "' . $uploaded_file . '" -c:v libvpx -r 25 -c:a libvorbis "./converted/' . $output_name . '.webm" -y 2>&1', $output, $convert);

    // Debug
    // echo '<pre>' . print_r($output, 1) . ' </pre>';
    
    echo '<div>';
    echo ($convert != 0) ? 'WebM: Fail' : 'WebM: Success';
    echo '</div>';
  }
}
