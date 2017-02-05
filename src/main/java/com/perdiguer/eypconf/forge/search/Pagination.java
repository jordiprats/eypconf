package com.perdiguer.eypconf.forge.search;

public class Pagination {
	
	int limit=20;
	int offset=0; 
	
	public Pagination(int limit, int offset)
	{
		this.limit=limit;
		this.offset=offset;
	}

}
