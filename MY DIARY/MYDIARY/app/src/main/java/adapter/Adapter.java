package adapter;

import android.app.Activity;
import android.content.Context;
import android.view.View;
import android.view.LayoutInflater;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.mydiary.R;

import java.util.List;

import model.Data;

public class Adapter extends BaseAdapter {
    private Activity activity;
    private LayoutInflater inflater;
    private List<Data> items;

    public Adapter(Activity activity, List<Data> items){
        this.activity = activity;
        this.items = items;
    }

    public int getCount(){
        return items.size();
    }

    public Object getItem(int location){
        return items.get(location);
    }

    public long getItemId(int position){
        return position;
    }

    public View getView(int position, View convertView, ViewGroup parent){
        if(inflater == null)
            inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        if (convertView == null)
            convertView = inflater.inflate(R.layout.list_row,null);

        TextView id = (TextView) convertView.findViewById(R.id.id);
        TextView title = (TextView) convertView.findViewById(R.id.title);
        TextView content = (TextView) convertView.findViewById(R.id.content);

        Data data = items.get(position);
        id.setText(data.getId());
        title.setText(data.getTitle());
        content.setText(data.getContent());

        return convertView;
    }
}

