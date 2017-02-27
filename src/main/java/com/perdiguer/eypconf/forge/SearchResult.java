package com.perdiguer.eypconf.forge;

import java.util.ArrayList;

public class SearchResult<T> {
	
	public int total=0;
	public int limit=20;
	public int offset=0;
	public String current=null;
	public String next=null;
	public String previous=null;
	public ArrayList<T> results=null;
	
	protected SearchResult()
	{	
		this.results=new ArrayList<T>();
	}
	
	public int getLimit() {
		return limit;
	}

	public void setLimit(int limit) {
		this.limit = limit;
	}

	public int getOffset() {
		return offset;
	}

	public void setOffset(int offset) {
		this.offset = offset;
	}

	protected boolean add(T module)
	{
		boolean ret=results.add(module);
		
		total=results.size();
		
		return ret;
	}
	


}
