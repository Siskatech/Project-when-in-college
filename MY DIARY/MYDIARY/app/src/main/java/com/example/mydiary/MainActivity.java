package com.example.mydiary;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import androidx.appcompat.widget.Toolbar;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListAdapter;
import android.widget.ListView;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import adapter.Adapter;
import helper.DbHelper;
import model.Data;

public class MainActivity extends AppCompatActivity {

    ListView listView;
    AlertDialog.Builder dialog ;
    List<Data> itemList = new ArrayList<Data>();
    android.widget.Adapter adapter;
    DbHelper SQLite = new DbHelper(this);

    public static final String TAG_ID ="id";
    public static final String TAG_TITLE ="title";
    public static final String TAG_CONTENT ="content";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar)findViewById(R.id.toolbar1);
        setSupportActionBar(toolbar);
        getSupportActionBar().setTitle("MY DIARY");

        SQLite = new DbHelper(getApplicationContext());
        FloatingActionButton fab = findViewById(R.id.fab);
        listView = (ListView) findViewById(R.id.list_view);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, AddEdit.class);
                startActivity(intent);
            }
        });

        adapter = new Adapter(MainActivity.this, itemList);
        listView.setAdapter((ListAdapter) adapter);

        listView.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
            @Override
            public boolean onItemLongClick(AdapterView<?> parent, View view, final int position, long id) {
                final String idx = itemList.get(position).getId();
                final String Title = itemList.get(position).getTitle();
                final String Content = itemList.get(position).getContent();

                final CharSequence[] dialogitem = {"Edit", "Delete"};
                dialog = new AlertDialog.Builder(MainActivity.this);
                dialog.setCancelable(true);
                dialog.setItems(dialogitem, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        switch (which) {
                            case 0:
                                Intent intent = new Intent(MainActivity.this, AddEdit.class);
                                intent.putExtra(TAG_ID, idx);
                                intent.putExtra(TAG_TITLE, Title);
                                intent.putExtra(TAG_CONTENT, Content);
                                startActivity(intent);
                                break;
                            case 1:
                                SQLite.delete(Integer.parseInt(idx));
                                itemList.clear();
                                Intent i = new Intent(MainActivity.this, MainActivity.class);
                                getAllData();
                                startActivity(i);
                                break;
                        }
                    }
                }).show();
                return false;
            }
        });
        getAllData();

    }

    private void getAllData () {
        ArrayList<HashMap<String, String>> row = SQLite.getAllData();

        for (int i = 0; i < row.size(); i++) {
            String id = row.get(i).get(TAG_ID);
            String title = row.get(i).get(TAG_TITLE);
            String content = row.get(i).get(TAG_CONTENT);

            Data data = new Data();

            data.setId(id);
            data.setTitle(title);
            data.setContent(content);

            itemList.add(data);
        }

        synchronized(adapter){
            adapter.notify();
        }
    }

    protected void onResume () {
        super.onResume();
        itemList.clear();
        getAllData();
    }

}