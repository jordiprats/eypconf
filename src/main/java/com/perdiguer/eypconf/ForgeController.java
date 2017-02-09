package com.perdiguer.eypconf;

import java.util.ArrayList;
import java.util.List;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.HttpStatus;
//import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.perdiguer.eypconf.forge.Search;
import com.perdiguer.eypconf.forge.SearchResult;

@RestController
public class ForgeController {
	
	private static final Logger logger = LoggerFactory.getLogger(ForgeController.class);
	
	//produces = MediaType.APPLICATION_JSON_VALUE
	@RequestMapping(value = "/v3/modules", method = RequestMethod.GET)
	public ResponseEntity<SearchResult> searchModule(
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
		logger.info("search");
		
		Search search=new Search();
		
		if(search.doSearch())
		{
//			ArrayList<SearchResult> list=new ArrayList<SearchResult>();
//			
//			list.add();
			return new ResponseEntity<SearchResult>(search.getSearchresult(), HttpStatus.OK);
		}
		else 
			return null;
	}

	
}
