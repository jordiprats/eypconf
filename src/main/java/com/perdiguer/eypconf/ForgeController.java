package com.perdiguer.eypconf;


import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.perdiguer.eypconf.forge.Search;

@RestController
public class ForgeController {
	
	private static final Logger logger = LoggerFactory.getLogger(ForgeController.class);
	
	@RequestMapping("/v3/modules")
	public Search searchModule(
								@RequestParam(value="query", defaultValue="") String query,
								@RequestParam(value="owner", defaultValue="") String owner,
								@RequestParam(value="tag", defaultValue="") String tag	
							) {
		logger.info("search");
		
		return new Search();
	}

	
}
