package com.perdiguer.eypconf.forge;

import java.util.Date;

//{
//    "uri": "/v3/releases/eyp-systemd-0.1.18",
//    "slug": "eyp-systemd-0.1.18",
//    "version": "0.1.18",
//    "supported": false,
//    "created_at": "2017-01-16 07:22:59 -0800",
//    "deleted_at": null,
//    "file_uri": "/v3/files/eyp-systemd-0.1.18.tar.gz",
//    "file_size": 7462
//  },

public class ForgeModuleRelease {
	
	public String uri;
	public String slug;
	public String version;
	public boolean supported=false;
	public Date created_at=null;
	public Date deleted_at=null;
	public String file_uri;
	public int file_size=0;

}
