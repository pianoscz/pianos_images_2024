<body id="<?php echo $sectionClass ?>" onmouseover="onmo();">
<div id="page" class="<?php echo $sectionClass ?>">
    <div id="accessibility">
    <ul>
      <!-- <li><a id="help" href="napoveda/" title="Nápověda (prohlášení o přístupnosti, klávesové zkratky, změna vzhledu, typografické konvence, copyright)"><span>Nápověda</span></a></li> -->
      <li><a id="skip_to_content-cz" class="move" href="#content" title="Skočiť na obsah (preskočiť hlavičku)"><span>Skočiť na obsah</span></a></li>
      <li><a id="skip_to_menu" class="move" href="#menu" title="Skočiť na menu (preskočiť hlavičku a obsah)"><span>Skočiť na menu</span></a></li>
    </ul>

    <hr class="hidden" />
  </div>

  <div id="header">

    <h1><a href="./" accesskey="1" title="Drnek Piána -&gt; Hlavná stránka">klavír, klavíry, piáno, piána, pianíno, pianína,  &ndash; piano predaj, výkup, prenájom, servis<span></span></a></h1>
    

    <p id="navigation"><a id="pianina<?php echo "-".$lang ?>"<?php if(get('category')=="pianina") echo ' class="active"';?> href="produkty/pianina/" title="Piana, pianína">Pianína<span></span></a><span class="hidden"> | </span><a id="klaviry<?php echo "-".$lang ?>"<?php if(get('category')=="klaviry") echo ' class="active"';?> href="produkty/klaviry/" title="Klavíry, koncertné krídla, čembalá">Klavír, klavíry<span></span></a></p>
    <?php echo $sectionClass; if ($sectionClass!="detail-pianina") { ?>
    <div id="steinway">
    	<p>Od 1. 6. 2013 sme výhradným dovozcom značiek Steinway &amp; Sons, Boston, Essex.</p>
        <p>
            <a class="steinway" href="produkty/?zn=Steinway+and+Sons"><span>Steinway &amp; Sons</span></a>
            <a class="boston" href="produkty/?zn=Boston"><span>Boston</span></a>
            <a class="essex last" href="produkty/?zn=Essex"><span>Essex</span></a>
		</p>
		<br style="clear: both" />
		<p></p>
		<p class="red bold">V blízkej dobe budeme otvárať nový obchod v Bratislave!</p>
    </div>
    <p id="manufacturers">
    <?php } else { ?>
    
    <p id="manufacturers" class="only">
     <?php } ?>
    
<?php
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
?>

    <?php if (get("zn")=="all") {
		manufactures ();
		} else {
	?>
    <a href="produkty/?zn=Petrof" title="Piana a klavíry Petrof" class="petrof"><span>piano, klavír PETROF</span></a>
    <a href="produkty/?zn=F%C3%B6rster" title="Piana a klavíry Förster" class="forster"><span>piano, klavír FÖRSTER</span></a>
    <a href="produkty/?zn=R%C3%B6sler" title="Piana a klavíry Rösler" class="rosler"><span>piano, klavír RÖSLER</span></a>
	<a href="produkty/?zn=Scholze" title="Piana a klavíry Scholze" class="scholze"><span>piano, klavír SCHOLZE</span></a>
	<a href="produkty/?zn=Weinbach" title="Piana a klavíry Weinbach" class="weinbach"><span>piano, klavír WEINBACH</span></a>
    <a href="produkty/?zn=C.+Bechstein" title="Piana a klavíry C. Bechstein" class="bechstein"><span>piano, klavír C. BECHSTEIN</span></a>
	<a href="produkty/?zn=B%C3%B6sendorfer" title="Piana a klavíry Bösendorfer" class="bosendorfer"><span>piano, klavír BÖSENDORFER</span></a>
	<a href="produkty/?zn=Bl%C3%BCthner" title="Piana a klavíry Blüthner" class="bluthner"><span>piano, klavír BLÜTHNER</span></a><br />
    
    <a href="produkty/?zn=Steinway+and+Sons" title="Piana a klavíry Steinway and Sons" class="steinway"><span>piano, klavír STEINWAY AND SONS</span></a>
    <a href="produkty/?zn=Yamaha" title="Piana a klavíry Yamaha" class="yamaha"><span>piano, klavír YAMAHA</span></a>
	<a href="produkty/?zn=Kawai" title="Piana a klavíry Kawai" class="kawai"><span>piano, klavír KAWAI</span></a>
    <a href="produkty/?zn=Ed.+Seiler" title="Piana a klavíry Ed. Seiler" class="seiler"><span>piano, klavír ED. SEILER</span></a>
    <a href="produkty/?zn=Gr.+Steinweg" title="Piana a klavíry Grotrian Steinweg" class="steinweg"><span>piano, klavír GROTRIAN STEINWEG</span></a>
	<a href="produkty/?zn=Schimmel" title="Piana a klavíry Schimmel" class="schimmel"><span>piano, klavír SCHIMMEL</span></a>
	<a href="produkty/?zn=Sauter" title="Piana a klavíry Sauter" class="sauter"><span>piano, klavír SAUTER</span></a>
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
			
        // fix language redirect
        $feader = new cDBFeederGeneral("cWebs", new cDatabase( DATABASE_NAME, true ));
        foreach ($feader->getAllLeaves() as $cWeb) {
        	$langs[$cWeb->getLang()] = $cWeb->getUrlName();
        };
        
        $urlWeb = curPageURL();
        $langURLDE = "https://".$langs['de'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) . $_SERVER["REQUEST_URI"];
        $langURLCZ = "https://".$langs['cs'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) . $_SERVER["REQUEST_URI"];
        $langURLEN = "https://".$langs['en'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) . $_SERVER["REQUEST_URI"];
        $langURLSK = "https://".$langs['sk'] . ( $_SERVER["SERVER_PORT"] != 80 ? ':'.$_SERVER["SERVER_PORT"] : '' ) . $_SERVER["REQUEST_URI"];
        ?>
        <a id="sk" style="left: 0px;" class="active" href="<?php echo $langURLSK;?>" title="Slovenská verzia">SK<span></span></a> |
        <a id="cs" style="left: 30px;" href="<?php echo $langURLCZ;?>" title="Česká verze">CZ<span></span></a> |
        <a id="en" style="left: 60px;" href="<?php echo $langURLEN;?>" title="English version">EN<span></span></a> |
        <a id="de" style="left: 90px;" href="<?php echo $langURLDE;?>" title="Deutsch version">DE<span></span></a>
        </div>
    </div>
    <hr class="hidden" />
  </div>
	
  <div id="content"><div id="content-top"><div id="content-bottom">