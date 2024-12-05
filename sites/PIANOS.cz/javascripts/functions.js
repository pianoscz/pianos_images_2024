/* ads */

$(document).ready(function(){

    if($(".foot").css('bottom') == '0px'){
    $(".foot").animate({bottom:'200px'},1000);
}
else
      {
          $(".foot").animate({bottom:'0px'},1000);
}
$(".clocker").click(function(){
    $(".foot").animate({bottom:'-200px'},1000);
});
});

 /* PRODUCTS DOUBLE SLIDER start */
 lock = new Array();
 tick = 6000;
 movePx = 31; // how many pixels the navig should be moved up or down

 $(document).ready(function() {
	 $('#productsSlider .leftColumn .product.visible').css({display: 'block', opacity: 1.0});
	 $('#productsSlider .rightColumn .product.visible').css({display: 'block', opacity: 1.0});
	 setInterval(function() {slideProducts("left")},tick);
	 setTimeout(function() {setInterval(function() {slideProducts("right")},tick)}, tick/2);

	 initializeControlPanel("left");
	 initializeControlPanel("right");
 });

/**
 * function manage 2-columns products sliding
 *
 * @param column   which column - obligatory param
 * @param option   undefined if automatic slide, "normal" or "backwards" if user-triggered slide by arrows, and "0" (all numbers 0 - infinity) if user-triggered slide by number
 */
function slideProducts(column, option) {
	//console.log($('#productsSlider .'+column+'Column .product').eq(1).find("h2").text());
	if(option != undefined) {
		lock[column] = false;
	}
	if(lock[column]) {
		//console.log(column+' locked!');
		return;
	}
	lock[column] = true;
	var current = ($('#productsSlider .'+column+'Column .product.visible')?  $('#productsSlider .'+column+'Column .product.visible') : $('#productsSlider .'+column+'Column .product:first'));
	var next;
	if(option == undefined || option == 'normal') {
		next = ((current.next().length) ? current.next() : $('#productsSlider .'+column+'Column .product:first'));
	} else if(option == 'backwards') {
		next = ((current.prev().length) ? current.prev() : $('#productsSlider .'+column+'Column .product:last'));
	} else {
		next = $('#productsSlider .'+column+'Column .product').eq(parseInt(option)-1);
	}


	//show next
	next.css({
		display: 'block',
		opacity: 0.0
	})
	.addClass('visible')
	.animate({
		opacity: 1.0
	}, 1000);

	// hide current
	current.animate({
		opacity: 0.0
	}, 1000, function () {
		current.css({
			display: 'none'
		});
		if(option == undefined) {
			lock[column] = false;
		}
	})
	.removeClass('visible');

	var currentNum = ($('#productsSlider .controlPanel.'+column+' ul li.active')?  $('#productsSlider .controlPanel.'+column+' ul li.active') : $('#productsSlider .controlPanel.'+column+' ul li:first'));
	var nextNum;
	if(option == undefined || option == 'normal') {
		nextNum = ((currentNum.next().length) ? currentNum.next() : $('#productsSlider .controlPanel.'+column+' ul li:first'));
	} else if(option == 'backwards') {
		nextNum = ((currentNum.prev().length) ? currentNum.prev() : $('#productsSlider .controlPanel.'+column+' ul li:last'));
	} else {
		nextNum = $('#productsSlider .controlPanel.'+column+' ul li').eq(parseInt(option)-1);
	}

	var currentTopCss = parseInt(currentNum.css("top"));
	var currentTopNumInt = Math.abs(currentTopCss)/31 + 1;

	var ul = $('#productsSlider .controlPanel.'+column+' ul');
	var newTopCss = currentTopCss; // as a precaution, we set the same top css as a current one

	if(parseInt(nextNum.text()) > currentTopNumInt + 2 && ul.children().length > currentTopNumInt + 4) {
		if(ul.children().length - currentTopNumInt - 4 >= parseInt(nextNum.text()) - currentTopNumInt - 2) { // (invisible bottom numbers count) > (how many numbers I need to move up)
			newTopCss = currentTopCss - (parseInt(nextNum.text()) - currentTopNumInt - 2)*movePx;
		} else {
			newTopCss = currentTopCss - (ul.children().length - currentTopNumInt - 4)*movePx;
		}
		animateUlLi(column, newTopCss, currentNum, nextNum);
	} else if(parseInt(nextNum.text()) < currentTopNumInt + 2 && currentTopNumInt > 1) {
		if(currentTopNumInt - 1 >= currentTopNumInt + 2 - parseInt(nextNum.text())) {
			newTopCss = currentTopCss + (parseInt(currentTopNumInt + 2 - nextNum.text()))*movePx;
		} else {
			newTopCss = 0;
		}
		animateUlLi(column, newTopCss, currentNum, nextNum);
	} else {
		currentNum.removeClass('active');
		nextNum.addClass('active');
	}


	if(option != undefined) {
		setTimeout(function(){
			lock[column] = false;
		}, tick);
	}
}

/**
 * function animates element <li>
 */
function animateUlLi(column, newTopCss, currentNum, nextNum) {
	$('#productsSlider .controlPanel.'+column+' ul li').animate({
		top: newTopCss
	}, 500, function () {
		currentNum.removeClass('active');
		nextNum.addClass('active');
	});
}

/**
 * Function initializes control panel from picked column
 *
 * @param column    name of the column chosen
 */
function initializeControlPanel(column) {
	 $('#productsSlider .controlPanel.'+column+' .next').click( function() {
		 slideProducts(column, "normal");
	 });
	 $('#productsSlider .controlPanel.'+column+' .prev').click( function() {
		 slideProducts(column, "backwards");
	 });
	 $('#productsSlider .controlPanel.'+column+' ul li').click( function() {
		 slideProducts(column, $(this).text());
	 });
}

/* PRODUCTS DOUBLE SLIDER end */
