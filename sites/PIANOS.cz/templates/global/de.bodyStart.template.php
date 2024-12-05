<body id="<?php echo $sectionClass ?>" onmouseover="onmo();">
<div id="page" class="<?php echo $sectionClass ?>">
    <div id="accessibility">
    <ul>
      <!-- <li><a id="help" href="napoveda/" title="Nápověda (prohlášení o přístupnosti, klávesové zkratky, změna vzhledu, typografické konvence, copyright)"><span>Nápověda</span></a></li> -->
      <li><a id="skip_to_content-cz" class="move" href="#content" title="Skočit na obsah (přeskočit hlavičku)"><span>Skočit na obsah</span></a></li>
      <li><a id="skip_to_menu" class="move" href="#menu" title="Skočit na menu (přeskočit hlavičku a obsah)"><span>Skočit na menu</span></a></li>
    </ul>

    <hr class="hidden" />
  </div>

  <div id="header">

    <h1><a href="./" accesskey="1" title="DRNEK PIANA – Klassik Piano, Klaviere, Konzertflügel, Cembalos – Verkauf, Vermietung, Aufkaufen und Renovierung Tastenmusikinstrumenten -&gt; Hauptseite">Klaviere, Klassik piano, Konzertflügel, Cembalo - Verkauf, Vermietung, Aufkaufen, Renovierung, Stimmung<span></span></a></h1>
    

    <p id="navigation"><a id="pianina<?php echo "-".$lang ?>"<?php if(get('category')=="pianina") echo ' class="active"';?> href="produkty/pianina/" title="Klaviere, Klassik Piano">Klaviere, Klassik Piano<span></span></a><span class="hidden"> | </span><a id="klaviry<?php echo "-".$lang ?>"<?php if(get('category')=="klaviry") echo ' class="active"';?> href="produkty/klaviry/" title="Konzert-Flügel, Cembalo">KonzertFlügel, Cembalo<span></span></a></p>

      <?php echo $sectionClass; if ($sectionClass!="detail-pianina") { ?>
      <div id="steinway">
          <p>Ab dem 1. Juli 2013 sind wir der exklusive Importeur der Marken Steinway & Sons, Boston, Essex.</p>
          <p>
              <a class="steinway" href="produkty/?zn=Steinway+and+Sons"><span>Steinway &amp; Sons</span></a>
              <a class="boston" href="produkty/?zn=Boston"><span>Boston</span></a>
              <a class="essex last" href="produkty/?zn=Essex"><span>Essex</span></a>
          </p>
		<br style="clear: both" />
		<p></p>
		<p class="red bold">In naher Zukunft eröffneten wir eine neue Filiale in Bratislava!</p>
      </div>
      <p id="manufacturers">
          <?php } else { ?>

      <p id="manufacturers" class="only">
          <?php }


          function manufactures ()
	{
		$lang = determineLanguage();
		$web  = determineWeb(null,$lang);
		$db   = new cDatabase( $web->getDatabaseName(), true );
		$parametersPredefinedValuesFeeder = new cDBFeederGeneral('cParametersPredefinedValues', $db);
		$manufactures = $parametersPredefinedValuesFeeder->getLeavesByColumnValue('parameter_ID',5);
		if(is_array($manufactures)) {
			$i = 1;
			$j = 1;
			foreach($manufactures as $manufacture) {
				echo '<a href="produkty/?zn='.urlencode($manufacture->getValue()).'" title="'.$manufacture->getValue().'">'.htmlspecialchars(mb_strtoupper(htmlspecialchars_decode($manufacture->getValue()), "utf-8")).'</a>';
				if ($i == 9) {
					$i = 1;
					echo "<br />\n";
				}
				elseif ($j != count($manufactures)) {
					$i++;
					echo " | \n";
				}
				$j++;
			}
		}
	}
 	if (get("zn")=="all") {
		manufactures ();
		} else {
	?>
    <a href="produkty/?zn=Petrof" title="Klaviere & Konzert-Flügel Petrof" class="petrof"><span>PETROF</span></a>
    <a href="produkty/?zn=F%C3%B6rster" title="Klaviere & Konzert-Flügel Förster" class="forster"><span>FÖRSTER</span></a>
    <a href="produkty/?zn=R%C3%B6sler" title="Klaviere & Konzert-Flügel Rösler" class="rosler"><span>RÖSLER</span></a>
	<a href="produkty/?zn=Scholze" title="Klaviere & Konzert-Flügel Scholze" class="scholze"><span>SCHOLZE</span></a>
	<a href="produkty/?zn=Weinbach" title="Klaviere & Konzert-Flügel Weinbach" class="weinbach"><span>WEINBACH</span></a>
    <a href="produkty/?zn=C.+Bechstein" title="Klaviere & Konzert-Flügel C. Bechstein" class="bechstein"><span>C. BECHSTEIN</span></a>
	<a href="produkty/?zn=B%C3%B6sendorfer" title="Klaviere & Konzert-Flügel Bösendorfer" class="bosendorfer"><span>BÖSENDORFER</span></a>
	<a href="produkty/?zn=Bl%C3%BCthner" title="Klaviere & Konzert-Flügel Blüthner" class="bluthner"><span>BLÜTHNER</span></a><br />
    
    <a href="produkty/?zn=Steinway+and+Sons" title="Klaviere & Konzert-Flügel Steinway and Sons" class="steinway"><span>STEINWAY AND SONS</span></a>
    <a href="produkty/?zn=Yamaha" title="Klaviere & Konzert-Flügel Yamaha" class="yamaha"><span>YAMAHA</span></a>
	<a href="produkty/?zn=Kawai" title="Klaviere & Konzert-Flügel Kawai" class="kawai"><span>KAWAI</span></a>
    <a href="produkty/?zn=Ed.+Seiler" title="Klaviere & Konzert-Flügel Ed. Seiler" class="seiler"><span>ED. SEILER</span></a>
    <a href="produkty/?zn=Gr.+Steinweg" title="Klaviere & Konzert-Flügel Grotrian Steinweg" class="steinweg"><span>GROTRIAN STEINWEG</span></a>
	<a href="produkty/?zn=Schimmel" title="Klaviere & Konzert-Flügel Schimmel" class="schimmel"><span>SCHIMMEL</span></a>
	<a href="produkty/?zn=Sauter" title="Klaviere & Konzert-Flügel Sauter" class="sauter"><span>SAUTER</span></a>
    <!--<a href="produkty/?zn=all" title="Další značky">ostatní</a>-->
    <?php
    };
	?>
