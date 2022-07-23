package com.ifnti;

import org.telegram.telegrambots.meta.TelegramBotsApi;
import org.telegram.telegrambots.meta.exceptions.TelegramApiException;
import org.telegram.telegrambots.updatesreceivers.DefaultBotSession;

/**
 * Hello world!
 *
 */
public class App 
{
    public static void main( String[] args )
    {
      
        try{
            TelegramBotsApi botsApi = new TelegramBotsApi(DefaultBotSession.class);
            botsApi.registerBot(new AgrisokMethode());
        } catch (TelegramApiException e) {
            e.printStackTrace();
        }
        System.out.println("");
        System.out.println("");
        System.out.println("");

        System.out.println("------------------------------------------------------");
        System.out.println("'                                                    '");
        System.out.println("'                                                    '");
        System.out.println("'                                                    '");
        System.out.println("'                                                    '");
        System.out.println("'                                                    '");
        System.out.println( "' Le bot BOT-AGRI-SOK à belle et bien démarrer       '" );
        System.out.println("'                                                    '");
        System.out.println("'                                                    '");
        System.out.println("'                                                    '");
        System.out.println("'----------------------------------------------------'");
        System.out.println("'---------- Vous pouvez lancer vos requêtes ---------'");
        System.out.println("");
        System.out.println("");

        
        AgrisokMethode noti = new AgrisokMethode();
        noti.envoyerNotification();
       
    }


}

