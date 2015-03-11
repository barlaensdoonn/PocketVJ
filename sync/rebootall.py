#!/bin/bash
#reboot all players

#hosts
SERVERS="192.168.0.11 192.168.0.12 192.168.0.13"

# SSH User name
USR="pi"

exec > /dev/null 2>&1

for host in $SERVERS
do
ssh $USR@$host "sudo reboot";
done

sudo reboot