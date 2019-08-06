function get_cloudImage_subfix(org_url)
{
	if (typeof (is_absolute_url) === "function" && is_absolute_url(org_url))
	{
		return org_url;
	}
	else
	{
		return "https://www.deedsalone.com" + "/" + org_url;
	}
}

function get_preloading_html(type)
{
	var preloadingHTML = '';

	switch(type)
	{
		case 'none':
			break;
		case 'rotateplane':
			preloadingHTML = '<div class="spinner rotateplane"></div>';
			break;
		case 'double-bounce':
			preloadingHTML = '<div class="spinner double-bounce">' +
				  '<div class="double-bounce1"></div>' +
				  '<div class="double-bounce2"></div>' +
				'</div>';
			break;
		case 'rect':
			preloadingHTML = '<div class="spinner rect">' +
				  '<div class="double-bounce1"></div>' +
				  '<div class="double-bounce2"></div>' +
				'</div>';
			break;
		case 'cube':
			preloadingHTML = '<div class="spinner cube">' +
					'<div class="cube1"></div>' +
					'<div class="cube2"></div>' +
				'</div>';
			break;
		case 'scaleout':
			preloadingHTML = '<div class="spinner scaleout"></div>';
			break;
		case 'dot':
			preloadingHTML = '<div class="spinner dot">' +
					  '<div class="dot1"></div>' +
					  '<div class="dot2"></div>' +
					'</div>';
			break;
		case 'bounce':
			preloadingHTML = '<div class="spinner bounce">' +
					  '<div class="bounce1"></div>' +
					  '<div class="bounce2"></div>' +
					  '<div class="bounce3"></div>' +
					'</div>'
			break;
		case 'sk-circle':
			preloadingHTML = '<div class="spinner sk-circle">' +
					  '<div class="sk-circle1 sk-child"></div>' +
					  '<div class="sk-circle2 sk-child"></div>' +
					  '<div class="sk-circle3 sk-child"></div>' +
					  '<div class="sk-circle4 sk-child"></div>' +
					  '<div class="sk-circle5 sk-child"></div>' +
					  '<div class="sk-circle6 sk-child"></div>' +
					  '<div class="sk-circle7 sk-child"></div>' +
					  '<div class="sk-circle8 sk-child"></div>' +
					  '<div class="sk-circle9 sk-child"></div>' +
					  '<div class="sk-circle10 sk-child"></div>' +
					  '<div class="sk-circle11 sk-child"></div>' +
					  '<div class="sk-circle12 sk-child"></div>' +
					'</div>'
			break;
		case 'sk-cube-grid':
			preloadingHTML = '<div class="spinner sk-cube-grid">' +
				  '<div class="sk-cube sk-cube1"></div>' +
				  '<div class="sk-cube sk-cube2"></div>' +
				  '<div class="sk-cube sk-cube3"></div>' +
				  '<div class="sk-cube sk-cube4"></div>' +
				  '<div class="sk-cube sk-cube5"></div>' +
				  '<div class="sk-cube sk-cube6"></div>' +
				  '<div class="sk-cube sk-cube7"></div>' +
				  '<div class="sk-cube sk-cube8"></div>' +
				  '<div class="sk-cube sk-cube9"></div>' +
				'</div>';
			break;
		case 'sk-fading-circle':
			preloadingHTML = '<div class="spinner sk-circle">' +
					  '<div class="sk-circle1 sk-child"></div>' +
					  '<div class="sk-circle2 sk-child"></div>' +
					  '<div class="sk-circle3 sk-child"></div>' +
					  '<div class="sk-circle4 sk-child"></div>' +
					  '<div class="sk-circle5 sk-child"></div>' +
					  '<div class="sk-circle6 sk-child"></div>' +
					  '<div class="sk-circle7 sk-child"></div>' +
					  '<div class="sk-circle8 sk-child"></div>' +
					  '<div class="sk-circle9 sk-child"></div>' +
					  '<div class="sk-circle10 sk-child"></div>' +
					  '<div class="sk-circle11 sk-child"></div>' +
					  '<div class="sk-circle12 sk-child"></div>' +
					'</div>'
			break;
		case 'sk-cube':
			preloadingHTML = '<div class="spinner sk-folding-cube">' +
					  '<div class="sk-cube1 sk-cube"></div>' +
					  '<div class="sk-cube2 sk-cube"></div>' +
					  '<div class="sk-cube4 sk-cube"></div>' +
					  '<div class="sk-cube3 sk-cube"></div>' +
					'</div>'
		
		default:
			break;
	}

	return preloadingHTML;
}

function is_empty_field(value)
{
	if (!value || value == "\u00A6not specified\u00A6")
		return true;
	return false;
}

function get_hit_img_html(hit, hit_img, hit_empty_img, preloading_type, use_responsive_cloudimg_js, cloudimg_responsive_ratio, id)
{
	var profile_img =	!is_empty_field(hit_img) ? hit_img : hit_empty_img;
	var loading_img = (preloading_type === 'imgfile' ? '/wp-content/uploads/2019/06/preloading_img.svg' : '');
	var img_src_attr = 'src';
	var img_src_val = get_cloudImage_url(profile_img);
	var	img_cisrc_attr = '';
	var	img_cisrc_val = '';
	var img_extra_class = '';
	var img_extra_attr = '';
	var preloading_html = (preloading_type === 'imgfile' ? '': get_preloading_html(preloading_type));
	
	
	if (use_responsive_cloudimg_js == 1)
	{
	  
	  if (!is_empty_field(hit_img))
	  {	
			img_src_attr = 'src';
			img_src_val = loading_img;
			img_cisrc_attr = 'ci-src';
			img_cisrc_val = get_cloudImage_subfix(profile_img);
	  }
	  else
	  {
			img_src_attr = 'src';
			img_src_val = get_cloudImage_fullparam_url(profile_img, '', '100x80', '');

			img_extra_class = 'empty_img';
		}
	  img_extra_attr = 'style=\"\"' + (cloudimg_responsive_ratio ? ' ratio=\"' + cloudimg_responsive_ratio + '\"': '');
	}

	 hit_img_html = '<img ' + (id ? 'id=\"' + id + '\"' : '')  + img_src_attr + '=\"' + img_src_val + '\" ' + img_cisrc_attr + '=\"' + img_cisrc_val +
					'\" class=\"' + img_extra_class + '\"' + img_extra_attr + '>';

	 return hit_img_html + preloading_html;
}

