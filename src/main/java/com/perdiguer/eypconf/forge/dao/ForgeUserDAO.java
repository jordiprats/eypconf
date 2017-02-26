package com.perdiguer.eypconf.forge.dao;

import java.util.List;

import com.perdiguer.eypconf.forge.ForgeUser;

public interface ForgeUserDAO {

	public void save(ForgeUser p);
	
	public List<ForgeUser> list();

	void delete(int id);

	ForgeUser get(int id);
	
}