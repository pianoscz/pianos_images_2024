<?php
$textsFeeder = new cDBFeederLang('cPages',$db);
$address 	 = $textsFeeder->whereColumnEq('url_name', "address")->getOne();
$visitBackLinks 	 = $textsFeeder->whereColumnEq('url_name', "visit-backlinks")->getOne();
$extBackLinks		 = $textsFeeder->whereColumnEq('url_name', "ext-backlinks")->getOne();
?>
					<div class="cleaner"></div>

					<hr class="hidden" />
				</div>
			</div>
		</div>

		<div id="menu<?php echo "-".$lang ?>">
			<div id="menu_title">Menu</div>
			<ul>
				<li>
					<a id="menu-1-about<?php echo "-".$lang ?>" href="o-firme" accesskey="1" title="<?php echo $labelsMenu->about_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 1]">
						<?php echo $labelsMenu->about; ?><span></span>
					</a>
					<?php /*<ul>
						<li>
							<a href="historie" title="<?php echo $labelsMenu->history_title; ?>"><?php echo $labelsMenu->history; ?></a>
						</li>
					</ul>*/ ?>
				</li>
				<li>
					<a id="menu-3-pianina<?php echo "-".$lang ?>" href="produkty/pianina/" accesskey="2" title="<?php echo $labelsMenu->pianino_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 2]">
						<?php echo $labelsMenu->pianino; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-4-kridla<?php echo "-".$lang ?>" href="produkty/klaviry/" accesskey="3" title="<?php echo $labelsMenu->piano_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 3]">
						<?php echo $labelsMenu->piano; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-5-buyout<?php echo "-".$lang ?>" href="vykup" accesskey="4" title="<?php echo $labelsMenu->buyout_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 4]">
						<?php echo $labelsMenu->buyout; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-6-repairs<?php echo "-".$lang ?>" href="opravy" accesskey="5" title="<?php echo $labelsMenu->repairs_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 5]">
						<?php echo $labelsMenu->repairs; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-7-seat<?php echo "-".$lang ?>" href="zajimavosti-o-klavirech-a-pianinech/" accesskey="6" title="<?php echo $labelsMenu->about_pianos_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 6]">
						<?php echo $labelsMenu->seat; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-8-contact<?php echo "-".$lang ?>" href="kontakt" accesskey="7" title="<?php echo $labelsMenu->contact_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 7]">
						<?php echo $labelsMenu->contact; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-9-rent<?php echo "-".$lang ?>" href="pronajem-klaviru-a-pianin" accesskey="8" title="<?php echo $labelsMenu->rent_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 8]">
						<?php echo $labelsMenu->rent; ?><span></span>
					</a>
				</li>
				<li>
					<a id="menu-10-references<?php echo "-".$lang ?>" href="reference" accesskey="9" title="<?php echo $labelsMenu->reference_title." [".$labelsMenu->key_shortcut.": "; ?> Alt + 9]">
						<?php echo $labelsMenu->referece; ?><span></span>
					</a>
				</li>
			</ul>
		</div>

		<div id="footer">
			<p id="bottom_menu">
				<a href="o-firme" title="<?php echo $labelsMenu->about_title; ?>"><?php echo mb_strtoupper($labelsMenu->about,"utf-8"); ?></a> |
				<a href="produkty/pianina/" title="<?php echo $labelsMenu->pianino_title; ?>"><?php echo mb_strtoupper($labelsMenu->pianino,"utf-8"); ?></a> |
				<a href="produkty/klaviry/" title="<?php echo $labelsMenu->piano_title; ?>"><?php echo mb_strtoupper($labelsMenu->piano,"utf-8"); ?></a> |
				<a href="vykup" title="<?php echo $labelsMenu->buyout_title; ?>"><?php echo mb_strtoupper($labelsMenu->buyout,"utf-8"); ?></a> |
				<a href="opravy" title="<?php echo $labelsMenu->repairs_title; ?>"><?php echo mb_strtoupper($labelsMenu->repairs,"utf-8"); ?></a> |
				<a href="zajimavosti-o-klavirech-a-pianinech/" title="<?php echo $labelsMenu->about_pianos_title; ?>"><?php echo mb_strtoupper($labelsMenu->about_pianos_title,"utf-8"); ?></a> |
				<a href="kontakt" title="<?php echo $labelsMenu->contact_title; ?>"><?php echo mb_strtoupper($labelsMenu->contact,"utf-8"); ?></a> |
				<a href="odkazy" title="<?php echo $labelsMenu->links_title; ?>"><?php echo mb_strtoupper($labelsMenu->links,"utf-8"); ?></a> |
				<a href="reference" title="<?php echo $labelsMenu->reference_title; ?>"><?php echo mb_strtoupper($labelsMenu->referece,"utf-8"); ?></a>
			</p>

			<div id="back-links">
				<?php
				if ( $extBackLinks ) {
					echo $extBackLinks->getContent();
				}

				if ( $visitBackLinks ) {
					echo $visitBackLinks->getContent();
				}
				?>
			</div>

			<p id="copyright_update">
				<?php echo $labelsFooter->last_update; ?>: 1.&nbsp;února 2018<br />
				COPYRIGHT (c) Jan Drnek 2018 - piano, klavír, servis
			</p>

			<p id="realizace"><a href="http://www.inspirio.cz/" title="<?php echo $labelsFooter->webdesign_title; ?>"><?php echo mb_strtoupper($labelsFooter->webdesign,"utf-8"); ?></a>: Inspirio s.r.o.<a class="external_link" href="tvorba-www-stranek" title="webdesign">Tvorba webových stránek</a> s.r.o.<br />
				<br>
                <p>Virtuální prohlídka vytvořena firmou <a href="http://www.360vision.cz">360vision.cz</a></p>
			</p>


			<div class="cleaner">&nbsp;</div>
		</div>
	</div>

<script type="text/javascript">
    /* <![CDATA[ */
    var seznam_retargeting_id = 29877;
    /* ]]> */
</script>
<script type="text/javascript" src="//c.imedia.cz/js/retargeting.js"></script>

</body>
</html>
