package cl.ucn.disc.dsm.abarraza.news.database.dao;

import androidx.room.Dao;
import androidx.room.Query;

import java.util.List;

import cl.ucn.disc.dsm.abarraza.news.database.entity.Item;

@Dao
public interface ItemDAO {

    @Query("select * from Item")
    List<Item> getAll();

    @Query("select * from Item where itemId = :itemId")
    Item findById(int itemId);
}
