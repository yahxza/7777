<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
        </div>
	</div>
</div>
<div id="content">
	<div class="container">
		<h1 class="b-title"><? echo $news_title; ?></h1>
		<div class="news-list-in-news">	
		<?php echo $content; ?>			
        </div>
        <div class="text-center">	
		    <ul class="pagination">
<?php
if($news_pages > 0 && $cur_page == 1) echo '<li class="prev disabled"><span>&laquo;</span></li>';
if($news_pages > 0 && $cur_page > 1) echo '<li class="next"><a href="?page='.$prev_page.'"><div data-page="1">&laquo;</div></a></li>';

for ($x = 1; $x-1 < $news_pages; $x++)
{
    if($x != $cur_page) echo '<li><a href="?page='.$x.'">'.$x.'</a></li>';
	if($x == $cur_page) echo '<li class="active"><a href="?page='.$x.'">'.$x.'</a></li>';
}
if($news_pages > 0 && $cur_page == $news_pages) echo '<li class="prev disabled"><span>&raquo;</span></li>';
if($news_pages > 0 && $cur_page < $news_pages) echo '<li class="next"><a href="?page='.$next_page.'"><div data-page="1">&raquo;</div></a></li></ul>';
?>			
         </div>
	</div>
</div>