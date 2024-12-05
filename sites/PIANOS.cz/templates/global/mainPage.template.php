<div id="middle-column">
	<div id="nejnovejsi-clanky">
		<div class="heading">
			<h4><span>Nejnovější články</span></h4>
		</div>
		<?php printArticlesListFrontPage( $db, $labels ); ?>
	</div>
	
	<div id="kontakty">
		<?php 
            $articlesFeeder = new cElements($db, 'news', 'news');
            $article = $articlesFeeder->getLeafByUrlName( 'contacts' );
            if ( $article )
                echo $article->getContent();
            else
                echo $labels->main_page->articleNotFound;
		?>
		<p id="seznam-dealeru"><a href="seznam-dealeru" title="Seznam dealerů">Seznam dealerů<span></span></a></p>
		<p id="mapy"><a href="http://www.mapy.cz/" title="Najdi na Mapy.cz">Najdi na Mapy.cz<span></span></a></p> 
	</div>
</div>
