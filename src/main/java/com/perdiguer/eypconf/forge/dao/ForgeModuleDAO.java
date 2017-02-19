package com.perdiguer.eypconf.forge.dao;

import java.util.List;

import com.perdiguer.eypconf.forge.ForgeModule;

public interface ForgeModuleDAO {

	public void save(ForgeModule p);
	
	public List<ForgeModule> list();
	
}