package com.ifnti;


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
import java.sql.SQLException;
import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.Statement;
import java.sql.ResultSet;
//import static gestionscolaire.Connexion.connection;
import java.util.ArrayList;

import org.json.JSONArray;
import org.json.JSONObject;


/**
 *
 * @author isidore
 */
public class DAO {
    public static Connection connection;

    public DAO() {
        try{
   connection = DriverManager.getConnection("jdbc:postgresql://fabrice:5432/botwhatsap","bot","bot");
}catch(SQLException exept){
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
           
           
           

                   }catch(SQLException exept){
            exept.printStackTrace();
        } 
    return null;
}   
        
 
 
 public void quitter() throws SQLException{
     connection.close();
 }
 
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





  


