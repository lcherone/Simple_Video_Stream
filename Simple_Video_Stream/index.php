<?php 
//player
if(isset($_GET['play'])){
	echo '
<video controls width="640" height="360">
	<source src="./?stream='.$_GET['play'].'" type="video/mp4">

	<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
		<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
		<param name="allowFullScreen" value="true">
		<param name="wmode" value="transparent">
		<param name="flashVars" value="config={\'playlist\':[{\'url\':\'./?stream='.$_GET['play'].'\',\'autoPlay\':true}]}">
		<span>No video playback capabilities</span>
	</object>
</video>';
}
//stream it
elseif(isset($_GET['stream'])){
	include "./lib/streamer.php";
	stream('./videos/'.basename($_GET['stream']), 'video/mp4');
}
//ouptut videos list
else{
	foreach(glob('./videos/*.mp4') as $file){
		echo '<a href="?play='.basename($file).'">Play '.basename($file).'</a>';
	}
}
?>