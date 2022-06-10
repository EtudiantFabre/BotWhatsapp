package com.ifnti;

import java.util.ArrayList;
import java.util.List;

import org.telegram.telegrambots.bots.TelegramLongPollingBot;
import org.telegram.telegrambots.meta.api.methods.send.SendMessage;
import org.telegram.telegrambots.meta.api.objects.Update;
import org.telegram.telegrambots.meta.api.objects.replykeyboard.ReplyKeyboardMarkup;
import org.telegram.telegrambots.meta.api.objects.replykeyboard.buttons.KeyboardRow;
import org.telegram.telegrambots.meta.exceptions.TelegramApiException;

public class AgrisokMethode extends TelegramLongPollingBot {

    @Override
    public void onUpdateReceived(Update update) {
        DAO base = new DAO();
       // System.out.println(base.chercherCulture());
        ArrayList<String> cultures=base.chercherCulture();

      // int chois=0;
// TODO Auto-generated method stub
       // System.out.println(update);
        if (update.hasMessage() && update.getMessage().hasText()) {
            String message_text = update.getMessage().getText();
            Long chat_id = update.getMessage().getChatId();
                if (message_text.equals("/salut")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuillez selectionner une colonne");
                            // Create ReplyKeyboardMarkup object
                            ReplyKeyboardMarkup keyboardMarkup = new ReplyKeyboardMarkup();
                            // Create the keyboard (list of keyboard rows)
                            List<KeyboardRow> keyboard = new ArrayList<>();
                            // Create a keyboard row
                            KeyboardRow row = new KeyboardRow();
                            // Set each button, you can also use KeyboardButton objects if you need something else than text
                            row.add("Demander conseille sur une culutre");
                        
                        
                            // Add the first row to the keyboard
                            keyboard.add(row);

                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            row.add("Enregistrer une culture prartiquer");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            row.add("Demande de reconnaissance de statut d'agronomme");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                            
                            // Create another keyboard row
                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            
                            row.add("Enregistrer une nouvelle culture");
                            row.add("Proposer Modification sur une culture");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                            // Set the keyboard to the markup
                            keyboardMarkup.setKeyboard(keyboard);
                            // Add it to the message
                            message.setReplyMarkup(keyboardMarkup);
                            try {
                                execute(message); // Sending our message object to user
                            } catch (TelegramApiException e) {
                                e.printStackTrace();
                            }
                    }else if (message_text.equals("Enregistrer une nouvelle culture")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuiller aller sur le liens \nwww.botagrisok.com ");
                        
                        try {
                            execute(message); // Call method to send the photo
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    } 
                    else if (message_text.equals("Proposer Modification sur une culture")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuiller aller sur le liens \nwww.botagrisok.com");
                        
                        try {
                            execute(message); // Call method to send the photo
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    }
                    else if (message_text.equals("Enregistrer une culture prartiquer")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuiller aller sur le liens \nwww.botagrisok.com");
                        
                        try {
                            execute(message); // Call method to send the photo
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    }  
                    else if (message_text.equals("Demande de reconnaissance de statut d'agronomme")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuiller aller sur le liens \nwww.botagrisok.com");
                        
                        try {
                            execute(message); // Call method to send the photo
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    }
                    else if (message_text.equals("menue principal")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuillez selectionner une colonne");
                            // Create ReplyKeyboardMarkup object
                            ReplyKeyboardMarkup keyboardMarkup = new ReplyKeyboardMarkup();
                            // Create the keyboard (list of keyboard rows)
                            List<KeyboardRow> keyboard = new ArrayList<>();
                            // Create a keyboard row
                            KeyboardRow row = new KeyboardRow();
                            // Set each button, you can also use KeyboardButton objects if you need something else than text
                            row.add("Demander conseille sur une culutre");
                        
                        
                            // Add the first row to the keyboard
                            keyboard.add(row);

                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            row.add("Enregistrer une culture prartiquer");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            row.add("Demande de reconnaissance de statut d'agronomme");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                            
                            // Create another keyboard row
                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            
                            row.add("Enregistrer une nouvelle culture");
                            row.add("Proposer Modification sur une culture");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                            // Set the keyboard to the markup
                            keyboardMarkup.setKeyboard(keyboard);
                            // Add it to the message
                            message.setReplyMarkup(keyboardMarkup);
                            try {
                                execute(message); // Sending our message object to user
                            } catch (TelegramApiException e) {
                                e.printStackTrace();
                            }
                    }  
                    else if (message_text.equals("Ma culture ne se trouve pas dans la liste")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Désolé nous ne pouvons pas vous aider merci d'avoir utilisé le BOT-AGRI-SOK ");
                        
                        try {
                            execute(message); // Call method to send the photo
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    }  
                    else if (verifierCultu(cultures, message_text)) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        String rendement = base.chercherRendemeString(message_text);
                        String densite = base.chercherdensiter(message_text);
                        String frequence = base.chercherFrequenceArrosage(message_text);
                        //System.out.println(frequence);
                        message.setText("la culture "+message_text+"\n À une densité par semestre estimé à: "+ densite +"\nÀ un rendement de: " + rendement +"\n Fréquence d'arrosage par mois: " + frequence);
                        
                        try {
                            execute(message); // Call method to send the photo
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    }
                      
                    //Demander conseille sur une culutre
                    else if (message_text.equals("Demander conseille sur une culutre")) {
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("Veuillez selectionner votre culture");
                            ReplyKeyboardMarkup keyboardMarkup = new ReplyKeyboardMarkup();
                            List<KeyboardRow> keyboard = new ArrayList<>();
                            KeyboardRow row = new KeyboardRow();
                            row.add("Ma culture ne se trouve pas dans la liste");                                                
                            keyboard.add(row);
                            row = new KeyboardRow();
                            // Set each button for the second line
                            //Enregistrer une nouvelle culture
                            row.add("menue principal");
                            // Add the second row to the keyboard
                            keyboard.add(row);
                          
                            
                          
                            for(String s : cultures){
                                row = new KeyboardRow();
                                row.add(s);
                                keyboard.add(row);
                               
                               }                            
                            keyboardMarkup.setKeyboard(keyboard);
                            message.setReplyMarkup(keyboardMarkup);
                            try {
                                execute(message); // Sending our message object to user
                            } catch (TelegramApiException e) {
                                e.printStackTrace();
                            }


                       
                    }else {
                        // Unknown command
                        SendMessage message = new SendMessage();
                        message.setChatId(""+chat_id);
                        message.setText("commande inconnue \npour démarrer  veuillez taper la commande de démarage /salut ");
                                      //  .setText("Unknown command");
                        try {
                            execute(message); // Sending our message object to user
                        } catch (TelegramApiException e) {
                            e.printStackTrace();
                        }
                    }  
                
            }


            

        }
        
    

    @Override
    public String getBotUsername() {
        // TODO Auto-generated method stub
        return "AGRISOK_bot";
    }

    @Override
    public String getBotToken() {
        // TODO Auto-generated method stub
        return "5340210420:AAGQlaHBCiXTZPRNaxhqHpY0bSejqhSct5s";
    }

    public String sendMenu(){
        return "Pour effectuer une demande choisissez un numéros de votre choix exemple (3). \n1-> Demander Conseil sur une culture. \n2-> Enregistrer Culture pratiqué \n3-> Demande de reconnaissance du statut d'agronomme \n4-> Enregistrer une nouvelle cluture \n5-> Proposer une modification sur une culture";
    }

    public String messageBienvenue(){
        return "Bienvenue dans le bot-agri \nPour démararer taper: 0";
    }
    public String messageErreur1(){
        return "Veuillez tapper 0 svp";
    }

    public String messageErreur2(){
        return "Veuillez tapper des nombre allant de 1 à 5 exemple: 8";
    }

    public Boolean verifierCultu(ArrayList<String> culture,String nom){
        if(culture.contains(nom)){
            return true;
        }

        return false;
    }

   
}




















