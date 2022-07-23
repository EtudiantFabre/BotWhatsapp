package com.ifnti;


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
import java.sql.SQLException;
import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.Statement;
import java.time.LocalDate;
import java.sql.ResultSet;
//import static gestionscolaire.Connexion.connection;
import java.util.ArrayList;



/**
 *
 * @author isidore
 */
public class DAO {
    public static Connection connection;

    public DAO() {
        try{
                connection = DriverManager.getConnection("jdbc:postgresql://afez:5432/botwhatsap","bot","bot");
             //  connection = DriverManager.getConnection("jdbc:postgresql://localhost:5432/gestionscolaire","gestionsco","BD");
            }catch(SQLException exept)
            {
                exept.printStackTrace();
            } 
    }


    public  ArrayList<String> chercherCulture(){

        //return (nom=="a" && passw =="n");
        //return (nom=="a" && passw =="n");
        try{
                Statement transaction = connection.createStatement();
                ArrayList<String> information = new ArrayList<String>() ;
                //System.out.println(v);


                String requete = String.format("select nom_culture from cultures ");
                // System.out.println(requete);
                ResultSet resultat = transaction.executeQuery(requete);
                while(resultat.next()){
                    String   nomsq = resultat.getString("nom_culture");
                    // String mdpSq = resultat.getString("prenome"); 
                    String nom=nomsq;
                    information.add(nom);
                 }
            
                return information;
            
            
            

            }catch(SQLException exept)
                {
                    exept.printStackTrace();
                } 
        return null;
    }   
  

    public void quitter() throws SQLException{

        connection.close();
    
    }



    public  ArrayList<String> chercherTel(){

        //return (nom=="a" && passw =="n");
        //return (nom=="a" && passw =="n");
        try{
                Statement transaction = connection.createStatement();
                ArrayList<String> information = new ArrayList<String>() ;
                //System.out.println(v);


                String requete = String.format("select tel from agriculteurs ");
                // System.out.println(requete);
                ResultSet resultat = transaction.executeQuery(requete);
                while(resultat.next()){
                    String   nomsq = resultat.getString("tel");
                    // String mdpSq = resultat.getString("prenome"); 
                    String nom=nomsq;
                    information.add(nom);
                 }
            
                return information;
            
            
            

            }catch(SQLException exept)
                {
                    exept.printStackTrace();
                } 
        return null;
    }   




    public boolean enregistementIdTele(Integer num, String id,Integer nbre  ,Integer arrose){

        LocalDate todaysDate = LocalDate.now();
        String date=String.valueOf(todaysDate);

        //return (nom=="a" && passw =="n");
    try{
        
    Statement transaction = connection.createStatement();

          
          
    String requete = String.format("insert into id_telegram(num_personne, id_de_telegram, nbre_arrosage,nbre_deja_arroser,created_at) values(%d, '%s', %d,%d,'%s');", num, id, nbre,arrose,date);
    //System.out.println(requete);
    transaction.executeUpdate(requete);
        // System.out.println(requete2);
        return true;

           

                   }catch(SQLException exept){
            exept.printStackTrace();
        } 
    return false;
}

    public  ArrayList<String> chercherToutnumAgri(){

        //return (nom=="a" && passw =="n");
        //return (nom=="a" && passw =="n");
        try{
                Statement transaction = connection.createStatement();
                ArrayList<String> information = new ArrayList<String>() ;
                //System.out.println(v);


                String requete = String.format("select num_agriculteur from parcelles; ");
                // System.out.println(requete);
                ResultSet resultat = transaction.executeQuery(requete);
                while(resultat.next()){
                    String   nomsq = resultat.getString("num_agriculteur");
                    // String mdpSq = resultat.getString("parcelles;"); 
                    String nom=nomsq;
                    information.add(nom);
                 }
            
                return information;
            
            
            

            }catch(SQLException exept)
                {
                    exept.printStackTrace();
                } 
        return null;
    }   




