package com.ifnti;

import java.util.ArrayList;


public class Session {
    public static ArrayList<Session> listeSession=new ArrayList<Session>() ;
    public int etape;
    public long id;

    public Session(long _id){
        this.id =_id;
        this.etape=0;
        Session.listeSession.add(this);


    }
    public static Session verifier(Long id){
        //System.out.println(id);
        for (Session s : Session.listeSession) {

                if(id==s.id){
                   System.out.println(id);
                    return s;
                }
            
        }

        return null;
    }
    
}
