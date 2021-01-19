package cl.ucn.disc.dsm.abarraza.news.database;

import android.content.Context;

import androidx.room.Room;

import androidx.room.Database;
import androidx.room.RoomDatabase;
import androidx.room.TypeConverters;

import cl.ucn.disc.dsm.abarraza.news.database.dao.NewsDAO;
import cl.ucn.disc.dsm.abarraza.news.model.News;
import cl.ucn.disc.dsm.abarraza.news.utils.ZonedDateTimeConverter;

/**
 *  the AppDatabase class
 *  @author Diego Calderón
 */
@Database(entities = {
        News.class
}, version = 1)
@TypeConverters(ZonedDateTimeConverter.class)
public abstract class AppDatabase extends RoomDatabase{

    public static AppDatabase INSTANCE;

    public abstract NewsDAO newsDAO();

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
