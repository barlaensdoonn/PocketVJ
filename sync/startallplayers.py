#! /bin/bash
# omxplayer-sync start

#hosts
SERVERS="192.168.0.11 192.168.0.12 192.168.0.13"

# SSH User name
USR="pi"

exec > /dev/null 2>&1

for host in $SERVERS
do
ssh $USR@$host "omxplayer-sync -lu -o both /media/internal/*.mp4" &
done

omxplayer-sync -mu /media/internal/videoFile.mp4 &
