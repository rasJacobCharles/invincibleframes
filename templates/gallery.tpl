<article>
	<a href="#" class="portfolio-close"><i class="fa fa-times"></i></a>
	
	<ul class="rslides">
         {foreach from=$mediaArray item=media }
         {if $projectID eq $media['projectID']}
         <li><img src="img/{$media['image']}" alt="image"></li>
         {/if}
         {/foreach}
	</ul>
	
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