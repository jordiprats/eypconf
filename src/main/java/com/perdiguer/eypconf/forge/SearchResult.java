package com.perdiguer.eypconf.forge;

import com.perdiguer.eypconf.forge.search.Pagination;

public class SearchResult {
	
	protected SearchResult(int limit, int offset)
	{
		pagination=new Pagination(limit, offset);
	}
	
	protected Pagination pagination=null;

}
