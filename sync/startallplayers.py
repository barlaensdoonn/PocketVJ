#! /bin/sh
# omxplayer-sync start
exec > /dev/null 2>&1
ssh pi@192.168.0.11 "omxplayer-sync -lu /media/internal/videoFile.mp4" & omxplayer-sync -mu /media/internal/videoFile.mp4 &
