package cl.ucn.disc.dsm.abarraza.news.database.repository;

import java.util.List;

import cl.ucn.disc.dsm.abarraza.news.database.dao.ItemDAO;
import cl.ucn.disc.dsm.abarraza.news.database.entity.Item;

public class ItemRepositoryImpl implements ItemRepository{
    ItemDAO dao;

    public ItemRepositoryImpl(ItemDAO dao) {
        this.dao = dao;
    }

    @Override
    public List<Item> getAllItems() {
        return dao.getAll();
    }

    @Override
    public Item findItemById(int id) {
        return dao.findById(id);
    }

    @Override
    public void insertItem(Item item) {
        dao.insert(item);
    }

    @Override
    public void updateItem(Item item) {
        dao.update(item);
    }

    @Override
    public void deleteItem(Item item) {
        dao.delete(item);
    }
}
