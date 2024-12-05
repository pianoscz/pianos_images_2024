<!-- CONTENT start -->
<div id="content">
	<div id="leftColumn">

		<?php
			if( $mainPage )
				echo $mainPage->getPerex();
		?>

		<div id="service">
			<h2><?php echo $webLabels->menu->services?></h2>
			 <?php
			 if(isset($activitiesPages) && $activitiesPages) {
                $count = 0;
                $end   = count($activitiesPages);
                foreach( $activitiesPages as $item )
                {
                	$label = str_replace( array( '(', ')' ), array( '<span>(', ')</span>' ), $item->getTitle() );

                	if( $count%6 == 0 ) {
                		if( $count != 0 ) {?></ul><?php }
                		?><ul><?php
                	}
                    if(isset($activitiesGroup) && $activitiesGroup) {
                		?>
                		<li><a href="<?php echo $activitiesGroup->getUrlName()."/".$item->getUrlName();?>" title="<?php echo $item->getTitle();?>"><?php echo $label;?></a></li>
                		<?php
                    }
                	$count++;
                	if($count == $end) {
                		?></ul><?php
                	}
                }
			 }
             if(isset($activitiesGroup) && $activitiesGroup) {
             	?>
				<p class="linkMore"><a href="<?php echo $activitiesGroup->getUrlName()."/";?>">Více informací</a></p>
				<?php 
			 } ?>
			<div class="cleaner"><hr /></div>

			</div>

		<a href="#"><img src="<?php echo $web->getWebPath(); ?>/images/img_rss.gif" alt="RSS" class="right" /></a>
		<h2><?php echo $labels->news->title;?></h2>

		<div id="news">
		<?php
		if($news) {
			?><ul><?php
			foreach($news as $item) {
				$image = (is_array($newsImages) && isset($newsImages[$item->getID()]))? $newsImages[$item->getID()]->getUrlname() : "CMS/repository/Image/img_sample-index.jpg";
				?>
				<li>
					<a href="<?php echo "./".$labels->news->url_name."/".$item->getUrlName();?>"><img src="<?php echo $image?>" alt="<?php echo $item->getTitle();?>" /></a>
					<h3><?php echo $item->getTitle();?></h3>
					<p>
						<?php echo $item->getPerex();?>
						<span><a href="<?php echo "./".$labels->news->url_name."/".$item->getUrlName();?>"><?php echo $labels->common->more ?></a></span>
					</p>

				</li>
				<?php
			}
			?></ul><?php
		}
		?>
		</div>

		<p class="linkMore"><a href="<?php echo "./".$labels->news->url_name."/";?>"><?php echo $labels->news->more_news;?></a></p>

		<?php
			if( $mainPage )
				echo $mainPage->getContent();
		?>

	</div>

	<div id="rightColumn">
		<div id="boxPerex">
			<img src="sites/CMS/repository/Image/img_pruchova.jpg" alt="MUDr. Miroslava Průchová" />
			<h3>MUDr. Miroslava Průchová</h3><br /><br />
			<p><strong>Doktorka estetické plastické chirurgie<br />Držitelka licence české lékařské komory</strong></p>
			<p>Je členkou společnosti chirurgické, plastické chirurgie a estetické plastické chirurgie.</p><br />
	<p><strong>Kontakt</strong><br />
    MUDr. Miroslava Průchová<br />
	Fakultní nemocnice Plzeň<br />
oddělení plastické chirurgie<br />
Alej Svobody 80, 304 60 Plzeň<br />
	<p>Telefon: +420 377 103 672<br />
	E-mail: <a href="mailto:email@email.cz">email@email.cz</a></p>
	<div class="hr"></div>
			<!--<p class="linkMore"><a href="#">Více informací</a></p>-->
            

			<div class="cleaner"><hr /></div>
		</div>

		<?php if( isset	( $faqItems ) &&  is_array( $faqItems ) && count( $faqItems ) ) { ?>
			<h2>Nejnovější dotazy</h2>
			<ul>
				<?php foreach( $faqItems as $faqItem ) { ?>
				<li>
					<h3><?php echo $faqItem->getQuestion() ?></h3>
					<?php echo $faqItem->getAnswer() ?>
				</li>
				<?php } ?>
			</ul>
		<?php } ?>

		</div>

		<div class="cleaner"><hr /></div>

</div><!-- CONTENT end -->