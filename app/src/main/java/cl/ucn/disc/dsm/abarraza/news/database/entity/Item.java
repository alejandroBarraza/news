package cl.ucn.disc.dsm.abarraza.news.database.entity;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

import net.openhft.hashing.LongHashFunction;

import org.threeten.bp.ZonedDateTime;

import cl.ucn.disc.dsm.abarraza.news.utils.Validation;

@Entity(tableName = "item")
public class Item {
    /**
     * unique id
     */
    private final Long id;
    /**
     * the title
     */
    private final String title;
    /**
     * the source
     */
    private final String source;
    /**
     * the author
     */
    private final String author;
    /**
     * the url
     */
    private final String url;
    /**
     * the url of image
     */
    private final String urlImage;
    /**
     * the description
     */
    private final String description;
    /**
     * the content
     */
    private final String content;
    /**
     * the date of publish
     */
    private final ZonedDateTime publishedAt;

    /**
     * constructor
     //* @param id
     * @param title
     * @param source
     * @param author
     * @param url
     * @param urlImage
     * @param description
     * @param content
     * @param publishedAt
     */
    public Item(String title, String source, String author, String url, String urlImage, String description, String content, ZonedDateTime publishedAt) {
        //validation of title
        Validation.minSize(title,2 , "title");
        this.title = title;

        ///validation of source
        Validation.minSize(source,2,"source");
        this.source = source;

        //validation of author
        Validation.minSize(author,2,"author");
        this.author = author;

        //apply the xxHash function.
        this.id= LongHashFunction.xx().hashChars(title + source + author);

        this.url = url;
        this.urlImage = urlImage;

        //validation of description
        Validation.notNull(content,"content");
        this.description = description;

        //validation of content
        Validation.notNull(content,"content");
        this.content = content;

        //validation published
        Validation.notNull(publishedAt,"publishedAt");
        this.publishedAt = publishedAt;
    }

    public long getId() {
        return id;
    }

    public String getTitle() {
        return title;
    }

    public String getSource() {
        return source;
    }

    public String getAuthor() {
        return author;
    }

    public String getUrl() {
        return url;
    }

    public String getUrlImage() {
        return urlImage;
    }

    public String getDescription() {
        return description;
    }

    public String getContent() {
        return content;
    }

    public ZonedDateTime getPublishedAt() {
        return publishedAt;
    }
    //TODO: Remove after testing.
    @NonNull
    @Override
    public String toString() {
        return this.title;
    }
}
