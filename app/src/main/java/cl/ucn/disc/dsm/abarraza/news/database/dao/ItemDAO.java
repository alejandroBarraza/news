package cl.ucn.disc.dsm.abarraza.news.database.dao;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;
import androidx.room.Update;

import java.util.List;

import cl.ucn.disc.dsm.abarraza.news.database.entity.Item;

@Dao
public interface ItemDAO {

    @Query("select * from Item")
    List<Item> getAll();

    @Query("select * from Item where id = :id")
    Item findById(int id);

    @Insert
    void insert(Item item);

    @Update
    void update (Item item);

    @Delete
    void delete (Item item);
}
