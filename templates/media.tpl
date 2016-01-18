<article>
	<a href="#" class="portfolio-close"><i class="fa fa-times"></i></a>
	
	<div class="video-container">
		
	
		<script>
		jQuery(function() {

			jQuery('#universal_video_background_default').universal_video_background({
				width: 800,
				height: 423,
				autoPlayFirstVideo:true,
				responsive:true,
				
				borderWidth: 14,
				borderColor: '#FFFFFF',	
				showBottomNav:true,
				
				
				thumbsBorderColorON:'#FF0000',
				thumbsBorderColorOFF:'#000000',
				thumbsWrapperBg:'#FFFFFF', //hexa or image
				thumbsBgOffImgOpacity:70,
				thumbsWrapperMarginTop:-75
				
			});		
			
			
		});
		

	</script>
    
    <style type="text/css">
		html, body {
		margin:0px;
		padding:0px;
		width:100%;
		/*overflow:hidden;*/
		}

	</style>

            <div id="universal_video_background_default" style="display:none;">
                <!-- IMAGES -->
                <ul class="universal_video_background_list">    
                    {foreach from=$mediaArray item=media }
                {if $projectID eq $media['projectID']}
                <li data-bottom-thumb="img/cover.png" data-youtube="{$media['media']}"></li>
                {/if}
                 {/foreach}
               		
              </ul>       
           </div>
        </div>
	<div class="content">
		<div class="break15"></div>
		
		<div class="two_thirds">
                    <h4>{$title}</h4>
			{$info}
		</div>
		
		<div class="one_third last">
			<h5>Project Details</h5>
			<p>
				<strong>Client</strong>: {$client}<br />
				<strong>Date</strong>: {$date}<br />
                                {if $link != ""}
				<strong>Address</strong>: <a href="#" class="light">{$link}</a>
                                {/if}
			</p>
		</div>
		
		<div class="clear"></div><!--CLEAR FLOATS-->
		
	</div>
	
</article>