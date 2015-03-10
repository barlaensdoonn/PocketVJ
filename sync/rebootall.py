#!/bin/bash
exec > /dev/null 2>&1
ssh pi@192.168.0.11 sudo reboot & ssh pi@192.168.0.12 sudo reboot & ssh pi@192.168.0.13 sudo reboot; sudo reboot