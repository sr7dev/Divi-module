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

