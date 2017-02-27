package com.perdiguer.eypconf.forge;

public class SearchModule {
	
	public String query=null;
	public String owner=null;
	public String tag=null;
	public String sort_by=null;
	public String operatingsystem=null;
	public String puppet_requirement=null;
	
	public boolean show_deleted=false;
	public boolean supported=false;
	
	public int limit=20;
	public int offset=0; 
	
	SearchResult<ForgeModule> searchresult=null;
	
	public SearchModule()
	{
		
	}
	
	public boolean doSearch() 
	{
		searchresult=new SearchResult<ForgeModule>();
		
		searchresult.setLimit(this.limit);
		searchresult.setOffset(this.offset);
		
		//TODO: demo only
		ForgeModule module=new ForgeModule("test");
		searchresult.add(module);
		
		return true;
	}
	
	public SearchResult<ForgeModule> getSearchresult() {
		return searchresult;
	}

	public void setSearchresult(SearchResult<ForgeModule> searchresult) {
		this.searchresult = searchresult;
	}

	public String getQuery() {
		return query;
	}

	public void setQuery(String query) {
		this.query = query;
	}

	public String getOwner() {
		return owner;
	}

	public void setOwner(String owner) {
		this.owner = owner;
	}

	public String getTag() {
		return tag;
	}

	public void setTag(String tag) {
		this.tag = tag;
	}

	public String getSort_by() {
		return sort_by;
	}

	public void setSort_by(String sort_by) {
		this.sort_by = sort_by;
	}

	public String getOperatingsystem() {
		return operatingsystem;
	}

	public void setOperatingsystem(String operatingsystem) {
		this.operatingsystem = operatingsystem;
	}

	public String getPuppet_requirement() {
		return puppet_requirement;
	}

	public void setPuppet_requirement(String puppet_requirement) {
		this.puppet_requirement = puppet_requirement;
	}

	public boolean isShow_deleted() {
		return show_deleted;
	}

	public void setShow_deleted(boolean show_deleted) {
		this.show_deleted = show_deleted;
	}

	public boolean isSupported() {
		return supported;
	}

	public void setSupported(boolean supported) {
		this.supported = supported;
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

}
