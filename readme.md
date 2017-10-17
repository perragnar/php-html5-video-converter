# Converting video files to HTML video compatible formats

This simple script uploads a video file and converts it with *ffmpeg* to *mp4* and webm format.

## Requirements

You need **ffmpeg** and also the **libvpx** to be able to convert to webm.

On Mac OS with Homebrew:

```bash
brew install ffmpeg --with-libvpx
```

If you already have ffmpeg installed and need **libvpx**:

```bash
brew reinstall ffmpeg --with-libvpx
```

## Installation

No installation besides ffmpeg needed. Just make sure you have the right file permission on the **original** and **converted** folders.

```bash
sudo chmod -R 775 original converted
```
