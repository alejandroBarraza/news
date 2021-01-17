package cl.ucn.disc.dsm.abarraza.news.database;

import android.content.Context;

import androidx.room.Room;

import androidx.room.Database;
import androidx.room.Room;
import androidx.room.RoomDatabase;

import android.content.Context;

import cl.ucn.disc.dsm.abarraza.news.database.dao.ItemDAO;
import cl.ucn.disc.dsm.abarraza.news.database.entity.Item;

@Database(entities = {
        Item.class
}, version = 1)
public abstract class AppDatabase extends RoomDatabase{

    public static AppDatabase INSTANCE;

    public abstract ItemDAO itemDAO();

    public static AppDatabase getInstance(Context context) {
        if(INSTANCE == null){
            INSTANCE = Room.databaseBuilder(context, AppDatabase.class, "checklist.db")
                    .allowMainThreadQueries()
                    .fallbackToDestructiveMigration()
                    .build();
        }
        return INSTANCE;
    }
}
