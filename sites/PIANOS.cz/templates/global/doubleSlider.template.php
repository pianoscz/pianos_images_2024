<?php		$lang = determineLanguage();

			/* LEFT COLUMN ELEMENTS start */

			$leftColumnElements = "";
			$controlPanel1Lis = "";
			$i = 1;
			$wasSet = false;
			$discountExtremes1 = array('min' => 0, 'max' => 0);
			foreach($products1 as $product) {
                $discount = "";
				$actualPrice = new cPrice($product->getActualPrice(), 'CZK', $lang == 'cs' ? null : 'EUR');
				if($product->getActionPrice() > 0) {
					$diff = $product->getSellPrice() - $product->getActionPrice();
					$discountPrice = new cPrice($diff, 'CZK', $lang == 'cs' ? null : 'EUR');
					$discount = "<strong>{$labels->products->products->discount}: {$discountPrice->printPriceSymbol()}</strong>";
					if(!$wasSet) {
						$discountExtremes1['min'] = $discountPrice;
						$discountExtremes1['max'] = $discountPrice;
						$wasSet = true;
					} else if ($diff < $discountExtremes1['min']->getPriceValue()) {
						$discountExtremes1['min'] = $discountPrice;
					} else if ($diff > $discountExtremes1['max']->getPriceValue()) {
						$discountExtremes1['max'] = $discountPrice;
					}
				}
				$titleImage = $product->getTitleImage();
				$titleImage->extractImageDimensionsFromFile();
				$height = 180;
				$width = $titleImage->getWidth() / ($titleImage->getWidth() / $height);
				$visible = ($i == 1) ? "visible" : "";

                if(!$product->getPriceOnDemand()) {
                    $price = $actualPrice->printPriceSymbol();
                } else {
                    $price = $labels->products->products->priceOnDemand;
                }

				$h2Class = "";
				if(mb_strlen("{$labels->products->products->pianoShort} {$product->getTitle()}", "UTF-8") > 22) {
					$h2Class = "class='longerMoreThan22'";
				} else if(mb_strlen("{$labels->products->products->pianoShort} {$product->getTitle()}", "UTF-8") > 15) {
					$h2Class = "class='longer16to22'";
				}

$leftColumnElements .= <<<PRODUCT
					<a href="produkty/pianina/{$product->getUrlName()}" class="product $visible">
						<div class="imageContainer">
							<img src="{$titleImage->getFilename()}" width="$width" height="$height" alt="" />
						</div>
						<div class="info">
							<h2 {$h2Class}>{$labels->products->products->pianoShort} {$product->getTitle()}</h2>
							<p>
								<span class="price">
									{$price}
								</span>
								{$discount}
							</p>
						</div>
					</a>
PRODUCT;
				$active = ($i == 1) ? "class='active'" : "";
				$controlPanel1Lis .= "<li $active>{$i}</li>\n";
				$i++;
			}

			/* LEFT COLUMN ELEMENTS end */

			/* RIGHT COLUMN ELEMENTS start */

			$rightColumnElements = "";
			$controlPanel2Lis = "";
			$j = 1;
			$wasSet = false;

			$discountExtremes2 = array('min' => 0, 'max' => 0);
			foreach($products2 as $product) {
                $discount = "";
				$actualPrice = new cPrice($product->getActualPrice(), 'CZK', $lang == 'cs' ? null : 'EUR');
				if($product->getActionPrice() > 0) {
					$diff = $product->getSellPrice() - $product->getActionPrice();
					$discountPrice = new cPrice($diff, 'CZK', $lang == 'cs' ? null : 'EUR');
					$discount = "<strong>{$labels->products->products->discount}: {$discountPrice->printPriceSymbol()}</strong>";
					if(!$wasSet) {
						$discountExtremes2['min'] = $discountPrice;
						$discountExtremes2['max'] = $discountPrice;
						$wasSet = true;
					} else if ($diff < $discountExtremes2['min']->getPriceValue()) {
						$discountExtremes2['min'] = $discountPrice;
					} else if ($diff > $discountExtremes2['max']->getPriceValue()) {
						$discountExtremes2['max'] = $discountPrice;
					}
				}

                if(!$product->getPriceOnDemand()) {
                    $price = $actualPrice->printPriceSymbol();
                } else {
                    $price = $labels->products->products->priceOnDemand;
                }

				$titleImage = $product->getTitleImage();
				$titleImage->extractImageDimensionsFromFile();
				$height = 180;
				$width = $titleImage->getWidth() / ($titleImage->getWidth() / $height);
				$visible = ($j == 1) ? "visible" : "";

				$h2Class = "";
				if(mb_strlen("{$labels->products->products->pianoShort} {$product->getTitle()}", "UTF-8") > 22) {
					$h2Class = "class='longerMoreThan22'";
				} else if(mb_strlen("{$labels->products->products->pianoShort} {$product->getTitle()}", "UTF-8") > 15) {
					$h2Class = "class='longer16to22'";
				}

$rightColumnElements .= <<<PRODUCT
					<a href="produkty/klaviry/{$product->getUrlName()}" class="product $visible">
						<div class="imageContainer">
							<img src="{$titleImage->getFilename()}" width="$width" height="$height" alt="" />
						</div>
						<div class="info">
							<p>
								{$discount}
								<span class="price">
									{$price}
								</span>
							</p>
							<h2 {$h2Class}>{$labels->products->products->grandShort} {$product->getTitle()}</h2>
						</div>
					</a>
PRODUCT;
				$active = ($j == 1) ? "class='active'" : "";
				$controlPanel2Lis .= "<li $active>{$j}</li>\n";
				$j++;
			}

			/* RIGHT COLUMN ELEMENTS end */
?>
			<div id="productsSlider">
				<h2 class="topLeft">
					<strong><?php echo $labels->products->products->specialOfferPiano; ?></strong>&nbsp;
						<?php if ($discountExtremes1['min'] && $discountExtremes1['max']) { echo "{$labels->products->products->specialOffer} {$discountExtremes1['min']->printPrice()} - {$discountExtremes1['max']->printPriceSymbol()}"; } ?>
				</h2>

					<div class="leftColumn">
						<!-- inner elements start -->

<?php echo				$leftColumnElements;
?>
						<!-- inner elements end -->
					</div>
					<div class="rightColumn">
						<!-- inner elements start -->
<?php echo				$rightColumnElements;
?>

						<!-- inner elements end -->
					</div>
					<div class="left controlPanel">
						<img class="prev" src="sites/PIANOS.cz/images/slider-top-left-arrow.png" alt="^" width="26" height="24" />
						<ul>
<?php echo					$controlPanel1Lis;
?>
						</ul>
						<img class="next" src="sites/PIANOS.cz/images/slider-bottom-left-arrow.png" alt="ˇ" width="26" height="24" />
					</div>
					<div class="right controlPanel">
						<img class="prev" src="sites/PIANOS.cz/images/slider-top-right-arrow.png" alt="^" width="26" height="24" />
						<ul>
<?php echo					$controlPanel2Lis;
?>
						</ul>
						<img class="next" src="sites/PIANOS.cz/images/slider-bottom-right-arrow.png" alt="ˇ" width="26" height="24" />
					</div>
					<h2 class="bottomRight">
						<strong><?php echo $labels->products->products->specialOfferGrand; ?></strong>&nbsp;
							<?php if ($discountExtremes2['min'] && $discountExtremes2['max']) { echo "{$labels->products->products->specialOffer} {$discountExtremes2['min']->printPrice()} - {$discountExtremes2['max']->printPriceSymbol()}"; } ?>
					</h2>
				</div>