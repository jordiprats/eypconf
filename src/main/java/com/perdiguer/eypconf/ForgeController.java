package com.perdiguer.eypconf;


import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import com.perdiguer.eypconf.forge.SearchModule;
import com.perdiguer.eypconf.forge.SearchResult;
import com.perdiguer.eypconf.forge.SearchUser;
import com.perdiguer.eypconf.forge.ForgeModule;
import com.perdiguer.eypconf.forge.ForgeModuleRelease;
import com.perdiguer.eypconf.forge.ForgeUser;
import com.perdiguer.eypconf.forge.dao.ForgeUserDAO;

@RestController
public class ForgeController {
	
	private static final Logger logger = LoggerFactory.getLogger(ForgeController.class);
	
    @Autowired
    private ForgeUserDAO userDao;
	
	//produces = MediaType.APPLICATION_JSON_VALUE
    @RequestMapping(value = "/v3/modules", method = RequestMethod.GET)
	public ResponseEntity<SearchResult<ForgeModule>> searchModule(
								@RequestParam(value="query", defaultValue="") String query,
								@RequestParam(value="owner", defaultValue="") String owner,
								@RequestParam(value="tag", defaultValue="") String tag,
								@RequestParam(value="show_deleted", defaultValue="false") boolean show_deleted,
								@RequestParam(value="sort_by", defaultValue="rank") String sort_by,
								@RequestParam(value="operatingsystem", defaultValue="") String operatingsystem,
								@RequestParam(value="supported", defaultValue="false") boolean supported,
								//@RequestParam(value="pe_requirement", defaultValue="") String pe_requirement,
								@RequestParam(value="puppet_requirement", defaultValue="") String puppet_requirement,
								@RequestParam(value="limit", defaultValue="20") int limit,
								@RequestParam(value="offset", defaultValue="0") int offset
								
							) {
		logger.info("search modules");
		
		SearchModule search=new SearchModule();
		
		if(search.doSearch())
		{
			return new ResponseEntity<SearchResult<ForgeModule>>(search.getSearchresult(), HttpStatus.OK);
		}
		else 
			return null;
	}

    @RequestMapping(value = "/v3/users", method = RequestMethod.GET)
	public ResponseEntity<SearchResult<ForgeUser>> searchUser(
								@RequestParam(value="sort_by", defaultValue="rank") String sort_by,
								@RequestParam(value="limit", defaultValue="20") int limit,
								@RequestParam(value="offset", defaultValue="0") int offset
								
							) {
		logger.info("users list");
		
		SearchUser search=new SearchUser(userDao);
		
		if(search.doSearch())
		{
			return new ResponseEntity<SearchResult<ForgeUser>>(search.getSearchresult(), HttpStatus.OK);
		}
		
		return null;
	}

    @RequestMapping(value = "/v3/releases", method = RequestMethod.GET)
	public ResponseEntity<SearchResult<ForgeModuleRelease>> searchRelease(
								@RequestParam(value="sort_by", defaultValue="rank") String sort_by,
								@RequestParam(value="limit", defaultValue="20") int limit,
								@RequestParam(value="offset", defaultValue="0") int offset
								//TODO: parametres releases
							) {
		logger.info("releases list");
		
		return null;
	}
    
}
