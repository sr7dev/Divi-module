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

function deeds_date_format (date) {
	var dateObject = new Date(date);
	var date_str = dateObject.toLocaleDateString("en-US");
	var date_year = date_str.slice(-4);
	var cur_year = new Date().getFullYear();
	date_str = date_str.slice(0, -5);
	if (date_year != cur_year)
		date_str = date_str + '/' + date_year.slice(-2);

	return date_str;
}

function remove_first_occurrence(str, searchstr)
{
	var index = str.indexOf(searchstr);
	if (index === -1) {
		return str;
	}
	return str.slice(0, index) + str.slice(index + searchstr.length);
}

function get_blue_sport_img(sport) {
	var sport_img = { "bmx":"/wp-content/uploads/2019/04/bmx-blue.svg",
			"skiing":"/wp-content/uploads/2019/04/skiing-blue.svg",
			"surfing":"/wp-content/uploads/2019/04/surfing-blue.svg",
			"skateboarding":"/wp-content/uploads/2019/04/skateboarding-blue.svg",
			"mountain":"/wp-content/uploads/2019/04/mountain-biking-blue.svg",
			"snowboarding":"/wp-content/uploads/2019/04/snowboarding-blue.svg",
			"motocross":"/wp-content/uploads/2019/04/motocross-blue.svg",
			"climbing":"/wp-content/uploads/2019/04/climbing-blue.svg",
			"kayaking":"/wp-content/uploads/2019/04/kayaking-blue.svg",
			"ultra" : "/wp-content/uploads/2019/04/ultra-running-blue.svg"
			 };
	sport = sport ? (Array.isArray(sport) ? sport[0] : sport) : "";
	sport = sport ? sport.split(" ")[0].toLowerCase() : "";
	return (sport && sport_img[sport] ? sport_img[sport] : "/wp-content/uploads/2019/05/sport-blue-footer.svg");
}

/* [END-ADD][STG:Bojana 6/9/2019]*/
function lastWordCapitalized(url) {
	if ( !url || typeof url === "undefined") {
		return "";
	}
	return url.replace(/^.*\/([^?#\/]+).*$/, function (_, word) {
		var word = decodeURI(word);
		return word.charAt(0).toUpperCase() + word.slice(1);
	});
}

function run_instagram_profile_url(name, indexName, ObjectID, use_responsive_cloudimg_js)
{
	console.log("Runing instagram");
	callAjax(
		'https://www.instagram.com/' + name,
		function (data) {
			var tmpstr = data.split('"ProfilePage":[{"logging_page_id":"profilePage_')[1];
			usr_id = tmpstr.substr(0, tmpstr.indexOf('"')); 
			jQuery.getJSON("https://i.instagram.com/api/v1/users/"+usr_id+"/info/", function(info) {
			path = info.user.hd_profile_pic_url_info["url"];
			if (path)
			{
				console.log(path);
				
				document.getElementById(name).setAttribute( use_responsive_cloudimg_js ? "ci-src" : "src", path);
				document.getElementById(name).classList.remove("empty_img");
				/*[BEGIN-ADD][STG:Bojana 6/21/2019] Update empty profile_img url with instagram photo url*/					
				update_profile_img(indexName, ObjectID, path);
				/*[END-ADD][STG:Bojana 6/21/2019] Update empty profile_img url with instagram photo url*/					
			}
			return path;
		}
	)
	});
}

function get_hit_image(hit, specImgSrc) {
	var hit_img = "";

	switch(hit.post_type_label.toLowerCase())
	{
		case "highlight":
		case "highlights":
			switch(specImgSrc) {
				case "youtube_thumbnail":
					hit_img = 'http://i.ytimg.com/vi/' + get_youtube_id(hit.url)  + '/hqdefault.jpg';
					break;
				case "youtube_video":
					hit_img = 'https://www.youtube.com/embed/' + get_youtube_id(hit.url);
					break;
				default:
					hit_img = hit.profile_img;	
			}
			break;
		case "podcast":
		case "podcasts":
		case "movie":
		case "movies":
			hit_img = hit.media_img;
			break;
		default:
			hit_img = hit.profile_img;
	}

	return hit_img;
}

function get_media_playlist_html(hit, specImgSrc, autoplay, lazyLoad) {
	var media_html = '';
	if ( lazyLoad == 'on' ) {
		media_html = get_lazy_youtube_html(get_youtube_id(hit.url), autoplay);
	} else {
		media_html = get_vidoplayer_html('https://www.youtube.com/embed/' + get_youtube_id(hit.url), 'iframe', autoplay);
	}
	return media_html;
}

function get_lazy_youtube_html(youtubeid, autoplay)
{
	return '<div class="lazyyoutube wrapper">' +
				'<div class="youtube" data-embed="' + youtubeid + '" data-autoplay="' + autoplay + '">' +
					'<div class="play-button"></div>' +
				'</div>' +
		   '</div>';

}

function get_vidoplayer_html(url, type, autoplay)
{
	switch(type)
	{
		case "iframe":
			return "<iframe  width=\"100%\" height=\"100%\" class=\"allMyVideos datasrc_youtube\" src=\"\" data-src=\"" + url +
					  "/?rel=0" + (autoplay=="autoplay" ? "&autoplay=true&mute=1":"") + "\" frameborder=\"0\" allowfullscreen></iframe>" ;
		default:
			return "<embed class=\"flex-video allMyVideos\" src=\"" +
					 url +
					  "/?rel=0&mute=1"  + (autoplay=="autoplay" ? "&autoplay=true":"") +
					  "\" wmode=\"transparent\" " +
					  " type=\"application/x-shockwave-flash\"" +
					  "></embed>";

	}
}

function lazyload_youtube_init(responsive_cloud_image) {
	console.log("lazy loading iframe youtube setting");
	
	var youtube = document.querySelectorAll( ".lazyyoutube.wrapper .youtube" );
	//console.log(youtube);
	
	for (var i = 0; i < youtube.length; i++) {
	
		if (youtube[i].dataset.iframe == "1")
		{
			continue;
		}
		var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
		
		var image = document.createElement("img");
		if (responsive_cloud_image == 'on')
		{
			image.setAttribute("ci-src", source);
		}
		else
			image.setAttribute("src", source);
			
		image.addEventListener( "load", function() {
			youtube[ i ].appendChild( image );
		}( i ) );
	
		youtube[i].addEventListener( "click", function() {

			var iframe = document.createElement( "iframe" );

			iframe.setAttribute( "frameborder", "0" );
			iframe.setAttribute( "allowfullscreen", "" );
			iframe.setAttribute( "allowautoplay", "" );
			iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=true&mute=1" );

			this.innerHTML = "";
			this.appendChild( iframe );
		});
		
		if (youtube[i].dataset.autoplay)
		{
			console.log("will autoplay");
			youtube[i].click();
		}
		youtube[i].setAttribute("data-iframe", "1");
		
	};
}

function youtube_init() {
	console.log("Change data-src of iframe tag to src");
	var vidDefer =  document.querySelectorAll('iframe');
	console.log("Setting src of Youtube Iframe.");
	for (var i=0; i<vidDefer.length; i++) {
		if(vidDefer[i].getAttribute('data-src')) {
			vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
		}
	} 
}