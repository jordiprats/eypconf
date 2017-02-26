package com.perdiguer.eypconf.forge.dao;

import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.Query;
import org.hibernate.SessionFactory;
import org.springframework.transaction.annotation.Transactional;

import com.perdiguer.eypconf.forge.ForgeUser;

//http://www.codejava.net/frameworks/spring/spring-4-and-hibernate-4-integration-tutorial-part-2-java-based-configuration

public class ForgeUserDAOImp implements ForgeUserDAO {
    private SessionFactory sessionFactory;
    
    public ForgeUserDAOImp(SessionFactory sessionFactory) {
        this.sessionFactory = sessionFactory;
    }
 

	@Override
	@Transactional
	public void save(ForgeUser p) {
		this.sessionFactory.getCurrentSession().saveOrUpdate(p);
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
    
    @Override
    @Transactional
    public void delete(int id) {
    	ForgeUser userToDelete = new ForgeUser();
        userToDelete.setId(id);
        sessionFactory.getCurrentSession().delete(userToDelete);
    }
 
    @Override
    @Transactional
    public ForgeUser get(int id) {
        String hql = "from User where id=" + id;
        Query query = sessionFactory.getCurrentSession().createQuery(hql);
         
        @SuppressWarnings("unchecked")
        List<ForgeUser> listUser = (List<ForgeUser>) query.list();
         
        if (listUser != null && !listUser.isEmpty()) {
            return listUser.get(0);
        }
         
        return null;
    }

}
