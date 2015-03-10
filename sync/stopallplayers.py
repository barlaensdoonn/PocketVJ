#! /bin/sh
# omxplayer-sync stop
exec > /dev/null 2>&1
ssh pi@192.168.0.11 "sudo pkill -9 -f omxplayer-sync & sudo pkill -9 -f omxplayer & sudo pkill -9 -f omxplayer.bin" & ssh pi@192.168.0.12 "sudo pkill -9 -f omxplayer-sync & sudo pkill -9 -f omxplayer & sudo pkill -9 -f omxplayer.bin" & ssh pi@192.168.0.13 "sudo pkill -9 -f omxplayer-sync & sudo pkill -9 -f omxplayer & sudo pkill -9 -f omxplayer.bin";
sudo pkill -9 -f omxplayer-sync
sudo pkill -9 -f omxplayer
sudo pkill -9 -f omxplayer.bin
