#!/bin/bash
exec > /dev/null 2>&1
ssh pi@192.168.0.11 sudo shutdown -h now & ssh pi@192.168.0.12 sudo shutdown -h now & ssh pi@192.168.0.13 sudo shutdown -h now; sudo shutdown -h now