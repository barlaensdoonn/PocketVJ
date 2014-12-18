<?php

if ($_GET['action'] == 'stop') {
	$outputtext =  "player stopped";
	system("sudo /var/www/sync/omxkill.py");
}

if ($_GET['action'] == 'startmaster') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startmaster.py");
	$outputtext = "start player as master";
}

if ($_GET['action'] == 'startmasteronce') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startmasterone.py");
	$outputtext = "start player as master once";
}


if ($_GET['action'] == 'startslave') {
       exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startslave.py");
	$outputtext =  "start player as slave";
}

if ($_GET['action'] == 'startusb') {
       exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startmasterusb.py");
	$outputtext =  "start player in usb mode";	
}

if ($_GET['action'] == 'stopimage') {
	$outputtext =  "image player stopped";
	system("sudo killall fbi");
}

if ($_GET['action'] == 'image') {
	$outputtext =  "start image player";
	system("sudo killall fbi");
	system("sudo /var/www/sync/startimage.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'imageusb') {
	$outputtext =  "start image player from usb";
	system("sudo killall fbi");
	system("sudo /var/www/sync/startimageusb.py > /dev/null 2>&1 & echo $!");
}


if ($_GET['action'] == 'audio') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -mu /media/internal/*.mp3 > /dev/null 2>&1 & echo $!");
	$outputtext = "start audio player";
}


if ($_GET['action'] == 'audiousb') {
	$outputtext =  "start audio player in usb mode";
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -mu /media/usb/*.mp3 > /dev/null 2>&1 & echo $!");
}


if ($_GET['action'] == 'stoppdf') {
	$outputtext = "pdf player stopped";
	system("sudo killall fbgs");
}

if ($_GET['action'] == 'startppt') {
	$outputtext =  "start pdf player";
	system("sudo /var/www/sync/startppt.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'pdfusb') {
	$outputtext =  "start pdf player from usb";
	system("sudo /var/www/sync/startpdfusb.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'reboot') {
	$outputtext =  "rebooting now!";
	system("sudo reboot");
}

if ($_GET['action'] == 'eject') {
	$outputtext =  "usb stick unmounted";
	system("sudo umount /dev/sda1");
}

if ($_GET['action'] == 'mount') {
	$outputtext =  "usb stick mounted";
	system("sudo mount /dev/sda1 /media/usb/");
}

if ($_GET['action'] == 'master') {
	$outputtext = "master set";
	system("sudo cp /var/www/sync/rc.local.master /etc/rc.local");
}

if ($_GET['action'] == 'slave') {
	$outputtext =  "slave set";
	system("sudo cp /var/www/sync/rc.local.slave /etc/rc.local");
}

if ($_GET['action'] == 'extension1') {
	$outputtext =  "extension1 set";
	system("sudo cp /var/www/sync/rc.local.ext1 /etc/rc.local");
}

if ($_GET['action'] == 'usb') {
	$outputtext =  "usb mode set";
	system("sudo cp /var/www/sync/rc.local.usb /etc/rc.local");
}

if ($_GET['action'] == 'setimage') {
	$outputtext =  "set to image player";
	system("sudo cp /var/www/sync/rc.local.image /etc/rc.local");
}

if ($_GET['action'] == 'setimageusb') {
	$outputtext =  "image player usb mode set";
	system("sudo cp /var/www/sync/rc.local.imageusb /etc/rc.local");
}

if ($_GET['action'] == 'setaudio') {
	$outputtext =  "autostart audio set";
	system("sudo cp /var/www/sync/rc.local.audio /etc/rc.local");
}

if ($_GET['action'] == 'setaudiousb') {
	$outputtext =  "autostart audio usb set";
	system("sudo cp /var/www/sync/rc.local.audiousb /etc/rc.local");
}

if ($_GET['action'] == 'bootconf') {
	$outputtext =  "custom boot conf to boot";
	system("sudo cp /media/internal/config.txt /boot/config.txt");
}

if ($_GET['action'] == 'bootconfusb') {
	$outputtext =  "custom boot conf from usb to boot";
	system("sudo cp /media/usb/config.txt /boot/config.txt");
}

if ($_GET['action'] == 'hdmireset') {
	$output =  "reset resolution settings";
	system("sudo cp /var/www/sync/defaulthdmi /boot/config.txt");
}

if ($_GET['action'] == 'hdmi1') {
	$output =  "forced to use hdmi VGA";
	system("sudo cp /var/www/sync/forcehdmi1 /boot/config.txt");
}

if ($_GET['action'] == 'hdmi4') {
	$outputtext =  "forced to use hdmi 720p";
	system("sudo cp /var/www/sync/forcehdmi4 /boot/config.txt");
}

if ($_GET['action'] == 'hdmi5') {
	$outputtext =  "forced to fullHD 1080";
	system("sudo cp /var/www/sync/forcehdmi5 /boot/config.txt");
}

if ($_GET['action'] == 'hdmivga') {
	$outputtext =  "hdmi to vga 800x600";
	system("sudo cp /var/www/sync/forcevga /boot/config.txt");
}

if ($_GET['action'] == 'clean') {
	$outputtext =  "clean hidden files";
	system("sudo rm -R /media/internal/.[DTf_]*");
}

if ($_GET['action'] == 'getresolution') {
	$output = shell_exec('sudo tvservice -s');
	$preoutputtext =  "<pre>$output</pre>";
	$outputtext = wordwrap($preoutputtext, 51, "<br />\n");
}

if ($_GET['action'] == 'testscreen') {
    exec("sudo /var/www/sync/omxkill.py");
	system("sudo killall fbi");
	system("sudo /var/www/sync/testscreen.py &");
    $outputtext =  "testscreen activated"; 
}

if ($_GET['action'] == 'testscreenoff') {
    system("sudo /var/www/sync/testscreenoff.py &");
	$outputtext =  "testscreen deactivated";
}


if ($_GET['action'] == 'screenon') {
	$outputtext = shell_exec('sudo /opt/vc/bin/tvservice -p');	
}


if ($_GET['action'] == 'screenoff') {
	$outputtext = shell_exec('sudo /opt/vc/bin/tvservice -o');
}

if ($_GET['action'] == 'codecinfo') {
	$output = shell_exec('mediainfo --Inform="General;%CompleteName%  Format: %Format% Codec: %CodecID%  Bitrate: %OverallBitRate%  " /media/internal/*');
	$preoutputtext =  "<pre>$output</pre>";
	$outputtext = wordwrap($preoutputtext, 33, "<br />\n");
}

if ($_GET['action'] == 'movieinfo') {
	$output = shell_exec('mediainfo --Inform="Video;Videosize: %Width%x%Height% pixel  " /media/internal/*');
	$preoutputtext2 = "<pre>$output</pre>";
	$newtext = wordwrap($preoutputtext2, 30, "<br />\n");
	$outputtext = "$newtext\n";
}

if ($_GET['action'] == 'firmware') {
	$outputtext =  "upgrade player and sync";
	system("sudo cp /media/usb/omxplayer /usr/bin/omxplayer");
	system("sudo cp /media/usb/omxplayer.bin /usr/bin/omxplayer.bin");
	system("sudo cp /media/usb/omxplayer-sync /usr/bin/omxplayer-sync");
	
}

if ($_GET['action'] == 'controlpanel') {
	$outputtext =  "update ControlPanel USB";
	system("sudo cp -r /media/usb/www/* /var/www");
	system("sudo chmod 755 -R /var/www");
}

if ($_GET['action'] == 'controlpanelintern') {
	$outputtext =  "update ControlPanel internal";
	system("sudo cp -r /media/internal/www/* /var/www");
	system("sudo chmod 755 -R /var/www");
}

if ($_GET['action'] == 'factoryreset') {
	$outputtext =  "factory reset system";
	system("sudo cp /var/www/sync/omxplayer-sync /usr/bin/omxplayer-sync");
    system("sudo cp /var/www/sync/defaulthdmi /boot/config.txt");
    system("sudo cp /var/www/sync/rc.local.master /etc/rc.local"); 
	system("sudo chmod 755 -R /var/www");
}


if ($_GET['action'] == 'volume_up') {
	system("sudo su - pi -c 'amixer set Master 10%+'");
	$outputtext =  "<pre>$output</pre>";
}

if ($_GET['action'] == 'volume_down') {
	system("sudo su - pi -c 'amixer set Master 10%-'");
	$outputtext =  "<pre>$output</pre>";
}


if ($_GET['action'] == 'hdmi_out') {
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /etc/rc.local");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startmaster.py");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startmasterusb.py");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startmasterone.py");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startslave.py");
	$outputtext =  "Audio set to HDMI";
}

if ($_GET['action'] == 'jack_out') {
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /etc/rc.local");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startmaster.py");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startmasterusb.py");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startmasterone.py");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startslave.py");
	$outputtext =  "Audio set to Jack";
}

if ($_GET['action'] == 'both_out') {
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /etc/rc.local");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startmaster.py");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startmasterusb.py");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startmasterone.py");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startslave.py");
	$outputtext =  "Audio set to both";
}

if ($_GET['action'] == 'screenshare') {
	$outputtext =  "set to screenshare mode";
	system("sudo cp /var/www/sync/rc.local.screenshare /etc/rc.local");
}

?><!DOCTYPE html>
<html class="html" lang="en-GB">
 <head>

  <script type="text/javascript">
   if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "webpro.js", "musewpdisclosure.js", "jquery.watch.js", "index.css"], "outOfDate":[]};
</script>
  
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2014.2.1.284"/>
  <link rel="shortcut icon" href="images/controlpanel-favicon.ico?114042110"/>
  <title>ControlPanel</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?3977984863"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?3819210521"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?4100063943" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="clearfix colelem" id="u75-4"><!-- content -->
    <p>PocketVJ Control Panel v0.22</p>
   </div>
   <div class="colelem" id="u1824"><!-- custom html -->
    <table width="380" border="1" align="center">
  <tr>
       <td width="380" height="70"><?php echo $outputtext; ?>
  <tr>
</table>
</div>
   <div class="clearfix colelem" id="u78-4"><!-- content -->
    <p>*********************&nbsp;&nbsp;&nbsp;&nbsp; output above this line&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *********************</p>
   </div>
   <div class="TabbedPanelsWidget clearfix colelem" id="tab-panelu119"><!-- vertical box -->
    <div class="TabbedPanelsTabGroup clearfix colelem" id="u133"><!-- horizontal box -->
     <div class="TabbedPanelsTab clearfix grpelem" id="u306"><!-- vertical box -->
      <div class=" NoWrap clearfix colelem" id="u308-6"><!-- content -->
       <p>Playback</p>
       <p>Control</p>
      </div>
     </div>
     <div class="TabbedPanelsTab clearfix grpelem" id="u301"><!-- vertical box -->
      <div class=" NoWrap clearfix colelem" id="u304-6"><!-- content -->
       <p>File</p>
       <p>Handling</p>
      </div>
     </div>
     <div class="TabbedPanelsTab clearfix grpelem" id="u296"><!-- vertical box -->
      <div class=" NoWrap clearfix colelem" id="u299-4"><!-- content -->
       <p>Display</p>
      </div>
     </div>
     <div class="TabbedPanelsTab clearfix grpelem" id="u285"><!-- vertical box -->
      <div class=" NoWrap clearfix colelem" id="u287-6"><!-- content -->
       <p>Info</p>
       <p>Aux</p>
      </div>
     </div>
     <div class="TabbedPanelsTab clearfix grpelem" id="u171"><!-- vertical box -->
      <div class=" NoWrap clearfix colelem" id="u173-6"><!-- content -->
       <p>Boot</p>
       <p>Autostart</p>
      </div>
     </div>
     <div class="TabbedPanelsTab clearfix grpelem" id="u134"><!-- vertical box -->
      <div class=" NoWrap clearfix colelem" id="u135-6"><!-- content -->
       <p>Firmware</p>
       <p>System</p>
      </div>
     </div>
    </div>
    <div class="TabbedPanelsContentGroup clearfix colelem" id="u120"><!-- stack box -->
     <div class="TabbedPanelsContent clearfix grpelem" id="u310"><!-- column -->
      <a class="nonblock nontext clip_frame colelem" id="u491" href="?action=stop"><!-- image --><img class="block" id="u491_img" src="images/01_stop.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="u503-4"><!-- content -->
       <p>Video Playback Control:</p>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u493" href="?action=startmaster"><!-- image --><img class="block" id="u493_img" src="images/02_playloop.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u495" href="?action=startmasteronce"><!-- image --><img class="block" id="u495_img" src="images/02_playonce.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u497" href="?action=startusb"><!-- image --><img class="block" id="u497_img" src="images/03_playusb.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u499" href="?action=startslave"><!-- image --><img class="block" id="u499_img" src="images/04_playslave.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="u1121-4"><!-- content -->
       <p>Image Playback Control:</p>
      </div>
      <div class="clearfix colelem" id="ppu1119"><!-- group -->
       <div class="clearfix grpelem" id="pu1119"><!-- column -->
        <a class="nonblock nontext clip_frame colelem" id="u1119" href="?action=image"><!-- image --><img class="block" id="u1119_img" src="images/05_playimage.jpg" alt="" width="160" height="40"/></a>
        <a class="nonblock nontext clip_frame colelem" id="u1117" href="?action=imageusb"><!-- image --><img class="block" id="u1117_img" src="images/06_playimageusb.jpg" alt="" width="160" height="40"/></a>
       </div>
       <div class="clearfix grpelem" id="u1114-4"><!-- content -->
        <p>Supports only *.jpg files with 72 DPI</p>
       </div>
      </div>
      <div class="clearfix colelem" id="u505-4"><!-- content -->
       <p>Audio Playback Control:</p>
      </div>
      <div class="clearfix colelem" id="ppu514"><!-- group -->
       <div class="clearfix grpelem" id="pu514"><!-- column -->
        <a class="nonblock nontext clip_frame colelem" id="u514" href="?action=audio"><!-- image --><img class="block" id="u514_img" src="images/07_playaudio.jpg" alt="" width="160" height="40"/></a>
        <a class="nonblock nontext clip_frame colelem" id="u516" href="?action=audiousb"><!-- image --><img class="block" id="u516_img" src="images/08_playaudiousb.jpg" alt="" width="160" height="40"/></a>
       </div>
       <div class="clearfix grpelem" id="u507-4"><!-- content -->
        <p>Supports only *.mp3 files</p>
       </div>
      </div>
      <div class="clearfix colelem" id="u1850-4"><!-- content -->
       <p>Test Image:</p>
      </div>
      <div class="clearfix colelem" id="pu1838"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1838" href="?action=testscreen"><!-- image --><img class="block" id="u1838_img" src="images/14_testscreenon.jpg" alt="" width="116" height="40"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u1840" href="?action=testscreenoff"><!-- image --><img class="block" id="u1840_img" src="images/14_testscreenoff.jpg" alt="" width="44" height="40"/></a>
      </div>
      <div class="clearfix colelem" id="u804-4"><!-- content -->
       <p>Audio Output Selection:</p>
      </div>
      <div class="clearfix colelem" id="pu1623"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1623" href="?action=hdmi_out"><!-- image --><img class="block" id="u1623_img" src="images/23_audioout1.jpg" alt="" width="51" height="40"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u1626" href="?action=jack_out"><!-- image --><img class="block" id="u1626_img" src="images/23_audioout2.jpg" alt="" width="68" height="40"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u1629" href="?action=both_out"><!-- image --><img class="block" id="u1629_img" src="images/23_audioout3.jpg" alt="" width="41" height="40"/></a>
       <div class="clearfix grpelem" id="u832-4"><!-- content -->
        <p>works for video and audio player</p>
       </div>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u1909" href="?action=reboot"><!-- image --><img class="block" id="u1909_img" src="images/13_reboot.jpg" alt="" width="160" height="40"/></a>
     </div>
     <div class="TabbedPanelsContent invi clearfix grpelem" id="u305"><!-- column -->
      <div class="clearfix colelem" id="u1141-4"><!-- content -->
       <p>File Management:</p>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u1131" href="/eXtplorer/index.php" target="_blank"><!-- image --><img class="block" id="u1131_img" src="images/09_filebrowser.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1133" href="?action=clean"><!-- image --><img class="block" id="u1133_img" src="images/10_clean.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1135" href="?action=eject"><!-- image --><img class="block" id="u1135_img" src="images/11_eject.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1137" href="?action=mount"><!-- image --><img class="block" id="u1137_img" src="images/12_mount.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1139" href="?action=reboot"><!-- image --><img class="block" id="u1139_img" src="images/13_reboot.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="u1674-13"><!-- content -->
       <p>Note:</p>
       <p>&nbsp;</p>
       <p>Make sure your file names don't contain special characters, empty spaces, and very long names,&nbsp; e.g.:</p>
       <p>&nbsp;</p>
       <p>this video File % &quot;2014&quot;.mp4&nbsp;&nbsp; =&gt; will not work</p>
       <p>&nbsp;</p>
       <p>this_video_2014.mp4&nbsp;&nbsp; =&gt; will work</p>
      </div>
     </div>
     <div class="TabbedPanelsContent invi clearfix grpelem" id="u300"><!-- column -->
      <div class="clearfix colelem" id="u587-4"><!-- content -->
       <p>Display Settings:</p>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u616" href="?action=getresolution"><!-- image --><img class="block" id="u616_img" src="images/14_resolution.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u589" href="?action=screenon"><!-- image --><img class="block" id="u589_img" src="images/15_wakeup.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u595" href="?action=screenoff"><!-- image --><img class="block" id="u595_img" src="images/16_sleep.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="u619-4"><!-- content -->
       <p>Display Boot Settings:</p>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u623" href="?action=hdmireset"><!-- image --><img class="block" id="u623_img" src="images/17_screendefault.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u629" href="?action=hdmi5"><!-- image --><img class="block" id="u629_img" src="images/18_screen1080i.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u733" href="?action=hdmi4"><!-- image --><img class="block" id="u733_img" src="images/19_screen720p.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="pu739"><!-- group -->
       <div class="clip_frame grpelem" id="u739"><!-- image -->
        <img class="block" id="u739_img" src="images/19_screencust.jpg" alt="" width="160" height="40"/>
       </div>
       <div class="clearfix grpelem" id="u772-6"><!-- content -->
        <p>Free</p>
        <p>for customer related Output</p>
       </div>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u745" href="?action=hdmi1"><!-- image --><img class="block" id="u745_img" src="images/20_screenvga1.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u751" href="?action=forcevga"><!-- image --><img class="block" id="u751_img" src="images/20_screenvga2.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="ppu757"><!-- group -->
       <div class="clearfix grpelem" id="pu757"><!-- column -->
        <a class="nonblock nontext clip_frame colelem" id="u757" href="?action=bootconf"><!-- image --><img class="block" id="u757_img" src="images/21_scustomreso1.jpg" alt="" width="160" height="40"/></a>
        <a class="nonblock nontext clip_frame colelem" id="u763" href="?action=bootconfusb"><!-- image --><img class="block" id="u763_img" src="images/21_scustomreso2.jpg" alt="" width="160" height="40"/></a>
       </div>
       <div class="clearfix grpelem" id="u769-4"><!-- content -->
        <p>Read the manual for more info !</p>
       </div>
      </div>
      <div class="clearfix colelem" id="pu607"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u607" href="?action=reboot"><!-- image --><img class="block" id="u607_img" src="images/13_reboot.jpg" alt="" width="160" height="40"/></a>
       <div class="clearfix grpelem" id="u770-4"><!-- content -->
        <p>Settings take effect after reboot</p>
       </div>
      </div>
     </div>
     <div class="TabbedPanelsContent invi clearfix grpelem" id="u289"><!-- column -->
      <div class="clearfix colelem" id="u785-4"><!-- content -->
       <p>Movie Info:</p>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u773" href="?action=codecinfo"><!-- image --><img class="block" id="u773_img" src="images/22_codecinfo.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u779" href="?action=movieinfo"><!-- image --><img class="block" id="u779_img" src="images/22_resoinfo.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u610" href="?action=getresolution"><!-- image --><img class="block" id="u610_img" src="images/14_resolution.jpg" alt="" width="160" height="40"/></a>
      <div class="clearfix colelem" id="u796-4"><!-- content -->
       <p>Volume Settings:</p>
      </div>
      <div class="clearfix colelem" id="pu848"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u848" href="?action=volume_up"><!-- image --><img class="block" id="u848_img" src="images/23_volumeplus.jpg" alt="" width="80" height="40"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u842" href="?action=volume_down"><!-- image --><img class="block" id="u842_img" src="images/23_volumeminus.jpg" alt="" width="80" height="40"/></a>
      </div>
      <div class="clearfix colelem" id="u800-4"><!-- content -->
       <p>Audio Output Selection::</p>
      </div>
      <div class="clearfix colelem" id="pu1635"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1635" href="?action=hdmi_out"><!-- image --><img class="block" id="u1635_img" src="images/23_audioout1.jpg" alt="" width="51" height="40"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u1637" href="?action=jack_out"><!-- image --><img class="block" id="u1637_img" src="images/23_audioout2.jpg" alt="" width="68" height="40"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u1639" href="?action=both_out"><!-- image --><img class="block" id="u1639_img" src="images/23_audioout3.jpg" alt="" width="41" height="40"/></a>
       <div class="clearfix grpelem" id="u1634-4"><!-- content -->
        <p>works for video and audio player</p>
       </div>
      </div>
      <div class="clearfix colelem" id="u1166-4"><!-- content -->
       <p>Projector Info:</p>
      </div>
      <div class="clearfix colelem" id="pu1189"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1189" href="http://192.168.2.254" target="_blank"><!-- image --><img class="block" id="u1189_img" src="images/24_projector.jpg" alt="" width="160" height="40"/></a>
       <div class="clearfix grpelem" id="u1644-6"><!-- content -->
        <p>The IP of your</p>
        <p>projector must be: 192.168.2.254</p>
       </div>
      </div>
      <div class="clearfix colelem" id="u1170-4"><!-- content -->
       <p>Temperature Info:</p>
      </div>
      <div class="clearfix colelem" id="ppu1174"><!-- group -->
       <div class="clearfix grpelem" id="pu1174"><!-- column -->
        <div class="clip_frame colelem" id="u1174"><!-- image -->
         <img class="block" id="u1174_img" src="images/24_temperature.jpg" alt="" width="160" height="40"/>
        </div>
        <div class="clip_frame colelem" id="u1180"><!-- image -->
         <img class="block" id="u1180_img" src="images/24_humidity.jpg" alt="" width="160" height="40"/>
        </div>
       </div>
       <div class="clearfix grpelem" id="u1702-4"><!-- content -->
        <p>for this function please attach PocketVJ temperature modul</p>
       </div>
      </div>
     </div>
     <div class="TabbedPanelsContent invi clearfix grpelem" id="u175"><!-- column -->
      <div class="clearfix colelem" id="u854-4"><!-- content -->
       <p>Boot Settings:</p>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u1247" href="?action=master"><!-- image --><img class="block" id="u1247_img" src="images/25_setmaster.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1253" href="?action=usb"><!-- image --><img class="block" id="u1253_img" src="images/25_setmasterusb.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1259" href="?action=slave"><!-- image --><img class="block" id="u1259_img" src="images/25_setslave.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1229" href="?action=extension1"><!-- image --><img class="block" id="u1229_img" src="images/25_setexten1.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1235" href="?action=setimage"><!-- image --><img class="block" id="u1235_img" src="images/25_setimage.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1241" href="?action=setimageusb"><!-- image --><img class="block" id="u1241_img" src="images/25_setimageusb.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1199" href="?action=setaudio"><!-- image --><img class="block" id="u1199_img" src="images/25_audio.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1223" href="?action=setaudiousb"><!-- image --><img class="block" id="u1223_img" src="images/25_setaudiousb.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1878" href="?action=screenshare"><!-- image --><img class="block" id="u1878_img" src="images/25_setsharing.jpg" alt="" width="160" height="40"/></a>
      <a class="nonblock nontext clip_frame colelem" id="u1867" href="?action=reboot"><!-- image --><img class="block" id="u1867_img" src="images/13_reboot.jpg" alt="" width="160" height="40"/></a>
     </div>
     <div class="TabbedPanelsContent invi clearfix grpelem" id="u121"><!-- column -->
      <div class="clearfix colelem" id="u855-4"><!-- content -->
       <p>System Settings:</p>
      </div>
      <div class="clearfix colelem" id="pu1271"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1271" href="?action=controlpanel"><!-- image --><img class="block" id="u1271_img" src="images/26_cpupdate.jpg" alt="" width="160" height="40"/></a>
       <div class="clearfix grpelem" id="u1301-4"><!-- content -->
        <p>Make sure all files are on USB Stick</p>
       </div>
      </div>
      <div class="clearfix colelem" id="pu1725"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1725" href="?action=controlpanelintern"><!-- image --><img class="block" id="u1725_img" src="images/26_cpupdateint.jpg" alt="" width="160" height="40"/></a>
       <div class="clearfix grpelem" id="u1731-4"><!-- content -->
        <p>Copy www folder to internal storage</p>
       </div>
      </div>
      <div class="clearfix colelem" id="pu1733"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1733" href="?action=factoryreset"><!-- image --><img class="block" id="u1733_img" src="images/26_factorypreset.jpg" alt="" width="160" height="40"/></a>
       <div class="clearfix grpelem" id="u1302-4"><!-- content -->
        <p>Hit this once after every upgrade</p>
       </div>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u1703" href="?action=reboot"><!-- image --><img class="block" id="u1703_img" src="images/13_reboot.jpg" alt="" width="160" height="40"/></a>
      <div class="clip_frame colelem" id="u1283"><!-- image -->
       <img class="block" id="u1283_img" src="images/27_depencies.jpg" alt="" width="160" height="40"/>
      </div>
      <div class="clearfix colelem" id="pu1289"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u1289" href="?action=firmware"><!-- image --><img class="block" id="u1289_img" src="images/27_firmware.jpg" alt="" width="160" height="40"/></a>
       <div class="clearfix grpelem" id="u1303-4"><!-- content -->
        <p>this is only needed if the sync&#45;script gets adjusted</p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="clearfix pinned-colelem" id="u1762-6"><!-- content -->
    <p>Copyright by magdesign.ch</p>
    <p>©2015</p>
   </div>
   <div class="verticalspacer"></div>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn2.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3777594392" type="text/javascript"></script>
  <script src="scripts/webpro.js?474087315" type="text/javascript"></script>
  <script src="scripts/musewpdisclosure.js?3952359668" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4144919381" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
(function(){var a={},b=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),16);return 0};(function(){$('link[type="text/css"]').each(function(){var b=($(this).attr("href")||"").match(/\/?css\/([\w\-]+\.css)\?(\d+)/);b&&b[1]&&b[2]&&(a[b[1]]=b[2])})})();(function(){$("body").append('<div class="version" style="display:none; width:1px; height:1px;"></div>');
for(var c=$(".version"),d=0;d<Muse.assets.required.length;){var f=Muse.assets.required[d],g=f.match(/([\w\-\.]+)\.(\w+)$/),k=g&&g[1]?g[1]:null,g=g&&g[2]?g[2]:null;switch(g.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");c.addClass(k);var g=b(c.css("color")),h=b(c.css("background-color"));g!=0||h!=0?(Muse.assets.required.splice(d,1),"undefined"!=typeof a[f]&&(g!=a[f]>>>24||h!=(a[f]&16777215))&&Muse.assets.outOfDate.push(f)):d++;c.removeClass(k);break;case "js":k.match(/^jquery-[\d\.]+/gi)&&
typeof $!="undefined"?Muse.assets.required.splice(d,1):d++;break;default:throw Error("Unsupported file type: "+g);}}c.remove();if(Muse.assets.outOfDate.length||Muse.assets.required.length)c="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",(d=location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi))&&Muse.assets.outOfDate.length&&(c+="\nOut of date: "+Muse.assets.outOfDate.join(",")),d&&Muse.assets.required.length&&(c+="\nMissing: "+Muse.assets.required.join(",")),alert(c)})()})();
/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.initWidget('#tab-panelu119', function(elem) { return new WebPro.Widget.TabbedPanels(elem, {event:'click',defaultIndex:0}); });/* #tab-panelu119 */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { if (e && 'function' == typeof e.notify) e.notify(); else Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
