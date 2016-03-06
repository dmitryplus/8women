
			<div class="top-title">Новости</div>

			<div class="news">
				
				<div class="tabs">
					<ul>
<?
	
	foreach ( $this->years as $one ) {
		echo '<li class="tabs-item '.( $this->year == $one->date ? 'active' : '' ).'"><a href="'.Yii::app()->getBaseUrl(true).'/news/year/'.$one->date.'">'.$one->date.'</a></li>';
	}	
	
?>
					</ul>
				</div>

<? foreach ( $this->allRec as $one ) { 
		$this->renderPartial('_block', array('one' => $one));
 } ?>

				<div class="news-clear"></div>


				<div class="pagination">

            <?php 
			$this->widget('CLinkPager', array(
                'pages' => $this->pages,
                'maxButtonCount'=>7,
                'header'=>'',
				'internalPageCssClass' => 'pagination__item',
				'lastPageLabel' => false,
				'firstPageLabel' => false,
				'nextPageLabel' => false,
				'prevPageLabel' => false,
				'selectedPageCssClass' => 'active',
				'htmlOptions' => array( 'class' => '' ), 
            ));
			?>
				</div>


			</div>