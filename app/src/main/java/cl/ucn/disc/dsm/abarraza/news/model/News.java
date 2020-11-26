/*
 * Copyright 2020 alejandro barraza alejandro.barraza@alumnos.ucn.cl
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

package cl.ucn.disc.dsm.abarraza.news.model;

import net.openhft.hashing.LongHashFunction;

import org.threeten.bp.ZonedDateTime;

import cl.ucn.disc.dsm.abarraza.news.utils.Validation;

/**
 * the domain model news
 * @author alejandro barraza
 */
public final class News {
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

    public News(String title, String source, String author, String url, String urlImage, String description, String content, ZonedDateTime publishedAt) {
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
}
