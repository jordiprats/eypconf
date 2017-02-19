package com.perdiguer.eypconf.forge.dao;

import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.SessionFactory;
import org.springframework.transaction.annotation.Transactional;

import com.perdiguer.eypconf.forge.ForgeUser;

public class ForgeUserDAOImp implements ForgeUserDAO {
    private SessionFactory sessionFactory;
    
    public ForgeUserDAOImp(SessionFactory sessionFactory) {
        this.sessionFactory = sessionFactory;
    }
 

	@Override
	public void save(ForgeUser p) {
		// TODO Auto-generated method stub

	}

    @Override
    @Transactional
    public List<ForgeUser> list() {
        @SuppressWarnings("unchecked")
        List<ForgeUser> listUser = (List<ForgeUser>) sessionFactory.getCurrentSession()
                .createCriteria(ForgeUser.class)
                .setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY).list();
 
        return listUser;
    }

}
