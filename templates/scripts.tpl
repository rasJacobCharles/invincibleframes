<!--LOAD SCRIPTS-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/video.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/universal_video_background.js"></script>
{if $page eq "home"}
{literal}
<script>
    $(function() {
        var BV = new $.BigVideo({useFlashForFirefox:false});
		BV.init();
		if ((/iPhone|iPod|iPad|Android|BlackBerry/).test(navigator.userAgent)) {
		    BV.show('img/cover.png');
		} else {
		    BV.show('video/showreel_2015.mp4',{
		    	altSource:'video/showreel_2015.mp4'
		    });
		}
		BV.getPlayer().volume(0);
		
		$('body').on('click', '.mute.muted', function(){
			BV.getPlayer().volume(0.8);
			$(this).removeClass('muted').addClass('unmuted');
			return false;
		});
		
		$('body').on('click', '.mute.unmuted', function(){
			BV.getPlayer().volume(0);
			$(this).removeClass('unmuted').addClass('muted');
			return false;
		});
    });
</script>
{/literal}
{/if}