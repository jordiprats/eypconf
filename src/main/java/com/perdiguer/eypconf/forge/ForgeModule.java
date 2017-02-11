package com.perdiguer.eypconf.forge;

import java.util.Date;

public class ForgeModule {
	
	public String uri;
	public String slug;
	public String name;
	public int downloads=0;
    public Date created_at=null;
    public Date updated_at=null;
    public Date deprecated_at=null;
    public Date deprecated_for=null;
    public Date superseded_by=null;
    public boolean supported=false;
    public String version;
    
    public ForgeModule()
    {
    	this.created_at=new Date();
    	this.updated_at=new Date();
    }
    
    public ForgeModule(String name)
    {
    	this.created_at=new Date();
    	this.updated_at=new Date();
    	
    	this.setName(name);
    }
    
    public void setName(String name)
    {
    	this.name=name;
    	this.uri="/v3/modules/"+name;
    }

}
