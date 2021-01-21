
/*
 * Copyright 2020 alejandro barraza alejandro.barraza@alumnos.ucn.cl
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

package cl.ucn.disc.dsm.abarraza.news.services;

import com.kwabenaberko.newsapilib.models.Article;

import org.apache.commons.lang3.NotImplementedException;
import org.apache.commons.lang3.builder.ToStringBuilder;
import org.apache.commons.lang3.builder.ToStringStyle;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.threeten.bp.ZoneId;
import org.threeten.bp.ZonedDateTime;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.concurrent.ConcurrentHashMap;
import java.util.function.Function;
import java.util.function.Predicate;
import java.util.stream.Collectors;

import cl.ucn.disc.dsm.abarraza.news.database.AppDatabase;
import cl.ucn.disc.dsm.abarraza.news.model.News;
import cl.ucn.disc.dsm.abarraza.news.utils.Validation;

/**
 * the news api implementations.
 */
public class ContractcImplNewsApi implements Contracts {
    /**
     * the logger
     */
    private static final Logger log = LoggerFactory.getLogger(ContractcImplNewsApi.class);
    private final NewsApiService newsApiService;

    public ContractcImplNewsApi(String apiKey) {
        Validation.notNull(apiKey,"apikey!");
        this.newsApiService = new NewsApiService(apiKey);
    }

    /**
     * get thie lis of news
     *
     * @param size size of the list
     * @return the lisf of news
     */
    @Override
    public List<News> retrieveNews(Integer size) {
        try {
            //request to news pi
            List<Article> articles = this.newsApiService.getTopHeadlines("general",size);
            //the final list of news.
            List<News> news = new ArrayList<>();
            //iterate over the articles
            for (Article article: articles) {
                news.add(article2news(article));
            }
            //return the list of news.
            return news.stream()
                    //remove the duplicate by id
                    .filter(distinById(News::getId))
                    //sort the stream by pusblishdedAt
                    .sorted((k1,k2)->k2.getPublishedAt().compareTo(k1.getPublishedAt()))
                    //Return the stream to list.
                    .collect(Collectors.toList());
        } catch (IOException e) {
            System.out.println("error" + e);
            //Inner exception
            throw new  RuntimeException(e);
        }
    }

    /**
     * filter the stream.
     * @param keyExtractor
     * @param <T>  news to fiter
     * @return
     */
    private static <T> Predicate<T> distinById(Function<? super T, ?> keyExtractor){
        Map<Object,Boolean> seen = new ConcurrentHashMap<>();
        return t -> seen.putIfAbsent(keyExtractor.apply(t),Boolean.TRUE)==null;
    }
    /**
     * articles to news.
     * @param article
     * @return
     */
    private static News article2news(Article article) {
        //debug of artciles

        ZonedDateTime publishedAt = ZonedDateTime.parse(article.getPublishedAt()).withZoneSameInstant(ZoneId.of("-3"));


        if(article.getAuthor() == null || article.getAuthor().length() == 0){
            article.setAuthor("no author");

        }
        if(article.getDescription() == null || article.getDescription().length()==0){
            article.setDescription("no author");
        }

        return new News(
                article.getTitle(),
                article.getSource().getName(),
                article.getAuthor(),
                article.getUrl(),
                article.getUrlToImage(),
                article.getDescription(),
                article.getDescription(),//FIXME: where is the content?.
                publishedAt
        );
    }

    /**
     * Save on News into the system
     *
     * @param news to save
     */
    @Override
    public void saveNews(News news, AppDatabase db) {
        db.newsDAO().insert(news);
    }
}
