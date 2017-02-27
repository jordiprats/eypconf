package com.perdiguer.eypconf.forge;

import com.perdiguer.eypconf.forge.dao.ForgeUserDAO;

public class SearchUser {
	
	private ForgeUserDAO userDao=null;
	
	public int limit=20;
	public int offset=0; 
	
	SearchResult<ForgeUser> searchresult=null;
	
	public SearchUser(ForgeUserDAO userDao)
	{
		this.userDao=userDao;
	}
	
	public boolean doSearch() 
	{
		searchresult=new SearchResult<ForgeUser>();
		
		searchresult.setLimit(this.limit);
		searchresult.setOffset(this.offset);
		
		//TODO: fer la cerca
				
		return true;
	}
}
