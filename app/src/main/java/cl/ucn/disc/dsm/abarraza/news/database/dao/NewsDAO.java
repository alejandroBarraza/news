package cl.ucn.disc.dsm.abarraza.news.database.dao;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.OnConflictStrategy;
import androidx.room.Query;
import androidx.room.Update;

import java.util.List;

import cl.ucn.disc.dsm.abarraza.news.model.News;

@Dao
public interface NewsDAO {

    @Query("select * from News")
    List<News> getAll();

    @Query("select * from News where id = :id")
    News findById(long id);

    @Insert(onConflict = OnConflictStrategy.IGNORE)
    void insert(News item);

    @Update
    void update (News item);

    @Delete
    void delete (News item);
}
