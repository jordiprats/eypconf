package com.perdiguer.eypconf;

import java.text.DateFormat;
import java.util.Date;
import java.util.Locale;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;


import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

/**
 * Handles requests for the application home page.
 */
@Controller
public class HomeController 
{
	private static final Logger logger = LoggerFactory.getLogger(HomeController.class);
	
	@RequestMapping(value = "/", method = RequestMethod.GET)
	public String home(Locale locale, Model model) 
	{
		logger.info("Welcome home! The client locale is {}.", locale);
		
		Date date = new Date();
		DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG, DateFormat.LONG, locale);
		
		String formattedDate = dateFormat.format(date);
		
		model.addAttribute("serverTime", formattedDate );
		
		return "home";
	}
	
	@RequestMapping(value = "/about", method = RequestMethod.GET)
	public String about(Locale locale, Model model) 
	{

		//git rev-parse HEAD
		
		StringBuffer latestcommit = new StringBuffer();

		Process p;
		try 
		{
			p = Runtime.getRuntime().exec("pwd");
			p.waitFor();
			
		    BufferedReader reader =
			         new BufferedReader(new InputStreamReader(p.getInputStream()));

		    String line = "";
		    while ((line = reader.readLine())!= null) 
		    {
		    	latestcommit.append(line + "\n");
		    }
		} catch (IOException e) 
		{
			e.printStackTrace();
		}
		catch (InterruptedException e) 
		{
			e.printStackTrace();
		}
		
		logger.info("build: {}", latestcommit);
		
		if(latestcommit.equals(""))
			model.addAttribute("build","28");
		else
			model.addAttribute("build", latestcommit.toString() );
		
		return "about";
	}
	
}
