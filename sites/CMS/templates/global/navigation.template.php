<!-- NAVIGATION start -->
<div id="navigation">
<?php /*
	<?php if($printBreadcrumbs) {
	$webTitle = $labels->{$web->getTitle()}->base->title;
	?><div id="breadCrumbs">
		<a href="./" title="<?php echo $webTitle?>"><?php echo $labels->common->mainPage;?></a> <span>&nbsp;</span>
		<?php if( is_array($breadcrumbs) ) {
			foreach( $breadcrumbs as $breadcrumb ) {
				$url   = './';
				$url  .= $breadcrumb['url'];
				$title = $breadcrumb['title'];
				if($breadcrumb['url'] != "") {
					echo '<a href="'.$url.'" title="'.$title.'">'.$title.'</a>'."<span>&nbsp;</span>\n";
				}
				else {
					echo $title;
				}
			}
		}?>
	</div>
	<?php }?>
*/ ?>
	<!-- MAIN MENU start -->
	<div class="mainMenu">
            <?php if(is_array($pages) && $pages[PAGES_TEXTS_GROUP_ID]) { ?>
		<ul>
		<?php foreach($pages[PAGES_TEXTS_GROUP_ID] as $menuItem) {
			$class = ($currentSectionID == $menuItem->getID())? ' class="selected"' : "";
			?><li><a href="<?php echo ($menuItem->getID() != MAIN_PAGE_ID)? $menuItem->getUrlName() : BASE_HREF;?>"<?php echo $class;?> title="<?php echo $menuItem->getTitle();?>"><span><?php echo $menuItem->getTitle();?></span></a><?php
			if(isset($pages[$menuItem->getID()])) {
				?><ul><?php
				foreach($pages[$menuItem->getID()] as $subMenuItem) {
					?><li><a href="<?php echo $menuItem->getUrlName()."/".$subMenuItem->getUrlName();?>" title="<?php echo $subMenuItem->getTitle();?>">
						<span><?php echo $subMenuItem->getTitle();?></span>
						</a></li><?php
				}
				?></ul><?php
			}
			?></li><?php
		}?>
		</ul>
            <?php } ?>
		<div id="languagueMenu">
			<h2>Volba jazyka</h2>
			<ul>
				<li><a href="#" title="česky">česky</a> |</li>
				<li><a href="#" title="deutsch">deutsch</a></li>
			</ul>
		</div>

		<div id="searchBox">
			<form action="<?php echo $labels->search->searchUrl ?>" method="post">
				<p>
					<input type="submit" id="searchsubmit" value="&nbsp;" 
					alt="<?php echo $labels->search->title ?>" title="<?php echo $labels->search->title ?>" 
					/><input type="text" value="<?php echo $labels->search->value ?>" name="s" id="s" 
					onfocus="if (this.value == '<?php echo $labels->search->value ?>') {this.value = '';}" 
					onblur="if (this.value == '') {this.value = '<?php echo $labels->search->value ?>';}" />
				</p>
			</form>
		</div>

		<div id="logbox">
		<?php if( cAuthentication::isLogged() === true ) {
				include 'templates/user/smallOverview.template.php';
			} else { ?>
			<form class="inner" action="index.php?action=login" method="post">
				<div>
					<input class="pole" id="login" name="userName" size="10" value="" maxlength="100" type="text" onfocus="javascript: if(this.value==this.defaultValue) this.value='';" onblur="javascript: if(this.value=='') this.value=this.defaultValue;" />
				<input class="pole" id="heslo" name="password" size="10" value="" maxlength="100" type="password" onfocus="javascript: if(this.value==this.defaultValue) this.value='';" onblur="javascript: if(this.value=='') this.value=this.defaultValue;" />
				<input type="hidden" name="returnRedirectUrl" value="<?php echo htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" />
					<input type="submit" value="Přihlásit"/>
				<input type="checkbox" name="permanent" id="permanentLogin" /><label for="permanentLogin">Trvalé přihlášení</label> |
			<a href="registrace">Registrace</a>
			 <?php /* <a href="zapomenute-heslo">Zapomněl jsem heslo</a> */ ?> </div>
			</form>
		<?php } ?>
	</div>


	</div>
	<!-- MAIN MENU end -->

	<div class="cleaner"><hr /></div>
</div>
<!-- NAVIGATION end -->

<?php

?>