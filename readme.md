# Converting video files to HTML video compatible formats

This simple script uploads a video file and converts it with **ffmpeg** to **mp4** and **webm** format.  
There's no error handling. This is just a rough initial test to solve a headache of mine.

Cheers!

## Requirements

You need **ffmpeg** and also a couple of addons to be able to convert to webm.

On Mac OS with Homebrew:

```bash
brew install ffmpeg --with-libvpx --with-libvorbis --with-fdk-aacc
```

If you already have ffmpeg installed and need the addons, just reinstall ffmpeg with the addons.

```bash
brew reinstall ffmpeg --with-libvpx --with-libvorbis --with-fdk-aacc
```

## Installation

No installation besides ffmpeg needed. Just make sure you have the right file permission on the **original** and **converted** folders.

```bash
sudo chmod -R 775 original converted
```
