<section class="small-padding" id="portfolio">

    <div class="wrapper">
        <h3 class="floatleft">Our Work <small class="portfolio-filter">We're really proud.</small></h3>

        <div id="filters" class="floatright">
            <a href="*" class="active button">All</a>
            <a href=".film" class="button">Film</a>
            <a href=".editing" class="button">Editing</a>
            <a href=".illustration" class="button">Visual Effect</a>
            <a href=".business" class="button">Business</a>
        </div>

        <div class="clear"></div><!--CLEAR FLOATS-->
    </div>

</section>

<section class="dark-wrapper">

    <div class="wrapper overflow-hidden">

        <div id="loader"></div>

        <ul class="clearfix portfolio-isotope portfolio scroll-animate bottom">
            {foreach from=$projects item=project }	
                {assign var=tags value=[]}
                {assign var=tagsUpperCase value=[]}
                {foreach from=$projectTags item=tag}
                    {if $project['projectID'] eq $tag['projectID']}
                        {$tags[] = $tag['skill']}
                        {assign var=skill value=$tag['skill']}
                        {if $skill eq 'illustration'}
                            {$tagsUpperCase[] = 'Visual Effect'}
                        {else}
                            {$tagsUpperCase[] = $skill|capitalize:true}
                        {/if}
                    {/if}
                {/foreach}
                <li class="{' '|implode:$tags}">
                    {assign var=link value=$project['title']|lower}

                    <a href="{$link|replace:' ':'-'}.php" class="isotope-alt-image">
                        <img src="img/{$project['thumb']}" alt="image" />
                        <div>
                            <h4>{$project['title']}
                                <small>{$project['subtitle']}</small>
                            </h4>
                        </div>
                    </a>
                    <div class="isotope-alt-details">
                        <div>
                            <h4 class="remove-bottom">{$project['title']}</h4>
                            <p class="meta">{', '|implode:$tagsUpperCase}</p>
                        </div>
                    </div>
                </li>

            {/foreach}

        </ul>
        {if $limit eq 6}
            <a href="projects.php" class="load-more scroll-animate top">Load More</a>
        {/if}
    </div>

</section>
{if $limit ne 6}
    
    <section class="small-padding" id="clients">

        <div class="wrapper">
            <h3 class="floatleft">Our Clients. <small>Some of our most well know clients.</small></h3>

            <div class="clear"></div><!--CLEAR FLOATS-->
        </div>

    </section>
    <section class="dark-wrapper">

        <div class="wrapper overflow-hidden centered">
             <div id="slider">
                <figure>
                    <img src="img/slide1.png" alt="">
                    <img src="img/slide2.png" alt="">
                    <img src="img/slide1.png" alt="">
                    <img src="img/slide2.png" alt="">
                    <img src="img/slide1.png" alt="">
                    <img src="img/slide2.png" alt="">
                </figure>
            </div>

        </div>
        {*<section class="colour-border cyan-green">

            <div class="wrapper centered">
                <h3>Our Process <small>Prepare for Awesome.</small></h3>
                <div class="clear"></div><!--CLEAR FLOATS-->
            </div>

        </section>*}
    {/if}