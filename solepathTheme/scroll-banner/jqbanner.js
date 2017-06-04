// Simple JavaScript Rotating Banner Using jQuery
// www.mclelun.com

// Edit jqb_eff to change transition effect.
// 1 - FadeIn FadeOut
// 2 - Horizontal Scroll
// 3 - Vertical Scroll
// 4 - Infinity Horizontal Scroll
// 5 - Infinity Vertical Scroll
var jqb_eff = 1;

//Variables
var jqb_vCurrent = 0;
var jqb_vTotal = 0;
var jqb_vSpeed = 250;
var jqb_vDuration = 7000;
var jqb_intInterval = 0;
var jqb_vGo = 1;
var jqb_vBusy = false;
var jqb_vIsPause = false;
var jqb_vIsMouseOver = false;
var jqb_tmp = 20;
var jqb_title;
var jqb_imgW = 800;
var jqb_imgH = 350;

jQuery(document).ready(function() {	
	jqb_vTotal = jQuery(".jqb_slides").children().size() - 1;
	jQuery(".jqb_info").text(jQuery(".jqb_slide").attr("title"));
	jqb_intInterval = setInterval(jqb_fnLoop, jqb_vDuration);
	
	if(jqb_eff == 1)//Fade In & Fade Out
	{
		jQuery("#jqb_object").find(".jqb_slide").each(function(i) {
			if(i == 0){
				jQuery(this).animate({ opacity: 'show'}, jqb_vSpeed, function() { jqb_vBusy = false; });
			} else {
				jQuery(this).animate({ opacity: 'hide'}, jqb_vSpeed, function() { jqb_vBusy = false; });
			}
		});
	}
	else if(jqb_eff == 2 || jqb_eff == 4)//Horizontal Alignment
	{
		jQuery("#jqb_object").find(".jqb_slide").each(function(i) {
			jqb_tmp = ((i - 1)*jqb_imgW) - ((jqb_vCurrent -1)*jqb_imgW);
			jQuery(this).css({"left": jqb_tmp+"px"});
		});
	} 
	else if(jqb_eff == 3 || jqb_eff == 5)//Vertical Alignment
	{
		jQuery("#jqb_object").find(".jqb_slide").each(function(i) {
			jqb_tmp = ((i - 1)*jqb_imgH) - ((jqb_vCurrent -1)*jqb_imgH);
			jQuery(this).css({"top": jqb_tmp+"px"});
		});
	}
	
	jQuery("#btn_pauseplay").click(function() {
		if(jqb_vIsPause){
			jqb_vIsPause = false;
			jqb_fnLoop();
			jQuery("#btn_pauseplay").removeClass("jqb_btn_play");
			jQuery("#btn_pauseplay").addClass("jqb_btn_pause");
		} else {
			jqb_vIsPause = true;
			clearInterval(jqb_intInterval);
			jQuery("#btn_pauseplay").removeClass("jqb_btn_pause");
			jQuery("#btn_pauseplay").addClass("jqb_btn_play");
		}
	});
	
	jQuery("#btn_prev").click(function() {
		jqb_vGo = -1;
		jqb_fnLoop();
	});
		
	jQuery("#btn_next").click(function() {
		jqb_vGo = 1;
		jqb_fnLoop();
	});
	
	
	jQuery("#jqb_object").find(".jqb_slide").mouseover(function() {
		jqb_vIsMouseOver = true;
	});
	
	jQuery("#jqb_object").find(".jqb_slide").mouseout(function() {
		jqb_vIsMouseOver = false;
		if(!jqb_vIsPause)
		{
			jqb_fnLoop();
		}
		
	});
		
});

function jqb_fnDone(){
	jqb_vBusy = false;
	
}

