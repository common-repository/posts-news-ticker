<?php 

/**

*Plugin Name: Posts News Ticker
*Plugin URI : http://www.hamzasportfolio.com
*Author: Hamza Rauf
*Author URI: http://www.hamzasportfolio.com
*Description: show latest posts in news ticker
*Version: 1.0.0
**/



function newsticker_showposts(){
	
	?>
	<style>
	.timeleft{
		
		width:20%;
	}
	.postsrightmarquee{
		width:80% !important;
		
		
	}
	@media screen and (max-width: 480px){
	.postsrightmarquee{
		width:54% !important;
		
		
	}
	.timeleft{
		
		width:36% !important;
	}
	
	}
	
	
	</style>
	
	
	
 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>		<div style="position:fixed;bottom:0px;width:100%;height:40px;background:#d11215;color:#fff;z-index:99999999999">
	
	<div style="float:left;" class="timeleft">
	<form name="clock">
		<input type="submit" class="trans" name="face" value="" style="width:150px; background: #1a1a1a !important; border: 0;border-radius: 2px;color: #fff;font-family: Montserrat, sans-serif;
    font-weight: 700;
	height:40px;
	font-size:18px !important;
    letter-spacing: 0.046875em;
    line-height: 1;
    padding: 0.84375em 0.875em 0.78125em;
    text-transform: uppercase;">
	</form>
		</div>
		<div style="float:right;width:80%;height:40px;padding:5px;" class="postsrightmarquee">
	<marquee onmouseover="this.stop();" onmouseout="this.start();">
	<p>
	
			
			  
	<?php 
	$posts = new WP_Query(array(
	
	'post_type'=>'post',
	'posts_per_page'=>10
	
	));
	
	
	while($posts->have_posts()): $posts->the_post();?>
	
	<span> <a href="<?php the_permalink();?>" style="text-decoration:none;color:#fff;font-family: Merriweather, Georgia, serif;
    font-size: 17px !important;
    font-size: 1rem;
    line-height: 1.75;"><?php the_title();?></span></a><span> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;</span>  
	
	<?php endwhile;?>
	</p>
	</marquee>
	</div>
	
	</div>
	
	<?php
	
	
	
	
}
add_action('wp_footer','newsticker_showposts');