    public Integer chercherNumAgri(String tel){

        //return (nom=="a" && passw =="n");
    try{
        Statement transaction = connection.createStatement();
        //System.out.println(v);
    
    
        String requete = String.format("select num_agriculteur from agriculteurs where tel = '%s'" , tel);
        // System.out.println(requete);
        ResultSet resultat = transaction.executeQuery(requete);
    
        if(resultat.next()){
    
            Integer   nomSq = resultat.getInt("num_agriculteur");
        
            // System.out.println(num);
                //System.out.println(information[0]);
            return nomSq;                
    
        }
    
        }catch(SQLException exept){
            exept.printStackTrace();
        } 
    return null;
}
    

public Integer chercherNumPersonneAgri(String tel){

    //return (nom=="a" && passw =="n");
try{
    Statement transaction = connection.createStatement();
    //System.out.println(v);


    String requete = String.format("select num_personne from agriculteurs where tel = '%s'" , tel);
    // System.out.println(requete);
    ResultSet resultat = transaction.executeQuery(requete);

    if(resultat.next()){

        Integer   nomSq = resultat.getInt("num_personne");
    
        // System.out.println(num);
            //System.out.println(information[0]);
        return nomSq;                

    }

    }catch(SQLException exept){
        exept.printStackTrace();
    } 
return null;
}
  
public String chercherNumPersonne(String num){

    //return (nom=="a" && passw =="n");
try{
    Statement transaction = connection.createStatement();
    //System.out.println(v);


    String requete = String.format("select rendement from cultures where nom_culture = '%s'" , num);
    // System.out.println(requete);
    ResultSet resultat = transaction.executeQuery(requete);

    if(resultat.next()){

        String   nomSq = resultat.getString("rendement");
    
        // System.out.println(num);
            //System.out.println(information[0]);
        return nomSq;                

    }

    }catch(SQLException exept){
        exept.printStackTrace();
    } 
return null;
}


public Integer chercherNumPersonAgriTele(String tel){

    //return (nom=="a" && passw =="n");
try{
    Statement transaction = connection.createStatement();
    //System.out.println(tel);


    String requete = String.format("select num_personne from id_telegram where id_de_telegram = '%s'" , tel);
    // System.out.println(requete);
    ResultSet resultat = transaction.executeQuery(requete);

    if(resultat.next()){

        Integer   nomSq = resultat.getInt("num_personne");
    
        // System.out.println(num);
            //System.out.println(information[0]);
        return nomSq;                

    }

    }catch(SQLException exept){
        exept.printStackTrace();
    } 
return null;
}



public ArrayList<String> chercherIdAgriculteur(){
	try{Statement transaction = connection.createStatement();
        ArrayList<String> alt = new ArrayList<String>();
        String requete = String.format("select id_de_telegram from id_telegram " );
		ResultSet resultat = transaction.executeQuery(requete);
      while(resultat.next()){
        String   nomSq = resultat.getString("id_de_telegram");
        alt.add(nomSq);
    }
    return alt;
    }catch(SQLException ex){
      ex.printStackTrace();
      }
    return null;
}





public Integer chercherNbreArrIdT(String tel){

    //return (nom=="a" && passw =="n");
try{
    Statement transaction = connection.createStatement();
    //System.out.println(tel);


    String requete = String.format("select nbre_arrosage from id_telegram where id_de_telegram = '%s'" , tel);
    // System.out.println(requete);
    ResultSet resultat = transaction.executeQuery(requete);

    if(resultat.next()){

        Integer   nomSq = resultat.getInt("nbre_arrosage");
    
        
        return nomSq;                

    }

    }catch(SQLException exept){
        exept.printStackTrace();
    } 
return null;
}

 
public boolean moDifierFrequ(Integer nbre,String id  ){

try{
    
Statement transaction = connection.createStatement();



String requete = String.format("update id_telegram set  nbre_arrosage='%s'  where id_de_telegram =  '%s' " ,  nbre, id);

System.out.println(requete);
transaction.executeUpdate(requete);
return true;

       

               }catch(SQLException exept){
        exept.printStackTrace();
    } 
return false;
}  
  
 
public boolean moDifierDate(String id  ){
    LocalDate todaysDate = LocalDate.now();
    String date=String.valueOf(todaysDate);

try{
    
Statement transaction = connection.createStatement();




String requete2 = String.format("update id_telegram set  updated_at='%s'  where id_de_telegram =  '%s' " ,  date, id);
 //System.out.println(requete2);
transaction.executeUpdate(requete2);
return true;

       

               }catch(SQLException exept){
        exept.printStackTrace();
    } 
return false;
}  
  
 
public boolean moDifierRappelFrequ(int nbre,String id  ){


    try{
        
    Statement transaction = connection.createStatement();
    
    
    
    String requete = String.format("update id_telegram set  nbre_deja_arroser='%s'  where id_de_telegram =  '%s' " ,  nbre, id);
    // System.out.println(requete);
    transaction.executeUpdate(requete);
    return true;
    
           
    
                   }catch(SQLException exept){
            exept.printStackTrace();
        } 
    return false;
    }  

  
public String chercherNumCulturDeParcel(String num){

    //return (nom=="a" && passw =="n");
try{
    Statement transaction = connection.createStatement();
    //System.out.println(v);


    String requete = String.format("select num_culture from parcelles where num_agriculteur = '%s'" , num);
    // System.out.println(requete);
    ResultSet resultat = transaction.executeQuery(requete);

    if(resultat.next()){

        String   nomSq = resultat.getString("num_culture");
    
        // System.out.println(num);
            //System.out.println(information[0]);
        return nomSq;                

    }

    }catch(SQLException exept){
        exept.printStackTrace();
    } 
return null;
}



public String chercherFrequence(String num){

    //return (nom=="a" && passw =="n");
    try{
        Statement transaction = connection.createStatement();
        //System.out.println(v);


        String requete = String.format("select frequence_arrosage from cultures where num_culture = '%s'" , num);
        // System.out.println(requete);
        ResultSet resultat = transaction.executeQuery(requete);

            if(resultat.next()){

        String   nomSq = resultat.getString("frequence_arrosage");
        //JSONArray  freauence =getString("frequence_arrosage");
        // System.out.println(num);
            //System.out.println(information[0]);
            return nomSq;
            

        }

    }catch(SQLException exept){
        exept.printStackTrace();
        } 
    return null;
}



public String chercherTelephone(Integer num){

    //return (nom=="a" && passw =="n");
    try{
        Statement transaction = connection.createStatement();
        //System.out.println(v);


        String requete = String.format("select tel from personnes where num_personne = %d" , num);
        // System.out.println(requete);
        ResultSet resultat = transaction.executeQuery(requete);

            if(resultat.next()){

        String   nomSq = resultat.getString("tel");
        //JSONArray  freauence =getString("frequence_arrosage");
        // System.out.println(num);
            //System.out.println(information[0]);
            return nomSq;
            

        }

    }catch(SQLException exept){
        exept.printStackTrace();
        } 
    return null;
}



public int chercherFrequenceTableId(String num){

    //return (nom=="a" && passw =="n");
    try{
        Statement transaction = connection.createStatement();
        //System.out.println(v);


        String requete = String.format("select nbre_deja_arroser from id_telegram where id_de_telegram = '%s'" , num);
        // System.out.println(requete);
        ResultSet resultat = transaction.executeQuery(requete);

            if(resultat.next()){

        int   nomSq = resultat.getInt("nbre_deja_arroser");
        //JSONArray  freauence =getString("frequence_arrosage");
        // System.out.println(num);
            //System.out.println(information[0]);
            return nomSq;
            

        }

    }catch(SQLException exept){
        exept.printStackTrace();
        } 
    return 0;
}