function jqb_fnLoop(){
	clearInterval(jqb_intInterval);
	
	if(!jqb_vIsMouseOver && !jqb_vBusy){
			
		jqb_vBusy = true;
		if(jqb_vGo == 1){
			jqb_vCurrent == jqb_vTotal ? jqb_vCurrent = 0 : jqb_vCurrent++;
		} else {
			jqb_vCurrent == 0 ? jqb_vCurrent = jqb_vTotal : jqb_vCurrent--;
		}

		jQuery("#jqb_object").find(".jqb_slide").each(function(i) {
			if(i == jqb_vCurrent){
				jqb_title = jQuery(this).attr("title");
				jQuery(".jqb_info").animate({ opacity: 'hide', "left": "-50px"}, 250,function(){
					jQuery(".jqb_info").text(jqb_title).animate({ opacity: 'show', "left": "0px"}, 500);
				});
			} 
					

			if(jqb_eff == 2)//Horizontal Scrolling
			{
				jqb_tmp = ((i - 1)*jqb_imgW) - ((jqb_vCurrent -1)*jqb_imgW);
				jQuery(this).animate({"left": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_fnDone(); });
			}
			else if(jqb_eff == 3)//Vertical Scrolling
			{
				jqb_tmp = ((i - 1)*jqb_imgH) - ((jqb_vCurrent -1)*jqb_imgH);
				jQuery(this).animate({"top": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_fnDone(); });
			}	
			else if(jqb_eff == 4)//Infinity Horizontal Scrolling
			{
				if(jqb_vTotal == 1) //IF 2 SLIDE ONLY, FIX
				{
					if(jqb_vGo == 1){
						if((jQuery(this).position().left) < 0 )
						{
							jQuery(this).css({"left": jqb_imgW+"px"});
						}
					} else {
						if((jQuery(this).position().left) > (jqb_imgW * (jqb_vTotal - 1)))
						{	
							jQuery(this).css({"left": (-1 * jqb_imgW)+"px"});
						}
					}
				}
				else
				{
					if((jQuery(this).position().left) < -jqb_imgW )
					{
						jQuery(this).css({"left": (jqb_imgW * (jqb_vTotal - 1))+"px"});
					}
					else if((jQuery(this).position().left) > (jqb_imgW * (jqb_vTotal - 1)))
					{	
						jQuery(this).css({"left": (-1 * jqb_imgW)+"px"});
					}
				}

				jqb_tmp = jQuery(this).position().left - (jqb_imgW * jqb_vGo);
				jQuery(this).animate({"left": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_fnDone();  });
			}
			else if(jqb_eff == 5)//Infinity Vertical Scrolling
			{
				if(jqb_vTotal == 1) //IF 2 SLIDE ONLY, FIX
				{
					if(jqb_vGo == 1){
						if((jQuery(this).position().top) < 0 )
						{
							jQuery(this).css({"top": jqb_imgH+"px"});
						}
					} else {
						if((jQuery(this).position().top) > (jqb_imgH * (jqb_vTotal - 1)))
						{	
							jQuery(this).css({"top": (-1 * jqb_imgH)+"px"});
						}
					}
				}
				else
				{
					if((jQuery(this).position().top) < -jqb_imgH )
					{
						jQuery(this).css({"top": (jqb_imgH * (jqb_vTotal - 1))+"px"});
					}
					else if((jQuery(this).position().top) > (jqb_imgH * (jqb_vTotal - 1)))
					{	
						jQuery(this).css({"top": (-1 * jqb_imgH)+"px"});
					}	
				}

				jqb_tmp = jQuery(this).position().top - (jqb_imgH * jqb_vGo);
				 jQuery(this).animate({"top": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_fnDone();  });
			}
			else //if(jqb_eff == 1)//Fade In & Fade Out
			{
				if(i == jqb_vCurrent){
					jQuery(this).animate({ opacity: 'show'}, jqb_vSpeed, function() { jqb_fnDone(); });
				} else {
					jQuery(this).animate({ opacity: 'hide'}, jqb_vSpeed, function() { jqb_fnDone(); });
				}
			}
		});
		

		setTimeout(function() {
		if(!jqb_vIsPause){
				jqb_intInterval = setInterval(jqb_fnLoop, jqb_vDuration);
			}
		}, jqb_vSpeed);
		
	}
}





