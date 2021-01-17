package cl.ucn.disc.dsm.abarraza.news.database.repository;

import java.util.List;

import cl.ucn.disc.dsm.abarraza.news.database.entity.Item;

public interface ItemRepository {

    List<Item> getAllItems();
    Item findItemById(int id);
    void insertItem(Item item);
    void updateItem(Item item);
    void deleteItem(Item item);
}
