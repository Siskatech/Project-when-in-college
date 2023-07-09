package com.example.mydiary;

import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import helper.DbHelper;

public class AddEdit extends AppCompatActivity {
    EditText txt_id, txt_title, txt_content;
    Button btn_submit, btn_cancel;
    DbHelper SQLite = new DbHelper(this);
    String id, title, content;

    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_edit);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        txt_id = (EditText) findViewById(R.id.txt_id);
        txt_title = (EditText) findViewById(R.id.txt_title);
        txt_content = (EditText) findViewById(R.id.txt_content);
        btn_submit = (Button) findViewById(R.id.btn_submit);
        btn_cancel = (Button) findViewById(R.id.btn_cancel);

        id = getIntent().getStringExtra(MainActivity.TAG_ID);
        title = getIntent().getStringExtra(MainActivity.TAG_TITLE);
        title = getIntent().getStringExtra(MainActivity.TAG_CONTENT);

        if(id==null || id==""){
            setTitle("CONTENT OF DIARY");
        }else{
            setTitle("CONTENT OF DIARY");
            txt_id.setText(id);
            txt_title.setText(title);
            txt_content.setText(content);
        }

        btn_submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try{
                    if(txt_id.getText().toString().equals("")){
                        save();
                    }else{
                        edit();
                    }
                }catch (Exception e){
                    Log.e("Save",e.toString());
                }
            }
        });

        btn_cancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                blank();
                finish();
            }
        });
    }

    public void onBackPressed(){
        finish();
    }

    public boolean onOptionsItemSelected(MenuItem item){
        switch (item.getItemId()){
            case android.R.id.home:
                blank();
                this.finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    private void blank(){
        txt_title.requestFocus();
        txt_id.setText(null);
        txt_title.setText(null);
        txt_content.setText(null);
    }

    private void save(){
        if (String.valueOf(txt_title.getText()).equals(null) || String.valueOf(txt_title.getText()).equals("") ||
                String.valueOf(txt_content.getText()).equals(null) || String.valueOf(txt_content.getText()).equals("")){
            Toast.makeText(getApplicationContext(), "Please input title or content...", Toast.LENGTH_SHORT).show();
        }else{
            SQLite.insert(txt_title.getText().toString().trim(), txt_content.getText().toString().trim());
            blank();
            finish();
        }
    }

    private void edit(){
        if (String.valueOf(txt_title.getText()).equals(null) || String.valueOf(txt_title.getText()).equals("") ||
                String.valueOf(txt_content.getText()).equals(null) || String.valueOf(txt_content.getText()).equals("")){
            Toast.makeText(getApplicationContext(),"Please input title or content...", Toast.LENGTH_SHORT).show();
        }else {
            SQLite.update(Integer.parseInt(txt_id.getText().toString().trim()), txt_title.getText().toString().trim(), txt_content.getText().toString().trim());
            blank();
            finish();
        }
    }
}
