package cl.ucn.disc.dsm.abarraza.news.database.entity;

import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "item")
public class Item {

    @PrimaryKey(autoGenerate = true)
    int itemId;
    @ColumnInfo(name = "nombre")
    String nombre;
    boolean isCheck;

    public int getItemId() {
        return itemId;
    }

    public String getNombre() {
        return nombre;
    }

    public boolean isCheck() {
        return isCheck;
    }
}
