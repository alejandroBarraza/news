package cl.ucn.disc.dsm.abarraza.news.retrofit;

import org.threeten.bp.ZonedDateTime;
//testing with JsonPlaceholder until waiting api rest from laravel.
public class LaravelNews {
    private int id;
    private String title;
    private String author;
    private String source;
    private String url;
    private String urlImage;
    private String description;
    private String content;
    private String date;

    public int getId() {
        return id;
    }

    public String getTitle() {
        return title;
    }

    public String getAuthor() {
        return author;
    }

    public String getSource() {
        return source;
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

    public String getDate() {
        return date;
    }
}