    // -------------- A modifier----------------------




    public String chercherDateAroser(String nom){

            //return (nom=="a" && passw =="n");
        try{
            Statement transaction = connection.createStatement();
            //System.out.println(v);
        
        
            String requete = String.format("select rendement from cultures where nom_culture = '%s'" , nom);
            // System.out.println(requete);
            ResultSet resultat = transaction.executeQuery(requete);
        
            if(resultat.next()){
        
                String   nomSq = resultat.getString("rendement");
            
                // System.out.println(num);
                    //System.out.println(information[0]);
                return nomSq;                
        
            }
        
            }catch(SQLException exept){
                exept.printStackTrace();
            } 
        return null;
    }

    public String nmbreDeFoisArose(String nom){

                    //return (nom=="a" && passw =="n");
        try{
            Statement transaction = connection.createStatement();
            //System.out.println(v);
                
                
             String requete = String.format("select rendement from cultures where nom_culture = '%s'" , nom);
            // System.out.println(requete);
            ResultSet resultat = transaction.executeQuery(requete);
                
            if(resultat.next()){
                
                String   nomSq = resultat.getString("rendement");
                
                // System.out.println(num);
                //System.out.println(information[0]);
                return nomSq;
                        
                
            }
                
        }catch(SQLException exept){
            exept.printStackTrace();
            } 
        return null;
    }
 // -------------- A modifier----------------------

 

    
    public String chercherRendemeString(String nom){

            //return (nom=="a" && passw =="n");
        try{
            Statement transaction = connection.createStatement();
            //System.out.println(v);


            String requete = String.format("select rendement from cultures where nom_culture = '%s'" , nom);
            // System.out.println(requete);
            ResultSet resultat = transaction.executeQuery(requete);

            if(resultat.next()){

                String   nomSq = resultat.getString("rendement");

                // System.out.println(num);
                //System.out.println(information[0]);
                return nomSq;            
            }
        }catch(SQLException exept){
            exept.printStackTrace();
            } 
        return null;
    }


    public String chercherdensiter(String nom){

            //return (nom=="a" && passw =="n");
        try{
            Statement transaction = connection.createStatement();
            //System.out.println(v);


            String requete = String.format("select densite_semestre from cultures where nom_culture = '%s'" , nom);
            // System.out.println(requete);
            ResultSet resultat = transaction.executeQuery(requete);

            if(resultat.next()){

                String   nomSq = resultat.getString("densite_semestre");

                // System.out.println(num);
                //System.out.println(information[0]);
                return nomSq;
            }

        }catch(SQLException exept){
            exept.printStackTrace();
             } 
        return null;
    }


    public String chercherFrequenceArrosage(String nom){

        //return (nom=="a" && passw =="n");
        try{
            Statement transaction = connection.createStatement();
            //System.out.println(v);


            String requete = String.format("select frequence_arrosage from cultures where nom_culture = '%s'" , nom);
            // System.out.println(requete);
            ResultSet resultat = transaction.executeQuery(requete);

                if(resultat.next()){

            String   nomSq = resultat.getString("frequence_arrosage");
            //JSONArray  freauence =getString("frequence_arrosage");
            // System.out.println(num);
                //System.out.println(information[0]);
                return nomSq;
                

            }

        }catch(SQLException exept){
            exept.printStackTrace();
            } 
        return null;
    }
     
}





  


