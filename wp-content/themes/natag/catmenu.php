<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ddaccordion.js"></script>

<script type="text/javascript">

ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='<?php  bloginfo("template_directory"); ?>/images/plus.png' class='statusicon' />", "<img src='<?php  bloginfo("template_directory"); ?>/images/minus.png' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		myiframe=window.frames["myiframe"]
		if (expandedindices.length>0 && expandedindices[expandedindices.length-1]>=2)
			myiframe.location.replace(headers[expandedindices.pop()].getAttribute('href')) //Get "href" attribute of final expanded header to load into IFRAME
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		if (state=="block" && isuseractivated==true && index>=2){ //if header is expanded and as the result of the user initiated action
			myiframe.location.replace(header.getAttribute('href'))
		}
	}
})

</script>
<style type="text/css">
.submenu{display: none}
a.hiddenajaxlink{display: none}
</style>
<style type="text/css">

.glossymenu{
margin: 5px 0;
padding: 0;
width: 250px; /*width of menu*/
border: 1px solid #CCC;
border-right-width: 0;
border-left-width: 0;
border-bottom-width: 0;
}

.glossymenu a.menuitem{
/*background: black url(glossyback.gif) repeat-x bottom left;*/
font: bold 14px "Lucida Grande", "Trebuchet MS", Verdana, Helvetica, sans-serif;
color: #000;
display: block;
position: relative;
width: auto;
padding: 4px 0;
padding-left: 30px;
text-decoration: none;
text-align:left;
border: 1px solid #CCC;
border-right-width: 0;
border-left-width: 0;
border-top-width: 0;
}


.glossymenu a.menuitem:visited, .glossymenu .menuitem:active{
color: #000;
}

.glossymenu a.menuitem .statusicon{ /*CSS for icon image that gets dynamically added to headers*/
position: absolute;
top: -40px;
left:5px;
/*right: 5px;*/
border: none;
}

.glossymenu a.menuitem:hover{
background-image: url(glossyback2.gif);
}

.glossymenu div.submenu{ /*DIV that contains each sub menu*/
/*background: white;*/
}

.glossymenu div.submenu ul{ /*UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
}

.glossymenu div.submenu ul li{
border-bottom: 1px solid #CCC;
}

.glossymenu div.submenu ul li a{
display: block;
font: normal 13px "Lucida Grande", "Trebuchet MS", Verdana, Helvetica, sans-serif;
color: black;
text-decoration: none;
padding: 2px 0;
padding-left: 15px;
text-align:left;
margin-left:30px;
background: url(wp-content/themes/natag/images/arrow.png) no-repeat;
background-position:left center;

}


.glossymenu div.submenu ul li a:hover{
/*background: #DFDCCB;
color: white;*/
}

</style>
<script src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>
<div class="glossymenu">
<a class="menuitem submenuheader" href="#" headerindex="0h"><span class="accordprefix"></span>Equipment<span class="accordsuffix">
<img src="<?php  bloginfo('template_directory'); ?>/images/minus.png" class="statusicon"/></span></a>

<div class="submenu" contentindex="0c" style="display: block; ">
<ul>
	<li><a href="#">Tractors</a></li>
	<li><a href="#">Combines</a></li>
	<li><a href="#">Seeders</a></li>
	<li><a href="#">Carts</a></li>
</ul>
</div>
<a class="menuitem" href="#">Fertilizers</a>
<a class="menuitem" href="#">Chemicals</a>
<a class="menuitem" href="#">Engines</a>
<a class="menuitem" href="#">Tires and Wheels </a>
<a class="menuitem" href="#">Electrical </a>
<a class="menuitem" href="#">Tranks </a>
<a class="menuitem submenuheader" href="#" headerindex="0h"><span class="accordprefix"></span>Livestock<span class="accordsuffix">
<img src="<?php  bloginfo('template_directory'); ?>/images/minus.png" class="statusicon" /></span></a>
<div class="submenu" contentindex="0c" style="display: block; ">
<ul>
	<li><a href="#">Tractors</a></li>
	<li><a href="#">Combines</a></li>
	<li><a href="#">Seeders</a></li>
	<li><a href="#">Carts</a></li>
</ul>
</div>
<a class="menuitem" href="#">Dairy</a>
<a class="menuitem" href="#">Irrigation</a>
<a class="menuitem" href="#">Electronic</a>
<a class="menuitem" href="#">Repair/Replacement Parts </a>
	
</div>


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/plusone.js" gapi_processed="true"></script>





 


