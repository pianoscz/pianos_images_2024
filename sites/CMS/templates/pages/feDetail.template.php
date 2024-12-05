<h2><?php echo $page->getTitle(); ?></h2>

<?php echo $page->getContent();	?>

<div id="poptavka">
	<h2><?php echo $labels->faq->form->title;?></h2>
	<?php printQuestionForm( $db, $labels, $page->getID(), $message, $data );?>
</div>