<div id="leftColumn">
	<table class="sluzby">
		<?php
		$count = 0;
		foreach($subPages as $subPage) {
			//$image = (isset($titleImages[$subPage->getID()]))? $titleImages[$subPage->getID()]->getUrlName()  : "COMTESFHT/repository/Image/img_sample-sluzby.jpg";
			$urlLink = $page->getUrlName()."/".$subPage->getUrlName();
				
			if($count%3 == 0) {
				if($count != 0) { ?>
			</tr>
			<?php }
			?>
			<tr>
			<?php
			}
			?>
				<td valign="top">
				<h2><?php echo $subPage->getTitle();?></h2>
				<?php echo $subPage->getPerex();?>
				<p class="linkWhite"><a href="<?php echo $urlLink;?>">Zobrazit vše o
				zákroku</a></p>
				</td>
				<?php
				$count++;
		}
		for($i=1; $i<=(3-$count%3);$i++) {
			?><td valign="top"></td><?php
		}
		?>
		</tr>
	</table>
</div>

<div class="cleaner"><hr /></div><!-- zde může pokračovat další text... --> 
