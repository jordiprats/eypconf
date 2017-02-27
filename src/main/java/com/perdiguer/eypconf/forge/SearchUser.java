package com.perdiguer.eypconf.forge;

import com.perdiguer.eypconf.forge.dao.ForgeUserDAO;

public class SearchUser {
	
	private ForgeUserDAO userDao;
	
	public SearchUser(ForgeUserDAO userDao)
	{
		this.userDao=userDao;
	}

}
