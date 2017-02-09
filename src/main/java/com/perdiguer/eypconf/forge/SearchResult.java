package com.perdiguer.eypconf.forge;

import java.util.ArrayList;

public class SearchResult {
	
	public int total=0;
	public int limit=20;
	public int offset=0;
	public String current=null;
	public String next=null;
	public String previous=null;
	public ArrayList<ForgeModule> results=null;
	
	protected SearchResult(int limit, int offset)
	{
		this.limit=limit;
		this.offset=offset;
		
		this.results=new ArrayList<ForgeModule>();
	}
	
	protected boolean add(ForgeModule module)
	{
		boolean ret=results.add(module);
		
		total=results.size();
		
		return ret;
	}
	


}
