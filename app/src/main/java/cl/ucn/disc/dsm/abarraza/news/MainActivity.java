/*
 * Copyright 2020 alejandro barraza alejandro.barraza@alumnos.ucn.cl
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

package cl.ucn.disc.dsm.abarraza.news;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.widget.CompoundButton;
import android.widget.ListView;
import android.widget.Switch;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AppCompatDelegate;
import androidx.recyclerview.widget.DividerItemDecoration;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import com.mikepenz.fastadapter.FastAdapter;
import com.mikepenz.fastadapter.adapters.ModelAdapter;

import java.util.List;
import java.util.ListIterator;

import cl.ucn.disc.dsm.abarraza.news.activities.NewsItem;
import cl.ucn.disc.dsm.abarraza.news.model.News;
import cl.ucn.disc.dsm.abarraza.news.retrofit.GetterApiLaravel;
import cl.ucn.disc.dsm.abarraza.news.retrofit.LaravelNews;
import cl.ucn.disc.dsm.abarraza.news.services.ContractcImplNewsApi;
import cl.ucn.disc.dsm.abarraza.news.services.Contracts;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * the main class
 * @author alejandro barraza
 */

public class MainActivity extends AppCompatActivity {
    /**
     * the listview
     */
    protected ListView listView;

    /**
     * the listNews
     */
    List<News> listNews;
    SwipeRefreshLayout swipeRefreshLayout;

    /**
     * On create
     * @param savedInstanceState used to realod the app
     */
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //dark mode switch.
        Switch switch1 = findViewById(R.id.switch1);
        switch1.setOnCheckedChangeListener((buttonView, isChecked) -> {
            if(isChecked){
                getDelegate().setLocalNightMode(AppCompatDelegate.MODE_NIGHT_YES);
            }else{
                getDelegate().setLocalNightMode(AppCompatDelegate.MODE_NIGHT_NO);
            }
        });

        //the toolbar
        this.setSupportActionBar(findViewById(R.id.am_t_toolbar));

        //new one
        swipeRefreshLayout = (SwipeRefreshLayout
                ) findViewById(R.id.am_swl_refresh);

        //the fast adapter
        ModelAdapter<News, NewsItem> newsAdapter = new ModelAdapter<>(NewsItem::new);
        FastAdapter<NewsItem> fastAdapter = FastAdapter.with(newsAdapter);
        fastAdapter.withSelectable(false);

        //the recycling view.
        RecyclerView recyclerView = findViewById(R.id.am_rv_news);
        recyclerView.setAdapter(fastAdapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.addItemDecoration(new DividerItemDecoration(this,
                DividerItemDecoration.VERTICAL));

        if (!isConnected(this)) {
            Toast.makeText(MainActivity.this, "No hay conexion a internet, se mostraran noticias antiguas", Toast.LENGTH_LONG).show();
        }else{
            //Get the the news Async.
            AsyncTask.execute(() ->{

                // using the contracts to get the news..
                Contracts contracts = new ContractcImplNewsApi("ca0f046705c04b55b6c9305bc4c54b48");

                //get the News from NewsApi(internet).
                listNews = contracts.retrieveNews(30);

                //set the adapter!
                runOnUiThread(()->{
                    newsAdapter.add(listNews);
                });
            });

            //Refresh the news list until a new request is a made.
            swipeRefreshLayout.setOnRefreshListener(
                    () -> {
                        fastAdapter.notifyAdapterDataSetChanged();
                        Toast.makeText(MainActivity.this, "Loading..", Toast.LENGTH_LONG).show();
                        swipeRefreshLayout.setRefreshing(false);
                    }
            );

        }


    }

    /**
     * @param mainActivity Check Internet Connection
     * @return
     */
    private boolean isConnected(MainActivity mainActivity) {
        ConnectivityManager connectivityManager = (ConnectivityManager) mainActivity.getSystemService(Context.CONNECTIVITY_SERVICE);

        NetworkInfo wifiConn = connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_WIFI);
        NetworkInfo mobileConn = connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_MOBILE);

        if((wifiConn != null && wifiConn.isConnected()) || (mobileConn != null && mobileConn.isConnected())){
            return true;
        }
        return false;
    }

    //bring data from laravelapi
    private void getPosts(){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl("https://jsonplaceholder.typicode.com/")
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        GetterApiLaravel getterApiLaravel = retrofit.create(GetterApiLaravel.class);
        Call<List<LaravelNews>> call = getterApiLaravel.getPosts();
        call.enqueue(new Callback<List<LaravelNews>>() {
            @Override
            public void onResponse(Call<List<LaravelNews>> call, Response<List<LaravelNews>> response) {
                if(!response.isSuccessful()){
                    //insert failure message.
                }
                //insert succes method.
                List<LaravelNews> newsListApiLaravel =  response.body();
                for( LaravelNews laravelNews: newsListApiLaravel){
                    //display the news after.
                }

            }

            @Override
            public void onFailure(Call<List<LaravelNews>> call, Throwable t) {
                //insert failure process
            }
        });


    }

}