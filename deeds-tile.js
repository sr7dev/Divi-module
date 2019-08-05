(function(settings, context) {
	 // settings = context['deedsTileSettings'];
  window.addEventListener("load", function() {
    // console.log(settings.cloudImgGrayPrefix);
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

		function get_cloudImage_url(org_url, isGray)
		{
		
			var cloud_img_pre;
			if (isGray) {
				cloud_img_pre = context['deedsTileSettings'].cloudImgGrayPrefix;
			}
			else
			{
				cloud_img_pre = context['deedsTileSettings'].cloudImgPrefix;
			}
			if (typeof (is_absolute_url) === "function" && is_absolute_url(org_url))
			{
				return cloud_img_pre + org_url;
			}
			else if (cloud_img_pre.length > 0)
			{
				return cloud_img_pre + "_deeds_/" + org_url;
			}
			else 
				return org_url;
		}
	
		function get_cloudImage_fullparam_url(org_url, operation, size, filter)
		{
			/*console.log("get_cloudImage_fullparam_url", org_url, operation, width, height, filter);*/
			var cloud_img_pre;
			if (!operation)
				operation = context['deedsTileSettings'].cloudimg_operation;
			if (!size)
				size = context['deedsTileSettings'].cloudimg_width + 'x' + context['deedsTileSettings'].couldimg_height;
		
			if (!filter)
				filter = context['deedsTileSettings'].cloudimg_filter;
			/*console.log("changed  get_cloudImage_fullparam_url", org_url, operation, size, filter);*/
			cloud_img_pre =  "//" + context['deedsTileSettings'].cloudimg_token + ".cloudimg.io/" + operation + "/" + size + "/" + filter + "/";
			/*console.log("cloud_img_pre", cloud_img_pre);*/
			if (typeof (is_absolute_url) === "function" && is_absolute_url(org_url))
			{
				return cloud_img_pre + org_url;
			}
			else
			{
				return cloud_img_pre + "_deeds_" + org_url;
			}
		}
  });

})(window["deedsTileSettings"], window);