</p>
	<div id="big-piano">
        <div id="language">
        <?php
//        $langURL = substr($_SERVER['REQUEST_URI'],1);
//        $langURL = Str_Replace("cz/","",$langURL);
//        $langURL = Str_Replace("en/","",$langURL);
//        $langURL = Str_Replace("de/","",$langURL);
//        $langURLCZ = "/cz/".$langURL;
//        $langURLEN = "/en/".$langURL;
//        $langURLDE = "/de/".$langURL;
			
		// fix lengue redirect
        $feader = new cDBFeederGeneral("cWebs", new cDatabase( DATABASE_NAME, true ));
        foreach ($feader->getAllLeaves() as $cWeb) {
        	$langs[$cWeb->getLang()] = $cWeb->getUrlName();
        };
        
		$urlWeb = curPageURL();
        $langURLDE = "https://".$langs['de'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) .$_SERVER["REQUEST_URI"];
        $langURLCZ = "https://".$langs['cs'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) .$_SERVER["REQUEST_URI"];
        $langURLEN = "https://".$langs['en'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) .$_SERVER["REQUEST_URI"];
        $langURLSK = "https://".$langs['sk'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) . $_SERVER["REQUEST_URI"];
        ?>
        <a id="cz" class="active" href="<?php echo $langURLCZ;?>" title="Česká verze">CZ<span></span></a> |
        <a id="en" href="<?php echo $langURLEN;?>" title="English version">EN<span></span></a> |
        <a id="de" href="<?php echo $langURLDE;?>" title="Deutsch version">DE<span></span></a> |
        <a id="sk" href="<?php echo $langURLSK;?>" title="Slovenská verzia">SK<span></span></a>
        </div>
    </div>
    <hr class="hidden" />
  </div>

  <div id="content"><div id="content-top"><div id="content-bottom">